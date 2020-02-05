<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $conversations = Conversation::whereConversationId(null)->with('conversationTree')->get();

        foreach($conversations as $conversation)
        {
            dump($conversation);
        }


        return view('home');
    }
}
