<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackagingResource;
use App\Models\Packaging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackagingController extends Controller
{

    public function index(Request $request)
    {
        $packaging = Packaging::all();
        return PackagingResource::collection($packaging->loadMissing(['unit:id,name,description']));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'material' => 'required',
            'is_waterproof' => 'required',
            'unit_id' => 'required|exists:units,id'
        ]);

        $request['author'] = Auth::user()->id;
        $request['unit_id'] = $request->unit_id;

        $packaging = Packaging::create($request->all());

        return new PackagingResource($packaging->loadMissing(["pembuat:id,username", "unit"]));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'material' => 'required',
            'is_waterproof' => 'required',
            'unit_id' => 'required|exists:units,id'
        ]);

        $packaging = Packaging::findOrFail($id);
        $packaging->update($request->all());

        return new PackagingResource($packaging->loadMissing(['pembuat:id,username', 'unit']));
    }

    public function destroy($id)
    {
        $packaging = Packaging::findOrFail($id);
        $packaging->delete();

        return new PackagingResource($packaging->loadMissing(['pembuat:id,username', 'unit']));
    }
}
