@extends('layout.admin')
@section('main')

<form role="form" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
     @csrf
    <div class="form-group">



        <input type="hidden" class="form-control" id="" name="" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" id=""name="product_name" placeholder="">

      </div>
      <div class="form-group">
        <label for="">Loại sản phẩm</label>
        <select name="category_id" id=""class="form-control" >
                 <option value="">chọn</option>
          @foreach ($cates as $item)
                 <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
        </select>

      </div>
      <div class="form-group">
        <label for="">giá bán</label>
        <input type="number" class="form-control" id="" name="product_price" placeholder="">
      </div>
      <div class="form-group">
        <label for="">giá nhập</label>
        <input type="number" class="form-control" id="" name="product_importprice" placeholder="">
      </div>
      <div class="form-group">
        <label for="">hình ảnh</label>
        <input type="file" class="form-control" id="" name="product_img" placeholder="">
      </div>

      <div class="form-group tinymce_editor_init">
        <textarea class="tinymce_editor_init" name="description" rows="20" cols="80">
        {{old('description')}}
        </textarea>
        <p class="help-block">Example block-level help text here.</p>
      </div>

      <button type="submit" name="" class="btn btn-primary">Submit</button>
      <a class="btn btn-primary" href="{{route('category.index')}}">Quay lại<span></span></a>

</form>



@endsection

