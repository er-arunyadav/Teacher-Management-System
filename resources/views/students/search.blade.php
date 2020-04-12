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
		 	Results Found for {{$teacher->full_name}}
		 	
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
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($students)>0)
					@foreach($students as $student)
						<tr>
							<td>
								<img src="{{asset('storage/images/'.$student->avatar)}}"
                                                  			width="50" 
                                                  			 />
								
							</td>
							<td>
								{{$student->first_name.' '.$student->last_name}}
							</td>
							<td>
								{{$student->birthdate}}
							</td>
							<td>
								@if($student->gender == 'm')
									Male
								@else
									Female
								@endif
								
							</td>
							<td>
								{{$student->contact_mobile}}
							</td>
							<td>
								{{$student->contact_email}}
							</td>
							
							<td>
								<a href="{{route('student.edit',['id'=>$student->id])}}" class="btn btn-info text-white">
									Edit
								</a>
								<a href="{{route('student.delete',['id'=>$student->id])}}" class="btn btn-danger text-white">		Delete
								</a>
							</td>
						</tr>
					@endforeach
					@else
						<tr><td >No Result Found</td></tr>
					@endif
				</tbody>
				</table>
		</div>

	</div>
@endsection
