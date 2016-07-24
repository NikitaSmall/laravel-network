<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'social_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function friends()
    {
        $friend_ids = array_pluck(Friend::where('user_id', $this->id)->get(), 'friend_id');
        return User::whereIn('id', $friend_ids)->get();
    }

    public function not_friends()
    {
        $friend_ids = array_pluck(Friend::where('user_id', $this->id)->get(), 'friend_id');
        
        return User::whereNotIn('id', $friend_ids)->get();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function hasNewMessage()
    {
        return $this->newMessageCount() > 0;
    }

    public function newMessageCount()
    {
        return Message::where('rec_id', $this->id)->where('read', false)->count();
    }

    public function isFriend($other)
    {
        return Friend::where('user_id', $this->id)->where('friend_id', $other->id)->count() > 0;
    }
}
