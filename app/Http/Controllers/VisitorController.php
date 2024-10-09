<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Resident;
use Auth;

class VisitorController extends Controller
{
     public function index()
    {
        //  dd(Auth::user()->resident); // Check if the user is logged in
        
        $visitors = Auth::user()->resident->visitors;
        // dd($visitors);
        return view('visitors.index', compact('visitors'));
    }

    public function create()
    {

        $residents = Resident::all();
        return view('visitors.create', compact('residents'));
    }

    public function store(Request $request)
    {

        // dd($request = Auth::user()->resident->id);
        // dd($request->all());

            $request->validate([
            'name' => 'required',
            ]);
        
        $visitors = new Visitor([
        'resident_id' => Auth::user()->resident->id,

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'qr_code' => $request->input('qr_code'), 
            'phone_number' => $request->input('phone_number'),
            
        ]);
        
        $visitors->save();
        // dd($visitors);
        return redirect()->route('visitors.index')
            ->with('success', 'Visitors created successfully.');
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $visitors = Visitor::find($id);

        $request->validate([
            // 'name' => 'required',
        ]);

        $visitors->update($request->all());
        // dd($visitors);

        return redirect()->route('visitors.index')
            ->with('success', 'properties updated successfully');
    }



    public function edit($id)
    {
        // $visitors = Visitors::all();
        $residents = Resident::all();

        $visitors = Visitor::find($id);
        return view('visitors.edit', compact('visitors' ,'residents'));
    }



    public function show()
    {
        return;
    }


    public function destroy($id)
    {
        $visitors = Visitor::find($id);
        $visitors->delete();

        return redirect()->route('visitors.index')
        ->with('success', 'Visitors Deleted successfully');
    }
}