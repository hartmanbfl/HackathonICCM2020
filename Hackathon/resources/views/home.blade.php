@extends('layouts.app')

@section('content')

<ul id="Threads">
  @foreach($conversations as $conversation)
    @include('conversation-partial', ['conversation' => $conversation, 'show' => false])
  @endforeach

  {{-- Commented out because we need a new way to create a new conversation. --}}
  {{-- @livewire('new-sentence', null) --}}
</ul>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    let liItems = document.querySelectorAll("#Threads li");
    liItems.forEach(function(liItem) {
      liItem.addEventListener('click', function(evt) {
        if (evt.target.classList.contains("general-icon") || evt.target.tagName
          .toLowerCase() == "a" ||
          evt.target.tagName.toLowerCase() == "input" || evt.target.tagName
          .toLowerCase() == "button")
          return;

        evt.stopPropagation();

        this.querySelector(":scope > ul").classList.toggle("hide");
        this.querySelector(":scope > ul").parentNode
          .querySelectorAll(
            ":scope > div > i.fa-chevron-right, :scope > div > i.fa-chevron-down.children"
          )
          .forEach(function(chevron) {
            chevron.classList.toggle('hide');
          });
      });
    });
  });
</script>

@endsection