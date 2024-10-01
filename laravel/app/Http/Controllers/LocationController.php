<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        // $locations = Location::all();
        $locations = Location::paginate(10);
        // dd($locations);
        return view('locations.index', compact('locations'));
    }

    public function show($id)
    {
        $location = Location::findOrFail($id);
        return view('locations.show', compact('location'));
    }
}