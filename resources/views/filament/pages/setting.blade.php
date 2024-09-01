<x-filament::page>
    <form wire:submit.prevent="saveProfile">
        {{ $this->form }}

        <x-filament::button type="submit" form="saveProfile">
            Save
        </x-filament::button>
    </form>
</x-filament::page>
