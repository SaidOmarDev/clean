<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

// Route::get('/brands', [BrandController::class, 'index']);
// Route::get('/brands/create', [BrandController::class, 'create']);
// Route::post('/brands', [BrandController::class, 'store']);
// Route::get('/brands/{brand}/edit', [BrandController::class, 'edit']);
// Route::post('/brands/{brand}', [BrandController::class, 'update']);
Route::middleware('auth')->group(function () {
    Route::inertia('/', 'Dash');
    Route::resource('brands', BrandController::class);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}/profile', [UserController::class, 'show']);
    Route::put('/users/{user}', [UserController::class, 'update']);
});

Route::get('/forgot-password', function () {
    return inertia('Auth/ForgotPassword');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function () {
    request()->validate([
        'email' => 'required|email'
    ]);

    $status = Password::sendResetLink(
        request()->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return inertia('Auth/ResetPassword', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function () {
    request()->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        request()->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $user->save();
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
