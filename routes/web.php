<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlHomes; // Assurez-vous que cette ligne est présente
use App\Http\Controllers\ControlUsers;
use App\Http\Controllers\ControlCategorys;
use App\Http\Controllers\ControlReservation;
use App\Http\Controllers\ControlAccueil;
use App\Http\Controllers\ControlMessages;
use App\Http\Controllers\ControlImages;
use App\Http\Controllers\ControlDashbord;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\ProfileController;

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







////
Route::get('/client', function () {
    return view('dashboard');
});


Route::get('/AffichMessage/{id}', [ControlMessages::class, 'show'])->name('AffichMessage');










Route::get('/', [ControlAccueil::class, 'affichHome'])->name('accueil');
Route::get('/message', [ControlMessages::class, 'affichMessage'])->name('message');
Route::post('/ajoutmessage', [ControlMessages::class, 'store'])->name('ajoutmessage');
Route::get('/detail/{id}', [ControlAccueil::class, 'affichdetail'])->name('detail');
Route::get('/HomeByCateg/{id}', [ControlAccueil::class, 'HomeByCategorie'])->name('HomeByCateg');


Route::post('/search', [ControlHomes::class, 'sarchbyid'])->name('search');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/reserver/{id}', [ControlAccueil::class, 'reserver'])->name('reserver');
    Route::resource('home', ControlHomes::class);
    Route::resource('user', ControlUsers::class);
    Route::resource('categorys', ControlCategorys::class);
    Route::resource('reservations', ControlReservation::class);
    Route::resource('messages', ControlMessages::class);

    Route::get('/image/{id}', [ControlImages::class, 'index'])->name('indexe.image');
    Route::get('/formImage/{id}', [ControlImages::class, 'create'])->name('create.image');
    Route::post('/ajoutImage/{id}', [ControlImages::class, 'store'])->name('store.image');
    Route::delete('/suprImage/{id}', [ControlImages::class, 'destroy'])->name('destroy.image');
    Route::get('/client', [ControlAccueil::class, 'reservationClient'])->name('reservationClient');
    Route::resource('dashboord', ControlDashbord::class);


    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
});

require __DIR__.'/auth.php';