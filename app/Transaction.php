<?php

namespace UatfTransport;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

	protected $fillable = ['cuenta_id', 'monto', 'haber', 'tipo', 'servicio'];

	public function cuenta()
    {
        return $this->belongsTo('Uatftrans\Cuenta');
    }
}
