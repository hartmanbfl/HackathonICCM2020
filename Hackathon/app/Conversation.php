<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function conversationTree()
    {
        return $this->hasMany(Conversation::class)->with('conversations');
    }
}
