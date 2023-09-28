<?php

use App\Http\Controllers\Admin\categoria\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\cliente\HomeController;
use App\Http\Controllers\Admin\auth\LoginController;
use App\Http\Controllers\Admin\photo\PhotoController;
use App\Http\Controllers\Admin\producto\ProductController;
use App\Http\Controllers\Admin\auth\RegisterController;
use App\Http\Controllers\Admin\ingreso\IncomeController;
use App\Http\Controllers\Admin\proveedor\ProveedorController;
use App\Http\Controllers\Admin\venta\SaleController;
use App\Http\Controllers\cliente\cart\CartController;
use App\Http\Controllers\cliente\contacto\ContactoControllerCliente;
use App\Http\Controllers\cliente\empresa\EmpresaControllerCliente;
use App\Http\Controllers\cliente\galeria\GaleriaController;
use App\Http\Controllers\cliente\mercadopago\MercadoPagoControllerCliente;
use App\Http\Controllers\cliente\producto\ProductControllerClient;
use App\Http\Controllers\cliente\sublimacion\SublimacionControllerCliente;
use App\Http\Controllers\cliente\venta\SaleControllerCliente;
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
Route::get('/cart/list', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/list/checkout', [CartController::class, 'create'])->name('cart.create');
Route::post('/cart/list/shopping', [SaleControllerCliente::class, 'store'])->name('cart.store');
Route::get('/sublimacion/producto', [SublimacionControllerCliente::class, 'index'])->name('product.sublimacion');
Route::get('/sublimacion/show/{product:slug}', [SublimacionControllerCliente::class , 'show'])->name('sublimacion.show');


Route::post('/mercadopago/pay', [MercadoPagoControllerCliente::class, 'pay'])->name('mercadopago.pay');
Route::get('/mercadopago/success', [MercadoPagoControllerCliente::class, 'success'])->name('mercadopago.success');
Route::get('/mercadopago/failure', [MercadoPagoControllerCliente::class, 'failure'])->name('mercadopago.failure');
Route::get('/mercadopago/pending', [MercadoPagoControllerCliente::class, 'pending'])->name('mercadopago.pending');


/**VISTA DEL ADMINISTRADOR PARA GESTIONAR LOS PRODUCTOS*/
//llamarlo como "login" para que el middleware lo pueda reconocer
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/singin', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register/singin', [RegisterController::class, 'store'])->name('register.store');


Route::get('/admin/dashboard', DashboardController::class)->name('dashboard.index');


Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/show/{category:slug}', [CategoryController::class, 'show'])->name('admin.category.show');
Route::put('/admin/category/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
//PUT:para actualizar varios datos y PATCH: para actualizar solo algunos datos




Route::get('/admin/income', [IncomeController::class, 'index'])->name('admin.income.index');
Route::get('/admin/income/create', [IncomeController::class, 'create'])->name('admin.income.create');
Route::post('/admin/income/store', [IncomeController::class, 'store'])->name('admin.income.store');




Route::get('/admin/sales', [SaleController::class, 'index'])->name('admin.sale.index');
Route::get('/admin/sales/show/{id}', [SaleController::class, 'show'])->name('admin.sale.show');
Route::get('/admin/sales/list', [SaleController::class, 'list'])->name('admin.sale.list');
Route::put('/admin/sales/update/{id}', [SaleController::class, 'update'])->name('admin.sale.update');


Route::get('/admin/photo', [PhotoController::class, 'index'])->name('admin.photo.index');
Route::get('/admin/photo/edit/{id}', [PhotoController::class, 'edit'])->name('admin.photo.edit');
Route::put('/admin/photo/update/{photo}', [PhotoController::class, 'update'])->name('admin.photo.update');




Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product.index');
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
Route::get('/admin/product/show/{product:slug}', [ProductController::class, 'show'])->name('admin.product.show');
Route::put('/admin/producto/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');



Route::get('/admin/provider/index', [ProveedorController::class, 'index'])->name('admin.provider.index');
Route::get('/admin/provider/create', [ProveedorController::class, 'create'])->name('admin.provider.create');
Route::post('/admin/provider/store', [ProveedorController::class, 'store'])->name('admin.provider.store');
Route::get('/admin/provider/show/{provider:nombres}', [ProveedorController::class, 'show'])->name('admin.provider.show');
Route::put('/admin/provider/update/{provider}', [ProveedorController::class, 'update'])->name('admin.provider.update');
