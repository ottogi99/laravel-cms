<div class="divide-y divide-gray-800">
    <nav class="items-center bg-gray-900 px-3 py-2 flex shadow-lg">
        <div>
            <button class="block h-8 mr-3 text-gray-400 items-center
                hover:text-gray-200 focus:text-gray-200 focus:outline-none
                sm:hidden">
                <svg class="w-8 fill-current" viewBox="0 0 24 24">
                    <path x-show="!show" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                </svg>
            </button>
        </div>
        <div class="h-12 w-full flex items-center">
            <x-jet-application-logo class="block h-9 w-auto" />
        </div>
        <div class="flex justify-end sm:w-8/12">
            {{-- Top Navigation --}}
            <ul class="hidden sm:block sm:text-left text-gray-200 text-xs">
                <a href="{{ url('/login') }}"><li class="cursor-pointer px-4 py-2 hover:underline">Login</li></a>
            </ul>
        </div>
    </nav>
    <div class="sm:flex sm:min-h-screen">
        <aside class="bg-gray-900 text-gray-700 divide-y divide-gray-600 divide-dashed sm:w-4/12 md:w-3/12 lg:2/12">
            {{-- Desktop Web View --}}
            <ul class="hidden text-gray-200 text-xs sm:block sm:text-left">
                <a href="{{ url('/home') }}">
                    <li class="cursor-pointer px-4 py-2
                    hover:bg-gray-800">Home</li>
                </a>
                <a href="{{ url('/about') }}">
                    <li class="cursor-pointer px-4 py-2
                    hover:bg-gray-800">About</li>
                </a>
                <a href="{{ url('/contact') }}">
                    <li class="cursor-pointer px-4 py-2
                    hover:bg-gray-800">Contact</li>
                </a>
            </ul>

            {{-- Moible Web View --}}
            <div class="pb-3 divide-y divide-gray-800 block sm:hidden">
                <ul class="text-gray-200 text-xs">
                    <a href="{{ url('/home') }}">
                        <li class="cursor-pointer px-4 py-2
                        hover:bg-gray-800">Home</li>
                    </a>
                    <a href="{{ url('/about') }}">
                        <li class="cursor-pointer px-4 py-2
                        hover:bg-gray-800">About</li>
                    </a>
                    <a href="{{ url('/contact') }}">
                        <li class="cursor-pointer px-4 py-2
                        hover:bg-gray-800">Contact</li>
                    </a>
                </ul>

                {{-- Top Navigation Mobile Web View --}}
                <ul class="text-gray-200 text-xs">
                    <a href="{{ url('/login') }}">
                        <li class="cursor-pointer px-4 py-2
                        hover:bg-gray-800">Login</li>
                    </a>
                </ul>
            </div>
        </aside>
        <main class="bg-gray-100 p-12 min-h-screen sm:w-8/12 md:w-9/12 lg:w-10/12">
            <section class="divide-y text-gray">
                <h1 class="text-3xl font-bold">{{ $title }}</h1>
                <article class="mt-5 text-sm">
                    {!! $content !!}
                </article>
            </section>
        </main>
    </div>
</div>
