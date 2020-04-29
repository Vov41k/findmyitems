@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light"> Create News</h1>
	<br>
		<div class="container">
		<div class="col-md-12">
							{{ Form::open(['route' => 'admin.news.store', 'files' => 'true','method'=>'post','class'=>'form']) }}
				
   							<div class="form-group row">
								{{Form::label('title', 'News Title',array('class'=>'col-sm-2 col-form-label text-light'))}}

								
									<div class="col-sm-10">
							
									{{Form::text('title',null,['class'=>'form-control'])}}
										
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
								{{Form::text('description_short',null,['class'=>'form-control'])}}
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
								{{Form::label('image', 'Image',array('class'=>'custom-file-label'))}}
							</div>
					
							
							</div>
						@if($errors->has('image'))
							  <div class="alert alert-danger col-sm-2" role="alert">
							  {{ $errors->first('image') }}
							  </div>
							@endif
						
   					</div>


   					{{ Form::submit('STEP 2',['class' => 'btn btn-primary'])}}




				{{ Form::close() }}
		

				<br>
   
    
  			
		</div>
	</div>

	
	  

	



</div>
		<!-- admin-dashboard-content -->
@endsection