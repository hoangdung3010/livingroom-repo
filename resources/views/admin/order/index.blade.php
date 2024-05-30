@extends('layout.admin')
@section('main')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Hóa đơn đặt hàng : <span style="color: red">{{$order->count()}}</span></h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <a class="btn btn-primary"  href="{{route('order.create')}}"><i class="fa fa-circle-o text-aqua"></i> <span>CREATE</span></a>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                      <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <th>STT</th>
                                  <th>trang thái</th>
                                  <th>Tên Khách hàng</th>
                                  <th>Email</th>
                                  <th>Địa chỉ </th>

                                  <th>Số Điện Thoại</th>
                                  <th>Tổng tiền</th>
                              </thead>
                              <tbody>
                                  @php
                                      $i=1;
                                  @endphp
                                  @foreach($order as  $order)
                                  <tr>
                                      <td>{{$i++}}</td>
                                      <td>{{ $order->order_status }}</td>
                                      <td>{{ $order->order_customer_name }}</td>

                                      <td>{{ $order->order_customer_email }}</td>
                                      <td>{{ $order->order_customer_address }}</td>
                                      <td>{{ $order->order_customer_phone}}</td>
                                      <td>{{ $order->order_total }} vnd</td>
                                      <td>
                                          <a class="btn btn-primary glyphicon glyphicon-edit" href="{{ route('order.edit',$order->id) }}"></a>
                                          <a class="btn btn-primary glyphicon glyphicon-zoom-in" href="{{route('bill',[$order->id])}}"></a>
                                          <a class="btn btn-primary glyphicon glyphicon-trash btndelete" href="{{ route('order.destroy',$order->id) }}"></a>
                                      </td>
                                  </tr>
                                 @endforeach
                              </tbody>
                          </table>
                          <form action="" method="POST" id="formdelete">
                              @csrf @method('delete')
                          </form>
                      </div>
                  </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
</div>

@stop()

@section('js')
    <script>
        $('.btndelete').click(function(ev){
            ev.preventDefault();//không cho load lại trang
            var href=$(this).attr('href');

            $('form#formdelete').attr('action',href);
            if(confirm("bạn có muốn xóa?")){
                $('form#formdelete').submit();

            }
        })

    </script>
@stop()
