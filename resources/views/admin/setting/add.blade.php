@extends('layout.main')
@section('title', 'thêm setting')
@section('css')
@endsection

@section('content')
    <div class="content-wrapper">

        @include('admin.partials.content-header',['name'=>"Setting","key"=>"Thêm nội dung mới"])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('alert'))
                            <div class="alert alert-success">
                                {{ session('alert') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-warning">
                                {{session("error")}}
                            </div>
                        @endif
                        <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-header">
                                        @foreach ($errors->all() as $message)
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-tool p-3 text-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Chấp nhận</button>
                                        <button type="reset" class="btn btn-danger btn-lg">Làm lại</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                             <h3 class="card-title">Thêm nội dung mới</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div class="form-group">
                                                <label for="">Tên nội dung mới</label>
                                                <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name"
                                                    placeholder="Nhập nội dung mới">
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror


                                            <div class="form-group">
                                                <label for="">Nội dung</label>
                                                <textarea class="form-control  @error('value') is-invalid @enderror" name="value" id="" rows="3" value="" placeholder="Nhập content">{{ old('value') }}</textarea>
                                            </div>
                                            @error('value')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="form-group">
                                                <label for="">Slug</label>
                                                <input type="text" class="form-control"  value="{{ old('slug') }}" name="slug"
                                                    placeholder="Nhập slug">
                                            </div>
                                            @error('slug')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="form-group">
                                                <label for="">Chọn danh mục cha</label>
                                                <select class="form-control custom-select" id="" value="{{ old('parentId') }}" name="parentId">
                                                  <option value="0">Chọn danh mục cha</option>
                                                  {!!$option!!}
                                                </select>
                                              </div>
                                              @error('parentId')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror

                                            <div class="form-group">
                                                <label for="">Nhập mô tả</label>
                                                <textarea
                                                    class="form-control tinymce_editor_init @error('description') is-invalid @enderror"
                                                    name="description" id="" rows="3" value="" placeholder="Nhập mô tả">
                                                {{ old('description') }}
                                                </textarea>
                                            </div>
                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="1" name="active" @if (old('active') === '1' || old('active') === null)
                                                        {{ 'checked' }} @endif>Hiện
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="0" @if (old('active') === '0') {{ 'checked' }}
                                                        @endif name="active">Ẩn
                                                    </label>
                                                </div>
                                            </div>
                                            @error('active')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            {{-- <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" name="checkrobot" id="checkrobot" required>
                                                <label class="form-check-label" for="checkrobot">Tôi đồng ý</label>
                                            </div>
                                            @error('checkrobot')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror --}}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                        <h3 class="card-title">Thông tin khác</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div class="wrap-load-image mb-3">
                                                <div class="form-group">
                                                    <label for="">Hình ảnh</label>
                                                    <input type="file" class="form-control-file img-load-input border @error('image_path')
                                                    is-invalid
                                                    @enderror"  id=""  name="image_path" >
                                                </div>
                                                @error('image_path')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" alt="no image" style="height: 220px;object-fit:cover;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
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
