@extends('layout.main')
@section('title',"Danh sach setting")
@section('css')

@endsection
@section('content')
<div class="content-wrapper">

    @include('admin.partials.content-header',['name'=>"Setting","key"=>"Danh sách nội dung"])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(session("alert"))
                    <div class="alert alert-success">
                        {{session("alert")}}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-warning">
                        {{session("error")}}
                    </div>
                @endif
                 <a href="{{route('admin.setting.create',['parent_id'=>request()->parent_id])}}" class="btn  btn-info btn-md mb-2">+ Thêm mới</a>
                 <div class="card card-outline card-info">
                    <div class="card-header pt-2 pb-2">
                        <div class="cart-title">
                            <i class="fas fa-list"></i> Danh mục
                        </div>
                    </div>
                </div>
                @if (isset($parentBr)&&$parentBr)
                <ol class="breadcrumb">
                  <li><a href="{{ route('admin.setting.index',['parent_id'=>0]) }}">Root</a></li>

                  @foreach ($parentBr->breadcrumb as $item)
                   <li><a href="{{ route('admin.setting.index',['parent_id'=>$item['id']]) }}">{{ $item['name'] }}</a></li>
                  @endforeach
                  <li><a href="{{ route('admin.setting.index',['parent_id'=>$parentBr->id]) }}">{{ $parentBr->name }}</a></li>
                </ol>
                @endif
                 <div class="card card-outline card-primary">
                    <div class="card-body table-responsive lb-list-category">
                        {{-- @include('admin.components.setting', [
                            'data' => $data,
                            'routeNameEdit'=>'admin.setting.edit',
                            'routeNameAdd'=>'admin.setting.create',
                            'routeNameDelete'=>'admin.setting.destroy',
                        ]) --}}
                        @include('admin.components.category', [
                            'data' => $data,
                            'routeNameEdit'=>'admin.setting.edit',
                            'routeNameAdd'=>'admin.setting.create',
                            'routeNameDelete'=>'admin.setting.destroy',
                            'routeNameOrder'=>'admin.loadOrderVeryModel',
                            'table'=>'settings',
                        ])
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                {{$data->links()}}
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection
@section('js')
@endsection
