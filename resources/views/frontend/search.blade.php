@extends('layouts.master')
@section('title','Search')
@SECTION('main')
{{--  <link rel="stylesheet" href="css/search.css">  --}}

<div id="main" class="col-md-9">
	<!-- main -->
	<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
	<div id="slider">
		<div id="demo" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			</ul>

			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/home/slide-1.png" alt="Los Angeles" >
				</div>
				<div class="carousel-item">
					<img src="img/home/slide-2.png" alt="Chicago">
				</div>
				<div class="carousel-item">
					<img src="img/home/slide-3.png" alt="New York" >
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</div>

	<div id="banner-t" class="text-center">
		<div class="row">
			<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
				<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
			</div>
			<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
				<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
			</div>
		</div>
	</div>

	<div id="wrap-inner">
		<div class="products">
			<h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
			<div class="product-list row">
			@foreach($items as $item)
            <div class="product-item col-md-3 col-sm-6 col-xs-12" style="height:380px">
                <a href="#"><img style="height:160px; width:200px" src="{{asset('./img/'.$item->img)}}" class="img-thumbnail"></a>
                <p><a href="#">{{ $item->name }}</a></p>
                <p>Nhu cầu: {{ $item->kind }}</p>
                <p>Bảo hành: {{ $item->warranty }}</p>
                <p class="price">{{ number_format($item->price,0,',','.') }}</p>
                <p>Tình trạng: @if ($item->status == 1) Còn hàng @else Hết hàng @endif</p>
                <a href="{{ asset('detail/'.$item->product_id.'/'.$item->slug.'.html') }}" class="marsk">
                    <p>Xem chi tiết</p>
                </a>
            </div>
            @endforeach()
			</div>
		</div>
    </div>
@stop
