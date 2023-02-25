<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\users\LoginController;
use App\Http\Controllers\Admin\MainController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Danhmuccontroller;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\GuifileController;
use App\Http\Controllers\trangchu\trangchuController;
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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('logins',[LoginController:: class, 'index'])->name('login');
Route::POST('admin/users/login/store',[LoginController:: class, 'store']);


Route::middleware(['auth'])->group(function () {

  Route::get('add',[MenuController::class,'create']);   //3 bỏ
  Route::POST('add',[MenuController::class,'store']);  //2 bỏ
  Route::get('list',[MenuController::class,'index']);  //4 bỏ
 /////
  Route::get('delete/{id}',[MenuController::class,'destroy']);  //6 bỏ

// Route::get('admin/delete/{id}',[MenuController::class,'destroy']); 
   Route::get('edit/{menu}',[MenuController::class,'Show']);  //7 bỏ
   Route::post('edit/{menu}',[MenuController::class,'update']);  //8 bỏ
   Route::get('listdanhmuc',[Danhmuccontroller::class,'danhsachdanhmuc']);
   Route::get('themdanhmuc',[Danhmuccontroller::class,'themdanhmucget']);
   Route::post('themdanhmuc',[Danhmuccontroller::class,'themdanhmucpost']);
   Route::get('xoadanhmuc/{id}',[Danhmuccontroller::class,'destroy']);

   Route::get('danhmuccon/{menu}',[Danhmuccontroller::class,'HienThiSanPham']);
   

   Route::get('suadanhmuc/{danhsachdanhmuc}',[Danhmuccontroller::class,'suadanhmucget']);
   Route::post('suadanhmuc/{danhsachdanhmuc}',[Danhmuccontroller::class,'suadanhmucpost']);
   
  
  Route::prefix('admin')->group(function(){

  Route::get('/',[MainController::class,'index'])->name('admin');
  Route::get('main',[MainController::class,'index']);

  Route::prefix('menus')->group(function(){
    Route::get('add',[MenuController::class,'create']);  //3
    Route::POST('add',[MenuController::class,'store']);  //2
    Route::get('list',[MenuController::class,'index']);  //4
    Route::get('delete/{id}',[MenuController::class,'destroy']);  //5
    // Route::get('edit/{id}',[MenuController::class,'Edit']);  //6
 
  });

    Route::post('upload/services',[UploadController::class,'store']);
}); 
});

Route::get('getfile',[GuifileController::class,'hienthifile']);
Route::post('postfile',[GuifileController::class,'xulifile']);

Route::prefix('trangchu')->group(function(){
  Route::get('/',[trangchuController::class,'index']);  //3
  

});