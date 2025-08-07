<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChecarPapel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$papeis): Response
    {
        $user = $request->user();

        if (!$user || !in_array($user->tipo, $papeis)) {
            abort(403, 'ACESSO NEGADO'); // Erro "Forbidden"
        }
        return $next($request);
    }
}
