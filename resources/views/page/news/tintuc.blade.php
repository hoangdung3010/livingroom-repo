
@extends('layout.site')

@section('main')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Tin tức</li>
        </ol>
    </div>
</div>
<div class="faq-w3agile">
    <div class="container"> 
        <h2 class="w3_agile_header">Tin tức mới</h2> 
        <ul class="faq">
            @foreach ($tintuc as $item)
                
           
            <li class="item1"  ><a href="{{url('/xemtintuc',$item->id)}}" style="color: black" title="click here">{{$item->tieude}}</a>
                
            </li>
            @endforeach
           
        </ul> 
      
      
    </div>
</div>
@stop