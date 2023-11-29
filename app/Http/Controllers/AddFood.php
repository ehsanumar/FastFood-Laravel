<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class AddFood extends Controller
{
    public function AddItem($id)
    {
        $item = Item::findOrFail($id);
        $food=\App\Models\addFood::create([
            'user_id' => auth()->id(),
            'item_id' => $id,
        ]);
        return back();
    }
    public function removeItem($id)
    {
        $item = \App\Models\addFood::findOrFail($id);
        $item->delete();
        return back();
    }
}
