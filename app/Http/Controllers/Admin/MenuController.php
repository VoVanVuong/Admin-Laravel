<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhSachDanhMuc;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Service\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create()
    {
       // dd($request->all());
        $themdanhmuc=DanhSachDanhMuc::all();
        return view('admin.menu.add', [
            'title' => 'Thêm hàng hoá',
            'menus' => $this->menuService->getParent(),
            'themdanhmuc'=>$themdanhmuc
        ])->with('menu_arr',Menu::all());

        // echo Session::get('success');

    }

    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);

        return redirect()->back();
    }
    // public function index()
    // {
    //     return view('admin.menu.list', [
    //         'title'=>"Danh sách danh mục mới nhất",
    //         'menus'=>$this->menuService->getAll()
    //     ]);
    // }

    public function index( )
    {

        $menu=Menu::orderBy('created_at','DESC')->search()->paginate(10);

        return view('admin.menu.list', [
            'title'=>"Danh sách danh mục mới nhất",
            'menu_arr'=>$menu
       //     'menus' => $this->menuService->getParent()

        ]);


    }

    public function destroy(Menu $Menu,$id)
    {
        //
       $row=Menu::find($id);
       $row->destroy($Menu,$id);
       return redirect('/list');
    }
public function Show(Menu $menu){

 $data=Menu::find($menu->id)->loaidanhmuc;
    return view('admin.menu.edit',[
        'title'=>"Chỉnh sửa danh mục".$menu->name,
        'menu'=>$menu,
         'danhsachdm'=>DanhSachDanhMuc::all(),
         'data'=>$data

    ])->with('menu_arr',Menu::all());
}
public function update(Menu $menu, CreateFormRequest $request)
{
    $this->menuService->update($request,$menu);
    return redirect('/list');
}
//     public function Edit(Menu $Menu,$id){
//     $edits=Menu::find($id);
//    return view('admin.menu.edit_danhmuc',['title'=>'Edit danh mục'])->with('menu_arr',$edits);

// }
}
