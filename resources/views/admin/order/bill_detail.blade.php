@extends('layout.admin')
@section('main')

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Chi tiết đơn hàng :</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <section class="content-header">
            <h1>
                Đơn hàng số {{ $order->id }} ( {{ $order->order_customer_name }} )
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-9">
                        <div class="box">

                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá bán</th>
                                            <th>Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                    @foreach($list as  $item)
                                    <tr>
                                        <td>{{++$i}}</td>


                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ number_format($item->product_price) }}</td>
                                        <td>{{ $item->product_quantity }}</td>

                                        <td>
                                            {{-- <a class="btn btn-primary glyphicon glyphicon-trash btndelete" href="{{route('order.store',$item->item_id)}}"></a> --}}
                                        </td>
                                    </tr>
                                   @endforeach

                                    </tbody>
                                </table>
                                <form action="" method="POST" id="formdelete">
                                    @csrf @method('get')

                                </form>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="box">
                            <div class="panel">
                                <div class="panel-body">
                                   <h4>  Đơn hàng :</h4>
                                    <p>Khách hàng:
                                        {{$order->order_customer_name}}
                                    </p>
                                    <p>Mã Sản Phẩm:{{$order_detail->product_code}}</p>
                                    <p>Ngày đặt hàng:{{$order->created_at}}</p>
                                    <p>Email : {{$order->order_customer_email}}</p>
                                    <p>Phone :{{$order->order_customer_phone}}</p>
                                    <p>Địa chỉ : {{$order->order_customer_address}}</p>
                                    <p> Tổng tiền : {{$order->order_total}} vnd</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a href="{{url('/print_order',$order->id)}}">in đơn hàng</a>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
</div>


@stop
{{-- @section('js')
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
 @stop() --}}
