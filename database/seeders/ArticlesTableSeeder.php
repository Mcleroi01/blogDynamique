<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Categorie::pluck('id')->toArray(); // Récupère les IDs des catégories existantes

        for ($i = 1; $i <= 20; $i++) { // Génère 20 articles
            Article::create([
                'titre' => 'Article ' . $i,
                'contenu' => 'Ceci est le contenu de l\'article ' . $i . '. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'categorie_id' => $categories[array_rand($categories)], // Catégorie aléatoire
                'image' => 'https://picsum.photos/600/400?random=' . $i, // Image de placeholder
                'mis_a_la_une' => $i % 5 === 0, // Un article sur cinq sera à la une
            ]);
        }
    }
}
