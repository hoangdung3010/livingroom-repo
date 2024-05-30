@extends('layout.admin')
@section('main')

<form role="form" action="{{route('provide.update',$provide->id)}}" method="post" enctype="multipart/form-data">
     @csrf @method('put')
    <div class="form-group">



        <input type="hidden" class="form-control" id="" name="" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Tên nhà cung cấp</label>
        <input type="text" class="form-control"value="{{$provide->provide_name}}" id=""name="provide_name" placeholder="">

      </div>

      <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" class="form-control" value="{{$provide->provide_address}}" id="" name="provide_address" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Điện thoại</label>
        <input type="number" class="form-control" value="{{$provide->phone}}" id="" name="phone" placeholder="">
      </div>


      <button type="submit" name="" class="btn btn-primary">Lưu lại</button>
      <a class="btn btn-primary" href="{{route('provide.index')}}">Quay lại<span></span></a>

</form>



@endsection
