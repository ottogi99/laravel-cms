<x-ots-layout>
    <x-slot name="header">
        <div>
            <h2 class="flex font-semibold text-xl text-gray-800 leading-tight">
                {{ __('사용자 관리') }}
            </h2>
        </div>
    </x-slot>

    @livewire('ots.users')
</x-ots-layout>
