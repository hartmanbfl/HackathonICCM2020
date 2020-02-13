@extends('layouts.app')

@section('content')

            <ul id="Threads">
                @foreach($conversations as $conversation)
                    @include('conversation-partial', ['conversation' => $conversation, 'show' => false])
                @endforeach

                @livewire('new-sentence', null)
            </ul>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let liItems = document.querySelectorAll("#Threads li");
                liItems.forEach(function(liItem) {
                    liItem.addEventListener('click', function(evt) {
                        if(evt.target.classList.contains("general-icon") || evt.target.tagName.toLowerCase() == "a"
                            || evt.target.tagName.toLowerCase() == "input" || evt.target.tagName.toLowerCase() == "button")
                            return;

                        evt.stopPropagation();

                        this.querySelector(":scope > ul").classList.toggle("hide");
                        this.querySelector(":scope > ul").parentNode
                            .querySelectorAll(":scope > div > i.fa-chevron-right, :scope > div > i.fa-chevron-down.children")
                            .forEach(function(chevron) {
                                chevron.classList.toggle('hide');
                            });
                        });
                    });
                });
        </script>
        <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            // instantiate a pusher object 
            var pusher = new Pusher('fafb12fecf9ffef19470', {
              cluster: 'eu',
              forceTLS: true
            });

            // subscribe to the channel we specified in the event
            console.log('JS:  Subscribing to GospelConversations');
            var channel = pusher.subscribe('GospelConversations');

            // bind a function to the event
            channel.bind('App\\Events\\ThreadAdded', threadAddedHandler);

            function threadAddedHandler(data) {
                console.log(`DATA: ${data}`)
//                alert('In window refresh!');
              location.reload();
            }
        </script>

@endsection
