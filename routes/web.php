<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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
    return view('auth.login');
});
// routes/web.php

Route::get('/trabajador/dashboard', function(){
    return view('trabajador.dashboard');
})->name('trabajador.dashboard');

Route::get('/administrador/dashboard', function(){
    return view('administrador.dashboard');
})->name('administrador.dashboard');


// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->rol === 'administrador') {
            return redirect()->route('administrador.dashboard');
        } elseif ($user->rol === 'trabajador') {
            return redirect()->route('trabajador.dashboard');
        } else {
            return redirect()->route('home');
        }
    })->name('dashboard');
});

// Rutas adicionales según necesidades...


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
