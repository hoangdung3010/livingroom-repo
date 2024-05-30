@extends('layout.admin')
@section('main')

<form role="form" action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
     @csrf @method('put')
    <div class="form-group">



        <input type="hidden" class="form-control" id="" name="" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control"value="{{$product->product_name}}" id=""name="product_name" placeholder="">

      </div>
      <div class="form-group">
        <label for="">Loại sản phẩm</label>
        <select name="category_id" value="{{$product->category_id}}" id=""class="form-control" >

          @foreach ($cates as $item)
                 <option value="{{$item->id}}">{{$item->categoryname}}</option>
          @endforeach
        </select>

      </div>
      <div class="form-group">
        <label for="">giá bán</label>
        <input type="number" class="form-control" value="{{$product->product_price}}" id="" name="product_price" placeholder="">
      </div>
      <div class="form-group">
        <label for="">giá nhập</label>
        <input type="number" class="form-control" value="{{$product->product_importprice}}" id="" name="product_importprice" placeholder="">
      </div>
      <div class="form-group">
        <label for="">hình ảnh</label>
        <input type="file" class="form-control" value="{{$product->product_img}}" id="" name="product_img" placeholder="">
        <img src="/doan101198/public/image/sach/{{ $product->product_img}}" style="max-width:50px;" alt="">
      </div>
      <div class="form-group">
        <textarea class="tinymce_editor_init"  value="{{$product->description}}" name="description" rows="20" cols="80">

        </textarea>

      </div>
      <div class="form-group">

        <p class="help-block"></p>
      </div>

      <button type="submit" name="" class="btn btn-primary">Lưu lại</button>
      <a class="btn btn-primary" href="{{route('product.index')}}">Quay lại<span></span></a>

</form>



@endsection
