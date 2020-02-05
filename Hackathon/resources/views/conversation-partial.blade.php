<li>{{ $conversation->sentence }} {E} {-} {+}<br>
@if ($conversation->conversations)
    <ul>
        @foreach ($conversation->conversations as $conversation)
            @include('conversation-partial', ['conversation' => $conversation])
        @endforeach
        <li>
            + New level
        </li>
    </ul>
@endif
</li>
