<div>
    @if(!$added)
        @if($button)
            <button wire:click="showInput">Add sentence</button>
        @else
            <input type="text" wire:model="sentence" wire:keydown.enter="add"> <button wire:click="add">Add</button>
        @endif
    @else
        {{$sentence}}
    @endif
</div>
