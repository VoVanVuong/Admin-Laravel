<?php
namespace App\Http\Service\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }  
    public function getAll(){
       return Menu::orderbyDesc('id')->paginate(20);
    }
   
    public function update($request, $menu): bool
    {
   if($request->input('parent_id')!= $menu->id){
    $menu->parent_id = (int) $request->input('parent_id');
    $menu->name = (string) $request->input('name');
    $menu->description = (string) $request->input('description');
    $menu->content = (string) $request->input('content');
    $menu->active = (string) $request->input('active');
    $menu->save();
    Session::flash('success',"Cập nhật thành công Danh mục");
    return true;
   }else{
    Session::flash('success',"Cập nhật thất bại Danh mục");
    return false;
   }

      
    }

    public function create($request)
    {

        if($request->has('file_upload')){
            $file=$request->file_upload;
           $file_name=$file->getClientoriginalName();
         //  dd($file_name);
          $file->move(public_path('uploads'),$file_name);
        }
        try {

            Session::flash('success', 'Tạo Danh Mục Thành Công');
     //       dd($request->all());
     
            return Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('danhmuc_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'image' => $file_name,
               'active' => (string) $request->input('active'),
            
                
            ]);

        } catch (\Excetion$err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
       
    }

}
