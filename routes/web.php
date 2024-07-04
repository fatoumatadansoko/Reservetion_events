<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Auth\RegisteredUserController;



Route::get('/', [EvenementController::class,'index'])->name('accueil');
// Routes pour l'admin
Route::group(['middleware' => ['role:admin']], function () {

});
Route::get('/dashboard',[AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour l'association
Route::group(['middleware' => ['role:association']], function () {
    Route::resource('reservation', ReservationController::class);

});

// Routes pour l'utilisateur
Route::group(['middleware' => ['role:user']], function () {
    Route::resource('reservation', ReservationController::class);

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/liste_association_Admin',[AssociationController::class, 'liste_association'])->name('liste.association');
Route::patch('/admin/associations/{id}/toggle-status', [AssociationController::class, 'toggleAssociationStatus'])->name('toggle.association.status');
Route::get('liste.events', [EvenementController::class, 'listeEvents'])->name('liste.events'); // Exclure l'index des idées pour éviter la redondance


Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'registerUser'])->name('registerUser');

require __DIR__.'/auth.php';

Route::resource('evenements', EvenementController::class); // Exclure l'index des idées pour éviter la redondance
Route::get('liste', [EvenementController::class, 'liste']); // Exclure l'index des idées pour éviter la redondance
Route::resource('associations', AssociationController::class);
Route::get('liste', [EvenementController::class, 'liste'])->name('liste'); // Exclure l'index des idées pour éviter la redondance

Route::get('/users', [UtilisateurController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UtilisateurController::class, 'editUser'])->name('users.edit');
Route::put('/users/{id}', [UtilisateurController::class, 'updateUser'])->name('users.update');
Route::delete('/users/{id}', [UtilisateurController::class, 'destroy'])->name('users.delete');





Route::post('/reserver', [ReservationController::class, 'reserver'])->name('reserver');

Route::post('/reserverdecline', [ReservationController::class, 'reserverdecline'])->name('reserverdecline');

Route::resource('utilisateur', UtilisateurController::class);

//la route pour update photo profile
Route::put('updatePhoto',[UtilisateurController::class,'updatePhoto'])->name('user.updatePhoto') ;


Route::post('/reservations/{idee}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');
Route::post('/reservations/{idee}/reject', [ReservationController::class, 'reject'])->name('reservations.reject');


//la route pour la liste des réservations
Route::get('reservation_person/{evenement_id}/reservations',[ReservationController::class,'liste_person_reserve_events']);
