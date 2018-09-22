<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAll()
    {
        return $this->with('user')->get();
    }

    public function newMessage($data)
    {
        $data['user_id'] = auth()->id();
        return $this->create($data);
    }

}


