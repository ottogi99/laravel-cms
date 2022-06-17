<div class="p-6">
    {{-- <div class="flex items-center justify-end py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal" class="ml-4">
            {{ __('Create') }}
        </x-jet-button>
    </div> --}}

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">이름</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">이메일</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">역할</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">지역</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">담당농협</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ( $data as $item )
                                    <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->name }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->email }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ App\Models\User::userRoleList()[$item->role] }}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            @isset($item->region)
                                                {{ App\Models\User::userRegionList()[$item->region] }}
                                            @endisset
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            @isset($item->nonghyup)
                                                {{ $item->nonghyup->name }}
                                            @endisset
                                        </td>
                                        <td class="px-6 py-5 flex justify-end">
                                            <span>
                                                <a
                                                    wire:click="updateShowModal({{ $item->id }})
                                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                                    role="button"
                                                >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                </a>
                                            </span>
                                            <span class="ml-3">
                                                <a
                                                    wire:click="deleteShowModal({{ $item->id }})
                                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                                    role="button"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                                                </a>
                                            </span>

                                            {{-- <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                                {{ __('Update')}}
                                            </x-jet-button>
                                            <x-jet-danger-button class="ml-2" wire:click="deleteShowModal({{ $item->id }})">
                                                {{ __('Delete')}}
                                            </x-jet-button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
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
            {{ __('사용자 등록') }}
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label for="name" value="{{ __('이름') }}" />
                <x-jet-input wire:model="name" type="text" id="name" class="block mt-1 w-full" />
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('이메일') }}" />
                <x-jet-input wire:model="email" type="text" id="email" class="block mt-1 w-full" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('권한') }}" />
                <select wire:model="role" class="block appearance-none w-full bg-gray-100-border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500b">
                    <option value="">-- 권한을 선택하세요 --</option>
                    @foreach (App\Models\User::userRoleList() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('role') <span class="error">{{ $message }}</span> @enderror
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
                <x-jet-label for="nonghyup" value="{{ __('담당농협') }}" />
                <select wire:model="nonghyup" class="block appearance-none w-full bg-gray-100-border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500b">
                    <option value="">-- 담당농협을 선택하세요 --</option>
                    @isset($nonghyupList)
                        @foreach ($nonghyupList as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    @endisset
                </select>
                @error('nonghyup') <span class="error">{{ $message }}</span> @enderror
                {{ $nonghyup }}
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-3" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
            @else
                <x-jet-button class="ml-3" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    {{-- The Delete Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('사용자 삭제') }}
        </x-slot>

        <x-slot name="content">
            {{ __('정말로 삭제하시겠습니까?') }}
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
