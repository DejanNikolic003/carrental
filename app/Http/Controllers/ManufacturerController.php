<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufacturerRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Helpers\AppHelper;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('manufacturer.index', ['manufacturers' => Manufacturer::all(), 'count' => Manufacturer::count()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManufacturerRequest $request)
    {
        if(!$request->hasFile('imagePath')) {
            return back()->with('status', 'Nope.');
        }

        $path = AppHelper::imageUpload($request->file('imagePath'), 'manufacturers');

        Manufacturer::create([
            'name' => $request->name,
            'imagePath' => $path,
        ]);

        return back()->with('status', 'Successfully added a new manufacturer.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return back()->with('status', 'Successfully deleted a manufacturer.');
    }
}
