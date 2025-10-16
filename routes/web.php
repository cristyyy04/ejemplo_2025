<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MessageController;
/*
Route::get('/', ['as' => 'home', function () {

    return view('home');
}]);

Route::get('/saludos/{nombre?}', ['as' => 'saludos', function ($nombre="Invitado") {

    return view('saludos',compact('nombre'));
}])->where('nombre',"[A-Za-z]+");

Route::get('/contactos', ['as' => 'contactos', function () {

    return view('contactos');
}]);
*/

//Route::get('/', [PagesController::class, 'home'])->name('home');
//Route::get('contactos', [PagesController::class, 'contact'])->name('contactos');
Route::get('saludos/{nombre?}',  [PagesController::class, 'saludos'])->where('nombre', "[A-Za-z]+")->name('saludos');
//Route::resource('messages', MessageController::class);
Route::resource('messages', MessageController::class);
/*
Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('messages/{id?}/edit/', [MessageController::class, 'edit'])->name('messages.edit');
Route::put('messages/{id}', [MessageController::class, 'update'])->name('messages.update');

Route::get('messages/{id?}', [MessageController::class, 'show'])->name('messages.show');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
Route::delete('messages/{id?}', [MessageController::class, 'destroy'])->name('messages.destroy');
*/


Route::view('/', 'welcome')->name('home');
Route::view('/contactos', 'contactos')->name('contactos');

Route::resource('messages', MessageController::class, [
    'names' => 'messages',
    'parameters' => ['message' => 'message']
]);

Route::view('/sobre', 'sobre')->name('sobre');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);