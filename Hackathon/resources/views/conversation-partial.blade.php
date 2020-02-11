<li class="{{($show ? "show" : "hide")}} toggle list"> @livewire('sentence', $conversation)<br>
    @if ($conversation->conversations)
        <ul>
            @foreach ($conversation->conversations as $conversation)
                @include('conversation-partial', ['conversation' => $conversation, 'show' => false])
            @endforeach
                @livewire('new-sentence', $conversation)
        </ul>
    @endif
</li>
