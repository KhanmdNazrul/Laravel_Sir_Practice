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
            'email'=> 'required|email',
            'password'=> 'required | confirmed | min:8',
            'photo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required',
            
        ]);

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath.$postImage;
        }else{
            $photo= 'images/nophoto.jpg';
        }

        $doctor =  new Attendee;

        $doctor->name = $request->name;
        $doctor->specialist_id= $request->specialist;
        $doctor->email = $request->email;
        $doctor->password = bcrypt( $request->password);
        $doctor->photo = $photo;
        $doctor->status = $request->status;
        $doctor->save();
 
       return redirect()->route('attendee.index')->with('msg', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendee $attendee)
    {
        return view('backend.attendee.show', compact('attendee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendee $attendee)
    {
        $specialists= Specialist::all();
       return view('backend.attendee.edit', compact('attendee', 'specialists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendee $attendee)
    {
        $request->validate([
            'name'=> 'required',
            'specialist'=> 'required',
            'email'=> 'required|email',
            'photo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required',
            
        ]);
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath.$postImage;
        }else{
            $photo =$attendee->photo;
        }
        $attendee->name = $request->name;
        $attendee->specialist_id= $request->specialist;
        $attendee->email = $request->email;
        $attendee->photo = $photo;
        $attendee->status = $request->status;
        $attendee->update();
 
       return redirect()->route('attendee.index')->with('msg', 'Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendee $attendee)
    {
        // $attendee = Attendee::find($id);
        $attendee->delete();
        return redirect()->route('attendee.index')->with('msg', 'Deleted Successfully');
    }
}
