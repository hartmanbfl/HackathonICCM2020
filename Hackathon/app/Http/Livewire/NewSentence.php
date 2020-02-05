<?php

namespace App\Http\Livewire;

use App\Conversation;
use Livewire\Component;

class NewSentence extends Component
{
    public $parent_conversation_id;

    public $sentence;

    public $added;

    public $button;

    public function mount($conservation)
    {
        $this->parent_conversation_id = $conservation->id;

        $this->added = false;
        $this->button = true;
    }

    public function render()
    {
        return view('livewire.new-sentence');
    }

    public function add()
    {
        $conversation = new Conversation();
        $conversation->sentence = $this->sentence;
        $conversation->conversation_id = $this->parent_conversation_id;
        $conversation->save();

        $this->added = true;
    }

    public function showInput()
    {
        $this->button = false;
    }
}
