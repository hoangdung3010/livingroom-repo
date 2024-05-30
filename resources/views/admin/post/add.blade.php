@extends('layout.main')
@section('title',"Thêm bài viết")
@section('css')
@endsection
@section('content')
<div class="content-wrapper">
   @include('admin.partials.content-header',['name'=>"Bài viết","key"=>"Thêm bài viết"])
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
               <form class="form-horizontal" action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
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
                     <div class="col-md-9">
                        <div class="card card-outline card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Thông tin bài viết</h3>
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

                              </ul>

                              <div class="tab-content">
                                 <!-- START Tổng Quan -->
                                 <div id="tong_quan" class="container tab-pane active"><br>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2 control-label" for="">Tên bài viết</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control nameChangeSlug
                                                   @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" placeholder="Nhập tên bài viết">
                                            </div>
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                           <label class="col-sm-2 control-label" for="">Đường dẫn</label>
                                           <div class="col-sm-10">
                                              <input type="text" class="form-control
                                                 @error('slug') is-invalid  @enderror" id="slug" value="{{ old('slug') }}" name="slug" placeholder="Nhập đường dẫn">
                                           </div>
                                        </div>
                                        @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                     </div>
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

                                    {{-- <div class="form-group">
                                       <div class="row">
                                          <label class="col-sm-2 control-label" for="">Nhập tags</label>
                                          <div class="col-sm-10">
                                             <select class="form-control tag-select-choose" multiple="multiple" name="tags[]"></select>
                                          </div>
                                       </div>
                                    </div> --}}

                                    <div class="form-group">
                                       <div class="row">
                                          <label class="col-sm-2 control-label" for="">Nhập giới thiệu</label>
                                          <div class="col-sm-10">
                                             <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" rows="3" value="" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                                          </div>
                                       </div>
                                       @error('description')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>


                                    <div class="form-group">
                                       <div class="row">
                                          <label class="col-sm-2 control-label" for="" style="text-align: left; margin-bottom: 5px;">Nhập nội dung</label>
                                          <div class="col-sm-10">
                                             <textarea class="form-control tinymce_editor_init @error('content') is-invalid  @enderror" name="content" id="" rows="20" value="" placeholder="Nhập content">
                                             {{ old('content') }}
                                             </textarea>
                                          </div>
                                       </div>
                                       @error('content')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>


                                    <div class="form-group">
                                       <div class="row">
                                          <label class="col-sm-2 control-label" for="" style="text-align: left; margin-bottom: 5px;">Nhập thẻ H</label>
                                          <div class="col-sm-10">
                                             <textarea class="form-control tinymce_editor_init @error('tag_h') is-invalid  @enderror" name="tag_h" rows="20" value="" placeholder="Nhập nội dung">
                                             {{ old('tag_h') }}
                                             </textarea>
                                          </div>
                                       </div>
                                       @error('tag_h')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

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
                                          <label for="">Avatar</label>
                                          <input type="file" class="form-control-file img-load-input border @error('avatar_path') is-invalid @enderror" id="" name="avatar_path">
                                       </div>
                                       <img class="img-load p-1 w-100 border"  src="{{asset('admin_asset/images/upload-image.png')}}" alt="no image" style="height: 200px;object-fit:cover; max-width: 260px;">
                                    </div>
                                    @error('avatar_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    {{-- @include('admin.components.imagemutiple.create-image-mutiple') --}}
                                 </div>
                              </div>











                           </div>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="card card-outline card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Thông tin bài viết</h3>
                           </div>
                           <div class="card-body table-responsive p-3">
                            <div class="form-group">

                                   <label class="control-label" for="">Chọn danh mục</label>

                                    <select class="form-control custom-select select-2-init @error('category_id') is-invalid  @enderror" id="" value="{{ old('category_id') }}" name="category_id">
                                        <option value="">Chọn danh mục</option>
                                        @if (old('category_id'))
                                            {!! \App\Models\provide::getHtmlOption(old('category_id')) !!}
                                        @else
                                            {!!$option!!}
                                        @endif
                                    </select>

                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>

                             <div class="form-group">
                                 <label class="control-label" for="">Thứ tự</label>
                                 <input type="text"
                                     class="form-control  @error('order') is-invalid  @enderror"
                                     value="{{ old('order')??'0' }}" name="order" placeholder="Thứ tự">
                                 @error('order')
                                     <div class="invalid-feedback d-block">{{ $message }}</div>
                                 @enderror
                             </div>
                             <div class="form-group">
                                <label class="control-label pt-0" for="">Trạng thái</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" name="active" @if(old('active')=="1" ||old('active')==null) {{'checked'}} @endif>Hiện
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="0" @if(old('active')=="0" ){{'checked'}} @endif name="active">Ẩn
                                    </label>
                                </div>
                                @error('active')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>

                             <div class="form-group">
                                <label class="control-label" for=""></label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input
                                    @error('hot') is-invalid @enderror" value="1" name="hot" @if(old('hot')==="1" ) {{'checked'}} @endif>
                                    Tin nổi bật
                                    </label>
                                </div>
                                @error('hot')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                             </div>
                           </div>
                        </div>
                     </div>

                     {{-- <div class="col-md-12">
                        @include('admin.components.paragraph.init-paragraph',[
                            'configParagraph'=>config('paragraph.posts')
                        ])
                     </div> --}}

                  </form>
               </div>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content -->
</div>
@endsection
@section('js')
@endsection
