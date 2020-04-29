@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light"> Edit News</h1>
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
				  
				    	@foreach($news->newsimages as $image)
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
						
				
				
				{{ Form::model('$news',['route' => ['admin.news.update',$news->id], 'files' => 'true','method'=>'patch','class'=>'form'],['enctype'=>'multipart/form-data']) }}
				
   					<div class="form-group row">
								{{Form::label('title', 'News Title',array('class'=>'col-sm-2 col-form-label text-light'))}}

								
									<div class="col-sm-10">
							
									{{Form::text('title',$news->title ?? null,['class'=>'form-control'])}}
										
									</div>
							
									
								
									@if($errors->has('title'))
									  <div class="alert alert-danger col-sm-2" role="alert">
									  {{ $errors->first('title') }}
									  </div>
									@endif

								
		   			</div>
		   			<div class="form-group row">
								{{Form::label('description_short', 'Short Description ',array('class'=>'col-sm-2 col-form-label text-light'))}}
								<div class="col-sm-10">
								{{Form::text('description_short',$news->description_short ?? null,['class'=>'form-control'])}}
								</div>
								@if($errors->has('description_short'))
								  <div class="alert alert-danger col-sm-2" role="alert">
								  {{ $errors->first('description_short') }}
								  </div>
								@endif
		   			</div>
		   			<div class="form-group row">
						{{Form::label('image', 'Presentation Image',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
							<div class="col-sm-12">
								{{Form::file('image',['class'=>'custom-file-input form-control' ])}}
								{{Form::label('image', $news->presentation_image_url,array('class'=>'custom-file-label'))}}
							</div>
							<br>
							<div class="col-sm-8 im100">
								<img src="{{asset($news->presentation_image_url)}}">
							</div>
					
							
						</div>
						@if($errors->has('image'))
							  <div class="alert alert-danger col-sm-2" role="alert">
							  {{ $errors->first('image') }}
							  </div>
							@endif
						
   					</div>
   				
   					
   					
   					<div class="form-group row form-class" data-url="{{route('admin.uploadnewsimagestextarea',$news->id)}}">
						{{Form::label('description', 'Description *',array('class'=>'col-sm-2 col-form-label text-light'))}}
								<div class="col-sm-10">
								{{Form::textarea('description',$news->description ?? null ,['class'=>'form-control textareaclass', 'id'=>'summernote'])}}
							
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