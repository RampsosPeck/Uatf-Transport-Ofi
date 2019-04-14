<?php

namespace UatfTransport;

use Illuminate\Database\Eloquent\Model;
use UatfTransport\User;

class Message extends Model
{
    protected $guarded = ['id'];

    protected $table = 'messages';

	protected $fillable = ['sender_id', 'recipient_id', 'body'];

	public function sender()
	{
		return $this->belongsTo(User::class, 'sender_id'); 
	}
}
