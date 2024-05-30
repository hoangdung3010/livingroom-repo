@extends('layout.admin')
@section('main')
<!-- Content Wrapper. Contains page content -->

<div class="box">
    <div class="box-header with-border">

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
                        <div class="box-header">
                            <h3 class="box-title">Danh sách loại sản phẩm</h3>
                            <div class="box-tools">
                                <a href="{{ route('category.create') }}" class="btn btn-primary">
                                    Thêm mới
                                </a>
                            </div>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên loại</th>
                                        <th>Ghi chú</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày sửa</th>
                                        <th>Thao tác</th>
                                </thead>
                                <tbody>

                                      @foreach($data  as $key=>  $ca)
                                            <tr>
                                                <td>{{++$key}}</td>

                                                <td>{{ $ca->name }}</td>
                                                <td>{{ $ca->ghichu }}</td>
                                                <td>{{ $ca->created_at }}</td>
                                                <td>{{ $ca->updated_at }}</td>

                                                <td>
                                                    <a class="btn btn-primary glyphicon glyphicon-edit" href="{{ route('category.edit',$ca->id) }}"></a>
                                                    <a class="btn btn-primary glyphicon glyphicon-trash btndelete" href="{{route('category.destroy',$ca->id)}}"></a>
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
