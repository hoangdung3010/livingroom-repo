<?php

namespace App\Http\Controllers;
use Session;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\customer;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        return view("admin.login_admin.login");
    } 
    public function dangnhap(Request $request){
        $admin_email=$request->admin_email;
        $admin_password=$request->admin_password;
        $result=admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
      //  echo '<pre>';
        //print ($result);
       // echo '</pre>';
       if($result)
        {
            Session::put('admin_name',$result->admin_name);
            Session::put('id',$result->id);
           return view("admin.dashboard");
         
        }
         else {
            Session::put('message','tk mk sai');
            return view("admin.login_admin.login");
        }
    }
    public function dangxuat()
    {
        return view("admin.login_admin.login");
    }



    //phía khách hàng


    public function dn_khach(Request $request)
    {
       
        $email=$request->customer_email;
        $password=$request->customer_pass;//md5 chuyển hóa chuỗi sang chuỗi mới
        $result=customer::where('customer_email',$email)->where('customer_pass',$password)->first();
      
        if($result)
        {
           // $kh_id=customer::orderBy('customer_id');
           Session::put('customer_id',$result->customer_id);//gọi id của kh
           Session::put('customer_name',$result->customer_name);
           Session::put('customer_email',$result->customer_email);
           Session::put('customer_address',$result->customer_address);
           Session::put('customer_phone',$result->customer_phone);
         
            return redirect()->route("home.index");
         
        }
         else {
            return redirect('/dangnhap_khach');
        }
    }

    public function dangnhap_khach() //ấn sự kiện action trả ra
    {

       return view("page.khachhangdangnhap");//view


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
