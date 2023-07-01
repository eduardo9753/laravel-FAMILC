<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoginContoller;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\ContactoControllerCliente;
use App\Http\Controllers\EmpresaControllerCliente;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\ProductControllerClient;
use App\Models\Product;
use Illuminate\Auth\Events\Login;
use Illuminate\Routing\Router;
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

/**VISTA DE LA TIENDA */
//CONTROL HOME
Route::get('/', HomeController::class)->name('home');

Route::get('/product/{category}', [ProductControllerClient::class, 'index'])->name('product.index');
Route::get('/product/show/{product:slug}', [ProductControllerClient::class, 'show'])->name('product.show'); //le pasamos toda la clase $product desde el index
Route::get('/empresa', [EmpresaControllerCliente::class, 'index'])->name('empresa.index');
Route::get('/contacto', [ContactoControllerCliente::class, 'index'])->name('contacto.index');
Route::get('/busqueda', [ProductControllerClient::class, 'search'])->name('busqueda.search');
Route::get('/galeria', [GaleriaController::class, 'index'])->name('galeria.index');





/**VISTA DEL ADMINISTRADOR PARA GESTIONAR LOS PRODUCTOS*/
//llamarlo como "login" para que el middleware lo pueda reconocer
Route::get('/login', [LoginContoller::class, 'index'])->name('login');
Route::post('/login/singin', [LoginContoller::class, 'store'])->name('login.store');
Route::post('/logout', [LoginContoller::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register/singin', [RegisterController::class, 'store'])->name('register.store');


Route::get('/admin/dashboard', DashboardController::class)->name('dashboard.index');


Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/show/{category:slug}', [CategoryController::class, 'show'])->name('admin.category.show');
Route::put('/admin/category/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
//PUT:para actualizar varios datos y PATCH: para actualizar solo algunos datos


Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product.index');
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
Route::get('/admin/product/show/{product:slug}', [ProductController::class, 'show'])->name('admin.product.show');
Route::put('/admin/producto/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');


Route::get('/admin/photo', [PhotoController::class, 'index'])->name('admin.photo.index');
Route::get('/admin/photo/edit/{id}', [PhotoController::class, 'edit'])->name('admin.photo.edit');
Route::put('/admin/photo/update/{photo}', [PhotoController::class, 'update'])->name('admin.photo.update');
