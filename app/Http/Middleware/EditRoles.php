<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Gate;

class EditRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            /**
             * @var $user User
             */
            $user = auth()->userOrFail();

            if (Gate::forUser($user)->denies('manage-categories')) {
                return response()->json([
                    'success' => false,
                    'data' => 'access denied.',
                ]);
            }

        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json([
               'success' => false,
               'data' => 'login required.',
            ]);
        }

        return $next($request);
    }
}
