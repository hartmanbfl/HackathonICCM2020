@extends('layouts.app')

@section('content')

            <ul id="Threads">
                @foreach($conversations as $conversation)
                    @include('conversation-partial', ['conversation' => $conversation])
                @endforeach
            </ul>

@endsection
