<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visiteur extends Model
{
    /** @use HasFactory<\Database\Factories\VisiteurFactory> */
    use HasFactory;

    protected $fillable = ['_id','ip_address', 'user_agent','article_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->_id = (string) Str::uuid();
        });
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
