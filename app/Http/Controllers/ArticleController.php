<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['categories', 'tags'])->orderBy('created_at', 'desc')->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        // Vérifiez l'utilisateur
        if (!$user->can('create articles')) {
            return back()->withErrors(['error' => 'Vous n\'avez pas la permission de créer des articles.']);
        }
        $categories = Categorie::all();
        $tags = Tag::all();

        return view('articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Article $article, Request $request)
    {
        $user = auth()->user();


        if (!$user->can('create articles')) {
            return back()->withErrors(['error' => 'Vous n\'avez pas la permission de créer des articles.']);
        }


      
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'categorie_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'mis_a_la_une' => 'nullable',
        ], [
            'titre.required' => 'Le titre est obligatoire.',
            'titre.string' => 'Le titre doit être une chaîne de caractères.',
            'titre.max' => 'Le titre ne peut pas dépasser 255 caractères.',
            'contenu.required' => 'Le contenu de l\'article est obligatoire.',
            'categorie_id.required' => 'La catégorie est obligatoire.',
            'categorie_id.exists' => 'La catégorie sélectionnée est invalide.',
            'tags.array' => 'Les tags doivent être un tableau.',
            'tags.*.exists' => 'Certains tags sélectionnés sont invalides.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou WEBP.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
        ]);




        DB::beginTransaction();

        try {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('article_images', 'public');
            }

            $data['mis_a_la_une'] = $request->has('mis_a_la_une') ? 1 : 0;

            $article = Article::create($data);



            if (isset($data['tags'])) {
                $article->tags()->sync($data['tags']);
            }

            DB::commit();

            return redirect()->route('articles.index')->with('success', 'Article créé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la création de l\'article', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Une erreur s\'est produite lors de la création de l\'article.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article, $slug)
    {
        // Vérifier que le slug correspond au titre de l'article
        if ($slug !== Str::slug($article->title)) {
            abort(404); // Retourner une erreur 404 si le slug ne correspond pas
        }

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Categorie::all();
        $tags = Tag::all();

        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'contenue' => 'required',
            'categorie_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_featured' => 'nullable|boolean',
            'publish_at' => 'nullable|date|after_or_equal:now',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete('public/' . $article->image);
            }
            $data['image'] = $request->file('image')->store('article_images', 'public');
        }

        $article->update($data);

        if (isset($data['tags'])) {
            $article->tags()->sync($data['tags']);
        }

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete('public/' . $article->image);
        }

        $article->tags()->detach();
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}