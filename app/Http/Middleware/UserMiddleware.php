<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
//this middleware to check the role of the user
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {$user= Auth::user();
     if(!$user || !$user->hasRoles('admin'))
     {
       return response()->json(['error'=> 'Unauthorized'],403);
    }
        return $next($request);
    }
}
