@extends('layouts.main')

@section('content')

	@if(count($errors) > 0)
		<ul class="list-group">
			@foreach($errors->all() as $error)
			<li class="list-group-item text-danger">
				{{$error}}
			</li>
			@endforeach
		</ul>
	@endif

	@if(session('success'))
		<div class="alert alert-success">
		<strong>{{session('success')}}</strong>
		</div>
	@endif

	<div class="card">
		 <div class="card-header">
		 	Teachers
		 	<span class="float-right">
		 		<a href="{{route('teacher.create')}}" class="btn btn-primary">Add Teacher</a> 
		 	</span>
		 </div>

		<div class="card-body">
				<table class="table table-bordered">
				<thead>
					<tr>
						<th>Avatar</th>
						<th>Name</th>
						<th>Birthday</th>
						<th>Gender</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Class</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($teachers as $teacher)
						<tr>
							<td>
								<img src="{{asset('storage/images/'.$teacher->avatar)}}"
                                                  			width="50" 
                                                  			 />
								
							</td>
							<td>
								{{$teacher->full_name}}
							</td>
							<td>
								{{$teacher->birthday}}
							</td>
							<td>
								@if($teacher->gender == 'm')
									Male
								@else
									Female
								@endif
								
							</td>
							<td>
								{{$teacher->contact_mobile}}
							</td>
							<td>
								{{$teacher->contact_mail}}
							</td>
							<td>
								{{$teacher->class}}
							</td>
							<td>
								<a href="{{route('teacher.edit',['id'=>$teacher->id])}}" class="btn btn-info text-white">
									Edit
								</a>
								<a href="{{route('teacher.delete',['id'=>$teacher->id])}}" class="btn btn-danger text-white">		Delete
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
				</table>
		</div>
		<div class="row" style="padding: 0 0 0 21px;">
		      <div class="col-12">
		        {{$teachers->links('layouts.pagination')}}
		      </div>
		             
		</div>
	</div>
@endsection
