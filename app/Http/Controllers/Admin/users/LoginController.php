<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use App\Models\c;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $data="Đăng nhập hệ thống";
     return view('admin.users.login',[
         'title'=>'ĐĂNG NHẬP TRANG QUẢN TRỊ'
     ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   //   dd($request->input());

        //
       
        $this->validate($request,[
         'email'=>'required|email:filter',
         'password'=>'required'
        ]);

         if(Auth::attempt([
             'email'=>$request->input('email'),
             'password'=>$request->input('password')  
         ],$request->input('remember'))){
        return  redirect()->route('admin');
       // return  redirect()->route('testws');

         }
         $request->session()->flash('error', 'Email hoặc password không đúng');
         return  redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
//     public function xinchao(){
//       echo "Bạn đã đăng nhập thành công";
//   }

}