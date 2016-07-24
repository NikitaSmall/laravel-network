<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id', 'rec_id', 'body', 'read'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function recipient()
    {
    	return User::find($this->rec_id);
    }

    public function read()
    {
    	$this->read = true;
    	$this->save();
    }
}
