@extends('layouts.app')

@section('content')

            <ul id="Threads">
                @foreach($conversations as $conversation)
                    @include('conversation-partial', ['conversation' => $conversation, 'show' => true])
                @endforeach
            </ul>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let liItems = document.querySelectorAll("#Threads li");
                liItems.forEach(function(liItem) {
                    liItem.addEventListener('click', function(evt) {

                        this.querySelectorAll(":scope > ul > li.toggle").forEach(function(childLiItem) {
                            console.log(childLiItem.classList);
                           childLiItem.classList.toggle('hide');
                        });
                    });
                });
            });
        </script>

@endsection
