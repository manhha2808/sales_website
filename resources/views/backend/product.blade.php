@extends('layouts.app')
@section('title', 'Quản lý sản phẩm')
@section('content')
	<div class="col-sm-12 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách sản phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{ asset('admin/product/add') }}" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
                                            <th>Tên Sản phẩm</th>
                                            <th>Ảnh</th>
                                            <th>Danh mục</th>
                                            <th>Phân loại</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Tình trạng</th>
                                            <th>Trạng thái</th>
                                            <th>Nổi bật</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($productlist as $product)

										<tr>
                                            <td>{{ $product->product_id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td><img src="{{ URL('img/'.$product->img) }}" alt="thumbnail" width="110px" height="80px"></td>
                                            <td>{{ $product->cate_name }}</td>
                                            <td>{{ $product->kind }}</td>
                                            <td>{{ number_format($product->price,0,',','.') }} VND</td>
                                            <td>{{ $product->condition }}</td>
                                            <td>@if ($product->status == 1) Còn hàng @else Hết hàng @endif</td>
                                            <td>
                                                <input type="checkbox" name="featured_checkbox" id="featured_checkbox" onclick="return false;" @if ($product->featured == 1) checked @endif>
                                            </td>
											<td>
												<a href="{{ asset('admin/product/edit/'.$product->product_id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{ asset('admin/product/destroy/'.$product->product_id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
                                        </tr>

                                        @endforeach

									</tbody>
								</table>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop
