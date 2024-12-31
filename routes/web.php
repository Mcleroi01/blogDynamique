<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/',[PublicArticleController::class,'indexPublicArticle'] )->name('publicArticle');
Route::get('/articles/categories/{categoryName}/', [PublicArticleController::class, 'articlesByCategory'])->name('articles.byCategory');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth',)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    // Gestion des utilisateurs
    Route::resource('users', UserController::class);

    // Gestion des rôles et permissions
    Route::get('/admin/roles-permissions', [RolePermissionController::class, 'index'])->name('admin.roles-permissions');
    Route::get('/users-roles', [RolePermissionController::class, 'getUsersRoles'])->name('roles.users.index');
    Route::get('/roles-permissions', [RolePermissionController::class, 'getRolesPermissions'])->name('roles.permissions.index');
    Route::post('/users/roles/update', [RolePermissionController::class, 'updateUserRole'])->name('users.roles.update');
    Route::post('/roles-permissions/update', [RolePermissionController::class, 'updateRolePermissions'])->name('roles.permissions.update');

    // Routes pour les articles
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('articles/{article}/{slug}', [ArticleController::class, 'show'])->name('articles.show');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/articles/{article:_id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/articles/update', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/web_public.php';