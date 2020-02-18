<li>
  @if(!$added)
    @if($button)
    @else
      <input class="tEntry" type="text" wire:model="sentence" wire:keydown.enter="add">
      <i class="fa-save fas gIcon" wire:click="add"></i> &nbsp;
      <i class="fa-window-close fas gIcon caution" wire:click="cancel"></i>
    @endif
  @else
    {{ $sentence }}
  @endif
</li>