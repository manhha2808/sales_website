@extends('layouts.app')
@section('title', 'Cập nhật sản phẩm')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Cập nhật sản phẩm</div>
					<div class="panel-body">
                        @include('errors.note')
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-10">
                                    {{-- name --}}
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control" value="{{ $product->name }}">
                                    </div>
                                    {{-- cpu --}}
                                    <div class="form-group" >
                                        <label>CPU</label>
                                        <input required type="text" name="cpu" class="form-control" value="{{ $product->cpu }}">
                                    </div>
                                    {{-- ram --}}
                                    <div class="form-group" >
                                        <label>RAM</label>
                                        <input required type="text" name="ram" class="form-control" value="{{ $product->ram }}">
                                    </div>
                                    {{-- storage --}}
                                    <div class="form-group" >
                                        <label>Ổ cứng</label>
                                        <input required type="text" name="storage" class="form-control" value="{{ $product->storage }}">
                                    </div>
                                    {{-- display --}}
                                    <div class="form-group" >
                                        <label>Màn hình</label>
                                        <input required type="text" name="display" class="form-control" value="{{ $product->display }}">
                                    </div>
                                    {{-- vga --}}
                                    <div class="form-group" >
                                        <label>Card màn hình</label>
                                        <input required type="text" name="vga" class="form-control" value="{{ $product->vga }}">
                                    </div>
                                    {{-- battery --}}
                                    <div class="form-group" >
                                        <label>Pin</label>
                                        <input required type="text" name="battery" class="form-control" value="{{ $product->battery }}">
                                    </div>

                                    {{-- weight --}}
                                    <div class="form-group" >
                                        <label>Trọng lượng</label>
                                        <input required type="text" name="weight" class="form-control" value="{{ $product->weight }}">
                                    </div>
                                    {{-- material --}}
                                    <div class="form-group" >
                                        <label>Chất liệu</label>
                                        <input required type="text" name="material" class="form-control" value="{{ $product->material }}">
                                    </div>
                                    {{-- price --}}
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" class="form-control" value="{{ $product->price }}">
                                    </div>

                                    {{-- img --}}
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input  id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="300px" src="{{ URL('img/'.$product->img) }}">
                                        {{-- <img id="avatar" class="thumbnail" width="300px" src="{{ asset('public/img/'.$product->img) }}"> --}}
                                    </div>
                                    {{-- kind --}}
									<div class="form-group" >
										<label>Loại sản phẩm</label>
										<input required type="text" name="kind" class="form-control" value="{{ $product->kind }}">
                                    </div>
                                    {{-- warranty --}}
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="text" name="warranty" class="form-control" value="{{ $product->warranty }}">
                                    </div>
                                    {{-- promotion --}}
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<input required type="text" name="promotion" class="form-control" value="{{ $product->promotion }}">
                                    </div>
                                    {{-- condition --}}
									<div class="form-group" >
										<label>Tình trạng</label>
										<input required type="text" name="condition" class="form-control" value="{{ $product->condition }}">
                                    </div>
                                    {{-- status --}}
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control" value="{{ $product->status }}">
											<option value="1" @if ($product->status == 1) checked @endif>Còn hàng</option>
											<option value="0" @if ($product->status == 0) checked @endif>Hết hàng</option>
					                    </select>
                                    </div>
                                    {{-- description --}}
									<div class="form-group" >
										<label>Mô tả</label>
                                        <textarea class="ckeditor" required name="description">
                                            {{ $product->description }}
                                        </textarea>

                                        <script>
                                                CKEDITOR.replace( 'description', {
                                                    language: 'vi',
                                                    filebrowserBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html') }}',
                                                    filebrowserImageBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Images') }}',
                                                    filebrowserFlashBrowseUrl: '{{ asset('editor/ckfinder/ckfinder.html?type=Flash') }}',
                                                    filebrowserUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                                    filebrowserImageUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                                    filebrowserFlashUploadUrl: '{{ asset('editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                                                } );
                                        </script>
                                    </div>
                                    {{-- category --}}
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="category" class="form-control">

                                            @foreach ($listcate as $cate)

                                                <option value="{{ $cate->cate_id }}" @if ($product->category == $cate->cate_id) selected @endif>{{ $cate->cate_name }}</option>

                                            @endforeach

					                    </select>
                                    </div>
                                    {{-- featured --}}
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1" @if ($product->featured == 1) checked @endif>
										Không: <input type="radio" checked name="featured" value="0" @if ($product->featured == 0) checked @endif>
                                    </div>

									<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
									<a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
								</div>
                            </div>
                            {{ csrf_field() }}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
    </div>	<!--/.main-->
@stop
