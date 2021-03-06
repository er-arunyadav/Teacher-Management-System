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
			 	Edit Teacher
			 	<span class="float-right">
			 		<a href="{{route('teachers')}}" class="btn btn-primary">View Teacher</a> 
			 	</span>
			 </div>

			<div class="card-body">
				<form method="post" action="{{route('teacher.update',['id'=>$teacher->id])}}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" name="full_name" value="{{$teacher->full_name}}" class="form-control">
					</div>

					<div class="form-group">
						<label for="">Birthday</label>
						<input type="text" name="birthday" class="form-control" value="{{$teacher->birthday}}">
					</div>

					<div class="form-group">
						<label for="">Gender</label>
						<select class="form-control" name="gender">
							<option value="m" @if($teacher->gender=='m') selected='selected' @endif >Male</option>
							<option value="f" @if($teacher->gender=='f') selected='selected' @endif >Female</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Mobile</label>
						<input type="text" name="contact_mobile" class="form-control" value="{{$teacher->contact_mobile}}">
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="contact_mail" class="form-control" value="{{$teacher->contact_mail}}">
					</div>

					<div class="form-group">
						<label for="">Class</label>
						<input type="" name="class" class="form-control" value="{{$teacher->class}}">
					</div>

					<div class="form-group">
						<label for="">Avatar</label>
						<input type="file" name="avatar" class="form-control">
					</div>

					<div class="form-group">
						<img src="{{asset('storage/images/'.$teacher->avatar)}}"
                                                  			width="50" 
                                                  			 />
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
