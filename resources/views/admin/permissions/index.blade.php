<x-admin-master>
@section('content')

<h1>Permissions</h1>
<div class="row">
	
	<div class="col-sm-9">
			<div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Slug</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </tfoot>
		</div>
	</div>
</div>
</div>

@endsection
</x-admin-master>