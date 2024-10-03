<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Resources\UnitResource;
use Illuminate\Support\Facades\Auth;


class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return UnitResource::collection($units);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $request['author'] = Auth::user()->id;

        $unit = Unit::create($request->all());
        return new UnitResource($unit);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update($request->all());
        return new UnitResource($unit);
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return new UnitResource($unit);
    }
}
