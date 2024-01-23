<header class="items-center bg-white header">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div
            class="max-w-screen-xl lg:flex md:flex sm:hidden xs:hidden hidden flex-wrap items-center justify-between mx-auto p-4 border-b-2 py-4 border-gray-300">
            <a href="{{ route('tjc.home') }}" class="self-center font-normal hover:text-red-700">
                <img class="inline" src="{{ asset('assets/images/icons/icon_address.png') }}"
                     alt="{{ __('header.store') }}">
                <span>{{ __('header.store') }}</span>
            </a>
            <a href="{{ route('tjc.home') }}" class="self-center font-normal hover:text-red-500 text-gray-700">
                <img class="inline" src="{{ asset('assets/images/icons/icon_phone.png') }}"
                     alt="{{ __('header.hotline') }}">
                <span>0923 238 999</span>
            </a>
            <a href="{{ route('tjc.home') }}" class="text-red-500 font-normal hover:text-gray-700 text-center">
                <span class="text-center">{{__('header.slogan1')}}</span>
                <br>
                <span class="">{{__('header.slogan2')}}</span>
            </a>
            <a href="{{ route('tjc.home') }}" class="self-center font-normal hover:text-red-500">
                <img class="inline" src="{{ asset('assets/images/icons/icon_user.png') }}"
                     alt="{{ __('header.account') }}">
                <span>{{ __('header.account') }}</span>
            </a>
            <div class="flex ">
                <a href="{{ route('tjc.language', 'vi') }}"
                   class="cursor-pointer self-center font-normal hover:text-red-500">
                    <span>VN</span>
                </a>
                <a class="self-center font-normal">
                    <span>/</span>
                </a>
                <a href="{{ route('tjc.language', 'en') }}"
                   class="cursor-pointer self-center font-normal hover:text-red-500">
                    <span>EG</span>
                </a>
            </div>
        </div>
        <div class="md:block sm:block xs:block lg:hidden">
            <h2 class="bg-[#cc0000] text-white text-center py-3">
                <span>{{ __('header.slogan1') }}</span>
                <span>{{ __('header.slogan2') }}</span>
            </h2>
        </div>
        <div class="max-w-screen-xl flex flex-wrap items-center md:justify-around lg:justify-between justify-between  mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Flowbite Logo"/>
            </a>
            <div class="flex md:order-2 items-center ">
                <div class="relative hidden md:block">
                    <input type="text" id="search-navbar"
                           class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 "
                           placeholder="{{ __('header.search') }}...">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                </div>
                <div class="relative m-3">
                    <img class="inline" src="{{ asset('assets/images/icons/icon_cart.png') }}"
                         alt="{{ __('header.account') }}">
                    <span
                        class="absolute font-medium text-sm text-white bottom-[-5px] right-0 p-1 w-[15px] h-[15px] rounded-full flex items-center justify-center bg-[#DB1024]">
                        3
                    </span>
                </div>
                <button data-collapse-toggle="navbar-search" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100"
                        aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <label for="search-navbar"></label>
                    <input type="text" id="search-navbar"
                           class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 "
                           placeholder="{{ __('header.search') }}...">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                </div>
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ __('header.jewelry') }}
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ __('header.promotion') }}
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ __('header.support') }}
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ __('header.about') }}
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            {{ __('header.blog') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tjc.home') }}"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 md:hidden sm:block xs:block lg:hidden">
                            {{ __('header.account') }}
                        </a>
                    </li>
                    <li>
                        <div class="flex block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 md:hidden sm:block xs:block lg:hidden">
                            <a href="{{ route('tjc.language', 'vi') }}"
                               class="block text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 md:hidden sm:block xs:block lg:hidden">
                                <span>VN</span>
                            </a>
                            <a class="self-center font-normal">
                                <span>/</span>
                            </a>
                            <a href="{{ route('tjc.language', 'en') }}"
                               class="block text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 md:hidden sm:block xs:block lg:hidden">
                                <span>EG</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
