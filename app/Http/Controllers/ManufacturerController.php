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
        return view('manufacturer.index', ['manufacturers' => Manufacturer::paginate(6), 'count' => Manufacturer::count()]);
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

        return back()->with('status', [
            'title' => 'Success',
            'message' => 'Successfully added a new manufacturer.'
        ]);
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
    public function edit(Manufacturer $manufacturer)
    {
        return view('manufacturer.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManufacturerRequest $request, Manufacturer $manufacturer)
    {
        if(is_null($request->imagePath)) {
            $manufacturer->update([
                'name' => $request->name
            ]);
        }

        $manufacturer->update([
            'name' => $request->name,
            'imagePath' => $request->imagePath,
        ]);


        return view('manufacturer.index')->with('status', [
            'title' => 'Success',
            'message' => 'Successfully edited a manufacturer.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return back()->with('status', [
            'title' => 'Deletion',
            'message' => 'Successfully deleted manufacturer.'
        ]);
    }
}
