<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table="menus";
    protected $fillable=[
      'name',
      'parent_id',
      'description', 
      'content',
      'image',
      'active'

    ];
    public $timestamps="false";
    
    public function loaidanhmuc()
    {
       return $this->belongsTo('App\Models\DanhSachDanhMuc','parent_id','id');
    }

   public function scopeSearch($query){
    if($key=request()->key){
      $query=Menu::where('name','like','%'.$key.'%');
     }
     return $query;
   }
  
  
     
   }
  
  
