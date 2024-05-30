@extends('layout.admin')
@section('main')

<form role="form" action="{{route('order.update',$order->id)}}" method="post">
      @csrf <div class="form-group">
        @csrf @method('put')
        <input type="hidden" class="form-control" id="" name="" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Trạng thái</label>
        <input type="text" class="form-control" value="{{$order->order_status}}" id=""name="categoryname" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Tên khách hàng</label>
        <input type="text" class="form-control" id="" value="{{$order->order_customer_name}}"    name="ghichu" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" id="" value="{{$order->order_customer_email }}"    name="ghichu" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" class="form-control" id="" value="{{$order->order_customer_address}}"    name="ghichu" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Tổng tiền</label>
        <input type="text" class="form-control" id="" value="{{$order->order_total}}"    name="ghichu" placeholder="">
      </div>
      <div class="form-group">

        <p class="help-block">Example block-level help text here.</p>
      </div>
      <button type="submit" name="" class="btn btn-primary">Submit</button>

</form>
@endsection
