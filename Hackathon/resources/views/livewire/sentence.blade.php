<div>
    @if(!$deleted)
        @if(!$deleteConfirm)
            @if($editMode)
                <input type="text" wire:model="sentence" wire:keydown.enter="save"> 
                <button wire:click="save">Save</button>
                <button wire:click="cancel">Cancel</button>
            @else
            {{-- Any clue how to toggle the symbol? --}}
            {{-- <i class="{{($toggle ? "fa-chevron-right" : "n")}} fas icn"></i> {{$sentence}} <a href="#" wire:click="edit">Edit</a> <a href="#" wire:click="delete">Remove</a> --}}
                @if(!$hasChildren)
                    <i class="fa-chevron-down fas icn"></i>
                @else
                    <i class="fa-chevron-right fas icn"></i><i class="fa-chevron-down children fas icn hide"></i>
                @endif

                {{$sentence}} &nbsp;<a class="fa-pen-square fas general-icon" wire:click="edit"></a>  &nbsp;<i class="fa-times-circle fas general-icon caution" wire:click="delete"></i>
            @endif
        @else
            {{$sentence}}

            <button wire:click="deleteConfirmation(true)">Yes, delete</button> <button wire:click="deleteConfirmation(false)">No, keep this sentence</button>
        @endif
    @endif
</div>
