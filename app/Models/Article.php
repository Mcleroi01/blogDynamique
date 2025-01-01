<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = ['_id','titre', 'contenu', 'categorie_id', 'image', 'mis_a_la_une'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->_id = (string) Str::uuid();
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }


    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }

    public function scopeMisALaUne($query)
    {
        return $query->where('mis_a_la_une', true);
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->title);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}