<?php

namespace App\Http\Livewire;

use App\Conversation;
use Livewire\Component;

class Outline extends Component
{
  public $conversation_id;
  public $sentence;
  public $newSentence;

  public $hasChildren;

  public $editMode;
  public $deleteConfirm;
  public $deleted;
  public $added;
  public $newChild;


  public function mount($conversation)
  {
  //   $this->conversation_id = $conversation->id;
    $this->sentence = $conversation->sentence;

  //   $this->hasChildren = $conversation->conversations->count() > 0;

  //   $this->editMode = false;
  //   $this->deleteConfirm = false;
  //   $this->deleted = false;
  //   $this->newChild = false;
  }

    public function render()
    {
        return view('livewire.outline');
    }
}