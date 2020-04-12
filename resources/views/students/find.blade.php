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

  <div class="col-md-6 offset-md-3">
  	
  
		<div class="card">
			 <div class="card-header">
			 	Find Student
			 	<span class="float-right">
			 		<a href="{{route('students')}}" class="btn btn-primary">View Students</a> 
			 	</span>
			 </div>

			<div class="card-body">
				<form action="{{route('student.search')}}" method="post">
					@csrf
					<div class="form-group">
						<label for="">Teachers</label>
						<select name="teacher_id" class="form-control">
							@foreach($teachers as $teacher)
							<option value="{{$teacher->id}}">{{$teacher->full_name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Search</button>
					</div>

				</form>
			</div>

		</div>
	</div>
<br>
@endsection
