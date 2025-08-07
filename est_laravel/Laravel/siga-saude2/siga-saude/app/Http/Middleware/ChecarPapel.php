<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChecarPapel
{
public function handle(Request $request, Closure $next, string $papel = null)
{
    $user = $request->user();
    if (!$user || $user->tipo !== $papel) {
        abort(403, 'ACESSO NEGADO'); // Erro "Forbidden"
    }
    return $next($request);
}
};


