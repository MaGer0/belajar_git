<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Packaging;

class PemilikPackaging
{

    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();
        $packaging = Packaging::findOrFail($request->id);


        if ($packaging->author != $currentUser->id) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return $next($request);
    }
}
