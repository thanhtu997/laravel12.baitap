<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"><script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<style>
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
	<h2>Form Add Events</h2>
	<form action="{{ url('event') }}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group row">
			<label for="" class="col-md-1">Title: </label>
			<input type="text" class="col-md-5" name="title" value="{{ old('title') }}">
		</div>
		<div class="form-group row">
			<label for="" class="col-md-1">Content: </label>
			<input type="text" class="col-md-5" name="content" value="{{ old('content') }}">
		</div>
		<div class="form-group row">
			<label for="" class="col-md-1">Time: </label>
			{{-- <input type="text" class="col-md-5" name="time" value="{{ old('time') }}"> --}}
			<div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
				<input class="form-control" name="time" readonly="" type="text">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i>
				</span> 
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-1">Location: </label>
			<input type="text" class="col-md-5" name="location" value="{{ old('location') }}">
		</div>
		<div class="form-group" style="padding-left: 50px;">
			<button type="submit" class="btn btn-primary">Add</button>
			<button type="reset" class="btn btn-info">Reset</button>
		</div>
	</form>
	<script type="text/javascript">
		$(function () {  
		$("#datepicker").datepicker({         
		autoclose: true,         
		todayHighlight: true 
		}).datepicker('update', new Date());
		});
	</script>
</body>
</html>