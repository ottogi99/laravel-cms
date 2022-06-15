<!-- Sidebar -->
<div class="flex flex-col h-full">
    <!-- Sidebar links -->
    <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
    <!-- Dashboards links -->
    <div x-data="{ isActive: false, open: false}">
        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
        <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
        >
            <span aria-hidden="true">
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                </svg>
            </span>
            <span class="ml-2 text-sm"> Dashboards </span>
            <span class="ml-auto" aria-hidden="true">
                <!-- active class 'rotate-180' -->
                <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
                href="index.html"
                role="menuitem"
                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
            >
                Default
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                Project Mangement (soon)
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                E-Commerce (soon)
            </a>
        </div>
    </div>

    <!-- 관리자 -->
    <div x-data="{ isActive: true, open: true}">
        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
        <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
        >
            <span aria-hidden="true">
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                </svg>
            </span>
            <span class="ml-2 text-sm"> 관리자 </span>
            <span class="ml-auto" aria-hidden="true">
                <!-- active class 'rotate-180' -->
                <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Administrator">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
                href="{{ route('ots-users') }}"
                role="menuitem"
                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
            >
                사용자관리
            </a>
            <a
                href="{{ route('ots-nonghyups') }}"
                role="menuitem"
                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
            >
                농협관리
            </a>
            <a
                href="{{ route('ots-nonghyup-users') }}"
                role="menuitem"
                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
            >
                농협별 사용자관리
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                사업관리
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                이력조회
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                메뉴관리
            </a>
            <a
                href="{{ route('ots-user-permissions') }}"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                권한관리
            </a>
        </div>
    </div>

    <!-- 농가 관리 -->
    <div x-data="{ isActive: false, open: false}">
        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
        <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
        >
            <span aria-hidden="true">
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                </svg>
            </span>
            <span class="ml-2 text-sm"> 농가관리 </span>
            <span class="ml-auto" aria-hidden="true">
                <!-- active class 'rotate-180' -->
                <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Administrator">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
                href="index.html"
                role="menuitem"
                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
            >
                소규모영세소농
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                대규모전업농가
            </a>
        </div>
    </div>

    <!-- 지원반 관리 -->
    <div x-data="{ isActive: false, open: false}">
        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
        <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
        >
            <span aria-hidden="true">
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                </svg>
            </span>
            <span class="ml-2 text-sm"> 지원반관리 </span>
            <span class="ml-auto" aria-hidden="true">
                <!-- active class 'rotate-180' -->
                <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Administrator">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
                href="index.html"
                role="menuitem"
                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
            >
                농기계지원반
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                인력지원반
            </a>
        </div>
    </div>

    <!-- 지원 현황 -->
    <div x-data="{ isActive: false, open: false}">
        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
        <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
        >
            <span aria-hidden="true">
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                </svg>
            </span>
            <span class="ml-2 text-sm"> 지원현황 </span>
            <span class="ml-auto" aria-hidden="true">
                <!-- active class 'rotate-180' -->
                <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Administrator">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
                href="index.html"
                role="menuitem"
                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
            >
                농기계지원반
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                인력지원반
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                교육홍보비
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                인건비
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                운영비
            </a>
        </div>
    </div>

    <!-- 사업 현황 -->
    <div x-data="{ isActive: false, open: false}">
        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
        <a
            href="#"
            @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
            role="button"
            aria-haspopup="true"
            :aria-expanded="(open || isActive) ? 'true' : 'false'"
        >
            <span aria-hidden="true">
                <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                </svg>
            </span>
            <span class="ml-2 text-sm"> 사업현황 </span>
            <span class="ml-auto" aria-hidden="true">
                <!-- active class 'rotate-180' -->
                <svg
                class="w-4 h-4 transition-transform transform"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Administrator">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a
                href="index.html"
                role="menuitem"
                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700"
            >
                운영실적
            </a>
            <a
                href="#"
                role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
            >
                집행실적
            </a>
        </div>
    </div>
</div>
