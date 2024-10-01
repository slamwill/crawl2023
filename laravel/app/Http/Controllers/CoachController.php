<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        // $coaches = Coach::all();
        $coaches = Coach::paginate(10);
        return view('coaches.index', compact('coaches'));
    }

    public function show($id)
    {
        $coach = Coach::findOrFail($id);
        return view('coaches.show', compact('coach'));
    }
}