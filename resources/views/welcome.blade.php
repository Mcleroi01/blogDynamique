@extends('public.layouts.app')

@section('content')
    <div class="bg-gray-50 py-4 ">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="mx-auto table text-center text-sm">
                <a class="uppercase" href="#">Advertisement</a>
                <a href="#">
                    <img src="" alt="advertisement area">
                </a>
            </div>
        </div>
    </div>


    <!-- hero big grid -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <!-- big grid 1 -->
            <div class="flex flex-row flex-wrap">
                <!--Start left cover-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1">
                    <div class="relative hover-img max-h-98 overflow-hidden">
                        <a
                            href="{{ route('showPublicArticle', ['article' => $alaune->_id, 'slug' => Str::slug($alaune->titre)]) }}">
                            <img class="max-w-full w-full mx-auto h-auto" src="{{ asset('storage/' . $alaune->image) }}"
                                alt="Image description">
                        </a>
                        <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                            <a
                                href="{{ route('showPublicArticle', ['article' => $alaune->_id, 'slug' => Str::slug($alaune->titre)]) }}">
                                <h2 class="text-3xl font-bold capitalize text-white mb-3">{{ $alaune->titre }}</h2>
                            </a>
                            <p class="text-gray-100 hidden sm:inline-block">{{ substr($alaune->contenu, 0, 150) }} ...</p>
                            <div class="pt-2">
                                <div class="text-gray-100">
                                    <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                    <a href="{{ route('articles.byCategory', $alaune->categories->name) }}">
                                        {{ $alaune->categories->name }}
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Start box news-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2">
                    <div class="box-one flex flex-row flex-wrap">
                        @foreach ($dernieresNouvelles as $dernieresNouvelle)
                            <article class="flex-shrink max-w-full w-full sm:w-1/2">
                                <div class="relative hover-img h-44 overflow-hidden"> <!-- Fixer la hauteur -->
                                    <a
                                        href="{{ route('showPublicArticle', ['article' => $dernieresNouvelle->_id, 'slug' => Str::slug($dernieresNouvelle->titre)]) }}">
                                        <img class="max-w-full w-full h-full object-cover"
                                            src="{{ asset('storage/' . $dernieresNouvelle->image) }}"
                                            alt="Image description">
                                    </a>
                                    <div class="absolute px-4 pt-7 pb-4 bottom-0 w-full bg-gradient-cover">
                                        <a
                                            href="{{ route('showPublicArticle', ['article' => $dernieresNouvelle->_id, 'slug' => Str::slug($dernieresNouvelle->titre)]) }}">
                                            <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">
                                                {{ $dernieresNouvelle->titre }}
                                            </h2>
                                        </a>
                                        <div class="pt-1">
                                            <div class="text-gray-100">
                                                <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                                <a
                                                    href="{{ route('articles.byCategory', $dernieresNouvelle->categories->name) }}">
                                                    {{ $dernieresNouvelle->categories->name }}
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Politique
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach ($politiqueCategorieArticle as $categorieArticle)
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a
                                        href="{{ route('showPublicArticle', ['article' => $categorieArticle->_id, 'slug' => Str::slug($categorieArticle->titre)]) }}">
                                        <img class="max-w-full w-full mx-auto"
                                            src="{{ asset('storage/' . $categorieArticle->image) }}" alt="alt title">
                                    </a>
                                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                        <h3 class="text-lg font-bold leading-tight mb-2">
                                            <a
                                                href="{{ route('showPublicArticle', ['article' => $categorieArticle->_id, 'slug' => Str::slug($categorieArticle->titre)]) }}">{{ $categorieArticle->titre }}</a>
                                        </h3>
                                        <p class="hidden md:block text-gray-600 leading-tight mb-1">
                                            {{ substr($categorieArticle->contenu, 0, 100) }}</p>
                                        <a class="text-gray-500"
                                            href="{{ route('articles.byCategory', $categorieArticle->categories->name) }}"><span
                                                class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{ $categorieArticle->categories->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-gray-50 h-full">
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
    </div>

    <div class="relative bg-gray-50"
        style="background-image: url('https://about.fb.com/wp-content/uploads/2023/09/GettyImages-686732223.jpg');background-size: cover;background-position: center center;background-attachment: fixed">
        <div class="bg-black bg-opacity-70">
            <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
                <div class="flex flex-row flex-wrap">
                    <div class="flex-shrink max-w-full w-full py-12 overflow-hidden">
                        <div class="w-full py-3">
                            <h2 class="text-white text-2xl font-bold text-shadow-black">
                                <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>American
                            </h2>
                        </div>

                        <!-- Splide Slider -->
                        <div id="post-carousel" class="splide post-carousel">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($articles as $articlesRecent)
                                        <li class="splide__slide">
                                            <div class="w-full pb-3">
                                                <div class="hover-img bg-white">
                                                    <!-- Image -->
                                                    <a
                                                        href="{{ route('showPublicArticle', ['article' => $articlesRecent->_id, 'slug' => Str::slug($articlesRecent->titre)]) }}">
                                                        <img class="max-w-full w-full mx-auto"
                                                            src="{{ asset('storage/' . $articlesRecent->image) }}"
                                                            alt="{{ $articlesRecent->titre }}">
                                                    </a>
                                                    <!-- Contenu -->
                                                    <div class="py-3 px-6">
                                                        <h3 class="text-lg font-bold leading-tight mb-2">
                                                            <a
                                                                href="{{ route('showPublicArticle', ['article' => $articlesRecent->_id, 'slug' => Str::slug($articlesRecent->titre)]) }}">
                                                                {{ $articlesRecent->titre }}
                                                            </a>
                                                        </h3>
                                                        <a class="text-gray-500"
                                                            href="{{ route('articles.byCategory', $articlesRecent->categories->name) }}">
                                                            <span
                                                                class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                                            {{ $articlesRecent->categories->name ?? 'Non classé' }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Fin Slider -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- block news -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <div class="flex-shrink max-w-full w-full overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span><a
                                href="{{ route('articles.byCategory', $articlesRecent->categories->name) }}">news</a>
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach ($articles as $article)
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a
                                        href="{{ route('showPublicArticle', ['article' => $article->_id, 'slug' => Str::slug($article->titre)]) }}">
                                        <img class="max-w-full w-full mx-auto"
                                            src="{{ asset('storage/' . $article->image) }}" alt="alt title">
                                    </a>
                                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                        <h3 class="text-lg font-bold leading-tight mb-2">
                                            <a
                                                href="{{ route('showPublicArticle', ['article' => $article->_id, 'slug' => Str::slug($article->titre)]) }}">
                                                {{ $article->titre }}</a>
                                        </h3>
                                        <p class="hidden md:block text-gray-600 leading-tight mb-1">
                                            {{ substr($article->contenu, 0, 100) }}...</p>
                                        <a class="text-gray-500"
                                            href="{{ route('articles.byCategory', $article->categories->name) }}"><span
                                                class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{ $article->categories->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
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
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Sport
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3 pb-5">
                            <div class="relative hover-img max-h-98 overflow-hidden">
                                <!--thumbnail-->
                                <a
                                    href="{{ route('showPublicArticle', ['article' => $alauneSportArticle->_id, 'slug' => Str::slug($alauneSportArticle->titre)]) }}">
                                    <img class="max-w-full w-full mx-auto h-auto"
                                        src="{{ asset('storage/' . $alauneSportArticle->image) }}"
                                        alt="Image description">
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


                        @foreach ($sportCategorieArticle as $sport)
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a
                                        href="{{ route('showPublicArticle', ['article' => $sport->_id, 'slug' => Str::slug($sport->titre)]) }}">
                                        <img class="max-w-full w-full mx-auto"
                                            src="{{ asset('storage/' . $sport->image) }}" alt="alt title">
                                    </a>
                                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                        <h3 class="text-lg font-bold leading-tight mb-2">
                                            <a
                                                href="{{ route('showPublicArticle', ['article' => $sport->_id, 'slug' => Str::slug($sport->titre)]) }}">
                                                {{ $sport->titre }}</a>
                                        </h3>
                                        <p class="hidden md:block text-gray-600 leading-tight mb-1">
                                            {{ substr($sport->contenu, 0, 100) }} ....</p>
                                        <a class="text-gray-500" href="#"><span
                                                class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                            {{ $sport->categories->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


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
                                <img class="mx-auto" src="https://picsum.photos/600/400/?random"
                                    alt="advertisement area">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- post -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Latest news
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3 pb-5">
                            <div class="relative hover-img max-h-98 overflow-hidden">
                                <!--thumbnail-->
                                <a href="#">
                                    <img class="max-w-full w-full mx-auto h-auto"
                                        src="https://picsum.photos/600/400/?random" alt="Image description">
                                </a>
                                <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                                    <!--title-->
                                    <a href="#">
                                        <h2 class="text-3xl font-bold capitalize text-white mb-3">Amazon Shoppers Are
                                            Ditching Designer Belts for This Best-Selling</h2>
                                    </a>
                                    <p class="text-gray-100 hidden sm:inline-block">This is a wider card with supporting
                                        text below as a natural lead-in to additional content. This very helpfull for
                                        generate default content..</p>
                                    <!-- author and date -->
                                    <div class="pt-2">
                                        <div class="text-gray-100">
                                            <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>Europe
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="">
                                    <img class="max-w-full w-full mx-auto" src="https://picsum.photos/600/400/?random"
                                        alt="alt title">
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with
                                        supporting text below as a natural lead-in to additional content.</p>
                                    <a class="text-gray-500" href="#"><span
                                            class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="">
                                    <img class="max-w-full w-full mx-auto" src="https://picsum.photos/600/400/?random"
                                        alt="alt title">
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with
                                        supporting text below as a natural lead-in to additional content.</p>
                                    <a class="text-gray-500" href="#"><span
                                            class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="">
                                    <img class="max-w-full w-full mx-auto" src="https://picsum.photos/600/400/?random"
                                        alt="alt title">
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with
                                        supporting text below as a natural lead-in to additional content.</p>
                                    <a class="text-gray-500" href="#"><span
                                            class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="">
                                    <img class="max-w-full w-full mx-auto" src="https://picsum.photos/600/400/?random"
                                        alt="alt title">
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with
                                        supporting text below as a natural lead-in to additional content.</p>
                                    <a class="text-gray-500" href="#"><span
                                            class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="">
                                    <img class="max-w-full w-full mx-auto" src="https://picsum.photos/600/400/?random"
                                        alt="alt title">
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with
                                        supporting text below as a natural lead-in to additional content.</p>
                                    <a class="text-gray-500" href="#"><span
                                            class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="">
                                    <img class="max-w-full w-full mx-auto" src="https://picsum.photos/600/400/?random"
                                        alt="alt title">
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with
                                        supporting text below as a natural lead-in to additional content.</p>
                                    <a class="text-gray-500" href="#"><span
                                            class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pr-8 lg:pt-14 lg:pb-8 order-first">
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
                                <img class="mx-auto" src="https://picsum.photos/600/400/?random"
                                    alt="advertisement area">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#post-carousel', {
                type: 'loop',
                perPage: 3,
                perMove: 3,
                autoplay: true,
                interval: 3000,

            }).mount();
        });
    </script>
@endsection
@endsection
