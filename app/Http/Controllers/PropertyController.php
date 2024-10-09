<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Properties;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Properties::orderBy("id", "desc")->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $properties = Properties::all();
        return view('properties.create', compact('properties'));
    }

    public function store(Request $request)
    {

        $request->validate([
            
            // 'name' => 'required',
        ]);
        
        // dd($request->all());

        Properties::create($request->all());

        return redirect()->route('properties.index')
            ->with('success', 'Properties created successfully.');
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $properties = Properties::find($id);

        $request->validate([
            // 'name' => 'required',
        ]);

        $properties->update($request->all());
        // dd($properties);

        return redirect()->route('properties.index')
            ->with('success', 'properties updated successfully');
    }



    public function edit($id)
    {
        $properties = Properties::all();

        $properties = Properties::find($id);
        // dd($Properties);
        return view('properties.edit', compact('properties', 'properties'));
    }



    public function show()
    {
        return;
    }


    public function destroy($id)
    {
        $properties = Properties::find($id);
        $properties->delete();

        return redirect()->route('properties.index')
        ->with('success', 'Properties Deleted successfully');
    }
}
