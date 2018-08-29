<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">​
	<title>product</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<style type="text/css" media="screen">
		body{
			margin-top: 30px;
		}
	</style>
</head>
<body>
	<div class="container">
		<a href="#" class="btn btn-success btn-add" data-toggle="modal" data-target="#add">Add</a>
		<div class="table-responsive">
			<table class="table table-responsive">
				<thead>
					<th>stt</th>
					<th>Code</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php $stt=0?>
					@foreach($product as $item_product)
					<?php $stt+=1?>
						<tr>
							<td>{{ $stt }}</td>
							<td>{{ $item_product->code }}</td>
							<td>{{ $item_product->name }}</td>
							<td>{{ number_format($item_product->price,0,',','.') }} VNĐ</td>
							<td>{{ $item_product->quantity }}</td>
							<td>
								<button data-url="{{ route('product-ajax.show',$item_product->id) }}" data-toggle="modal" data-target="#show" class="btn btn-primary btn-show" type="button">Detail</button>

								<button type="button" data-url="{{ route('product-ajax.update',$item_product->id) }}" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning btn-edit">Edit</button>

								<button data-token="{{ csrf_token() }}" data-url="{{ route('product-ajax.destroy',$item_product->id) }}" type="button" class="btn btn-danger btn-del">Delete</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="modal fade" id="show">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Detail</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Code: </label>
						<h3 id="code" class="form-control"></h3>
					</div>
					<div class="form-group">
						<label for="">Name: </label>
						<h3 id="name" class="form-control"></h3>
					</div>
					<div class="form-group">
						<label for="">Price: </label>
						<h3 id="price" class="form-control"></h3>
					</div>
					<div class="form-group">
						<label for="">Quantity: </label>
						<h3 id="quantity" class="form-control"></h3>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="add">
		<div class="modal-dialog">
			<div class="modal-content">

				<form action="" data-url="{{ route('product-ajax.store') }}" id="form-add" method="POST" role="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add Product</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="">Code: </label>
							<input type="text" class="form-control" id="product-code" placeholder="Code">
						</div>
						<div class="form-group">
							<label for="">Name: </label>
							<input type="text" class="form-control" id="product-name" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="">Price: </label>
							<input type="number" class="form-control" id="product-price" placeholder="Price">
						</div>
						<div class="form-group">
							<label for="">Quantity: </label>
							<input type="text" class="form-control" id="product-quantity" placeholder="Quantity">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" id="form-edit">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal Edit</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="">Code</label>
							<input type="text" class="form-control" id="code-edit" placeholder="code">
						</div>
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" id="name-edit" placeholder="name">
						</div>
						<div class="form-group">
							<label for="">Price</label>
							<input type="text" class="form-control" id="price-edit" placeholder="Price">
						</div>
						<div class="form-group">
							<label for="">Quantity</label>
							<input type="text" class="form-control" id="quantity-edit" placeholder="Quantity">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript" charset="utf-8">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$(document).ready(function () {
			$('.btn-show').click(function(event) {
				var url = $(this).data('url')
				$.ajax({
					type: 'get',
					url: url,
					success: function(response){
						$('h3#code').text(response.data.code)
						$('h3#name').text(response.data.name)
						$('h3#price').text(response.data.price)
						$('h3#quantity').text(response.data.quantity)
					},
					error: function (jqXHR, textStatus, errorThrown) {
						//xử lý lỗi tại đây
					}
				})
			})
			//xử lí submit form add
			$('#form-add').submit(function(e) {
				e.preventDefault();
				var url = $(this).data('url');
				$.ajax({
					type: 'post',
					url: url,
					data:{
						code: $('#product-code').val(),
						name: $('#product-name').val(),
						price: $('#product-price').val(),
						quantity: $('#product-quantity').val(),
					},
					success: function(response){
						//hien thi thong bao
						toastr.success('Create Product Success!')
							setTimeout(function(){
								window.location.href="{{ route('product-ajax.index') }}"
							},1000)
					},error: function (jqXHR, textStatus, errorThrown) {
						//xử lý lỗi tại đây
					}
				})
			})
			$('.btn-del').click(function(event) {
				var url = $(this).data('url')
				var token = $(this).data('token')
				if (confirm('bạn có chắc muốn xóa không?')) {
					$.ajax({
						type: 'delete',
						url: url,
						data:{
							_token: token,
						},
						success: function(response){
							toastr.warning('Delete Product Success!')
							setTimeout(function(){
								window.location.reload()
							},1000)
						},error: function(jqXHR, textStatus, errorThrown){

						}
					})
				}
			})
			$('.btn-edit').click(function(e) {
				var url = $(this).attr('data-url')
				$.ajax({
					type: 'get',
					url: url,
					success: function(response){
						$('#code-edit').val(response.data.code)
						$('#name-edit').val(response.data.name)
						$('#price-edit').val(response.data.price)
						$('#quantity-edit').val(response.data.quantity)
						$('#form-edit').attr('data-url','{{ asset('product-ajax/') }}/'+response.data.id)
					},error: function(error) {
						/* Act on the event */
					}
				})
			})
			$('#form-edit').submit(function(e) {
				e.preventDefault()
				var url = $(this).attr('data-url')
				$.ajax({
					type: 'put',
					url: url,
					data:{
						code: $('#code-edit').val(),
						name: $('#name-edit').val(),
						price: $('#price-edit').val(),
						quantity: $('#quantity-edit').val(),
					},
					success: function(response){
						toastr.success('Edit Product Success!')
						$('#modal-edit').modal('hide')
							setTimeout(function(){
								window.location.href="{{ route('product-ajax.index') }}"
							},1000)
					},error: function(jqXHR, textStatus, errorThrown){

					}
				})
			})
		})
	</script>
</body>

</html>