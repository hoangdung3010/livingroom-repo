<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use Cart;

//use App\cart_item\cart;
use Illuminate\Support\Facades\Redirect;
class giohangController extends Controller
{
    
    public function save_cart(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity= $request->qty;
        $product_info= Product::where('id',$productId)->first();
       // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
       $data['id'] = $product_info->id;
       $data['qty'] = $quantity;
       $data['name'] = $product_info->product_name;
       $data['price'] = $product_info->product_price;
       $data['weight'] = $product_info->product_price;
       $data['options']['image'] = $product_info->product_img;
       Cart::add($data);
       //Cart::destroy();
       return Redirect::to('/show_cart'); 
     

    }
    public function show_cart(){
     
        //$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
      //  $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        return view('page.showCart');
    }
    public function delete_cart($rowId){
        Cart::update($rowId,0);//xet gtri bang 0
        return Redirect('/show_cart');
    }
    public function update_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect('/show_cart');
    }
   // public function view()
  //  {

 //     return view("page.giohang");

//
 //   }
  //   public function add(cart $cart ,$id)
  //   {
    //     $product=Product::find($id);
   //      $cart -> addCart($product);
        //dd(session('cart'));
    //    return redirect()->back();


   //  }
  //   public function remove(cart $cart ,$id)
  //   {
        
     //    $cart -> remove($id);
       
     //    return redirect()->back();


   //  }
   //  public function update(cart $cart ,$id)
   //  {
     //    $quantity= request() ->quantity ? request() ->quantity :1;//nếu có thì lấy nếu k có thì bằng 1
       //  $cart -> update($id,$quantity);
       
        // return redirect()->back();


    // }
    // public function clear(cart $cart)
   //  {
       //  $cart -> clear();
       
       //  return redirect()->back();


  //   }
}
