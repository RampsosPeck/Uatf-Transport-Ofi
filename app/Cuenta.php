<?php

namespace UatfTransport;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuentas';

	protected $fillable = ['QRcode', 'saldo', 'user_id'];

	public function user() {
		return $this->belongsTo('UatfTransport\User');
	}
	public function tarjetas() {
		return $this->hasMany('UatfTransport\Tarjeta');
	}
	public function transactions()
    {
        return $this->hasMany('UatfTransport\Transaction');
    }
}
