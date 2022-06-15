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
                    <header class="relative bg-white dark:bg-darker">
                        @livewire('ots-navbar')
                    </header>

                    {{-- <!-- Page Heading -->
                    @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif --}}

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
