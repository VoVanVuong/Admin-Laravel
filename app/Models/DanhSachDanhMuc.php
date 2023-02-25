<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachDanhMuc extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
  
      ];

      public function LienKetSanPham(){
        return $this->hasMany('App\Models\Menu','parent_id','id');
      }
}
