<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Récupérer la classe par défaut de la session ou par défaut, utiliser la langue par défaut de l'application
        $locale = session('local', config('app.locale'));

        // Définir la langue de l'application à partir de la session 
        app()->setLocale($locale);

        // Continuer la session
        return $next($request);
    }
}
