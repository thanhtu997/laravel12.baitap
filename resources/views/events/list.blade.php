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
</head>
<body>
	<table class="table table-hover">
		<h1 style="text-align: center;">Event <a class="btn btn-primary" href="{{ url('event/create') }}">Add</a></h1>
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
			<?php $stt=0 ?>
			@foreach($event as $item_event)
			<?php $stt+=1; ?>
				<tr>
					<td>{{ $stt }}</td>
					<td>{{ $item_event->title }}</td>
					<td>{{ $item_event->content }}</td>
					<td>{{ $item_event->time }}</td>
					<td>{{ $item_event->location }}</td>
					<td>
						<a href="{{ url('event/'.$item_event->id) }}"><button class="btn btn-success">Show</button></a>
						<a href="{{ url('event/edit/'.$item_event->id) }}"><button class="btn btn-danger">Edit</button></a>

						<form action="{{ url('event/'.$item_event->id) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('delete') }}
							<a onclick="return confirm('Bạn Có Chắc Muốn Xóa Không?')" href="{{ url('event/'.$item_event->id) }}"><button class="btn btn-warning">Delete</button></a>
							
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>