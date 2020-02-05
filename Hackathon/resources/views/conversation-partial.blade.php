<li>@livewire('sentence', $conversation)<br>
@if ($conversation->conversations)
    <ul>
        @foreach ($conversation->conversations as $conversation)
            @include('conversation-partial', ['conversation' => $conversation])
        @endforeach
        <li>
            @livewire('new-sentence', $conversation)
        </li>
    </ul>
@endif
</li>
