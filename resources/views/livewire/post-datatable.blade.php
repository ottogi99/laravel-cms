{{-- The data table --}}
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg px-10 py-10">

                <!-- Search input -->
                <div class="relative w-full max-w mr-6 focus-within:text-purple-500">
                    <div class="absolute inset-y-0 flex items-center pl-2">
                        <svg
                            class="w-4 h-4"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                        <path
                            fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"
                        ></path>
                        </svg>
                    </div>
                    <input
                        wire:model="searchTerm"
                        class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                        type="text"
                        placeholder="Search for projects"
                        aria-label="Search"
                    />
                </div>

                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            @foreach ( $headers as $key => $value )
                            <th
                                wire:click="sort('{{ $key }}')"
                                class="px-6 py-3 bg-gray-50 font-bold text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider hover:cursor-pointer"
                            >
                                @if ($sortColumn == $key)
                                    <span> {!! $sortDirection == 'asc' ? '&#8659;' : '&#8657;' !!} </span>
                                @endif
                                {{ is_array($value) ? $value['label'] : $value }}
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if (count($data))
                            @foreach ( $data as $item )
                                <tr>
                                    @foreach ($headers as $key => $value)
                                        <td class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            {{-- {!! is_array($value) ? $value['func']($ite m->$key) : $item->$key !!} --}}
                                            @isset($item->$key->name)
                                                {!! $item->nonghyup->name !!}
                                            @else
                                                {!! $item->$key !!}
                                            @endisset
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="{{ count($headers) }}"><h2>No results found!</h2></td></tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

{{ $data->links() }}
