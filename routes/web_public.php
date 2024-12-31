<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicArticleController;

Route::get('/articles/categories/{categoryName}/', [PublicArticleController::class,'articlesByCategory'])->name('articles.byCategory');
Route::get('articles/{article:_id}/{slug}/post', [PublicArticleController::class, 'showPublicArticle'])->name('showPublicArticle');