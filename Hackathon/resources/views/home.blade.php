@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                @foreach($conversations as $conversation)
                    @include('conversation-partial', ['conversation' => $conversation])
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
