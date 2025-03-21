<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('actualites');
});

Route::get('/connection', function () {
    return view('login');
});

Route::get('/inscription', function () {
    return view('register');
});

// Route::get('/client', function () {
//     return view('client.clients');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/client', function () {
    return view('client.clients'); 
})->middleware(['auth'])->name('client');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/produits/store', [ProduitController::class, 'show'])->name('produits.store');
    Route::get('/produits/index', [ProduitController::class, 'index'])->name('produits.index');
    Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
    


});

require __DIR__.'/auth.php';
