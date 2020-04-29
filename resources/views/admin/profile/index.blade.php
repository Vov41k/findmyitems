@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">
	<br>
	<h1 class="text-center text-light">Profile</h1>
	<br>
	

	<br>
	
	<!-- 	<div class="col-md-12 text-light">

			<div class="row">
			<div class="col-md-3">
				<img src="{{asset($user->photo_url)}}" class="rounded img-fluid"  alt="YOUR PHOTO HERE">

			</div>
			<div class="col-md-9">
									<form method="post" action="" enctype='multipart/form-data'>
							      		 {!! csrf_field() !!}
							      		 
							      		 
							      		 	 <div class="input-group">
									      		    <input type="file" name="image" class="form-control">
									      		
									      			<input type="submit" class="btn btn-success" value="Save">
									      		
									         </div>
							      		 
							     	 </form>
			</div>
			</div>
			
		</div> -->
		<br>
		<div class="col-md-12 text-light">
			<div class="profile">

				
					   <form action="{{route('admin.updateprofile',$user->id)}}" method="POST" enctype='multipart/form-data'>
					   	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		{{method_field('PATCH')}}
					   	<div class="form-group row">
							    <div for="name" class="col-sm-2 col-form-label">
							    	<img src="{{asset($user->photo_url)}}" class="rounded img-fluid"  alt="YOUR PHOTO HERE">
							    </div>
							    <div class="col-sm-10">
								 <input type="file" name="image"  class="form-control" value="{{$user->photo_url}}">
							    </div>

								@if($errors->has('image'))

								<div class="text-center">
									<p class="text-center text-danger">
									    {{$errors->first('image')}}
									 </p>
									      	
								</div>

								@endif
						     </div>
							
							 <div class="form-group row">
							    <label for="name" class="col-sm-2 col-form-label">Name</label>
							    <div class="col-sm-10">
							      <input type="text"  class="form-control" id="name" name="name" value="{{$user->name}}">
							    </div>
							    @if($errors->has('name'))

								<div class="text-center">
									<p class="text-center text-danger">
									    {{$errors->first('name')}}
									 </p>
									      	
								</div>

								@endif
						     </div>
						      <div class="form-group row">
							    <label for="nickname" class="col-sm-2 col-form-label">Nickname</label>
							    <div class="col-sm-10">
							      <input type="text"  class="form-control" name="nickname" id="nickname" value="" placeholder="{{$user->nickname}}">
							    </div>
							    @if($errors->has('nickname'))

								<div class="text-center">
									<p class="text-center text-danger">
									    {{$errors->first('nickname')}}
									 </p>
									      	
								</div>

								@endif
						     </div>
						     <div class="form-group row">
							    <label for="email" class="col-sm-2 col-form-label">Email</label>
							    <div class="col-sm-10">
							      <p>{{$user->email}}</p>
							    </div>
						     </div>
						       <div class="form-group row">
							    <label for="email" class="col-sm-2 col-form-label">USER ACCOUNT</label>
							    <div class="col-sm-10">
							      <p>{{$user->role}}</p>
							    </div>
						     </div>
									  
						   <div class="form-group row">
						    <div class="col-sm-10">
						      <button type="submit" class="btn btn-primary">Save</button>
						    </div>
			</form>
					     
					 
					 
				
				<!-- <p>Name: <span class="font-weight-bold">{{$user->name}}</span></p>
				<p>Nick: <span class="font-weight-bold">{{$user->nickname}}</span></p>
				<p>Email: <span class="font-weight-bold">{{$user->email}}</span></p>
				<p>User account: <span class="font-weight-bold">{{$user->role}}</span></p> -->
			</div>
			
			
			


		</div>
	

	  

	



</div>
		<!-- admin-dashboard-content -->
@endsection