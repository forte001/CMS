<x-admin-master>
@section('content')


<h1>Edit Post</h1>

<form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="form-group">
	<label for="title">Title</label>
	<input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="enter title" value="{{$post->title}}">
	</div>

	<div class="form-group">
		<div><img height="100px" src="{{$post->post_image}}" alt=""></div>
		<label for="file">File</label>
		<input type="file" name="post_image"id="post_image" placeholder="">
	</div>

	<div class="form-group">
		<textarea name="body" id="body" rows="10" cols="30" class="form-control">{{$post->body}}</textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="Update" class="btn btn-primary">
	</div>
</form>

@endsection
</x-admin-master>