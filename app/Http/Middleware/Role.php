<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{

public function handle(Request $request, Closure $next)
{
     if (Auth::user()->is_admin == 1) { // if the current role is Administrator
     	return $next($request);
     }
    
    return response()->json(['error' => 'You do not have access to this resource'], 403);
  }
}