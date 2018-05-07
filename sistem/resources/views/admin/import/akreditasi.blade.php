<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@if (Session::has('message'))
		<script>alert("{{ Session::get('message') }}");</script>
	@endif
	@if ($errors->any())
		@foreach ($errors->all() as $error)
			<script>alert("{{ $error }}");</script>
		@endforeach
	@endif
	<form action="{{ url('import_akreditasi')}}" method="post" enctype="multipart/form-data">

		{!! csrf_field() !!}

		<input type="file" name="import_akreditasi"><br>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button type="submit" class="btn btn-success">
			<i class="fa fa-upload"></i> Upload
		</button>

	</form>
</body>
</html>
