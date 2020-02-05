<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Http\Resources\Conversation as ConversationResource;
use Illuminate\Http\Request;

class ConversationApiController extends Controller
{
    public function random(Request $request)
    {
        $conversations = Conversation::whereConversationId(0)->get();

        return new ConversationResource($conversations->random());
    }
}
