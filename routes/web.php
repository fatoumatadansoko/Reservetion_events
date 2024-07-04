<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\Auth\RegisteredUserController;



Route::get('/', [EvenementController::class, 'index'])->name('accueil');
Route::resource('evenements', EvenementController::class)->only(['index', 'show']);
Route::get('liste', [EvenementController::class, 'liste'])->name('liste');
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'registerUser'])->name('registerUser');

require __DIR__ . '/auth.php';


// Routes pour l'admin
Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/liste_association_Admin', [AssociationController::class, 'liste_association'])->middleware(['auth', 'verified'])->name('liste.association');
    Route::patch('/admin/associations/{id}/toggle-status', [AssociationController::class, 'toggleAssociationStatus'])->middleware(['auth', 'verified'])->name('toggle.association.status');
    Route::get('liste.events', [EvenementController::class, 'listeEvents'])->middleware(['auth', 'verified'])->name('liste.events');
    Route::get('/users', [UtilisateurController::class, 'index'])->middleware(['auth', 'verified'])->name('users.index');
    Route::get('/users/{id}/edit', [UtilisateurController::class, 'editUser'])->middleware(['auth', 'verified'])->name('users.edit');
    Route::put('/users/{id}', [UtilisateurController::class, 'updateUser'])->middleware(['auth', 'verified'])->name('users.update');
    Route::delete('/users/{id}', [UtilisateurController::class, 'destroy'])->middleware(['auth', 'verified'])->name('users.delete');
});

// Routes pour l'association

Route::middleware('association')->group(function () {
    Route::resource('associations', AssociationController::class)->middleware(['auth', 'verified']);
    Route::resource('evenements', EvenementController::class)->except(['index', 'show']);
    //la route pour la liste des réservations
    Route::get('reservation_person/{evenement_id}/reservations', [ReservationController::class, 'liste_person_reserve_events']);

    Route::post('/reserverdecline', [ReservationController::class, 'reserverdecline'])->name('reserverdecline');
});


// Routes pour l'utilisateur
Route::middleware('utilisateur')->group(function () {
    Route::post('/reserver', [ReservationController::class, 'reserver'])->middleware(['auth', 'verified'])->name('reserver');
    Route::put('updatePhoto', [UtilisateurController::class, 'updatePhoto'])->name('user.updatePhoto')->middleware(['auth', 'verified']);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('utilisateur', UtilisateurController::class)->middleware(['auth', 'verified']);





Route::post('/reservations/{idee}/approve', [ReservationController::class, 'approve'])->middleware(['auth', 'verified'])->name('reservations.approve');
Route::post('/reservations/{idee}/reject', [ReservationController::class, 'reject'])->middleware(['auth', 'verified'])->name('reservations.reject');
