<li>{{ $conversation->sentence }}<br>
@if ($conversation->conversations)
    <ul>
        @foreach ($conversation->conversations as $conversation)
            @include('conversation-partial', ['conversation' => $conversation])
        @endforeach
    </ul>
@endif
</li>
