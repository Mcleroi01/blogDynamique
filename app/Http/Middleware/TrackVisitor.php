<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use App\Models\Visiteur;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        logger('handle');
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();

        $article = $request->route('article');
        $articleId = $article ? $article->_id : null;

        logger('articleId: ' . $articleId);

        if ($articleId) {
            $shop = Article::where('_id', $articleId)->first();

            if ($shop) {

                $existingVisit = Visiteur::where('ip_address', $ipAddress)
                    ->where('article_id', $articleId)
                    ->exists();
                if (!$existingVisit) {
                    try {
                        Visiteur::create([
                            'ip_address' => $ipAddress,
                            'user_agent' => $userAgent,
                            'article_id' => $shop->id
                        ]);

                        if ($article->visits_count === null) {
                            $article->visits_count = 0;
                        }
                        $article->increment('visits_count');
                    } catch (\Exception $e) {
                        logger($e->getMessage());
                    }
                }

              
            }
        }






        return $next($request);
    }
}