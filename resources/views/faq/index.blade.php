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
		 	FAQ
		 	
		 </div>
		 
		<div class="card-body">
			<ul class="list-group">
				<li v-if="faq" class="list-group-item">
					<b v-html="data"></b>
					<span class="float-right" @click="backBtn">Back</span>
				</li>
			  <li class="list-group-item" @click="ansQns(1)" v-if="!faq">Create 2 models using Migrations - Teacher and Student</li>
			  <li class="list-group-item" @click="ansQns(2)" v-if="!faq">Upload Fake Data for both Models using Faker Library through Laravel Factories</li>
			  <li class="list-group-item" @click="ansQns(3)" v-if="!faq">Create a View for the models where we can create, edit, delete Teacher and Student</li>
			  <li class="list-group-item" @click="ansQns(4)" v-if="!faq">Make Relationship with Student - So, when selecting the teacher from view all his students should appear</li>
			  <li class="list-group-item" @click="ansQns(5)" v-if="!faq">Add Proper Validations and Pagination to the Table View.</li>
			  <li class="list-group-item" @click="ansQns(6)" v-if="!faq">Upload Image for both Teacher and User with some essential details</li>
			</ul> 
		</div>
		
	</div>
@endsection
