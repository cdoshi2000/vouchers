<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class VoucherCode extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'recipient_id', 'special_id', 'expiry_date', 'user', 'used_at'
    ];

	public function recipient() {
		return $this->belongsTo('App\Recipient');
	}

	public function specialOffer() {
		return $this->belongsTo('App\SpecialOffer');
	}

}
