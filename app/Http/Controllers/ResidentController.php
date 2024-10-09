<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Properties;
use App\Models\User;
use Auth;
class ResidentController extends Controller
{
    public function index()
    {
              // dd(Auth::user()); // Check if the user is logged in
        // $userId = Auth::user()->id;
        // $residents = Resident::where('user_id', $userId)->get();

       if(Auth::User()->status == User::STATUS_ADMIN_USER){

        $residents = Resident::orderBy("id", "desc")->get();

        return view('residents.index', compact('residents'));
       }
       else
       {
        return redirect()->route('dashboard');
       }
    }
    

    public function create()
    {
        $properties = Properties::all();
        return view('residents.create', compact('properties'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        // Create and save the user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), 
        ]);
    
        // Create the resident and associate it with the saved user
        Resident::create(array_merge($request->all(), ['user_id' => $user->id]));
    
        // Redirect with success message
        return redirect()->route('resident.index')
            ->with('success', 'Resident created successfully.');
    }
    

    public function update(Request $request, $id)
    {
        $residents = Resident::find($id);

        $request->validate([
            'name' => 'required',
        ]);
        $residents->update($request->all());

        return redirect()->route('resident.index')
            ->with('success', 'Resident updated successfully');
    }



    public function edit($id)
    {
        $properties = Properties::all();

        $resident = Resident::find($id);
        // dd($resident);
        return view('residents.edit', compact('resident', 'properties'));
    }



    public function show()
    {
        return;
    }


    public function destroy($id)
    {
        $resident = Resident::find($id);
        $resident->delete();
               
        return redirect()->route('resident.index')
        ->with('success', 'Residents Deleted successfully');
    }
}
