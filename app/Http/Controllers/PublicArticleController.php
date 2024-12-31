<?php

namespace App\Http\Controllers;

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

            return view('welcome', compact('alaune', 'dernieresNouvelles', 'articlesRecents', 'politiqueCategorieArticle', 'articles', 'sportCategorieArticle', 'alauneSportArticle'));
        } catch (\Exception $e) {

            // Traiter l'exception pour afficher un message d'erreur générique
            return view('errors.500');  // Retourner une page d'erreur 500

        }
    }

    public function showPublicArticle(Article $article)
    {


        return view('public.pages.single', compact('article'));
    }

    public function articleAlaUne() {}

    public function articlesByCategory($categoryName)
    {
        try {
            // Récupère la catégorie par son nom
            $category = Categorie::where('name', $categoryName)->first();

            // Si la catégorie n'existe pas, redirige vers une page 404
            if (!$category) {
                return view('errors.404');
            }

            // Récupère les articles associés à la catégorie
            $articles = Article::whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category->name);
            })->latest()->paginate(10);

            // Récupère l'article le plus récent de cette catégorie
            $alauneSportArticle = Article::whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category->name);
            })->latest()->first();

            // Si aucun article n'est trouvé, afficher un message personnalisé
            if ($articles->isEmpty()) {
                return view('public.pages.category', [
                    'message' => "Aucun article trouvé pour la catégorie '$category->name'.",
                    'category' => $category,
                ]);
            }

            // Affiche les articles et la catégorie dans la vue
            return view('public.pages.category', compact('articles', 'category', 'alauneSportArticle'));
        } catch (\Exception $e) {
            // Log l'erreur pour débogage
            Log::error('Error fetching articles by category: ' . $e->getMessage());

            // En cas d'exception, retourne une page d'erreur générique
            return view('errors.500');
        }
    }
}