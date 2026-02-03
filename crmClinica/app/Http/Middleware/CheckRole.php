<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Importação importante!

class CheckRole
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string ...$roles 
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        if (!Auth::check()) {
            return redirect()->route("login");
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // 2. Trava para usuários pendentes
        if ($user->role === "userUnregister") {
            abort(403, "Sua conta ainda aguarda aprovação.");
        }

        if ($user->role === "superAdmin") {
            return $next($request);
        }

        // 4. Verifica se o cargo está na lista permitida
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        abort(403, "Acesso negado");
    }
}