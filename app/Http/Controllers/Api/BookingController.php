<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);
        $room = Room::findOrFail($validated['room_id']);
        $days = (new \DateTime($validated['check_in']))->diff(new \DateTime($validated['check_out']))->days;
        $total_price = $room->price * $days;
        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'room_id' => $room->id,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'total_price' => $total_price,
            'status' => 'pending',
        ]);
        return response()->json($booking, 201);
    }
    public function index(Request $request)
    {
        return $request->user()->bookings()->with('room.hotel')->get();
    }
}