@extends('layout.site')

@section('main')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="{{ route('home.index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Tin tức mới</li>
        </ol>
    </div>
</div>

<div class="about">
    <div class="container">
        <h3 class="w3_agile_header">Tin tức mới</h3>
        <div class="about-agileinfo w3layouts">
            <div class="col-md-8 about-wthree-grids grid-top">
                <h4>{{$xemtintuc->tieude}} </h4>
                <p class="top">{{$xemtintuc->noidung}}</p>
                	
                <div class="about-w3agilerow">
                    <div class="col-md-4 about-w3imgs">
                        <img src="images/p3.jpg" alt="" class="img-responsive zoom-img"/>
                    </div>
                    <div class="col-md-4 about-w3imgs">
                        <img src="images/p4.jpg" alt=""  class="img-responsive zoom-img"/>
                    </div>
                    <div class="col-md-4 about-w3imgs">
                        <img src="images/p3.jpg" alt=""  class="img-responsive zoom-img"/>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="checkout-left-basket">
                    <p style="color: red">{{$xemtintuc->created_at->format('d-m-Y')}}</p>
               </div>
            </div>
            <div class="col-md-4 about-wthree-grids">
                <div class="offic-time">
                    <div class="time-top">
                        <h4>Praesentium :</h4>
                    </div>
                    <div class="time-bottom">
                        <h5>At vero eos </h5>
                        <h5>Accusamus et</h5>
                        <p>Dignissimos at vero eos et accusamus et iusto odio ducimus qui accusamus et. </p>
                    </div>
                </div>
                <div class="testi">
                    <h3 class="w3_agile_header">Testimonial</h3>
                    <!--//End-slider-script -->
                   
                   
                    <div  id="top" class="callbacks_container">
                        <ul class="rslides" id="slider5">
                            <li>
                                <div class="testi-slider">
                                    <h4>" I AM VERY PLEASED.</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu magna dolor, quisque semper.</p>
                                    <div class="testi-subscript">
                                        <p><a href="#">John Doe,</a>Adipiscing</p>
                                        <span class="w3-agilesub"> </span>
                                    </div>	
                                </div>
                            </li>
                            <li>
                                <div class="testi-slider">
                                    <h4>" I AM LOREM IPSUM.</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu magna dolor, quisque semper.</p>
                                    <div class="testi-subscript">
                                        <p><a href="#">elit semper,</a>Dolor Elit</p>
                                        <span class="w3-agilesub"> </span>
                                    </div>	
                                </div>
                            </li>
                           
                        </ul>	
                    </div>
                </div>
            </div>	

            <div class="clearfix"> </div>
        </div>
    </div>
</div>



@stop