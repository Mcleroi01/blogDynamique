<x-app-layout>

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
                    Liste des Articles
                </li>
            </ol>
        </nav>

    </div>
    <!--end breadcrumb-->

    <style>
        /*@apply bg-white text-blue-400 rounded-full;*/
        .active {
            background: white;
            border-radius: 9999px;
            color: #63b3ed;
        }
    </style>

    <div class=" my-12 mx-auto px-4 md:px-12 flex justify-between items-center">
        <div>
            <a href="{{ route('articles.create') }}"
                class="inline-flex items-center justify-center gap-2.5 rounded-full bg-black dark:bg-gray-600 px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                <svg class=" fill-current" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z" />
                </svg>

                New article
            </a>

        </div>
        <div
            class="bg-gray-200 dark:bg-gray-600 text-sm text-gray-500 dark:text-gray-200 leading-none border-2 border-gray-200 dark:border-gray-800 rounded-full inline-flex mt-4 ">
            <button
                class="inline-flex items-center transition-colors duration-800 ease-in focus:outline-none hover:text-blue-400 focus:text-blue-400 rounded-l-full py-4 px-10  active"
                id="gridViewBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="fill-current w-4 h-4 mr-2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>Grid</span>
            </button>
            <button
                class="inline-flex items-center transition-colors duration-800 ease-in focus:outline-none hover:text-blue-400 focus:text-blue-400 rounded-r-full px-10  py-4"
                id="listViewBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="fill-current w-4 h-4 mr-2">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                </svg>
                <span>List</span>
            </button>
        </div>
    </div>


    <div id="gridView">
        <div class="container my-12 mx-auto px-4 md:px-12">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                @foreach ($articles as $i => $article)
                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">

                            <a
                                href="{{ route('articles.show', ['article' => $article->_id, 'slug' => Str::slug($article->titre)]) }}">
                                <img alt="{{ $article->titre }}" class="block h-auto w-full"
                                    src="{{ asset('storage/' . $article->image) }}">
                            </a>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <a class="no-underline hover:underline text-black dark:text-gray-200"
                                        href="{{ route('articles.show', ['article' => $article->_id, 'slug' => Str::slug($article->titre)]) }}">
                                        {{ $article->titre }}
                                    </a>
                                </h1>
                            </header>

                            <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black dark:text-gray-200"
                                    href="#">
                                    <img alt="Placeholder" class="block rounded-full"
                                        src="https://picsum.photos/32/32/?random">
                                    <p class="ml-2 text-sm">
                                        {{ $article->created_at }}
                                    </p>
                                </a>
                                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                    <span class="hidden">Like</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </footer>

                        </article>
                        <!-- END Article -->

                    </div>
                    <!-- END Column -->
                @endforeach

            </div>
        </div>
    </div>

    <div id="listView" class=" hidden container my-12 mx-auto px-4 md:px-12">
        <div class="">
            <table
                class="w-full relative overflow-x-auto shadow-md sm:rounded-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                id="default-table">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-16 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categories
                        </th>
                        <th scope="col" class="px-6 py-3">
                            tags
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $i => $article)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                <img src="{{ asset('storage/' . $article->image) }}"
                                    class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $article->titre }}">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $article->titre }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $article->categories->name }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                @foreach ($article->tags as $tag)
                                    {{ $tag->name }},
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                <button id="dropdownMenuIconButton{{ $i }}"
                                    data-dropdown-toggle="dropdownDots{{ $i }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 4 15">
                                        <path
                                            d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownDots{{ $i }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                href="{{ route('articles.show', ['article' => $article->_id, 'slug' => Str::slug($article->titre)]) }}">
                                                Voir l'article
                                            </a>

                                        </li>
                                        <li>
                                            <a href="{{ route('article.edit', $article->_id) }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Modifier</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                        </li>
                                    </ul>
                                    <div class="py-2">
                                        <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="supprimer"
                                                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 my-12  px-4 md:px-12 ">
        {{ $articles->links() }}
    </div>

    @section('script')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const gridViewBtn = document.getElementById("gridViewBtn");
                const listViewBtn = document.getElementById("listViewBtn");
                const gridView = document.getElementById("gridView");
                const listView = document.getElementById("listView");

                gridViewBtn.addEventListener("click", () => {
                    gridView.classList.remove("hidden");
                    listView.classList.add("hidden");
                    gridViewBtn.classList.add("active");
                    listViewBtn.classList.remove("active");
                });

                listViewBtn.addEventListener("click", () => {
                    listView.classList.remove("hidden");
                    gridView.classList.add("hidden");
                    listViewBtn.classList.add("active");
                    gridViewBtn.classList.remove("active");
                });
            });

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

            if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
                const dataTable = new simpleDatatables.DataTable("#default-table", {
                    searchable: true,
                    perPageSelect: true
                });
            }
        </script>
    @endsection
</x-app-layout>
