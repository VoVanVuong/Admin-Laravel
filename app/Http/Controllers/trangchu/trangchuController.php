<?php

namespace App\Http\Controllers\trangchu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
class trangchuController extends Controller
{
    public function index(){
        return view('giaodien.trangchu',[
            'trangchu'=>Menu::all()
        ]);
    }
}
