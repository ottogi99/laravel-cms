<div class="p-6">
    <div class="flex items-center justify-end py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal" class="ml-4">
            {{ __('추가') }}
        </x-jet-button>
    </div>

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">이름</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">지역</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">주소</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">연락처</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">대표자</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ( $data as $item )
                                    <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->name }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ app\Models\User::userRegionList()[$item->region] }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->address }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->contact }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->representative }}</td>
                                        <td class="px-6 py-2 flex justify-end">
                                            <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                                {{ __('Update')}}
                                            </x-jet-button>
                                            <x-jet-danger-button class="ml-2" wire:click="deleteShowModal({{ $item->id }})">
                                                {{ __('Delete')}}
                                            </x-jet-button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="6">No Results Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    {{ $data->links() }}


    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('농협 추가') }}
        </x-slot>
        <x-slot name="content">
            <div>
                <x-jet-label for="name" value="{{ __('이름') }}" />
                <x-jet-input wire:model="name" type="text" id="name" class="block mt-1 w-full" />
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="region" value="{{ __('지역') }}" />
                <select wire:model="region" class="block appearance-none w-full bg-gray-100-border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500b">
                    <option value="">-- 담당지역을 선택하세요 --</option>
                    @foreach (App\Models\User::userRegionList() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('region') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('주소') }}" />
                <x-jet-input wire:model="address" type="text" id="address" class="block mt-1 w-full" />
                @error('address') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="contact" value="{{ __('연락처') }}" />
                <x-jet-input wire:model="contact" type="text" id="contact" class="block mt-1 w-full" />
                @error('contact') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="representative" value="{{ __('대표자') }}" />
                <x-jet-input wire:model="representative" type="text" id="representative" class="block mt-1 w-full" />
                @error('representative') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('취소') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-3" wire:click="update" wire:loading.attr="disabled">
                    {{ __('수정') }}
                </x-jet-danger-button>
            @else
                <x-jet-button class="ml-3" wire:click="create" wire:loading.attr="disabled">
                    {{ __('생성') }}
                </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    {{-- The Delete Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('농협 삭제') }}
        </x-slot>

        <x-slot name="content">
            {{ __('정말로 해당 농협을 삭제하시겠습니까?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('취소') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('삭제합니다') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
