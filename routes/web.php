<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\RegistroUsuario;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');



Auth::routes(['register'=>false]);
Route::get('user/login', 'HomeController@login')->name('login.form');
Route::post('user/login', 'HomeController@loginSubmit')->name('login.submit');
Route::get('user/logout', 'HomeController@logout')->name('user.logout');
Route::get('register', [HomeController::class, 'register'])->name('register.form');
Route::post('register', [HomeController::class, 'registerSubmit'])->name('register.submit');
// Reset password
Route::post('password-reset', 'HomeController@showResetForm')->name('password.reset');
// Socialite
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');
Route::get('/medicamentos',[App\Http\Controllers\MedicamentosController::class, 'list']); // Obtener los medicamentos

Route::get('inicio', [HomeController::class, 'inicio'])->name('inicio');
Route::get('profile', [HomeController::class, 'profile'])->name('profile');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('medicine', [HomeController::class, 'medicine'])->name('medicine');
Route::get('mail', [HomeController::class, 'mail'])->name('mail');

Route::post('confirmar-pedido', [App\Http\Controllers\PedidoController::class, 'confirmarPedido'])->name('confirmar-pedido');;

Route::get('/category/{id}', [HomeController::class, 'category'])->name('frontend.category');




//Admin dashboard
Route::group(['prefix'=>'admin/','middleware'=>'auth'],function(){
    Route::get('/',[App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
//medicamentos
    Route::resource('/banner', App\Http\Controllers\BannerController::class);
    Route::resource('/medicamento', App\Http\Controllers\MedicamentosController::class);
    Route::resource('/categories', App\Http\Controllers\CategoryController::class);
    Route::resource('/users', App\Http\Controllers\UsersController::class);
    Route::resource('/pedidos', App\Http\Controllers\PedidoController::class);
    Route::resource('/ventas', App\Http\Controllers\VentaController::class);
    Route::resource('/facturas', App\Http\Controllers\SistemaFactura::class);
    Route::get('/medicamentos',[App\Http\Controllers\MedicamentosController::class, 'list']); // Obtener los medicamentos
    Route::post('/registrar-compra',[App\Http\Controllers\MedicamentosController::class, 'confirmarCompra']);
    Route::post('/filtrar',[App\Http\Controllers\MedicamentosController::class, 'filter'])->name('filtrar');

    Route::get('medicamento/{id}/edit', 'MedicamentosController@edit')->name('medicamento.edit');

    Route::patch('medicamentos/{id}',  [MedicamentosController::class, 'update'])->name('medicamentos.update');

});


