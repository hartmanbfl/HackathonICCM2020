<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;
use App\Conversation;
use App\Services\KategorieDAO;

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
//        echo "Here?";
//        Conversation::all());
//        $conversations = Conversation::whereParentId(null)->orderBy(['conversation_id','id']);
        $conversations = Conversation::orderBy('conversation_id')->orderBy('id')->get();
//        dd($conversations);

        $kategorieDAO = new KategorieDAO($conversations);
    
        return view('home', ['kategorieDAO' => $kategorieDAO]);
    }
}
