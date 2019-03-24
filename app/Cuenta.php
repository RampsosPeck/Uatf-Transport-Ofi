<?php

namespace UatfTransport;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuentas';

	protected $fillable = ['QRcode', 'saldo', 'user_id'];

	public function user() {
		return $this->belongsTo('Uatftrans\User');
	}
	public function tarjetas() {
		return $this->hasMany('Uatftrans\Tarjeta');
	}
	public function transactions()
    {
        return $this->hasMany('Uatftrans\Transaction');
    }
}
