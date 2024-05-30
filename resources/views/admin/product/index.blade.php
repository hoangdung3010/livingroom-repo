@extends('layout.admin')
@section('main')
<!-- Content Wrapper. Contains page content -->

<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Sản phẩm : <span style="color: red">{{$product->count()}}</span></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>giá bán</th>



                                        <th>hình ảnh</th>
                                        <th>Thao tác</th>
                                </thead>
                                <tbody>

                                      @foreach($product as  $sp)
                                            <tr>
                                                <td>{{++$i}}</td>

                                                <td>{{ $sp->product_name }}</td>

                                                <td>{{ number_format($sp->product_price) }}</td>
                                                <td>
                                                   <img src="/doan101198/public/image/sach/{{ $sp->product_img}}" alt="" style="max-width:50px;">
                                                </td>

                                                <td>
                                                    <a class="btn btn-primary glyphicon glyphicon-edit" href="{{ route('product.edit',$sp->id) }}"></a>
                                                    <a class="btn btn-primary glyphicon glyphicon-trash btndelete" href="{{route('product.destroy',$sp->id)}}"></a>
                                                </td>
                                            </tr>
                                  @endforeach
                                </tbody>

                            </table>
                            <form action="" method="POST" id="formdelete">
                                @csrf @method('delete')

                            </form>
                            <hr>
                            <div class="">

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
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
