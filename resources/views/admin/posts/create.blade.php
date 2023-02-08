<x-admin-master>
@section('content')


<h1>Create</h1>

<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
	<label for="title">Title</label>
	<input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="enter title">
	</div>

	<div class="form-group">
		<label for="file">File</label>
		<input type="file" name="post_image"id="post_image" placeholder="">
	</div>

	<div class="form-group">
		<textarea name="body" id="body" rows="10" cols="30" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="Submit" class="btn btn-primary">
	</div>
</form>

@endsection
</x-admin-master>