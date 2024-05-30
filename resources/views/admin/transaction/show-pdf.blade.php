<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Chi tiết đơn hàng</title>


  {{-- <link rel="stylesheet" type="text/css" href="{{asset('font/fontawesome-5.13.1/css/all.min.css')}}">

  <link rel="stylesheet" href="{{asset('lib/adminlte/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('lib/sweetalert2/css/sweetalert2.min.css')}}">
  <link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('admin_asset/css/stylesheet.css')}}"> --}}
  <style>
 body {
            font-family: 'Arial Unicode MS', Arial, sans-serif;
        }

</style>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <div class="main">
        <div class="container container-cart">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-cart mt-5 mb-5">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="order-content">

                                    <div class="infor-order mb-3">
                                        <div class="text-center mb-3 title-order" style="font-size:25px;">
                                         Thông tin đơn hàng
                                        </div>
                                        <ul class="list-infor">
                                            <li><span>Người nhận hàng </span> {{ $data->name }}</li>
                                            <li><span>Giao đến </span> {{ $data->address_detail }}, {{ $data->commune->name??'' }}, {{ $data->district->name??''}}, {{ $data->city->name??'' }}</li>
                                            <li class="total-price"><span>Tổng tiền </span> {{ number_format($data->total) }}</li>
                                        </ul>
                                      <div class="list-order-product pt-4 pb-4">
                                        <div class="title-order  mb-3">
                                            Danh sách sản phẩm đã đặt
                                        </div>
                                        <div class="">


                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                  <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên sản phẩm</th>
                                                    <th scope="col">Giá cũ</th>
                                                    <th scope="col">Giảm giá</th>
                                                    <th scope="col">Giá sau cùng</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data->orders as $orderItem)
                                                    <tr>
                                                        <th scope="row">{{ $loop->index+1 }}</th>
                                                        <td>{{ $orderItem->name }}</td>
                                                        <td>{{ $orderItem->old_price." ".$unit  }}</td>
                                                        <td>{{ $orderItem->sale."%" }}</td>
                                                        <td> <strong style="color: red">{{ $orderItem->new_price." ".$unit }}</strong></td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <th scope="row" colspan="5" class="text-right">Tổng giá trị: <strong style="color: red">{{ $data->total." ".$unit }}</strong></th>
                                                    </tr>
                                                </tbody>
                                              </table>



                                        </div>
                                      </div>
                                     </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>



{{-- <script type="text/javascript" src="{{asset('lib/jquery/jquery-3.2.1.min.js')}} "></script>

<script type="text/javascript" src="{{asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js')}}"></script>

<script src="{{asset('lib/adminlte/js/adminlte.min.js')}}"></script>
<script src="{{asset('lib/sweetalert2/js/sweetalert2.all.min.js')}}"></script>

<script src="https://cdn.tiny.cloud/1/si5evst7s8i3p2grgfh7i5gdsk2l26daazgefvli0hmzapgn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="{{asset('lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin_asset/ajax/deleteAdminAjax.js')}}"></script>
<script src="{{asset('admin_asset/js/function.js')}}"></script>
<script src="{{asset('admin_asset/js/main.js')}}"></script> --}}

</body>
</html>
