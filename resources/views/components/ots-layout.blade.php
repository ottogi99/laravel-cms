<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @trixassets
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        {{-- <x-jet-banner /> --}}

        <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark }">
            <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
                <!-- Loading screen -->
                <div
                    x-ref="loading"
                    class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
                >
                    Loading.....
                </div>

                <aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
                    @livewire('ots-sidebar')
                </aside>

                <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
                    {{-- @livewire('ots-navbar') --}}
                    @livewire('ots.ots-navigation-menu')

                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="flex bg-white shadow">
                            <div class="flex-1 max-w-7xl mx-initial py-7 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>

                            <!-- Search input -->
                            <div class="justify-center flex-1 py-6 lg:mr-32">
                                <div
                                    class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
                                >
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
                                        class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                                        type="text"
                                        placeholder="Search for projects"
                                        aria-label="Search"
                                    />
                                </div>
                            </div>
                            <div class="flex-1 flex py-7 justify-end">
                                    <button class="mr-10">Button1</button>
                            </div>
                        </header>
                    @endif

                    <!-- Main content -->
                    <main>
                        {{ $slot }}
                    </main>

                    <!-- Main footer -->
                    <footer
                        class="flex items-center justify-between p-4 bg-white border-t dark:bg-darker dark:border-primary-darker"
                    >
                        @livewire('ots-footer')
                    </footer>
                </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
