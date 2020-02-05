<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        "sentence",
        "conversation_id",
    ];

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function conversationTree()
    {
        return $this->hasMany(Conversation::class)->with('conversations');
    }
}
