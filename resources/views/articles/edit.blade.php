<x-app-layout>

    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none sm:flex items-center my-12 mx-auto px-4 md:px-12">
        <nav class="flex justify-between px-5 py-3 text-gray-700 dark:text-gray-200 rounded-lg bg-[#eaeaebf3] dark:bg-[#1E293B]"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center space-x-2 text-sm font-medium text-gray-700 dark:text-gray-200  hover:text-gray-900  dark:hover:text-white">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                        </svg>
                        <span class="space-x-2">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
                <li class="inline-flex items-center text-sm font-bold  text-gray-700 dark:text-gray-200 hover:text-gray-900  dark:hover:text-white"
                    aria-current="page">
                    Liste des utilisateurs
                </li>
            </ol>
        </nav>

    </div>
    <!--end breadcrumb-->


    <div class="container my-12 mx-auto px-4 md:px-12">
        <h1 class="text-2xl font-bold mb-6">Créer un nouvel article</h1>
        <!-- Formulaire -->
        <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Titre -->
            <div class="mb-4">
                <label for="titre" class="block text-sm font-medium text-gray-700">Titre de l'article</label>
                <input type="text" id="titre" name="titre"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="{{ old('titre', $article->titre) }}" required>
                @error('titre')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contenu -->
            <div class="mb-4">
                <label for="contenu" class="block text-sm font-medium text-gray-700">Contenu de l'article</label>
                <div class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-3 py-2 border-b dark:border-gray-600">
                        <div class="flex flex-wrap items-center">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse flex-wrap">
                                <button id="toggleBoldButton" data-tooltip-target="tooltip-bold" type="button"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 5h4.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0-7H6m2 7h6.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0 0H6" />
                                    </svg>
                                    <span class="sr-only">Bold</span>
                                </button>
                                <div id="tooltip-bold" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Toggle bold
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="toggleItalicButton" data-tooltip-target="tooltip-italic" type="button"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8.874 19 6.143-14M6 19h6.33m-.66-14H18" />
                                    </svg>
                                    <span class="sr-only">Italic</span>
                                </button>
                                <div id="tooltip-italic" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Toggle italic
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="toggleUnderlineButton" data-tooltip-target="tooltip-underline"
                                    type="button"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M6 19h12M8 5v9a4 4 0 0 0 8 0V5M6 5h4m4 0h4" />
                                    </svg>
                                    <span class="sr-only">Underline</span>
                                </button>
                                <div id="tooltip-underline" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Toggle underline
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="toggleStrikeButton" data-tooltip-target="tooltip-strike" type="button"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 6.2V5h12v1.2M7 19h6m.2-14-1.677 6.523M9.6 19l1.029-4M5 5l6.523 6.523M19 19l-7.477-7.477" />
                                    </svg>
                                    <span class="sr-only">Strike</span>
                                </button>
                                <div id="tooltip-strike" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Toggle strike
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="toggleHighlightButton" data-tooltip-target="tooltip-highlight"
                                    type="button"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M9 19.2H5.5c-.3 0-.5-.2-.5-.5V16c0-.2.2-.4.5-.4h13c.3 0 .5.2.5.4v2.7c0 .3-.2.5-.5.5H18m-6-1 1.4 1.8h.2l1.4-1.7m-7-5.4L12 4c0-.1 0-.1 0 0l4 8.8m-6-2.7h4m-7 2.7h2.5m5 0H17" />
                                    </svg>
                                    <span class="sr-only">Highlight</span>
                                </button>
                                <div id="tooltip-highlight" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Toggle highlight
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="toggleCodeButton" type="button" data-tooltip-target="tooltip-code"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14" />
                                    </svg>
                                    <span class="sr-only">Code</span>
                                </button>
                                <div id="tooltip-code" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Format code
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="toggleLinkButton" data-tooltip-target="tooltip-link" type="button"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961" />
                                    </svg>
                                    <span class="sr-only">Link</span>
                                </button>
                                <div id="tooltip-link" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Add link
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="removeLinkButton" data-tooltip-target="tooltip-remove-link"
                                    type="button"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M13.2 9.8a3.4 3.4 0 0 0-4.8 0L5 13.2A3.4 3.4 0 0 0 9.8 18l.3-.3m-.3-4.5a3.4 3.4 0 0 0 4.8 0L18 9.8A3.4 3.4 0 0 0 13.2 5l-1 1m7.4 14-1.8-1.8m0 0L16 16.4m1.8 1.8 1.8-1.8m-1.8 1.8L16 20" />
                                    </svg>
                                    <span class="sr-only">Remove link</span>
                                </button>
                                <div id="tooltip-remove-link" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Remove link
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="toggleTextSizeButton" data-dropdown-toggle="textSizeDropdown"
                                    type="button" data-tooltip-target="tooltip-text-size"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 6.2V5h11v1.2M8 5v14m-3 0h6m2-6.8V11h8v1.2M17 11v8m-1.5 0h3" />
                                    </svg>
                                    <span class="sr-only">Text size</span>
                                </button>
                                <div id="tooltip-text-size" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Text size
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div id="textSizeDropdown"
                                    class="z-10 hidden w-72 rounded bg-white p-2 shadow dark:bg-gray-700">
                                    <ul class="space-y-1 text-sm font-medium" aria-labelledby="toggleTextSizeButton">
                                        <li>
                                            <button data-text-size="16px" type="button"
                                                class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">16px
                                                (Default)
                                            </button>
                                        </li>
                                        <li>
                                            <button data-text-size="12px" type="button"
                                                class="flex justify-between items-center w-full text-xs rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">12px
                                                (Tiny)
                                            </button>
                                        </li>
                                        <li>
                                            <button data-text-size="14px" type="button"
                                                class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">14px
                                                (Small)
                                            </button>
                                        </li>
                                        <li>
                                            <button data-text-size="18px" type="button"
                                                class="flex justify-between items-center w-full text-lg rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">18px
                                                (Lead)
                                            </button>
                                        </li>
                                        <li>
                                            <button data-text-size="24px" type="button"
                                                class="flex justify-between items-center w-full text-2xl rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">24px
                                                (Large)
                                            </button>
                                        </li>
                                        <li>
                                            <button data-text-size="36px" type="button"
                                                class="flex justify-between items-center w-full text-4xl rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">36px
                                                (Huge)
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <button id="toggleTextColorButton" data-dropdown-toggle="textColorDropdown"
                                    type="button" data-tooltip-target="tooltip-text-color"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="25" height="24" fill="none" viewBox="0 0 25 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="m6.532 15.982 1.573-4m-1.573 4h-1.1m1.1 0h1.65m-.077-4 2.725-6.93a.11.11 0 0 1 .204 0l2.725 6.93m-5.654 0H8.1m.006 0h5.654m0 0 .617 1.569m5.11 4.453c0 1.102-.854 1.996-1.908 1.996-1.053 0-1.907-.894-1.907-1.996 0-1.103 1.907-4.128 1.907-4.128s1.909 3.025 1.909 4.128Z" />
                                    </svg>
                                    <span class="sr-only">Text color</span>
                                </button>
                                <div id="tooltip-text-color" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Text color
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div id="textColorDropdown"
                                    class="z-10 hidden w-48 rounded bg-white p-2 shadow dark:bg-gray-700">
                                    <div
                                        class="grid grid-cols-6 gap-2 group mb-3 items-center p-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input type="color" id="color" value="#e66465"
                                            class="border-gray-200 border bg-gray-50 dark:bg-gray-700 dark:border-gray-600 rounded-md p-px px-1 hover:bg-gray-50 group-hover:bg-gray-50 dark:group-hover:bg-gray-700 w-full h-8 col-span-3" />
                                        <label for="color"
                                            class="text-gray-500 dark:text-gray-400 text-sm font-medium col-span-3 group-hover:text-gray-900 dark:group-hover:text-white">Pick
                                            a color</label>
                                    </div>
                                    <div class="grid grid-cols-6 gap-1 mb-3">
                                        <button type="button" data-hex-color="#1A56DB"
                                            style="background-color: #1A56DB" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Blue</span></button>
                                        <button type="button" data-hex-color="#0E9F6E"
                                            style="background-color: #0E9F6E" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Green</span></button>
                                        <button type="button" data-hex-color="#FACA15"
                                            style="background-color: #FACA15" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Yellow</span></button>
                                        <button type="button" data-hex-color="#F05252"
                                            style="background-color: #F05252" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Red</span></button>
                                        <button type="button" data-hex-color="#FF8A4C"
                                            style="background-color: #FF8A4C" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Orange</span></button>
                                        <button type="button" data-hex-color="#0694A2"
                                            style="background-color: #0694A2" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Teal</span></button>
                                        <button type="button" data-hex-color="#B4C6FC"
                                            style="background-color: #B4C6FC" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Light indigo</span></button>
                                        <button type="button" data-hex-color="#8DA2FB"
                                            style="background-color: #8DA2FB" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Indigo</span></button>
                                        <button type="button" data-hex-color="#5145CD"
                                            style="background-color: #5145CD" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Purple</span></button>
                                        <button type="button" data-hex-color="#771D1D"
                                            style="background-color: #771D1D" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Brown</span></button>
                                        <button type="button" data-hex-color="#FCD9BD"
                                            style="background-color: #FCD9BD" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Light orange</span></button>
                                        <button type="button" data-hex-color="#99154B"
                                            style="background-color: #99154B" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Bordo</span></button>
                                        <button type="button" data-hex-color="#7E3AF2"
                                            style="background-color: #7E3AF2" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Dark Purple</span></button>
                                        <button type="button" data-hex-color="#CABFFD"
                                            style="background-color: #CABFFD" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Light</span></button>
                                        <button type="button" data-hex-color="#D61F69"
                                            style="background-color: #D61F69" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Dark Pink</span></button>
                                        <button type="button" data-hex-color="#F8B4D9"
                                            style="background-color: #F8B4D9" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Pink</span></button>
                                        <button type="button" data-hex-color="#F6C196"
                                            style="background-color: #F6C196" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Cream</span></button>
                                        <button type="button" data-hex-color="#A4CAFE"
                                            style="background-color: #A4CAFE" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Light Blue</span></button>
                                        <button type="button" data-hex-color="#5145CD"
                                            style="background-color: #5145CD" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Dark Blue</span></button>
                                        <button type="button" data-hex-color="#B43403"
                                            style="background-color: #B43403" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Orange Brown</span></button>
                                        <button type="button" data-hex-color="#FCE96A"
                                            style="background-color: #FCE96A" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Light Yellow</span></button>
                                        <button type="button" data-hex-color="#1E429F"
                                            style="background-color: #1E429F" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Navy Blue</span></button>
                                        <button type="button" data-hex-color="#768FFD"
                                            style="background-color: #768FFD" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Light Purple</span></button>
                                        <button type="button" data-hex-color="#BCF0DA"
                                            style="background-color: #BCF0DA" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Light Green</span></button>
                                        <button type="button" data-hex-color="#EBF5FF"
                                            style="background-color: #EBF5FF" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Sky Blue</span></button>
                                        <button type="button" data-hex-color="#16BDCA"
                                            style="background-color: #16BDCA" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Cyan</span></button>
                                        <button type="button" data-hex-color="#E74694"
                                            style="background-color: #E74694" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Pink</span></button>
                                        <button type="button" data-hex-color="#83B0ED"
                                            style="background-color: #83B0ED" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Darker Sky Blue</span></button>
                                        <button type="button" data-hex-color="#03543F"
                                            style="background-color: #03543F" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Forest Green</span></button>
                                        <button type="button" data-hex-color="#111928"
                                            style="background-color: #111928" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Black</span></button>
                                        <button type="button" data-hex-color="#4B5563"
                                            style="background-color: #4B5563" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Stone</span></button>
                                        <button type="button" data-hex-color="#6B7280"
                                            style="background-color: #6B7280" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Gray</span></button>
                                        <button type="button" data-hex-color="#D1D5DB"
                                            style="background-color: #D1D5DB" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Light Gray</span></button>
                                        <button type="button" data-hex-color="#F3F4F6"
                                            style="background-color: #F3F4F6" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Cloud Gray</span></button>
                                        <button type="button" data-hex-color="#F3F4F6"
                                            style="background-color: #F3F4F6" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Cloud Gray</span></button>
                                        <button type="button" data-hex-color="#F9FAFB"
                                            style="background-color: #F9FAFB" class="w-6 h-6 rounded-md"><span
                                                class="sr-only">Heaven Gray</span></button>
                                    </div>
                                    <button type="button" id="reset-color"
                                        class="py-1.5 text-sm font-medium text-gray-500 focus:outline-none bg-white rounded-lg hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-700 dark:text-gray-400 dark:hover:text-white w-full dark:hover:bg-gray-600">Reset
                                        color</button>
                                </div>
                                <button id="toggleFontFamilyButton" data-dropdown-toggle="fontFamilyDropdown"
                                    type="button" data-tooltip-target="tooltip-font-family"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m10.6 19 4.298-10.93a.11.11 0 0 1 .204 0L19.4 19m-8.8 0H9.5m1.1 0h1.65m7.15 0h-1.65m1.65 0h1.1m-7.7-3.985h4.4M3.021 16l1.567-3.985m0 0L7.32 5.07a.11.11 0 0 1 .205 0l2.503 6.945h-5.44Z" />
                                    </svg>
                                    <span class="sr-only">Font family</span>
                                </button>
                                <div id="tooltip-font-family" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Font Family
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <div id="fontFamilyDropdown"
                                    class="z-10 hidden w-48 rounded bg-white p-2 shadow dark:bg-gray-700">
                                    <ul class="space-y-1 text-sm font-medium"
                                        aria-labelledby="toggleFontFamilyButton">
                                        <li>
                                            <button data-font-family="Inter, ui-sans-serif" type="button"
                                                class="flex justify-between items-center w-full text-sm font-sans rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Default
                                            </button>
                                        </li>
                                        <li>
                                            <button data-font-family="Arial, sans-serif" type="button"
                                                class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                                style="font-family: Arial, sans-serif;">Arial
                                            </button>
                                        </li>
                                        <li>
                                            <button data-font-family="'Courier New', monospace" type="button"
                                                class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                                style="font-family: 'Courier New', monospace;">Courier New
                                            </button>
                                        </li>
                                        <li>
                                            <button data-font-family="Georgia, serif" type="button"
                                                class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                                style="font-family: Georgia, serif;">Georgia
                                            </button>
                                        </li>
                                        <li>
                                            <button data-font-family="'Lucida Sans Unicode', sans-serif"
                                                type="button"
                                                class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                                style="font-family: 'Lucida Sans Unicode', sans-serif;">Lucida Sans
                                                Unicode
                                            </button>
                                        </li>
                                        <li>
                                            <button data-font-family="Tahoma, sans-serif" type="button"
                                                class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                                style="font-family: Tahoma, sans-serif;">Tahoma
                                            </button>
                                        </li>
                                        <li>
                                            <button data-font-family="'Times New Roman', serif;" type="button"
                                                class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                                style="font-family: 'Times New Roman', serif;">Times New Roman
                                            </button>
                                        </li>
                                        <li>
                                            <button data-font-family="'Trebuchet MS', sans-serif" type="button"
                                                class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                                style="font-family: 'Trebuchet MS', sans-serif;">Trebuchet MS
                                            </button>
                                        </li>
                                        <li>
                                            <button data-font-family="Verdana, sans-serif" type="button"
                                                class="flex justify-between items-center w-full text-sm rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white"
                                                style="font-family: Verdana, sans-serif;">Verdana
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="px-1">
                                    <span class="block w-px h-4 bg-gray-300 dark:bg-gray-600"></span>
                                </div>
                                <button id="toggleLeftAlignButton" type="button"
                                    data-tooltip-target="tooltip-left-align"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M6 6h8m-8 4h12M6 14h8m-8 4h12" />
                                    </svg>
                                    <span class="sr-only">Align left</span>
                                </button>
                                <div id="tooltip-left-align" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Align left
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="toggleCenterAlignButton" type="button"
                                    data-tooltip-target="tooltip-center-align"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M8 6h8M6 10h12M8 14h8M6 18h12" />
                                    </svg>
                                    <span class="sr-only">Align center</span>
                                </button>
                                <div id="tooltip-center-align" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Align center
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <button id="toggleRightAlignButton" type="button"
                                    data-tooltip-target="tooltip-right-align"
                                    class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M18 6h-8m8 4H6m12 4h-8m8 4H6" />
                                    </svg>
                                    <span class="sr-only">Align right</span>
                                </button>
                                <div id="tooltip-right-align" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Align right
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 pt-2 flex-wrap">
                            <button id="typographyDropdownButton" data-dropdown-toggle="typographyDropdown"
                                class="flex items-center justify-center rounded-lg bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-500 hover:bg-gray-200 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-50 dark:bg-gray-600 dark:text-gray-400 dark:hover:bg-gray-500 dark:hover:text-white dark:focus:ring-gray-600"
                                type="button">
                                Format
                                <svg class="-me-0.5 ms-1.5 h-3.5 w-3.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="ps-1.5">
                                <span class="block w-px h-4 bg-gray-300 dark:bg-gray-600"></span>
                            </div>
                            <!-- Heading Dropdown -->
                            <div id="typographyDropdown"
                                class="z-10 hidden w-72 rounded bg-white p-2 shadow dark:bg-gray-700">
                                <ul class="space-y-1 text-sm font-medium" aria-labelledby="typographyDropdownButton">
                                    <li>
                                        <button id="toggleParagraphButton" type="button"
                                            class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Paragraph
                                            <div class="space-x-1.5">
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">0</kbd>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button data-heading-level="1" type="button"
                                            class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                            1
                                            <div class="space-x-1.5">
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">1</kbd>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button data-heading-level="2" type="button"
                                            class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                            2
                                            <div class="space-x-1.5">
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">2</kbd>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button data-heading-level="3" type="button"
                                            class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                            3
                                            <div class="space-x-1.5">
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">3</kbd>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button data-heading-level="4" type="button"
                                            class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                            4
                                            <div class="space-x-1.5">
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">4</kbd>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button data-heading-level="5" type="button"
                                            class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                            5
                                            <div class="space-x-1.5">
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">5</kbd>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button data-heading-level="6" type="button"
                                            class="flex justify-between items-center w-full text-base rounded px-3 py-2 hover:bg-gray-100 text-gray-900 dark:hover:bg-gray-600 dark:text-white">Heading
                                            6
                                            <div class="space-x-1.5">
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Cmd</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">Alt</kbd>
                                                <kbd
                                                    class="px-2 py-1 text-xs font-semibold text-gray-500 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-400 dark:border-gray-500">6</kbd>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <button id="addImageButton" type="button" data-tooltip-target="tooltip-image"
                                class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Add image</span>
                            </button>
                            <div id="tooltip-image" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Add image
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button id="addVideoButton" type="button" data-tooltip-target="tooltip-video"
                                class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-2 4a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H9Zm0 2h2v2H9v-2Zm7.965-.557a1 1 0 0 0-1.692-.72l-1.268 1.218a1 1 0 0 0-.308.721v.733a1 1 0 0 0 .37.776l1.267 1.032a1 1 0 0 0 1.631-.776v-2.984Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Add video</span>
                            </button>
                            <div id="tooltip-video" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Add video
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button id="toggleListButton" type="button" data-tooltip-target="tooltip-list"
                                class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5" />
                                </svg>
                                <span class="sr-only">Toggle list</span>
                            </button>
                            <div id="tooltip-list" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Toggle list
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button id="toggleOrderedListButton" type="button"
                                data-tooltip-target="tooltip-ordered-list"
                                class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6h8m-8 6h8m-8 6h8M4 16a2 2 0 1 1 3.321 1.5L4 20h5M4 5l2-1v6m-2 0h4" />
                                </svg>
                                <span class="sr-only">Toggle ordered list</span>
                            </button>
                            <div id="tooltip-ordered-list" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Toggle ordered list
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button id="toggleBlockquoteButton" type="button"
                                data-tooltip-target="tooltip-blockquote-list"
                                class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M6 6a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a3 3 0 0 1-3 3H5a1 1 0 1 0 0 2h1a5 5 0 0 0 5-5V8a2 2 0 0 0-2-2H6Zm9 0a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a3 3 0 0 1-3 3h-1a1 1 0 1 0 0 2h1a5 5 0 0 0 5-5V8a2 2 0 0 0-2-2h-3Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Toggle blockquote</span>
                            </button>
                            <div id="tooltip-blockquote-list" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Toggle blockquote
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button id="toggleHRButton" type="button" data-tooltip-target="tooltip-hr-list"
                                class="p-1.5 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M5 12h14" />
                                    <path stroke="currentColor" stroke-linecap="round"
                                        d="M6 9.5h12m-12 9h12M6 7.5h12m-12 9h12M6 5.5h12m-12 9h12" />
                                </svg>
                                <span class="sr-only">Toggle Horizontal Rule</span>
                            </button>
                            <div id="tooltip-hr-list" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Toggle Horizontal Rule
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                        <label for="wysiwyg-example" class="sr-only">Contenu de l'article</label>
                        <textarea id="wysiwyg-example" name="contenu"
                            class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                            required>{{ old('contenue', $article->contenu) }}</textarea>
                    </div>
                </div>

                @error('contenu')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Catégorie -->
            <div class="mb-4">
                <label for="categorie_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select id="categorie_id" name="categorie_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}"
                            {{ old('categorie_id', $article->categorie_id) == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->name }}
                        </option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tags -->
            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                <select id="tags" name="tags[]" multiple="multiple"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm js-example-basic-multiple">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', $article->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                @error('tags')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>


            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image de l'article</label>

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-semibold">Cliquez pour téléverser</span> ou glissez-déposez
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Formats supportés : SVG, PNG, JPG ou
                                GIF</p>
                        </div>
                        <input id="dropzone-file" type="file" name="image" class="hidden"
                            onchange="previewImage(event)" />
                    </label>
                </div>

                <!-- Zone d'aperçu -->
                <div id="preview-container" class="mt-4 hidden relative">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Aperçu de l'image :</p>
                    <img id="image-preview" src="{{ asset('storage/' . $article->image) }}" alt="Aperçu de l'image"
                        class="max-w-full h-auto rounded-lg shadow-md" />
                    <button type="button" onclick="removePreview()"
                        class="absolute top-0 right-0 bg-red-500 text-white p-1 rounded-full w-10 h-10 shadow-md hover:bg-red-600 focus:outline-none">
                        &times;
                    </button>
                </div>

                @error('image')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mise à la Une -->
            <div class="mb-4">
                <label for="mis_a_la_une" class="flex items-center">
                    <input type="checkbox" id="mis_a_la_une" name="mis_a_la_une"
                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                        {{ old('mis_a_la_une', $article->mis_a_la_une) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm font-medium text-gray-700">Mettre cet article à la une</span>
                </label>
                @error('mis_a_la_une')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Boutons -->
            <div class="flex justify-end">
                <button type="reset"
                    class="mr-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Annuler</button>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Publier</button>
            </div>
        </form>
    </div>



    @section('script')
        <script>
            // Fonction pour afficher l'aperçu de l'image
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewContainer = document.getElementById('preview-container');
                        const previewImage = document.getElementById('image-preview');
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }

            // Fonction pour supprimer l'aperçu de l'image
            function removePreview() {
                const previewContainer = document.getElementById('preview-container');
                const previewImage = document.getElementById('image-preview');
                const fileInput = document.getElementById('dropzone-file');

                // Réinitialiser l'image et le champ de fichier
                previewImage.src = '#';
                previewContainer.classList.add('hidden');
                fileInput.value = ''; // Efface la sélection du fichier
            }
        </script>
        <script type="module">
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: '{{ session('success') }}',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: '{{ session('error') }}',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                });
            @endif
        </script>
    @endsection

    @vite(['resources/js/textarea.js'])
</x-app-layout>
