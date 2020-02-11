    @if(!$deleted)
        @if(!$deleteConfirm)
            @if($editMode)
                <input type="text" wire:model="sentence" wire:keydown.enter="save"> <button wire:click="save">Save</button>
            @else
            {{-- Any clue how to toggle the symbol? --}}
            {{-- <i class="{{($toggle ? "fa-chevron-right" : "fa-chevron-down")}} fas icn"></i> {{$sentence}} <a href="#" wire:click="edit">Edit</a> <a href="#" wire:click="delete">Remove</a> --}}
            <i class="fa-chevron-right fas icn"></i> {{$sentence}} &nbsp;<i class="fa-pen-square fas general-icon" wire:click="edit"></i>  &nbsp;<i class="fa-times-circle fas general-icon caution" wire:click="edit" wire:click="delete"></i>
            @if(!$hasChildren)

                @endif
            @endif
        @else
            {{$sentence}}

            <button wire:click="deleteConfirmation(true)">Yes, delete</button> <button wire:click="deleteConfirmation(false)">No, keep this sentence</button>
        @endif
    @endif
