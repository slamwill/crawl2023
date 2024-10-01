<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Coach;
use App\Models\Location;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $coach = Coach::findOrFail($request->coach_id);
        $location = Location::findOrFail($request->location_id);

        $totalCost = $coach->hourly_rate + $location->hourly_rate;
        $platformFee = $totalCost * 0.10;

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'coach_id' => $coach->id,
            'location_id' => $location->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_cost' => $totalCost,
            'platform_fee' => $platformFee,
        ]);

        return redirect('/bookings');
    }
}
