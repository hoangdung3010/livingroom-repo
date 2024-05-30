@extends('layout.admin')
@section('main')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Nhà cung cấp : <span style="color: red">{{$provide->count()}}</span></h3>

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
                @if (Session::has('error'))
                <h1><span class="label label-default">{{Session::get('error')}}</span></h1>



                @endif


                <div class="col-xs-12">
                    <div class="box">


                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên nhà cung cấp</th>
                                        <th>Địa chỉ</th>
                                        <th>Điện thoại</th>
                                        <th>Thao tác</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                      @foreach($provide as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->provide_name }}</td>
                                                <td>{{ $item->provide_address }}</td>
                                                <td>{{ $item->phone}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route('provide.edit',$item->id)}}">Edit</a>
                                                    <a class="btn btn-primary glyphicon glyphicon-trash btndelete" onclick="" href="{{route('provide.destroy',$item->id)}}"></a>
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
                                {{$provide ->appends(request()->all()) ->links()}}
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
    <!-- Main content -->

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
