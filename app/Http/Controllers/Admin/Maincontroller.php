<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class Maincontroller extends Controller
{
    //
    public function index(){
        
        // $authUser = Auth::user();
        // echo $authUser;
     return view('admin.home',
    [
        'title'=>"Trang quản trị admin"
    ]);
    }
}
