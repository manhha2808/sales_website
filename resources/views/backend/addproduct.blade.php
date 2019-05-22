@extends('layouts.app')
@section('title', 'Thêm sản phẩm')
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
					<div class="panel-heading">Thêm sản phẩm</div>
					<div class="panel-body">
                        @include('errors.note')
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
                                    {{-- name --}}
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control">
                                    </div>
                                    {{-- cpu --}}
                                    <div class="form-group" >
                                        <label>CPU</label>
                                        <input required type="text" name="cpu" class="form-control">
                                    </div>
                                    {{-- ram --}}
                                    <div class="form-group" >
                                        <label>RAM</label>
                                        <input required type="text" name="ram" class="form-control">
                                    </div>
                                    {{-- storage --}}
                                    <div class="form-group" >
                                        <label>Ổ cứng</label>
                                        <input required type="text" name="storage" class="form-control">
                                    </div>
                                    {{-- display --}}
                                    <div class="form-group" >
                                        <label>Màn hình</label>
                                        <input required type="text" name="display" class="form-control">
                                    </div>
                                    {{-- vga --}}
                                    <div class="form-group" >
                                        <label>Card màn hình</label>
                                        <input required type="text" name="vga" class="form-control">
                                    </div>
                                    {{-- battery --}}
                                    <div class="form-group" >
                                        <label>Pin</label>
                                        <input required type="text" name="battery" class="form-control">
                                    </div>

                                    {{-- weight --}}
                                    <div class="form-group" >
                                        <label>Trọng lượng</label>
                                        <input required type="text" name="weight" class="form-control">
                                    </div>
                                    {{-- material --}}
                                    <div class="form-group" >
                                        <label>Chất liệu</label>
                                        <input required type="text" name="material" class="form-control">
                                    </div>
                                    {{-- price --}}
									<div class="form-group" >
										<label>Giá sản phẩm</label>
										<input required type="number" name="price" class="form-control">
                                    </div>

                                    {{-- img --}}
									<div class="form-group" >
										<label>Ảnh sản phẩm</label>
										<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
                                    </div>
                                    {{-- kind --}}
									<div class="form-group" >
										<label>Loại sản phẩm</label>
										<input required type="text" name="kind" class="form-control">
                                    </div>
                                    {{-- warranty --}}
									<div class="form-group" >
										<label>Bảo hành</label>
										<input required type="text" name="warranty" class="form-control">
                                    </div>
                                    {{-- promotion --}}
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<input required type="text" name="promotion" class="form-control">
                                    </div>
                                    {{-- condition --}}
									<div class="form-group" >
										<label>Tình trạng</label>
										<input required type="text" name="condition" class="form-control">
                                    </div>
                                    {{-- status --}}
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="status" class="form-control">
											<option value="1">Còn hàng</option>
											<option value="0">Hết hàng</option>
					                    </select>
                                    </div>
                                    {{-- description --}}
									<div class="form-group" >
										<label>Mô tả</label>
                                        <textarea class="ckeditor" required name="description"></textarea>

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

                                            @foreach ($catelist as $cate)

                                                <option value="{{ $cate->cate_id }}">{{ $cate->cate_name }}</option>

                                            @endforeach

					                    </select>
                                    </div>
                                    {{-- featured --}}
									<div class="form-group" >
										<label>Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value="1">
										Không: <input type="radio" checked name="featured" value="0">
                                    </div>

									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
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
