<?php

namespace App\Http\Livewire;

use App\Conversation;
use Livewire\Component;

class Sentence extends Component
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
    $this->conversation_id = $conversation->id;
    $this->sentence = $conversation->sentence;

    $this->hasChildren = $conversation->conversations->count() > 0;

    $this->editMode = false;
    $this->deleteConfirm = false;
    $this->deleted = false;
    $this->newChild = false;
  }

  public function render()
  {
    return view('livewire.sentence');
  }

  public function edit()
  {
    $this->editMode = !$this->editMode;
  }

  public function cancel()
  {
    // do nothing
    $this->editMode = false;
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

  // code borrowed from NewSentence.php
  public function add()
  {
    $conversation = new Conversation();
    $conversation->newSentence = $this->newSentence;
    $conversation->conversation_id = $this->parent_conversation_id;
    $conversation->save();

    $this->newChild = false;
  }

  public function addChild()
  {
    $this->newChild = true;
  }

  public function cancelAdd()
  {
    $this->added = false;
    $this->button = true;
  }
}