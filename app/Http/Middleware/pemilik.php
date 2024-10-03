<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;

class pemilik
{
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();
        $unit = Unit::findOrFail($request->id);


        if ($unit->author != $currentUser->id) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return $next($request);
    }
}
