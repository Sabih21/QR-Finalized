<?php

namespace App\Http\Controllers;


use App\Mail\SendVisitorAccessMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Visitoraccess;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Facades\Hash;

class VisitorAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $vis = $request->input();
        $vaccess = VisitorAccess::where(["visitor_id" => $vis["id"]])->withTrashed()->orderBy("id", "desc")->get();

        $visitor = Visitor::find($vis["id"]);
        // dd($visitor->Status);
        return view('vaccess.index',compact('vaccess', 'visitor') );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $vis = $request->input();
        
        return view('vaccess.create',compact('vis'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
    
        // Create a new Visitoraccess entry using the validated data
        $access = Visitoraccess::create([
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'visitor_id' => $request->input('visitor_id'), // Access visitor_id correctly
            'secret' => Hash::make(rand(1,100) . rand(1,100) . rand(1,100) )
        ]);

        $visitor = Visitor::find($request->input('visitor_id'));

        Mail::to($visitor->email)->send(new SendVisitorAccessMail(env("APP_URL"). "/generateqr/". $access->secret, $request->input('start_time') , $request->input('end_time')));

        return redirect()->route('vaccess.index', ["id" => $request->input("visitor_id")])
            ->with('success', 'Visitor access created successfully, Email with QR has been sent to visitor email.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        return view('vaccess.edit');
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
    public function destroy(string $id)
    {

        $access = Visitoraccess::find($id);

        $access->delete();

        

        return redirect()->back()
        ->with('success', 'Visitors Access Deactivated successfully');


    }
}
