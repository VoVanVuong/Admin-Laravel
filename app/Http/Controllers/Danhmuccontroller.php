<?php

namespace App\Http\Controllers;

use  App\Http\Service\Menu\DanhmucService;
use Illuminate\Http\Request;
use App\Models\DanhSachDanhMuc;
use App\Models\Menu;
use App\Http\Requests\Menu\CreateFormRequest;
class Danhmuccontroller extends Controller
{
    protected $danhmucservice;
    public function __construct(DanhmucService $danhmucservice){
       $this->danhmucservice=$danhmucservice;
    }
    public function danhsachdanhmuc(){
        $danhmuc=$this->danhmucservice->danhmuc();
        return view('admin.menu.listdanhmuc',[
            'title'=>"Danh sách danh mục",
            'hiendanhmuc'=> $danhmuc
        ]);
    } 
   public function themdanhmucget(){
    return view('admin.menu.themdanhmuc',[
        'title'=>"Thêm danh mục"
    ]);
}
    public function themdanhmucpost(CreateFormRequest $request){
    $this->danhmucservice->xulithemdanhmuc($request);
    return redirect()->back();
    } 

    public function destroy(DanhSachDanhMuc $dsdanhmuc,$id)
    {
        //
             DanhSachDanhMuc::find($id)->destroy($dsdanhmuc,$id);
       return redirect('/listdanhmuc');
    }

    public function suadanhmucget($id){
        $suachuadanhmuc=DanhSachDanhMuc::find($id);
        return view('admin.menu.suadanhmuc',[
            'title'=>"Sửa Danh Mục",
              'doidanhmuc'=> $suachuadanhmuc
        ]);
    }

    public function suadanhmucpost(CreateFormRequest $request,DanhSachDanhMuc  $danhsachdanhmuc){
       
      return $this->danhmucservice->suadanhmucpost($request,$danhsachdanhmuc);
           
    }

    public function HienThiSanPham( DanhSachDanhMuc $menu){
        $data= DanhSachDanhMuc::find($menu->id)->LienKetSanPham;
        return View('admin.menu.danhmuccon',[
                    'title'=>"Hiển thị sản phẩm theo từng danh mục",
                    'lienket'=>$data
    ]);
    }

    
}
