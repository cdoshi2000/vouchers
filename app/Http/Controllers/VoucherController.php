<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Recipient;
use App\SpecialOffer;
use App\VoucherCode;

/**
 * VoucherController 
 * 
 * @uses Controller
 * @package 
 * @version $id$
 * @copyright 1997-2005 The PHP Group
 * @author Chirag
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class VoucherController extends Controller
{
    /**
     * __construct 
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * createVouchers 
     * 
     * @access public
     * @return void
     */
    function createVouchers() 
    {
        return view("vouchers.create");
    }

    /**
     * generate 
     * 
     * @param Request $request 
     * @access public
     * @return json
     */
    public function generate(Request $request) 
    {
        // validate the data to generate vouchers, throws exception  with json if the validation fails
        $this->validate($request, [
            'offerName' => 'required|exists:special_offers,name',
            'expiryDate' => 'required|date',
        ]);

        // retrive the special offer record
        $specialOffer = SpecialOffer::where('name', $request['offerName'])->first();
        // fetch all the receipients data
        $recipients = Recipient::all();

        // loop through all the recipients to generate vouchers for each
        foreach ($recipients as $recipient) {
            // generate random string to generate voucher
            $code = str_random(8);
            // check if the voucher doesn't exist before creating the record
            if(!VoucherCode::find($code)) {
                $voucher = VoucherCode::create([
                    'code' => $code,
                    'recipient_id' => $recipient->id,
                    'special_id' => $specialOffer->id,
                    'expiry_date' => $request['expiryDate']
                ]);
            }
        }
        return ['status' => 'Vouchers created'];
    }

    /**
     * redeemVoucher 
     * 
     * @param Request $request 
     * @access public
     * @return json
     */
    function redeemVoucher(Request $request) {
        $returnData = array('status' => 'Voucher not valid');
        // validate the input
        $this->validate($request, [
            'email' => 'required|exists:recipients,email',
            'code' => 'required',
        ]);
        //fetch recipient record
        $recipient = Recipient::where('email', $request['email'])->first();

        // search for the code
        $voucher = VoucherCode::where('code', $request['code'])
        ->where('recipient_id', $recipient->id)
        ->where('expiry_date', '<', 'now()')
        ->where('used', '!=', 1)
        ->first();

        // if code available
        if($voucher) {
            // update code used
            $voucher->used = 1;
            $voucher->used_at = date("Y-m-d H:i:s");
            $voucher->save();
            
            // fetch the special offer record
            $specialOffer = SpecialOffer::find($voucher->special_id);
            // set the data to send
            $returnData = ['status' => 'valid', 'code' => $voucher->code, 'discount' => $specialOffer->percentage_discount . "%"];
        }



        return $returnData;

    }

}
