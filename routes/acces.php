<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Routes accessibles à tous les utilisateurs authentifiés (clients et admin)
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/client', function () {
//         return view('client.clients');
//     })->name('client.clients');
    
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
//     // Vue clients accessible seulement aux utilisateurs authentifiés
//     // Route::get('/clients', function() {
//     //     return view('clients');
//     // })->name('clients');
// });


// Routes accessibles uniquement aux administrateurs
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    
   
});

require __DIR__.'/auth.php';