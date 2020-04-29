
@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light">Items Setting</h1>
	
	<hr>
	

	<div class="container">
		<div class="col-md-12">
			<h2 class="text-light text-center">Choise Image and modify</h2>
			<br>
			
			
			@if($itemsthumbnail==null)
				<h2 class="text-center text-light">Store Main Image</h2>
				<br>
			  	<form method="post" action="{{route('admin.storethumbnail',$id)}}" enctype='multipart/form-data'>
							      		 {!! csrf_field() !!}
							      	
							      		 <div class="col-sm-12">
							      		 	 <div class="input-group">
									      		<input type="file" name="mainimage" class="form-control">
									      		
									      			<input type="submit" class="btn btn-success" value="Store">
									      		
									         </div>

									      		@if($errors->has('mainimage'))

									      		<div class="text-center">
									      			<p class="text-center text-danger">
									      				{{$errors->first('mainimage')}}
									      		  	</p>
									      	
									    		</div>

									      		@endif
									    </div>
				</form>

			@else
			<h2 class="text-center text-light">MAIN PAGE IMAGE</h2>
			<br>

				<div class="table-responsive-xl">
				<table class="table table-dark">
					<thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Image</th>
					      <th scope="col">Image URL</th>
					      <th scope="col">Save new</th>
					      <th scope="col">Delete</th>
					    </tr>
					 </thead> 
					 <tbody><


					  
					    <tr>
					    
						      <td>{{$itemsthumbnail->id}}</td>
						      <td><img  width="50px" height="50px" src="{{asset($itemsthumbnail->image_url)}}"></td>
						      <td>{{$itemsthumbnail->image_url}}</td>
						      <td>

						      
						      	 
							      	<form method="post" action="{{route('admin.updatethumbnail',[$id,$itemsthumbnail->id])}}" enctype='multipart/form-data'>
							      		 {!! csrf_field() !!}
							      		 {{ method_field('patch') }}
							      		 <div class="col-sm-12">
							      		 	 <div class="input-group">
									      		<input type="file" name="mainimage" class="form-control">
									      		
									      			<input type="submit" class="btn btn-success" value="Save">
									      		
									         </div>
							      		 </div>
							     	 </form>
							     	 	
									      		@if($errors->has('mainimage'))

									      		<div class="text-center">
									      			<p class="text-center text-danger">
									      				{{$errors->first('mainimage')}}
									      		  	</p>
									      	
									    		</div>

									      		@endif
									    

						 	 </td>
						 	 <td>
						 	 		<form  method="post" action="{{route('admin.deletethumbnail',[$id,$itemsthumbnail->id])}}" enctype='multipart/form-data'>
						 	 			  {{ method_field('delete') }}
   											 {!! csrf_field() !!}

   											 <input type="submit" class="btn btn-danger" value="Delete">
						 	 			
						 	 		</form>
						 	 			
						 	 </td>
					    </tr>
					</tbody>
					   
					
				</table>


			</div>	

			@endif

			<br>
			<h2 class="text-light text-center">ALL IMAGES</h2>

			<div class="table-responsive-xl">
				<table class="table table-dark">
					<thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Image</th>
					      <th scope="col">Image URL</th>
					      <th scope="col">Save new</th>
					      <th scope="col">Delete</th>
					    </tr>
					</thead>
					<tbody>
					    @foreach($images as $key=> $image)


					  
					    <tr>
					    
						      <td>{{$image->id}}</td>
						      <td><img  width="50px" height="50px" src="{{asset($image->url)}}"></td>
						      <td>{{$image->url}}</td>
						      <td>

						      
						      	 
							      	<form method="post" action="{{route('admin.updateimage',$image->id)}}" enctype='multipart/form-data'>
							      		 {!! csrf_field() !!}
							      		 {{ method_field('patch') }}
							      		 <div class="col-sm-12">
							      		 	 <div class="input-group">
									      		<input type="file" name="image" class="form-control">
									      		
									      			<input type="submit" class="btn btn-success" value="Save">
									      		
									         </div>
							      		 </div>
							     	 </form>
							     	 	
									      		@if($errors->has('image'))

									      		<div class="text-center">
									      			<p class="text-center text-danger">
									      				{{$errors->first('image')}}
									      		  	</p>
									      	
									    		</div>

									      		@endif
									    

						 	 </td>
						 	 <td>
						 	 		<form  method="post" action="{{route('admin.destroyimage',$image->id)}}" enctype='multipart/form-data'>
						 	 			  {{ method_field('delete') }}
   											 {!! csrf_field() !!}

   											 <input type="submit" class="btn btn-danger" value="Delete">
						 	 			
						 	 		</form>
						 	 			
						 	 </td>
					    </tr>
					      @endforeach
					  </tbody>
					
				</table>


			</div>
		
   
    
  			
		</div>
	</div>

	  

	



</div>
		<!-- admin-dashboard-content -->
@endsection