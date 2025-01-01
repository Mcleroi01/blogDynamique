@extends('public.layouts.app')



@section('content')
    <!-- advertisement -->
    <div class="bg-gray-50 py-4 hidden">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="mx-auto table text-center text-sm">
                <a class="uppercase" href="#">Advertisement</a>
                <a href="#">
                    <img src="src/img/ads/ads_728.jpg" alt="advertisement area">
                </a>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3  overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span
                                class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>{{ $category->name }}</span>
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3 pb-5">
                            <div class="relative hover-img max-h-98 overflow-hidden">
                                <!--thumbnail-->
                                <a
                                    href="{{ route('showPublicArticle', ['article' => $alauneSportArticle->_id, 'slug' => Str::slug($alauneSportArticle->titre)]) }}">
                                    <img class="max-w-full w-full mx-auto h-auto"
                                        src="{{ asset('storage/' . $alauneSportArticle->image) }}" alt="Image description">
                                </a>
                                <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                                    <!--title-->
                                    <a
                                        href="{{ route('showPublicArticle', ['article' => $alauneSportArticle->_id, 'slug' => Str::slug($alauneSportArticle->titre)]) }}">
                                        <h2 class="text-3xl font-bold capitalize text-white mb-3">
                                            {{ $alauneSportArticle->titre }}</h2>
                                    </a>
                                    <p class="text-gray-100 hidden sm:inline-block">
                                        {{ substr($alauneSportArticle->contenu, 0, 200) }}...</p>
                                    <!-- author and date -->
                                    <div class="pt-2">
                                        <div class="text-gray-100">
                                            <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                            {{ $alauneSportArticle->categories->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($articles as $article)
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a
                                        href="{{ route('showPublicArticle', ['article' => $article->_id, 'slug' => Str::slug($article->titre)]) }}">
                                        <img class="max-w-full w-full mx-auto"
                                            src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->titre }}">
                                    </a>
                                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                        <h3 class="text-lg font-bold leading-tight mb-2">
                                            <a
                                                href="{{ route('showPublicArticle', ['article' => $article->_id, 'slug' => Str::slug($article->titre)]) }}">
                                                {{ $article->titre }} </a>
                                        </h3>
                                        <p class="hidden md:block text-gray-600 leading-tight mb-1">
                                            {{ substr($article->contenu, 0, 100) }}</p>
                                        <a class="text-gray-500" href="#"><span
                                                class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{ $article->categories->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        {{ $articles->links() }} <!-- Pagination -->

                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-white">
                        <div class="mb-6">
                            <div class="p-4 bg-gray-100">
                                <h2 class="text-lg font-bold">Les plus populaires</h2>
                            </div>
                            <ul class="post-number">
                                @foreach ($topArticles as $article)
                                    <li class="border-b border-gray-100 hover:bg-gray-50">
                                        <a class="text-lg font-bold px-6 py-3 flex flex-row items-center"
                                            href="{{ route('showPublicArticle', ['article' => $article->_id, 'slug' => Str::slug($article->titre)]) }}">
                                            {{ $article->titre }}

                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="text-sm py-6 sticky">
                        <div class="w-full text-center">
                            <a class="uppercase" href="#">Advertisement</a>
                            <a href="#">
                                <img class="mx-auto" src="src/img/ads/250.jpg" alt="advertisement area">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
