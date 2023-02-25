<?php
namespace App\Http\Service\Menu;

use App\Models\DanhSachDanhMuc;
use Illuminate\Support\Facades\Session;

class DanhmucService
{
  public function danhmuc(){
    return DanhSachDanhMuc::all();
  }
  public function xulithemdanhmuc($request){
    try {
      Session::flash('success', 'Tạo Danh Mục Thành Công');
      return DanhSachDanhMuc::create([
       'name'=>(String) $request->input('name')
      ]);
    }catch(\Excetion$err){
      Session::flash('success', 'Tạo Danh Mục Thất bại');
    }
  }
   public function suadanhmucpost($request,$danhsachdanhmuc){
         
    $danhsachdanhmuc->name = (string) $request->input('name');
           
    $danhsachdanhmuc->save();
        return redirect('/listdanhmuc');
   }
  
}
