<li class="list"> <a data-toggle="collapse" data-target="temp"> @livewire('one-line', $conversation)</a>
  @foreach($conversation->conversations as $conversation)
    <ul id="temp" class="collapse">
      @livewire('one-line', ['conversation' => $conversation])
    </ul>
  @endforeach

</li>