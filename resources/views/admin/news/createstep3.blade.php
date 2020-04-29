@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light"> Create News Step 3</h1>
	<br>
		<div class="container">
			<h2 class="text-center text-light">Create News,Use Uploaded Image Url and HTML TAGS</h2>
			<br>
			<div class="news-content text-light col-md-12">
			<div class="table-responsive">
			<table class="table table-dark table-hover">
				  <thead>
				    <tr>


				    
				      <th scope="col">Image</th>
				      <th scope="col">Link</th>
				      <th scope="col">Delete</th>
				     
				    </tr>
				  </thead>
				  <tbody class="tbody">
				   
				    	@foreach($newsimages as $image)
				    	 <tr class="image{{$image->id}}">

							<td><img src="{{asset($image->image_url)}}" alt="image" width="50vw" height="50vh"></td>
							<td class="text-light">http://findmyitems.com/{{$image->image_url}}</td>
							<td class="text-light">
								<form action="{{route('admin.deletenewsimage',$image->id)}}" method="post" >
											 {{method_field('DELETE')}}
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="submit" name="submit" value="Delete" class="btn btn-danger deleteimg" data-id='{{$image->id}}'>
							    </form>
							</td>
						
	
						 </tr>
				    	@endforeach

				     
				      
				      
				      
				      
				 
				   
				   
				  </tbody>
				</table>
	</div>
				
				
			</div>
			<div class="col-md-12">
						
				
				{{ Form::open(['route' => array('admin.updatenewsdescription',$id),'method'=>'patch','class'=>'form'],['enctype'=>'multipart/form-data']) }}
				
				
   				
   				
   					
   					
   						<div class="form-group row form-class" data-url="{{route('admin.uploadnewsimagestextarea',$id)}}">
						{{Form::label('description', 'Description *',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::textarea('description',null ,['class'=>'form-control textareaclass', 'id'=>'summernote'])}}
					
						</div>
						@if($errors->has('description'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('description') }}
						  </div>
						@endif
   					</div>


   					{{ Form::submit('Save',['class' => 'btn btn-primary'])}}




				{{ Form::close() }}

			</div>
			<br>
		</div>


	
	  

	

</div>
		<!-- admin-dashboard-content -->
@endsection