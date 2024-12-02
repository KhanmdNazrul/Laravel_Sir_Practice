<?php

namespace App\Http\Controllers\frontend;

use App\Models\Attendee;
use App\Models\Specialist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $doctors = Attendee::orderBy('name')->get();
        $specialists = Specialist::orderBy('name')->limit(5)->get();
        return view('frontend.home', compact('doctors', 'specialists'));
    }
}
