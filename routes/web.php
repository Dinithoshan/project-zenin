<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('note', NoteController::class);
});




#CRUD Routes for the notes
// Route::get('/note', [NoteController::class,'index'])->name('note.index');
// Route::get('/note/create', [NoteController::class,'create'])->name('note.create');
// Route::get('note/{id}', [NoteController::class, 'show'])->name('note.show');
// Route::post('/note/{id}', [NoteController::class, 'store'])->name('note.store');
// Route::put ('note/{id}', [NoteController::class,'update'])->name('note.update');
// Route::delete ('note/delete/{id}', [NoteController::class, 'destroy'])->name('note.delete');

//This single comment replaces all the lines in the above comments
// Route::resource('note', NoteController::class);


require __DIR__.'/auth.php';
