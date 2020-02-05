<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Conversation as ConversationModel;

class Conversation extends JsonResource
{
    protected $conversation;

    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->conversation = $resource;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->convertConversation($this->conversation);
    }

    protected function convertConversation(ConversationModel $conversation)
    {
        return [
            'id'        => $conversation->id,
            'sentence'  => $conversation->sentence,
            'children'  => $this->convertConversations($conversation->conversations)
        ];
    }

    protected function convertConversations(Collection $conversations)
    {
        $arrConversations = $conversations->map(function(ConversationModel $conversation) {
            return $this->convertConversation($conversation);
            });

        return $arrConversations->toArray();
    }
}
