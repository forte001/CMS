<x-admin-master>

@section('content')
 <h1>User Profile for: {{$user->name}}</h1>

<form action="{{route('user.profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="col-sm-6">

		<div class="mb-4">
			<img class="img-profile rounded-circle" src="{{asset("storage/".$user->user_avatar)}}" width="60" height="60" alt="">
			{{-- <img class="img-profile rounded-circle" src="{{Storage::url($user->user_avatar)}}" width="60" height="60" alt=""> --}}
		</div>

		<div class="form-group">
			<input type="file" name="user_avatar">
		</div>

		<div class="form-group">
		 <label for="name">Username</label>
	<input type="text" name="username" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" aria-describedby="" placeholder="Enter Name" value="{{$user->username}}">
	@error('username')
	<div class="invalid-feedback">{{$message}}</div>
	@enderror
	</div>

		<div class="form-group">
		 <label for="name">Name</label>
	<input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" aria-describedby="" placeholder="Enter Name" value="{{$user->name}}">
	@error('name')
	<div class="invalid-feedback">{{$message}}</div>
	@enderror
	</div>

	<div class="form-group">
		 <label for="email">Email</label>
	<input type="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" aria-describedby="" placeholder="Enter Name" value="{{$user->email}}">
	@error('email')
	@enderror
	</div>

	<div class="form-group">
		 <label for="password">Password</label>
	<input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" aria-describedby="" placeholder="Password">
	@error('password')
	<div class="invalid-feedback">{{$message}}</div>
	@enderror
	</div>

	<div class="form-group">
		 <label for="password">Confirm Password</label>
	<input type="password" name="password_confirmation" class="form-control " id="password-confirmation" aria-describedby="" placeholder="Confirm Password">
	@error('password_confirmation')
	<div class="invalid-feedback">{{$message}}</div>
	@enderror
	</div>

	</div>
	
	<button type="submit" name="Submit" class="btn btn-primary"> Submit</button>
	
</form>
<hr>
<div class="row">
	<div class="col-sm-12">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="UsersTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    	<th>Option</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    	<th>Option</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach($roles as $role)
                    <tr>
                    	<td><input type="checkbox" 
                    		@foreach($user->roles as $user_role)
                    		@if($user_role->slug == $role->slug)
                    		checked
                    		@endif
                    		@endforeach


                    		></td>
                    	<td>{{$role->id}}</td>
                    	<td>{{$role->name}}</td>
                    	<td>{{$role->slug}}</td>
                    	<td>
                    		<form method="post" action="{{route('user.role.attach', $user)}}">
                    			@csrf
                    			@method('PUT')

                    			<input type="hidden" name="role" value="{{$role->id}}">

                    			<button class="btn btn-success">Attach</button></td>
                    		</form>
                    		
                    	<td><form method="post" action="{{route('user.role.detach', $user)}}">
                    			@csrf
                    			@method('PUT')

                    			<input type="hidden" name="role" value="{{$role->id}}">

                    			<button class="btn btn-danger"
                    			@if(!$user->role->contains($role))
                    			disabled 
                    			@endif
                    			>Detach</button></td>
                    		</form>
                    	</td>
					</tr>
                   @endforeach
                  </tbody>            </div>
          </div>
	</div>
</div>


@endsection

</x-admin-master>