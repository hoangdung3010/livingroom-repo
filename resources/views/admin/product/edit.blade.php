@extends('layout.main')
@section('title',"Sửa sản phẩm")

@section('css')
@endsection
@section('content')
<div class="content-wrapper lb_template_product_edit">
    @include('admin.partials.content-header',['name'=>"Sản phẩm","key"=>"Sửa sản phẩm"])

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
                    <form class="form-horizontal" action="{{route('admin.product.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
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
                                              <a class="nav-link active" data-toggle="tab" href="#tong_quan">Tổng quan</a>
                                            </li>
                                            <!-- <li class="nav-item">
                                              <a class="nav-link" data-toggle="tab" href="#du_lieu">Dữ liệu</a>
                                            </li> -->
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#hinh_anh">Hình ảnh</a>
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
                                                        <label class="col-sm-2 control-label" for="">Tên sản phẩm</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="name" value="{{old('name')?? $data->name }}" name="name" placeholder="Nhập tên sản phẩm">
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
                                                             <input type="text" class="form-control
                                                             @error('slug') is-invalid  @enderror" id="slug" value="{{ old('slug')??$data->slug }}" name="slug" placeholder="Nhập slug">
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
                                                                 value="{{ old('model')??$data->model }}" name="model"
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
                                                                 value="{{ old('tinh_trang')??$data->tinh_trang }}" name="tinh_trang"
                                                                placeholder="Nhập tên sản phẩm">
                                                        </div>
                                                    </div>
                                                    @error('tinh_trang')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Nhập giới thiệu</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" name="description" id="" rows="4" placeholder="Nhập giới thiệu">{{old('description')?? $data->description }}</textarea>
                                                        </div>
                                                    </div>

                                                    @error('description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>



                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Nhập nội dung</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control tinymce_editor_init" name="content" id="" rows="20" placeholder="Nhập nội dung">{{old('content')?? $data->content }}</textarea>
                                                        </div>
                                                    </div>
                                                    @error('content')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
{{--
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Loại giao dịch</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control custom-select select-2-init" id="" name="category_id">
                                                            <option value="0">Chọn loại giao dịch</option>
                                                            {!!$option!!}
                                                    </select>
                                                        </div>
                                                    </div>
                                                    @error('category_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Tỉnh/Thành phố</label>
                                                        <div class="col-sm-10">
                                                            <select name="city_id" id="city" class="form-control" required="required" data-url="{{ route('ajax.address.districts') }}">
                                                                <option value="">Chọn tỉnh/thành phố</option>
                                                                {!! $cities !!}
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Quận/huyện</label>
                                                        <div class="col-sm-10">
                                                            <select name="district_id" id="district" class="form-control" required="required" data-url="{{ route('ajax.address.communes') }}">
                                                                <option value="">Chọn quận/huyện</option>
                                                                @if ($data->city_id)
                                                                    @foreach ($data->city->districts as $item)
                                                                        <option value="{{ $item->id }}" {{ $item->id==$data->district_id?"selected":"" }}>{{ $item->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Xã/phường/thị trấn</label>
                                                        <div class="col-sm-10">
                                                            <select name="commune_id" id="commune" class="form-control" required="required">
                                                                <option value="">Chọn xã/phường/thị trấn</option>
                                                                @if ($data->district_id)
                                                                    @foreach ($data->district->communes as $item)
                                                                        <option value="{{ $item->id }}" {{ $item->id==$data->commune_id?"selected":"" }}>{{ $item->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Diện tích</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control @error('dientich') is-invalid @enderror" id="" value="{{ $data->dientich }}" name="dientich" placeholder="Nhập diện tích">
                                                        </div>
                                                    </div>
                                                    @error('dientich')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> --}}



                                                {{-- <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="">Hướng nhà</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control tag-select-choose"  name="huongnha">
                                                                @foreach ($huongnha as $item)
                                                                    <option value="{{ $item['value'] }}" {{$item['value']== $data->huongnha?"selected":"" }}>{{ $item['name'] }}</option>
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
                                                            <input type="date" class="form-control  @error('created_at')
                                                            is-invalid

                                                            @enderror" id="" name="created_at"  placeholder="dd-mm-yyyy" value="{{ old('created_at')??  date_format($data->created_at,'Y-m-d') }}" >
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
                                                            @enderror" id="" name="time_expires" placeholder="dd-mm-yyyy" value="{{ old('time_expires')?? ($data->time_expires? date_format(\Carbon::parse($data->time_expires),'Y-m-d'):'') }}">
                                                            @error('time_expires')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                {{-- <div class="form-group">
                                                    <div class="row">
                                                        <label for=""  class="col-sm-2 control-label">Sale(%)</label>
                                                        <div class="col-sm-10">
                                                          <input type="number" class="form-control" id="" value="{{ $data->sale }}" name="sale" placeholder="Nhập %">
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
                                                                    <input type="checkbox" class="form-check-input" value="1" name="hot" @if( $data->hot ===1) {{'checked'}} @endif>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('hot')
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
                                                        <input type="file" class="form-control-file img-load-input border" id="" name="product_img">
                                                    </div>
                                                    @error('product_img')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <img class="img-load border p-1 w-100" src="{{asset($data->product_img)}}" alt="{{$data->name}}" style="height: 200px;object-fit:cover; max-width: 260px;">
                                                </div>

                                                <div class="wrap-load-image mb-3">
                                                    <label class="mb-3 w-100">Hình ảnh khác</label>

                                                    <span class="badge badge-success">Đã thêm</span>
                                                    <div class="list-image d-flex flex-wrap">
                                                        @foreach($data->images()->get() as $productImageItem)
                                                             <div class="col-image" style="width:20%;" >
                                                                <img class="" src="{{$productImageItem->image_path}}" alt="{{$productImageItem->name}}">
                                                                <a class="btn btn-sm btn-danger lb_delete_image"  data-url="{{ route('admin.product.destroy-image',['id'=>$productImageItem->id]) }}"><i class="far fa-trash-alt"></i></a>
                                                             </div>
                                                         @endforeach
                                                         @if (!$data->images()->get()->count())
                                                            Chưa thêm hình ảnh nào
                                                         @endif
                                                    </div>
                                                    <hr>
                                                    <span class="badge badge-primary mb-3">Thêm ảnh</span>
                                                    <div class="form-group">

                                                        <input type="file" class="form-control-file img-load-input-multiple border" id="" name="image[]" multiple>
                                                    </div>
                                                    @error('image')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                    <div class="load-multiple-img">
                                                        @if (!$data->images()->get()->count())
                                                        <img class="" src="{{asset('admin_asset/images/upload-image.png')}}" alt="'no image">
                                                        <img class="" src="{{asset('admin_asset/images/upload-image.png')}}" alt="'no image">
                                                        <img class="" src="{{asset('admin_asset/images/upload-image.png')}}" alt="'no image">
                                                        @endif
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
                                                            <input type="text" class="form-control @error('title_seo') is-invalid @enderror" id="" value="{{old('title_seo')?? $data->title_seo }}" name="title_seo" placeholder="Nhập title seo">
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
                                                            <input type="text" class="form-control @error('description_seo') is-invalid @enderror" id="" value="{{old('description_seo')?? $data->description_seo }}" name="description_seo" placeholder="Nhập mô tả seo">
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
                                                            <input type="text" class="form-control @error('keyword_seo') is-invalid @enderror" id="" value="{{old('keyword_seo')?? $data->keyword_seo }}" name="keyword_seo" placeholder="Nhập từ khóa seo">
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
                                            <select class="form-control custom-select select-2-init @error('category_id')
                                                is-invalid
                                                @enderror" id="" value="{{ old('category_id') }}" name="category_id">

                                                <option value="0">--- Chọn danh mục cha ---</option>

                                                @if (old('category_id')||old('category_id')==='0')
                                                    {!! \App\Models\Category::getHtmlOption(old('category_id')) !!}
                                                @else
                                                {!!$option!!}
                                                @endif
                                            </select>
                                            @error('category_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                         {{-- <div class="form-group">
                                            <label class="control-label" for="">Chọn nhà cung cấp</label>
                                            <select class="form-control @error('supplier')
                                                is-invalid
                                                @enderror" id="" value="{{ old('supplier_id') }}" name="supplier_id">

                                                <option value="0">--- Chọn nhà cung cấp ---</option>
                                                @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}" {{ (old('supplier')??$data->supplier_id)==  $item->id ?"selected":""}}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('supplier_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        {{-- <div class="form-group">
                                            <label class="control-label" for="">Số thứ tự</label>
                                            <input type="number" min="0" class="form-control  @error('order') is-invalid  @enderror"  value="{{ old('order')??$data->order }}" name="order" placeholder="Nhập số thứ tự">
                                            @error('order')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                         <div class="form-group">
                                            <label class="control-label" for="">Giá sản phẩm</label>
                                            <input type="text" class="form-control" id="price" onchange="changePrice()" value="{{ old('price')?? $data->price }}" name="price" placeholder="Nhập giá">
                                            @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class=" control-label" for="">Sale(%)</label>
                                            <input type="number" min="0" class="form-control  @error('sale') is-invalid  @enderror"  value="{{ old('sale')??$data->sale }}" name="sale" placeholder="Nhập sale">
                                            @error('sale')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="">Sản phẩm nổi bật</label>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('hot') is-invalid
                                                        @enderror" value="1" name="hot" @if((old('hot')??$data->hot)=="1" ) {{'checked'}} @endif>
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
                                                <input type="radio" class="form-check-input" value="1" name="active" @if((old('active')??$data->active)=='1') {{'checked'}} @endif>Hiện
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="0" @if((old('active')??$data->active)=="0"){{'checked'}} @endif name="active">Ẩn
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
                                                    <input type="checkbox" class="form-check-input @error('ban_chay') is-invalid
                                                        @enderror" value="1" name="ban_chay" @if((old('ban_chay')??$data->ban_chay)=="1" ) {{'checked'}} @endif>
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

                                         @foreach ($attributes as $key=> $attribute)

                                            <div class="form-group">
                                                <label class="control-label" for="">{{ $attribute->name }}</label>
                                                <select class="form-control"  name="attribute[]" >
                                                    <option value="0">--Chọn--</option>
                                                    @foreach ($attribute->childs()->orderby('order')->get() as $k=> $attr)
                                                        <option value="{{ $attr->id }}"
                                                            @if (old('attribute'))
                                                                @if ($attr->id==old('attribute')[$key])
                                                                    selected
                                                                @else
                                                                    {{ $data->attributes()->get()->pluck('id')->contains($attr->id)?'selected':"" }}
                                                                @endif
                                                            @else
                                                            {{ $data->attributes()->get()->pluck('id')->contains($attr->id)?'selected':"" }}
                                                            @endif
                                                        >
                                                            {{ $attr->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('attribute.'.$key)
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                         @endforeach
                                            <hr> --}}
                                        {{--
                                        <div class="alert alert-light mt-3 mb-1">
                                            <strong>Upload file</strong>
                                          </div>

                                        <div class="form-group">
                                            <label for="">Brochure</label>
                                          <div>
                                            <a href="{{ $data->file }}" download>{{ $data->file }}</a>
                                          </div>
                                            <input type="file" class="form-control-file img-load-input border @error('file')
                                            is-invalid
                                            @enderror" id="" name="file">
                                            @error('file')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hướng dẫn sử dụng</label>
                                            <div>
                                                <a href="{{ $data->file2 }}" download>{{ $data->file2 }}</a>
                                            </div>
                                            <input type="file" class="form-control-file img-load-input border @error('file2')
                                            is-invalid
                                            @enderror" id="" name="file2">
                                            @error('file2')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Drive</label>
                                            <div>
                                                <a href="{{ $data->file3 }}" download>{{ $data->file3 }}</a>
                                            </div>
                                            <input type="file" class="form-control-file img-load-input border @error('file3')
                                            is-invalid
                                            @enderror" id="" name="file3">
                                            @error('file3')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        --}}
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
<script>
      function changePrice(){
        var value = $('#price').val();

        value = value.replace(',', ".");

        $('#price').val(value);
    }
</script>
@endsection
