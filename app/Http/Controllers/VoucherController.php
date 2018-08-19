<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
     * @return void
     */
    public function generate(Request $request) 
    {
        $this->validate($request, [
            'offerName' => 'required',
            'discount' => 'required',
            'expiryDate' => 'required|date'
        ]);
    }

}
