@extends('layouts.master')
@section('title','Chi tiết sản phẩm')
@SECTION('main')
<style>
    img{max-width:100%!important; height:auto;}
</style>
<link rel="stylesheet" href="css/details.css">
<div id="main" class="col-md-9">
    <!-- main -->

    <div id="wrap-inner">
        <div id="product-info">
            <div class="clearfix"></div>
            <h2>{{ $item->name }}</h2>
            <div class="row">
                <div id="product-img" class="col-xs-12 col-sm-12 col-md-6 text-center">
                    <img src="{{ asset('./img/'.$item->img) }}">
                </div>
                <div id="product-details" class="col-xs-12 col-sm-12 col-md-6" style="padding-top:50px">
                    <p>Giá: <span class="price">{{ number_format($item->price,0,',','.') }} VND</span></p>
                    <p>Tình trạng: {{ $item->condition }}</p>
                    <p>Khuyến mại: {{ $item->promotion }}</p>
                    <p>Kho: @if($item->status==1) Còn hàng @else Hết hàng @endif</p>
                    <p>Bảo hành: {{ $item->warranty }}</p>
                    <p class="btn btn-info add-cart text-center"><a href="{{ asset('cart/add/'.$item->product_id) }}">Đặt hàng online</a></p>
                </div>
            </div>
        </div>
        <div id="product-detail" class="col-xs-12 col-sm-12 col-md-12">
            <h2>Thông số cấu hình</h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Thông số cấu hình</th>
                        <th scope="col">Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>{{ $item->name }}</td>
                    </tr>
                    <tr>
                        <td>CPU / Bộ vi xử lý</td>
                        <td>{{ $item->cpu }}</td>
                    </tr>
                    <tr>
                        <td>RAM</td>
                        <td>{{ $item->ram }}</td>
                    </tr>
                    <tr>
                        <td>Ổ cứng</td>
                        <td>{{ $item->storage }}</td>
                    </tr>
                    <tr>
                        <td>Màn hình</td>
                        <td>{{ $item->display }}</td>
                    </tr>
                    <tr>
                        <td>Pin</td>
                        <td>{{ $item->battery }}</td>
                    </tr>
                    <tr>
                        <td>Card màn hình</td>
                        <td>{{ $item->vga }}</td>
                    </tr>
                    <tr>
                        <td>Khối lượng</td>
                        <td>{{ $item->weight }}</td>
                    </tr>
                    <tr>
                        <td>Chất liệu</td>
                        <td>{{ $item->material }}</td>
                    </tr>
                    <tr>
                        <td>Đáp ứng nhu cầu</td>
                        <td>{{ $item->kind }}</td>
                    </tr>
                </tbody>
            </table>
            <h2>Chi tiết sản phẩm</h2>
            <p class="text-justify">{!!$item->description!!}</p>
        </div>
        <div id="comment">
            <h2>Bình luận</h2>
            <div class="col-md-9 comment">
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input required type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="cm">Bình luận:</label>
                        <textarea required rows="5" id="cm" class="form-control" name="content"></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-info">Gửi</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
        <div id="comment-list">
            @foreach($comments as $comment)
            <ul>
                <li class="com-title">
                    {{$comment->comment_name}}
                    <br>
                    <span>{{date('d/m/Y H:i', strtotime($comment->created_at))}}</span>
                </li>
                <li class="com-details">
                    {{$comment->comment_content}}
                </li>
            </ul>
            @endforeach
        </div>
    </div>
    <!-- end main -->
    </div>

@stop

