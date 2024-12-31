<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Technologie', 'description' => 'Actualités et tutoriels sur la technologie.'],
            ['name' => 'Santé', 'description' => 'Conseils et articles sur la santé et le bien-être.'],
            ['name' => 'Voyage', 'description' => 'Destinations, guides et expériences de voyage.'],
            ['name' => 'Cuisine', 'description' => 'Recettes, astuces culinaires et gastronomie.'],
            ['name' => 'Éducation', 'description' => 'Articles éducatifs et ressources pédagogiques.'],
            ['name' => 'Finance', 'description' => 'Conseils financiers et actualités économiques.'],
            ['name' => 'Mode', 'description' => 'Tendances de la mode et conseils vestimentaires.'],
            ['name' => 'Sports', 'description' => 'Actualités sportives, résultats et analyses.'],
            ['name' => 'Culture', 'description' => 'Arts, traditions et événements culturels.'],
            ['name' => 'Politique', 'description' => 'Actualités politiques et analyses.'],
            ['name' => 'Environnement', 'description' => 'Écologie, développement durable et nature.'],
            ['name' => 'Science', 'description' => 'Découvertes scientifiques et innovations.'],
            ['name' => 'Divertissement', 'description' => 'Cinéma, musique, jeux et célébrités.'],
            ['name' => 'Immobilier', 'description' => 'Conseils sur l8\'chat, la vente et la location.'],
            ['name' => 'Automobile', 'description' => 'Actualités et tests sur les voitures.'],
            ['name' => 'Bricolage', 'description' => 'Projets DIY, conseils et astuces.'],
            ['name' => 'Parenting', 'description' => 'Conseils pour les parents et éducation des enfants.'],
            ['name' => 'Animaux', 'description' => 'Soins, santé et conseils pour les animaux.'],
            ['name' => 'Entrepreneuriat', 'description' => 'Conseils pour démarrer et gérer une entreprise.'],
            ['name' => 'Lifestyle', 'description' => 'Conseils pour une vie équilibrée et épanouie.'],
            ['name' => 'Philosophie', 'description' => 'Réflexions et débats philosophiques.'],
            ['name' => 'Histoire', 'description' => 'Chroniques historiques et récits du passé.'],
            ['name' => 'Psychologie', 'description' => 'Articles sur le comportement humain et le mental.'],
            ['name' => 'Beauté', 'description' => 'Soins de la peau, maquillage et coiffure.'],
            ['name' => 'Religion', 'description' => 'Articles sur la spiritualité et les religions.'],
            ['name' => 'Sécurité', 'description' => 'Conseils pour la sécurité en ligne et physique.'],
            ['name' => 'Technologie médicale', 'description' => 'Progrès technologiques dans le domaine médical.'],
            ['name' => 'Commerce', 'description' => 'Actualités et tendances du commerce et du marketing.'],
            ['name' => 'Événements', 'description' => 'Planification et actualités des événements.'],
        ];

        foreach ($categories as  $category) {
            Categorie::create($category);
        }
    }
}
