<?php

namespace App\Http\Controllers\backend;

use App\Models\Attendee;
use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;



class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items =  Attendee::orderBy('id', 'desc')->get();

        return view('backend.attendee.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $specialists= Specialist::all();
        return view('backend.attendee.create', compact('specialists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'specialist'=> 'required',
            'email'=> 'required',
            'password'=> 'required | confirmed | min:8',
            'photo'=> 'max:2048',
            'status'=> 'required',
            
        ]);


        $doctor =  new Attendee;

        $doctor->name = $request->name;
        $doctor->specialist_id= $request->specialist;
        $doctor->email = $request->email;
        $doctor->password = bcrypt( $request->password);
        $doctor->photo = $request->photo;
        $doctor->status = $request->status;
        $doctor->save();
 
       return redirect()->route('attendee.index')->with('msg', 'Created Successfully');
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
    public function destroy(string $id)
    {
        //
    }
}
