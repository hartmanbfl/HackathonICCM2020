@extends('layouts.app')

@section('content')

<ul id="Threads">
  @foreach($conversations as $conversation)
    @livewire('one-line', ['conversation' => $conversation])
    @endforeach
</ul>

@endsection