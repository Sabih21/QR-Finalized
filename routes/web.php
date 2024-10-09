<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\VisitorAccessController;
// use App\Http\Middleware\CheckUserStatus;
use Illuminate\Support\Facades\Route;

use App\Mail\SendVisitorAccessMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return redirect('/login');;
});

Route::get('/generateqr/{hash}', function ($hash) {
    // Debugging the $id parameter
    // dd($id);

    // Generate and return a QR code
    $d = QrCode::size(500)->generate($hash); // You can replace 'Hello, World!' with $id or any other data.
    $html = "<style>*{margin:0px;padding:0px;}</style><div style='width:100vw; height:100vh; display:flex; justify-content:center; align-items:center'>";
    $html .= $d;
    return $html;

});

Route::get('/dashboard',[ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('residents', ResidentController::class);

});
Route::resource('visitors', VisitorController::class);
Route::resource('vaccess', VisitorAccessController::class);



Route::middleware(['isAdmin'])->group(function () {
    Route::resource('resident', ResidentController::class);
    Route::resource('properties', PropertyController::class);
});

Route::get('/testroute', function() {
});

require __DIR__.'/auth.php';
