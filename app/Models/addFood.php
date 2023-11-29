<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class addFood extends Model
{
    use HasFactory;
    protected $table='addfood';
    protected $fillable=[
        'user_id','item_id'
    ];
    public function item()
    {
        return $this->belongsTo(Item::class,'item_id'); // Assuming 'Item' is the related model
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id'); // Assuming 'Item' is the related model
    }
}
