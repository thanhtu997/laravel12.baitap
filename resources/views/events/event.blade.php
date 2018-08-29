<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">​
	<title>Event</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"><script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<style type="text/css" media="screen">
		body{
			margin-top: 30px;
		}
		label{
		margin-left: 20px;
		}
		#datepicker{
		width:180px; 
		margin: 0 20px 20px 20px;
		}
		#datepicker > span:hover{
		cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2 class="text-center">Event <a href="" class="btn btn-primary btn-add" data-toggle="modal" data-target="#modal-add">Add</a></h2>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Stt</th>
						<th>Title</th>
						<th>Content</th>
						<th>Time</th>
						<th>Location</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt=0; ?>
					@foreach($event as $item_event)
					<?php $stt+=1;?>
						<tr>
							<td>{{ $stt }}</td>
							<td>{{ $item_event->title }}</td>
							<td>{{ $item_event->content }}</td>
							<td>{{ $item_event->time }}</td>
							<td>{{ $item_event->location }}</td>
							<td>
								<button data-url="{{ route('event-ajax.show',$item_event->id) }}" data-toggle="modal" data-target="#modal-show" class="btn btn-primary btn-show" type="button">Detail</button>
								<button data-url="{{ route('event-ajax.update',$item_event->id) }}" data-toggle="modal" data-target="#modal-edit" class="btn btn-danger btn-edit">Edit</button>
								<button data-url="{{ route('event-ajax.destroy',$item_event->id) }}" class="btn btn-warning btn-del">Delete</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
	<div class="modal fade" id="modal-show">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal Detail</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Title</label>
						<h3 id="title" class="form-control"></h3>
					</div>
					<div class="form-group">
						<label for="">Content</label>
						<h3 id="content" class="form-control"></h3>
					</div>
					<div class="form-group">
						<label for="">Time</label>
						<h3 id="time" class="form-control"></h3>
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<h3 id="location" class="form-control"></h3>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="modal-add">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" data-url="{{ route('event-ajax.store') }}" id="form-add" method="POST" role="form" >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal Add</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="">Title: </label>
							<input type="text" class="form-control" id="event-title" placeholder="Title">
						</div>
						<div class="form-group">
							<label for="">Content: </label>
							<input type="text" class="form-control" id="event-content" placeholder="Content">
						</div>
						<div class="form-group">
							<label for="">Time: </label>
							<div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
								<input id="event-time" class="form-control" name="time" readonly="" type="text">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
								</span> 
							</div>
						</div>
						<script type="text/javascript">
							$(function () {  
							$("#datepicker").datepicker({         
							autoclose: true,         
							todayHighlight: true 
							}).datepicker('update', new Date());
							});
						</script>
						<div class="form-group">
							<label for="">Location: </label>
							<input type="text" class="form-control" id="event-location" placeholder="Location">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="Submit" class="btn btn-primary">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" id="form-edit" role="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal Edit</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="">Title: </label>
							<input type="text" class="form-control" id="title-edit" placeholder="Title">
						</div>
						<div class="form-group">
							<label for="">Content: </label>
							<input type="text" class="form-control" id="content-edit" placeholder="Content">
						</div>
						<div class="form-group">
							<label for="">Time: </label>
							<div id="datepicker_edit" class="input-group date" data-date-format="yyyy-mm-dd">
								<input id="time-edit" class="form-control" name="time" readonly="" type="text">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
								</span> 
							</div>
						</div>
						<script type="text/javascript">
							$(function () {  
							$("#datepicker_edit").datepicker({         
							autoclose: true,         
							todayHighlight: true 
							}).datepicker('update', new Date());
							});
						</script>
						<div class="form-group">
							<label for="">Location: </label>
							<input type="text" class="form-control" id="location-edit" placeholder="Location">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

{{-- 	<script src="//code.jquery.com/jquery.js"></script> --}}
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
						$('h3#title').text(response.data.title)
						$('h3#content').text(response.data.content)
						$('h3#time').text(response.data.time)
						$('h3#location').text(response.data.location)
					},
					error: function (jqXHR, textStatus, errorThrown) {
						//xử lý lỗi tại đây
					}
				})
			})
			$('#form-add').submit(function(e){
				e.preventDefault();
				var url = $(this).data('url')
				$.ajax({
					type: 'post',
					url: url,
					data:{
						title: $('#event-title').val(),
						content: $('#event-content').val(),
						time: $('#event-time').val(),
						location: $('#event-location').val(),
					},
					success: function(response){
						toastr.success("Create Events Success!")
							setTimeout(function(){
								window.location.reload()
							},800)
					},error: function (jqXHR, textStatus, errorThrown) {
						//xử lý lỗi tại đây
					}
				})
			})
			$('.btn-del').click(function(event) {
				var url=$(this).data('url')
				var token = $(this).data('token')
				$.ajax({
					type: 'delete',
					url: url,
					data:{
						_token: token,
					},
					success: function(response){
						toastr.warning('Delete Events Success')
						setTimeout(function(){
							window.location.reload()
						},800)
					},error: function (jqXHR, textStatus, errorThrown) {
						//xử lý lỗi tại đây
					}
				})
			})
			$('.btn-edit').click(function(e) {
				var url = $(this).attr('data-url')
				$.ajax({
					type: 'get',
					url: url,
					success: function(response){
						$('#title-edit').val(response.data.title),
						$('#content-edit').val(response.data.content)
						$('#time-edit').val(response.data.time)
						$('#location-edit').val(response.data.content)
						$('#form-edit').attr('data-url','{{ asset('event-ajax/') }}/'+response.data.id)
					},error: function(error) {
						/* Act on the event */
					}
				})
			})
			$('#form-edit').submit(function(e){
				e.preventDefault()
				var url = $(this).attr('data-url')
				$.ajax({
					type: 'put',
					url: url,
					data:{
						title: $('#title-edit').val(),
						content: $('#content-edit').val(),
						time: $('#time-edit').val(),
						location: $('#location-edit').val(),
					},
					success: function(response){
						toastr.success('Edit Events Success!')
						$('#modal-edit').modal('hide')
						setTimeout(function(){
							window.location.reload()
						},800)
					},error: function (jqXHR, textStatus, errorThrown) {
						//xử lý lỗi tại đây
					}
				})
			})
		})
	</script>
</body>
</html>