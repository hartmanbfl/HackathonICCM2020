<div>
    @if(!$deleted)
    @if(!$deleteConfirm)
    @if($editMode)
    <input type="text" wire:model="sentence" wire:keydown.enter="save">
    <button wire:click="save">Save</button>
    <button wire:click="cancel">Cancel</button>
    @else

    @if(!$hasChildren)
    <i class="fa-chevron-down fas icn"></i>
    @else
    <i class="fa-chevron-right fas icn"></i><i class="fa-chevron-down children fas icn hide"></i>
    @endif

    {{$sentence}} &nbsp;<a class="fa-pen-square fas gIcon" wire:click="edit"></a> &nbsp;<i
        class="fa-trash-alt fas gIcon caution" wire:click="delete"></i>
    @endif
    @else
    {{$sentence}}

    <button wire:click="deleteConfirmation(true)">Yes, delete</button> <button
        wire:click="deleteConfirmation(false)">No, keep this sentence</button>
    @endif
    @endif
</div>
