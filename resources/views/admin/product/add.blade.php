@extends('layout.main')
@section('title', 'Thêm sản phẩm')

@section('css')
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #000 !important;
        }

        .select2-container .select2-selection--single {
            height: auto;
        }

    </style>
@endsection
@section('content')


    <div class="content-wrapper">

        @include('admin.partials.content-header',['name'=>"Sản phẩm","key"=>"Thêm sản phẩm"])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('alert'))
                            <div class="alert alert-success">
                                {{ session()->get('alert') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-warning">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('admin.product.store') }}" method="POST"
                            enctype="multipart/form-data">
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
                                            <h3 class="card-title">Thông tin sản phẩm</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tong_quan">Tổng
                                                        quan</a>
                                                </li>
                                                <!-- <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#du_lieu">Dữ liệu</a>
                                                </li> -->
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình
                                                        ảnh</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#seo">Seo</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <!-- START Tổng Quan -->
                                                <div id="tong_quan" class="container tab-pane active"><br>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 control-label" for="">Tên sản
                                                                phẩm</label>
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                    class="form-control nameChangeSlug
                                                            @error('name') is-invalid @enderror"
                                                                    id="name" value="{{ old('name') }}" name="name"
                                                                    placeholder="Nhập tên sản phẩm">
                                                            </div>
                                                        </div>
                                                        @error('name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 control-label" for="">Slug</label>
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                    class="form-control
                                                            @error('slug') is-invalid  @enderror"
                                                                    id="slug" value="{{ old('slug') }}" name="slug"
                                                                    placeholder="Nhập slug">
                                                            </div>
                                                        </div>
                                                        @error('slug')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 control-label" for="">
                                                                Thương hiệu
                                                                </label>
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                    class="form-control
                                                            @error('model') is-invalid @enderror"
                                                                     value="{{ old('model') }}" name="model"
                                                                    placeholder="Nhập tên sản phẩm">
                                                            </div>
                                                        </div>
                                                        @error('model')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 control-label" for="">Tình trạng</label>
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                    class="form-control
                                                            @error('tinh_trang') is-invalid @enderror"
                                                                     value="{{ old('tinh_trang') }}" name="tinh_trang"
                                                                    placeholder="Nhập tên sản phẩm">
                                                            </div>
                                                        </div>
                                                        @error('tinh_trang')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 control-label" for="">Nhập giới
                                                                thiệu</label>
                                                            <div class="col-sm-10">
                                                                <textarea
                                                                    class="form-control  @error('description') is-invalid @enderror"
                                                                    name="description" id="" rows="3"
                                                                    placeholder="Nhập giới thiệu">{{ old('description') }}</textarea>
                                                            </div>
                                                        </div>
                                                        @error('description')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 control-label" for="">Nhập nội
                                                                dung</label>
                                                            <div class="col-sm-10">
                                                                <textarea
                                                                    class="form-control tinymce_editor_init @error('content') is-invalid  @enderror"
                                                                    name="content" id="" rows="30" value=""
                                                                    placeholder="Nhập nội dung">
                                                                {{ old('content') }}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        @error('content')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>



                                                    {{-- <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Địa chỉ</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control @error('address_detail') is-invalid @enderror" id="" value="{{ old('address_detail') }}" name="address_detail" placeholder="Nhập địa chỉ của bạn">
                                                        </div>
                                                    </div>
                                                    @error('address_detail')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Diện tích</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control @error('dientich') is-invalid @enderror" id="" value="{{ old('dientich') }}" name="dientich" placeholder="Nhập diện tích">
                                                        </div>
                                                    </div>
                                                    @error('dientich')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Đơn vị</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control tag-select-choose"  name="donvi">
                                                                @foreach ($donvi as $item)
                                                                    <option value="{{ $item['value'] }}">{{ $item['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('donvi')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> --}}


                                                    {{-- <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Hướng nhà</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control tag-select-choose"  name="huongnha">
                                                                @foreach ($huongnha as $item)
                                                                    <option value="{{ $item['value'] }}">{{ $item['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('huongnha')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> --}}


                                                    {{-- <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Nhập ngày đăng</label>
                                                            <input  type="date" class="form-control  @error('created_at')
                                                            is-invalid
                                                            @enderror"  name="created_at" placeholder="dd-mm-yyyy" value="{{ old('created_at') }}">
                                                            @error('created_at')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Nhập ngày hết hạn</label>
                                                            <input type="date" class="form-control  @error('time_expires')
                                                            is-invalid
                                                            @enderror" id="" name="time_expires" placeholder="dd-mm-yyyy" value="{{ old('time_expires') }}">
                                                            @error('time_expires')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                    {{-- <div class="form-group">
                                                    <div class="row">
                                                        <label for="" class="col-sm-2 control-label">Sale(%)</label>
                                                        <div class="col-sm-10">
                                                                <input type="number" class="form-control @error('sale')
                                                                is-invalid
                                                                @enderror" id="" value="{{ old('sale') }}" name="sale" placeholder="Nhập %">
                                                        </div>
                                                  </div>
                                                </div>
                                                @error('sale')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror --}}

                                                    {{-- <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Dịch vụ nổi bật</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input @error('hot')
                                                                        is-invalid
                                                                        @enderror" value="1" name="hot" @if (old('hot') === '1') {{'checked'}} @endif>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('hot')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> --}}




                                                    {{-- <div class="form-group form-check">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">

                                                        </label>
                                                        <div class="col-sm-10">
                                                            <input type="checkbox" class="form-check-input" name="checkrobot" id="">
                                                            <label class="form-check-label" for="" required>Tôi đồng ý</label>
                                                        </div>
                                                    </div>
                                                    @error('checkrobot')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> --}}


                                                </div>
                                                <!-- END Tổng Quan -->

                                                <!-- START Dữ Liệu -->
                                                <!-- <div id="du_lieu" class="container tab-pane fade"><br>

                                                </div> -->
                                                <!-- END Dữ Liệu -->

                                                <!-- START Hình Ảnh -->
                                                <div id="hinh_anh" class="container tab-pane fade"><br>
                                                    <div class="wrap-load-image mb-3">
                                                        <div class="form-group">
                                                            <label for="">Ảnh đại diện</label>
                                                            <input type="file"
                                                                class="form-control-file img-load-input border @error('product_img')
                                                        is-invalid
                                                        @enderror"
                                                                id="" name="product_img">
                                                        </div>
                                                        @error('product_img')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <img class="img-load border p-1 w-100"
                                                            src="{{ asset('admin_asset/images/upload-image.png') }}"
                                                            style="height: 200px;object-fit:cover; max-width: 260px;">
                                                    </div>
                                                    <div class="wrap-load-image mb-3">
                                                        <div class="form-group">
                                                            <label for="">Ảnh liên quan</label>
                                                            <input type="file" class="form-control-file img-load-input-multiple border @error('image') is-invalid @enderror" id="" name="image[]" multiple>
                                                        </div>
                                                        @error('image')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                        <div class="load-multiple-img">
                                                            <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                            <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                            <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- END Hình Ảnh -->

                                                <!-- START Seo -->
                                                <div id="seo" class="container tab-pane fade"><br>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 control-label" for="">Nhập title seo</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control @error('title_seo') is-invalid @enderror" id="title_seo" value="{{ old('title_seo') }}" name="title_seo" placeholder="Nhập title seo">
                                                            </div>
                                                        </div>
                                                        @error('title_seo')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 control-label" for="">Nhập mô tả seo</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control @error('description_seo') is-invalid @enderror" id="description_seo" value="{{ old('description_seo') }}" name="description_seo" placeholder="Nhập mô tả seo">
                                                            </div>
                                                        </div>
                                                        @error('description_seo')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 control-label" for="">Nhập từ khóa seo</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control @error('keyword_seo') is-invalid @enderror" id="keyword_seo" value="{{ old('keyword_seo') }}" name="keyword_seo" placeholder="Nhập từ khóa seo">
                                                            </div>
                                                        </div>
                                                        @error('keyword_seo')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- END Seo -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">


                                        <div class="card card-outline card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Thông tin khác</h3>
                                            </div>
                                            <div class="card-body table-responsive p-3">
                                                <div class="form-group">
                                                    <label class=" control-label" for="">Chọn danh mục</label>
                                                    <select
                                                        class="form-control custom-select select-2-init @error('category_id')
                                                          is-invalid
                                                      @enderror"
                                                        id="" value="{{ old('category_id') }}" name="category_id">

                                                        <option value="0">--- Chọn danh mục cha ---</option>
                                                        @if (old('category_id'))
                                                            {!! \App\Models\category::getHtmlOption(old('category_id')) !!}
                                                        @else
                                                            {!! $option !!}
                                                        @endif
                                                    </select>
                                                    @error('category_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                {{-- <div class="form-group">
                                            <label class="control-label" for="">Số thứ tự</label>

                                            <input type="number" min="0" class="form-control  @error('order') is-invalid  @enderror"  value="{{ old('order') }}" name="order" placeholder="Nhập số thứ tự">

                                            @error('order')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                              </div> --}}
                                                <div class="form-group">
                                                    <label class="control-label" for="">Giá</label>
                                                    <input type="number" min="0"
                                                        class="form-control  @error('price') is-invalid  @enderror"
                                                        value="{{ old('price') }}" name="price" placeholder="Nhập giá">
                                                    @error('price')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class=" control-label" for="">Sale(%)</label>
                                                    <input type="number" min="0"
                                                        class="form-control  @error('sale') is-invalid  @enderror"
                                                        value="{{ old('sale') }}" name="sale" placeholder="Nhập sale">

                                                    @error('sale')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label" for="">Sản phẩm nổi bật</label>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox"
                                                                class="form-check-input @error('hot')
                                                        is-invalid
                                                        @enderror"
                                                                value="1" name="hot" @if (old('hot') === '1') {{ 'checked' }} @endif>
                                                        </label>
                                                    </div>
                                                    @error('hot')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="">Trạng thái</label>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" value="1"
                                                                name="active" @if (old('active') === '1' || old('active') === null) {{ 'checked' }} @endif>Hiện
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" value="0"
                                                                @if (old('active') === '0'){{ 'checked' }} @endif name="active">Ẩn
                                                        </label>
                                                    </div>
                                                    @error('active')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label" for="">Bán chạy</label>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox"
                                                                class="form-check-input @error('ban_chay')
                                                        is-invalid
                                                        @enderror"
                                                                value="1" name="ban_chay" @if (old('ban_chay') === '1') {{ 'checked' }} @endif>
                                                        </label>
                                                    </div>
                                                    @error('ban_chay')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                {{-- <hr>
                                                <div class="alert alert-light  mt-3 mb-1">
                                                    <strong>Chọn thuộc tính</strong>
                                                </div>

                                                @foreach ($attributes as $key => $attribute)

                                                    <div class="form-group">
                                                        <label class="control-label" for="">{{ $attribute->name }}</label>
                                                        <select class="form-control"  name="attribute[]" >
                                                            <option value="0">--Chọn--</option>
                                                            @foreach ($attribute->childs()->orderby('order')->get()
                                                                                        as $k => $attr)
                                                                <option value="{{ $attr->id }}" @if (old('attribute')) {{ $attr->id== old('attribute')[$key]?'selected':"" }} @endif>{{ $attr->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('attribute.' . $key)
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                @endforeach
                                            <hr> --}}
                                            </div>
                                        </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Các lựa chọn affliate</h3>
                                        </div>
                                        <div class="card-body table-responsive p-3">
                                            <div class="">Thêm option   <a data-url="
                                                {{ route('admin.product.loadOptionProduct') }}"
                                                class="btn  btn-info btn-md float-right " id="addOptionProduct">+ Thêm
                                                option</a></div>
                                            <div class="list-item-option wrap-option mt-3 row" id="wrapOption">
                                                @if (old('supplier_idOption') && old('supplier_idOption'))
                                                    @foreach (old('supplier_idOption') as $key => $value)
                                                    <div class="col-md-4 col-sm-6 col-12 col-item-price">
                                                        <div class="item-price">
                                                            <div class="box-content-price">
                                                                {{-- <div class="form-group">
                                                                <label class="control-label" for="">Tên</label>
                                                                <input type="text" min="0" class="form-control  @error('nameOption.' . $key) is-invalid  @enderror"  value="{{ $value }}" name="nameOption[]" placeholder="Nhập tên">
                                                                @error('nameOption.' . $key)
                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                                </div> --}}
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Chọn nhà cung
                                                                        cấp</label>
                                                                    <select
                                                                        class="form-control  @error('supplier_idOption') is-invalid  @enderror"
                                                                        name="supplier_idOption[]">
                                                                        <option value="">Chon nhà cung cấp</option>
                                                                        @if (isset($supplier) && $supplier)
                                                                            @foreach ($supplier as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    {{ old('supplier_idOption')[$key] == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                    @error('supplier_idOption.' . $key)
                                                                        <div class="invalid-feedback d-block">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Đường
                                                                        dẫn</label>
                                                                    <input type="text" min="0"
                                                                        class="form-control  @error('slugOption.' . $key) is-invalid  @enderror"
                                                                        value="{{ old('slugOption')[$key] }}"
                                                                        name="slugOption[]"
                                                                        placeholder="Nhập đường dẫn">
                                                                    @error('slugOption.' . $key)
                                                                        <div class="invalid-feedback d-block">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Nhập
                                                                        giá</label>
                                                                    <input type="number"
                                                                        class="form-control  @error('priceOption.' . $key) is-invalid  @enderror"
                                                                        value="{{ old('priceOption')[$key] }}"
                                                                        name="priceOption[]" placeholder="Nhập giá">
                                                                    @error('priceOption.' . $key)
                                                                        <div class="invalid-feedback d-block">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="action">
                                                                <a class="btn btn-sm btn-danger deleteOptionProduct"><i
                                                                        class="far fa-trash-alt"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')

@endsection
