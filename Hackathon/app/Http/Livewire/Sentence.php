<?php

namespace App\Http\Livewire;

use App\Conversation;
use Livewire\Component;

class Sentence extends Component
{
    public $conversation_id;
    public $sentence;

    public $editMode;
    public $deleteConfirm;
    public $deleted;

    public function mount($conversation)
    {
        $this->conversation_id = $conversation->id;
        $this->sentence = $conversation->sentence;

        $this->editMode = false;
        $this->deleteConfirm = false;
        $this->deleted = false;
    }

    public function render()
    {
        return view('livewire.sentence');
    }

    public function edit()
    {
        $this->editMode = !$this->editMode;
    }

    public function save()
    {
        $conversation = Conversation::find($this->conversation_id);
        $conversation->sentence = $this->sentence;
        $conversation->save();

        $this->editMode = false;
    }

    public function delete()
    {
        $this->deleteConfirm = true;
    }

    public function deleteConfirmation($confirm)
    {
        if($confirm)
        {
            $conversation = Conversation::find($this->conversation_id);
            $conversation->delete();

            $this->deleted = true;
        }
        else
        {
            $this->deleteConfirm = false;
        }
    }
}
