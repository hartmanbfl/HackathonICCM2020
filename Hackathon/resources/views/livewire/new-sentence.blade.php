    @if(!$added)
        @if($button)
        <a href="#" wire:click="showInput">Add Thread</a>
        @else
            <input type="text" wire:model="sentence" wire:keydown.enter="add"> <button wire:click="add">Add</button>
        @endif
    @else
        {{$sentence}}
    @endif
