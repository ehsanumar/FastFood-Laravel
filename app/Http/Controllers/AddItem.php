<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class AddItem extends Controller
{
    public function addItemadmin(Request $request)
    {
       // dd($request);
        $Booking = $request->validate([
            'name' => 'required|min:3|alpha',
            'quantity' => 'required|min:1',
            'price' => 'required|min:1|numeric',
            'description' => 'required|max:300',
            'image' => 'required',
            'category' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->StoreAs('public/images', $imageName);
        // Save the $imageName in the database column for later retrieval
        $newBooking = Item::create([
            'quantity' => $Booking['quantity'],
            'name' => $Booking['name'],
            'price' => $Booking['price'],
            'image' => $imageName, // Store the file name in the database
            'description' => $Booking['description'],
            'category_id' => $Booking['category'],
        ]);

        return back();
    }
    public function removeItemadnmin($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return back();
    }
}
