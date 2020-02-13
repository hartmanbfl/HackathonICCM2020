<?php

namespace App\Http\Livewire;

use App\Conversation;
use Livewire\Component;
use App\Events\ThreadAdded;

class NewSentence extends Component
{
    public $parent_conversation_id;

    public $sentence;

    public $added;

    public $button;

    public function mount($conservation)
    {
        $this->parent_conversation_id = null;
        if (!is_null($conservation)) {
            $this->parent_conversation_id = $conservation->id;
        }

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

        // Fire off the ThreadAdded event
        error_log('Attempting to fire off the ThreadAdded event');
        event(new ThreadAdded('Thread has been added'));
    }

    public function showInput()
    {
        $this->button = false;
    }

    public function cancel()
    {
        $this->added = false;
        $this->button = true;
    }
}