<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PublicArticleController extends Controller
{
    public function indexPublicArticle()
    {
        try {
            $alaune = Article::where('mis_a_la_une', 1)->latest()->take(1)->first();
            $dernieresNouvelles = Article::latest()->take(4)->get();
            $articlesRecents = Article::latest()->skip(5)->take(10)->get();
            $articles = Article::latest()->take(20)->get();
            $politiqueCategorieArticle = Article::whereHas('categories', function ($query) {
                $query->where('name', 'politique');
            })->get();

            $sportCategorieArticle = Article::whereHas('categories', function ($query) {
                $query->where('name', 'sports');
            })->get();


            $alauneSportArticle = Article::whereHas('categories', function ($query) {
                $query->where('name', 'Sports');
            })->latest()->first();


            $topArticles = Article::orderBy('visits_count', 'desc')
            ->take(5)
            ->get();

            return view('welcome', compact('alaune', 'topArticles', 'dernieresNouvelles', 'articlesRecents', 'politiqueCategorieArticle', 'articles', 'sportCategorieArticle', 'alauneSportArticle'));
        } catch (\Exception $e) {

            return view('errors.500');
        }
    }

    public function showPublicArticle(Article $article)
    {

        $topArticles = Article::orderBy('visits_count', 'desc')
            ->take(5)
            ->get();

            
        
        return view('public.pages.single', compact('article', 'topArticles'));
    }

    public function articlesByCategory($categoryName)
    {
        try {

            $category = Categorie::where('name', $categoryName)->first();


            if (!$category) {
                return view('errors.404');
            }


            $articles = Article::whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category->name);
            })->latest()->paginate(10);

            $topArticles = Article::where('categorie_id', $category->id)
            ->orderBy('visits_count', 'desc')
            ->take(5)
            ->get();


            $alauneSportArticle = Article::whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category->name);
            })->latest()->first();


            if ($articles->isEmpty()) {
                return view('public.pages.category', [
                    'message' => "Aucun article trouvé pour la catégorie '$category->name'.",
                    'category' => $category,
                ]);
            }


            return view('public.pages.category', compact('articles', 'category', 'alauneSportArticle', 'topArticles'));
        } catch (\Exception $e) {
            // Log l'erreur pour débogage
            Log::error('Error fetching articles by category: ' . $e->getMessage());
            return view('errors.500');
        }
    }

    public function articlesByAuthor(User $user)
    {
        
        $articles = $user->articles;
        $topArticles = Article::where('author_id', $user->id)
            ->orderBy('visits_count', 'desc')
            ->take(5)
            ->get();

        return view('public.pages.author', compact('articles', 'user', 'topArticles'));
    }
}