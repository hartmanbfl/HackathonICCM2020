<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Conversation
 *
 * @property int $id
 * @property string $sentence
 * @property int|null $conversation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Conversation[] $conversationTree
 * @property-read int|null $conversation_tree_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Conversation[] $conversations
 * @property-read int|null $conversations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereSentence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
