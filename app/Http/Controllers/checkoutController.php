<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\shipping;
use App\Models\Order;
use App\Models\order_detail;
use App\Models\payment;
use Cart;
use DB;
session_start();
class checkoutController extends Controller
{
   
    public function login_checkout()
    {

       return view("page.checkout.login_checkout");


    }
    public function add_customer(Request $request)
    {
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_phone']=$request->customer_phone;
        $data['customer_pass']=$request->customer_pass;
        
        $kh_id=customer::insertGetId($data);
        Session::put('customer_id',$kh_id);
        Session::put('customer_name',$request->customer_name);
        return  redirect('/checkout');

        
    }
    public function checkout(){
        return view("page.checkout.checkout");
    }
    public function luu_checkout(Request $request)
    {
        $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_address']=$request->shipping_address;
        $shipping_id=shipping::insertGetId($data);
        Session::put('shipping_id',$shipping_id);

       
       // return  redirect('/thanhtoan');
        return view("page.checkout.thanhtoan");
    }
    public function thanhtoan(Request $request){
        return view("page.checkout.thanhtoan");
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect()->route("home.index");
    }
    public function dn_khachhang(Request $request)
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
         
            return redirect('/thanhtoan');
         
        }
         else {
            return redirect('/login_checkout')->with('success','Tài khoản mặc mật khẩu không đúng.');
        }
    }
    public function order_place(Request $request)
    {
        //insert thanhtoan
        $data=array();
        $data['payment_method']=$request->payment_option;
        $data['payment_status']='chờ xử lý';
        $payment_id =payment::insertGetId($data);

        //insert order

        $order_data=array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['order_customer_name'] = Session::get('customer_name');
        $order_data['order_customer_email'] = Session::get('customer_email');
        $order_data['order_customer_address'] = Session::get('customer_address');
        $order_data['order_customer_phone'] = Session::get('customer_phone');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
         $order_data['order_total'] = Cart::subtotal();
        $order_data['order_status'] = 'Đang chờ xử lý';
        // $order_data['created_at'] = ;
        $order_id = Order::insertGetId($order_data);
       
        //order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_quantity'] = $v_content->qty;
            order_detail::insert($order_d_data);
        }
        if($data['payment_method']==2){
          
            Cart::destroy();          
            return view('page.checkout.dathangthanhcong');

        }
    
       
    }
    // public function thongtinkhachhang()
    // {
    //     $khachhang =customer::where('customer_id',$request->id)->first();
      
    //        return redirect('/thanhtoan',compact('khachhang'));
    // }
 
}
