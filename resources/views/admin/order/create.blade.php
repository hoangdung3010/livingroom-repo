@extends('layout.admin')
@section('main')

<form role="form" action="{{route('order.store')}}" method="post" enctype="multipart/form-data">
     @csrf
    <div class="form-group">



        <input type="hidden" class="form-control" id="" name="" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Trạng Thái</label>
        <input type="text" class="form-control" id=""name="product_name" placeholder="">

      </div>
      <div class="form-group">
        <label for="">Tên Khách Hàng</label>
        <input type="text" class="form-control" id="" name="product_importprice" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" id="" name="product_price" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Địa Chỉ</label>
        <input type="text" class="form-control" id="" name="product_importprice" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Số Điện Thoại</label>
        <input  class="form-control" id="" name="product_img" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Tổng Tiền</label>
        <input type="number" class="form-control" id="" name="product_img" placeholder="">
      </div>
      <button type="submit" name="" class="btn btn-primary">Submit</button>
      <a class="btn btn-primary" href="{{route('order.index')}}">Quay lại<span></span></a>

</form>


@endsection
