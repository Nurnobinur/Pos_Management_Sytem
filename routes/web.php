<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentContrller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchasController;
use App\Http\Controllers\PurchaseItemsController;
use App\Http\Controllers\recipt;
use App\Http\Controllers\ReciptController;
use App\Http\Controllers\SaleinvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\usersales;
use App\Models\Paymet;
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

Route::get('/', [HomepageController::class,"index"]);

route::get("login",[LoginController::class,"login"])->name("login");
route::post("checklogin",[LoginController::class,"checklogin"]);

// route::middleware("auth")->group(function(){
    route::get("/",[HomepageController::class,"index"])->name("dashbord");
    route::resource("usergroups",UserGroupController::class);
    route::resource("users",UserController::class);
    route::get("user/{id}/sale",[usersales::class,"usersale"])->name("sale");

    route::post("user/{id}/invoice",[usersales::class,"usersalestore"])->name("sales_invoice_store");
    route::get("user/{id}/invoice/{invoice_id}",[usersales::class,"usersaledetails"])->name("invoice_details");
    route::post("user/{id}/invoice/{invoice_id}",[usersales::class,"usersalecreate"])->name("invoice_create_item");
    route::delete("user/{id}/invoice/{invoice_id}/{item_id}",[usersales::class,"usersale"])->name("invoice_delete_item");




    route::resource("categorise",CategoryController::class);
    route::resource("products",ProductController::class);
    route::get("user/{id}/purchas",[PurchasController::class,"purchas"])->name("purchas");
    route::post("user/{id}/userpayment",[PaymentContrller::class,"paymentdelete"])->name("paymentdelete");

    route::get("user/{id}/recipt",[ReciptController::class,"recipt"])->name("recipt");
    route::post("user/{id}/recipt",[ReciptController::class,"reciptstore"])->name("reciptstore");
    route::delete("user/{id}/recipt/{recipt_id}",[ReciptController::class,"deleterecipt"])->name("reciptdestroy");

// });


