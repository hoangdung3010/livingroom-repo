<?php
namespace App\Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Request;
class Products extends Controller
{
    public function index(){
        return Product::all(); // hàm all sẽ lất ra tất cả sản phẩm
    }
}
