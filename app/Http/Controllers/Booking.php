<?php

namespace App\Http\Controllers;

use App\Models\Booking as ModelsBooking;
use Illuminate\Http\Request;

class Booking extends Controller
{
    public function Booking(Request $request){
        // dd($request);
        $Booking = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'request' => 'required|max:250',
            'num' => 'required|integer',
            'date' => 'required|date',
        ]);
        // dd($Booking);
        $newBooking= ModelsBooking::create([
            'email' => $Booking['email'],
            'name' => $Booking['name'],
            'request' => $Booking['request'],
            'people' => $Booking['num'],
            'date' => $Booking['date'],
        ]);
        return back();
    }
    public function removerequest($id)
    {
        $item = ModelsBooking::findOrFail($id);
        $item->delete();
        return back();
    }
}
