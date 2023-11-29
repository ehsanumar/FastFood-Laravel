<?php

use App\Models\Category;
use App\Models\Item;
use App\Http\Controllers\AddFood;
use App\Http\Controllers\AddItem;
use App\Http\Controllers\Booking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\addFood as ModelsAddFood;
use App\Models\Booking as ModelsBooking;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('/booking', [Booking::class, 'Booking'])->middleware(['auth'])->name('booking');
Route::post('/item', [AddItem::class, 'addItemadmin'])->middleware(['auth'])->name('addItemadmin');

Route::get('/menu/drinks', function () {
    return view('menu', [
        'drinks' => Item::where('category_id', 1)->get(),
    ]);
})->name('drinks');


Route::get('/menu/fastfood', function () {
    return view('fastfood', [
        'fastfood' => Item::where('category_id', 2)->get(),
    ]);
})->name('fastfood');


Route::get('/menu/traditionalfood', function () {
    return view('trad', [
        'traditionalfood' => Item::where('category_id', 3)->get(),
    ]);
})->name('traditionalfood');

Route::get('/myitems', function () {
    return view('myItems', [
        'items' => ModelsAddFood::with('item')->where('user_id', auth()->id())->get(),
    ]);
})->middleware(['auth'])->name('myitems');

Route::get('/admin/request', function () {
    return view('Request', [
        'request' => ModelsAddFood::with(['item', 'user'])->latest()->get(),
    ]);
})->middleware(['auth'])->name('request');
Route::get('/admin/booking', function () {
    return view('booking-admin', [
        'booking' => ModelsBooking::latest()->get(),
    ]);
})->middleware(['auth'])->name('booking.admin');
Route::get('/allitems', function () {
    return view('allitem', [
        'items' => Item::with('category')->latest()->paginate(9),
    ]);
})->middleware(['auth'])->name('allitem');

Route::view('ourteam', 'ourteam')->name('ourteam');
Route::view('booking', 'booking')->name('booking');
Route::view('feadback', 'feadback')->name('feadback');
Route::view('contact', 'contact')->name('contact');
Route::view('about', 'about')->name('about');
Route::post('/additem/{id}',[AddFood::class,'AddItem'])->middleware(['auth'])->name('addItem');
Route::post('/removeitem/{id}',[AddFood::class,'removeItem'])->middleware(['auth'])->name('removeItem');
Route::post('/removeItemadnmin/{id}',[AddItem::class, 'removeItemadnmin'])->middleware(['auth'])->name('removeItemadnmin');
Route::post('/removerequest/{id}',[Booking::class, 'removerequest'])->middleware(['auth'])->name('removerequest');
Route::get('/dashboard', function () {

    return view('dashboard',[
        'Users' => User::count(),
        'Request' => ModelsAddFood::count(),
        'Booking' => ModelsBooking::count(),
        'Item' => Item::count(),
        'category'=>Category::get(['type','id']),
    ]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
