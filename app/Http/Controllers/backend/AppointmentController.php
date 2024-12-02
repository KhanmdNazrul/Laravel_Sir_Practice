<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Attendee;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Appointment::orderBy('name')->get();
        return view('backend.appointments.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Attendees = Attendee::orderBy('name')->get();
        return view('backend.appointments.create', compact('Attendees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'date'=>'required',
            'attendee'=>'required',
            'remarks'=>'required'
        ]);

        $appointment = new Appointment;

        $appointment->name=$request->name;
        $appointment->email=$request->email;
        $appointment->phone=$request->phone;
        $appointment->date=$request->date;
        $appointment->attendee_id=$request->attendee;
        $appointment->remarks=$request->remarks;

        $appointment->save();

        return redirect()->route('appointment.index')->with('msg', "Successfully appointment done");
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function changeStatus($id)
    {
        $record = Appointment::find($id);
        $record->status == 'pending' ? $record->status = 'confirmed' : $record->status = 'pending' ;

        $record->update();

        return redirect()->back();
    }
}
