<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReservationController;

Route::get('/', [EvenementController::class,'index'])->name('accueil');
Route::get('/sidebar', function () {
    return view('layouts.sidebarAssociation');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'registerUser'])->name('registerUser');

require __DIR__.'/auth.php';


Route::resource('evenements', EvenementController::class); // Exclure l'index des idées pour éviter la redondance
Route::get('liste', [EvenementController::class, 'liste'])->name('liste'); // Exclure l'index des idées pour éviter la redondance


Route::get('/preview-layout', function () {
    return view('layouts.footer')->with('content', '');
});


Route::controller(TesteController::class)->group(function () {
      Route::get('/liste_events_Ass','liste');
      Route::get('/liste_reserve_User','liste_reserve');
      Route::get('/liste_association_Admin','liste_association');
      Route::get('/liste_user_Ass','liste_user');
      Route::get('detail_events','detail_events');
});
Route::post('/reserver', [ReservationController::class, 'reserver'])->name('reserver');
