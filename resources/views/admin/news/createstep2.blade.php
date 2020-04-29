@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light"> Create News Step 2</h1>
	<br>
		<div class="container">
			<h2 class="text-center text-light">Upload The Images</h2>
			<br>
			<div class="news-content text-light col-md-12">
				@if (Session::has('cheat'))
				    <div class="alert alert-danger">{{ Session::get('cheat') }}</div>
				@endif
				<p>TITLE: {{$news->title}}</p>
				<p>SHORT DESCRIPTION: {{$news->description_short}}</p>
				
				<p>PRESENTATION IMAGE:    <img src="{{asset($news->presentation_image_url)}}" alt="image" width="100vw" height="100vh"> </p>
				
				
			</div>
			<div class="col-md-12">
				
				{{ Form::open(['route' => array('admin.uploadnewsimages',$news->id), 'files' => 'true','method'=>'post','class'=>'form'],['enctype'=>'multipart/form-data']) }}
				
   				
   				
   					
   					
   					
   				<div class="form-group row">
						{{Form::label('images', 'News Images',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
							<div class="col-sm-12">
								{{Form::file('images[]',['class'=>'custom-file-input form-control', 'multiple'])}}
								{{Form::label('images', 'Images',array('class'=>'custom-file-label'))}}
							</div>
					
						
						</div>
						
						
					@if( count( $errors ) > 0 )
					   @foreach ($errors->all() as $error)
					  
					   	<div class="alert alert-danger col-sm-2" role="alert">
							  {{ $error }}
						</div>
					
					       
					  @endforeach
					@endif

						
   				</div>


   					{{ Form::submit('Step 3',['class' => 'btn btn-primary'])}}




				{{ Form::close() }}

			</div>
			<br>
		</div>


	
	  

	

</div>
		<!-- admin-dashboard-content -->
@endsection