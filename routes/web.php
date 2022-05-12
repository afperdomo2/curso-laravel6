<?php

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

use App\Post;
use App\User;

use function PHPUnit\Framework\callback;

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('users', 'UserController@index')->name('users.index');
Route::post('users', 'UserController@store')->name('users.store');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

Route::view('posts', 'posts', [
    'posts' => Post::where('id', '<=', 10)->get()
])->name('posts')->middleware('auth');

Route::get('collections', function () {
    $users = User::all();
    //dd($users);
    //dd($users->contains(7));// Verifica si existe un id
    //dd($users->except([1, 2]));
    //dd($users->only(5));
    //dd($users->find(5));// A diferencia de only, esta accede inmediatamente a los datos de ese objeto
    dd($users->load('posts'));// Carga la relación 'posts' a la colección retornada
});

Route::get('serializations', function () {
    $users = User::all();
    //dd($users->toArray());// Convierte la colección en un array en vez de un objeto
    //dd($users->toJson());// Convierte la colección en un objeto json
    dd($users->find(4)->toJson());
});
