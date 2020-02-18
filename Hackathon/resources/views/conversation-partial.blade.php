<li class="list"> @livewire('sentence', $conversation)<br>
  @if($conversation->conversations)
    <ul class="{{ ($show ? "show" : "hide") }} toggle">
      @foreach($conversation->conversations as $conversation)
        @include('conversation-partial', ['conversation' => $conversation, 'show' => false])
      @endforeach
      @livewire('new-sentence', $conversation)
    </ul>
  @endif
</li>