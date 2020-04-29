@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light">Users</h1>
	<br>
	


	<div class="table-responsive">
			<table class="table table-dark">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
					  <th scope="col">Nickname</th>
				      <th scope="col">Email</th>
				      <th scope="col">Verified</th>
				      <th scope="col">Role</th>
				      <th scope="col">Status(Blocked)</th>
				    
				      <th scope="col">Delete</th>
				    </tr>
				  </thead>
				  <tbody>
				   
				    	@foreach($users as $user)
				    	 <tr>
							<th>{{$user->id}}</th>
							<td><a href="{{route('admin.showprofile',$user->id)}}">{{$user->name}}</a></td>
							<td><a href="{{route('admin.showprofile',$user->id)}}">{{$user->nickname}}</a></td>
							<td>{{$user->email}}</td>
							<td>{{$user->verified}}</td>
							<td>

								{!!Form::model($user,['route' => ['admin.users.update', $user->id],'method' => 'put','files' => true,'class'=>'formRole'],['class' => 'form'])!!}


								<div class="form-group row">
								  
								   <div class="col-sm-8">
								   <!-- {{ Form::text('type',null ,['class' => 'form-control form-control-sm'])}} -->
								   {{Form::select('role', ['user' => 'User', 'premium_user' => 'Premium User','moderator'=>'Moderator'],NULL, array('class' => 'form-control form-control-sm selectOption','id'=>'selected'))}}
								  </div>
								  <!-- {{ Form::submit('Save',['class' => 'btn btn-primary'])}} -->
							
								  </div>

							{!! Form::close() !!}


							</td>
							<td>
								<input type="checkbox" class="userblocked1"  data-action="{{route('admin.changestatus',$user->id)}}" {{ $user->blocked ?'checked':''}} >
							</td>
						
							<td>
								<form action="{{route('admin.users.destroy',$user->id)}}" method="post">
									 {{method_field('DELETE')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" name="submit" value="Delete" class="btn btn-danger">
							    </form>
						   </td>
				      		

						 </tr>
				    	@endforeach

				  </tbody>
				</table>
	</div>

	  

	



</div>
		<!-- admin-dashboard-content -->
@endsection