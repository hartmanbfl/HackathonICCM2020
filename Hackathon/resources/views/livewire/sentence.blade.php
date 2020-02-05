<div>
    @if(!$deleted)
        @if(!$deleteConfirm)
            @if($editMode)
                <input type="text" wire:model="sentence" wire:keydown.enter="save"> <button wire:click="save">Save</button>
            @else
                {{$sentence}} <a href="#" wire:click="edit">Edit</a>
                @if(!$hasChildren)
                    <a href="#" wire:click="delete">Remove</a>
                @endif
            @endif
        @else
            {{$sentence}}

            <button wire:click="deleteConfirmation(true)">Yes, delete</button> <button wire:click="deleteConfirmation(false)">No, keep this sentence</button>
        @endif
    @endif
</div>
