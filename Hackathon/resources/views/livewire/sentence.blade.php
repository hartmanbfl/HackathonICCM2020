<div>
  @if(!$deleted)
    @if(!$deleteConfirm)
      @if($editMode)
        <input class="tEntry" type="text" wire:model="sentence" wire:keydown.enter="save"> &nbsp;
        <a class="fa-save fas gIcon" wire:click="save"></a> &nbsp;
        <a class="fa-window-close fas gIcon caution" wire:click="cancel"></a>
      @else
        @if(!$hasChildren)
          <i class="fa-chevron-down fas icn"></i>
        @else
          <i class="fa-chevron-right fas icn"></i><i class="fa-chevron-down children fas icn hide"></i>
        @endif
        {{ $sentence }} &nbsp;<a class="fa-pen-square fas gIcon" wire:click="edit"></a> &nbsp;<i class="fa-trash-alt fas gIcon caution" wire:click="delete"></i>
      @endif
    @else

      @if(!$hasChildren)
        <i class="fa-chevron-down fas icn"></i>
      @else
        <i class="fa-chevron-right fas icn"></i><i class="fa-chevron-down children fas icn hide"></i>
      @endif

      {{ $sentence }} &nbsp;<a class="fa-pencil-alt fas gIcon" wire:click="edit"></a> &nbsp;
      <i class="fa-plus fas gIcon" wire:click="delete"></i> &nbsp;
      <i class="fa-trash-alt fas gIcon caution" wire:click="delete"></i>
    @endif
  @else
    {{ $sentence }}

    <button wire:click="deleteConfirmation(true)">Yes, delete</button> <button wire:click="deleteConfirmation(false)">No, keep this sentence</button>
  @endif
</div>