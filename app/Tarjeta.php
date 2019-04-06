<?php

namespace UatfTransport;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = 'tarjetas';

	protected $fillable = ['code', 'barCode', 'user_id', 'cuenta_id'];

	public function cuenta() {
		return $this->belongsTo('UatfTransport\Cuenta');
	}
	public function user() {
		return $this->belongsTo('UatfTransport\User');
	}
}
