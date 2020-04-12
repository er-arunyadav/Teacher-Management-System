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
			 	Add Student
			 	<span class="float-right">
			 		<a href="{{route('students')}}" class="btn btn-primary">View Students</a> 
			 	</span>
			 </div>

			<div class="card-body">
				<form method="post" action="{{route('student.store')}}" enctype="multipart/form-data">
					@csrf

					<div class="form-group">
						<label for="">Assign Teacher</label>
						<select class="form-control" name="teacher_id">
							@foreach($teachers as $teacher)
								<option value="{{$teacher->id}}">{{$teacher->full_name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="">First name</label>
						<input type="text" name="first_name" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Last name</label>
						<input type="text" name="last_name" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Birthday</label>
						<input type="text" name="birthdate" class="form-control" placeholder="1994-11-04">
					</div>

					<div class="form-group">
						<label for="">Gender</label>
						<select class="form-control" name="gender">
							<option value="m">Male</option>
							<option value="f">Female</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Mobile</label>
						<input type="text" name="contact_mobile" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="contact_email" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Avatar</label>
						<input type="file" name="avatar" class="form-control">
					</div>

					<div class="form-group">
						<button class="btn btn-primary" type="submit">Submit</button>
						
					</div>

				</form>
			</div>

		</div>
	</div>
<br>
@endsection
