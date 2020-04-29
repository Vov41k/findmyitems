@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light">Items</h1>
	<br>
	<!-- 'brand',
    	'model_name',
    	'category',
    	'title',
    	'description' -->


	<div class="container">
		<div class="col-md-12">
		
				{{ Form::open(['route' => 'admin.items.store', 'files' => 'true','method'=>'post','class'=>'form'],['enctype'=>'multipart/form-data']) }}
					<div class="form-group row">
						{{Form::label('brand', 'Brand *',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::text('brand',$item->brand ?? null ,['class'=>'form-control'])}}
						</div>
						@if($errors->has('brand'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('brand') }}
						  </div>
						@endif
   					</div>
   					<div class="form-group row">
						{{Form::label('model_name', 'Model Name *',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::text('model_name',$item->model_name ?? null ,['class'=>'form-control'])}}
						</div>
						@if($errors->has('model_name'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('model_name') }}
						  </div>
						@endif
   					</div>
   					
   					<div class="form-group row">
						{{Form::label('title', 'Title *',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::text('title',$item->title ?? null ,['class'=>'form-control'])}}
						</div>
						@if($errors->has('title'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('title') }}
						  </div>
						@endif
   					</div>
   					
   					<div class="form-group row">
   						{{Form::label('category', 'Category *',array('class'=>'col-sm-2 col-form-label text-light'))}}
						
						<div class="col-sm-10">
						{!! Form::select('category', $category, null, ['class' => 'form-control']) !!}
					
						</div>
						@if($errors->has('category'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('category') }}
						  </div>
						@endif
   					</div>
   					<div class="form-group row">
						{{Form::label('description', 'Description *',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::textarea('description',$item->description ?? null ,['class'=>'form-control'])}}
						</div>
						@if($errors->has('description'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('description') }}
						  </div>
						@endif
   					</div>
   						<div class="form-group row">
						{{Form::label('images', 'Images',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
							<div class="col-sm-12">
								{{Form::file('images[]',['class'=>'custom-file-input form-control', 'multiple'])}}
								{{Form::label('images', 'Images',array('class'=>'custom-file-label'))}}
							</div>
					
						
						</div>
					@if($errors->has('images.0'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('images.0') }}
						  </div>
						@endif
						
   					</div>
						<h2 class="text-light text-center">Contact Info</h2>
						<h3 class="text-light text-center"> The field is not REQUIRED</h3>
					<div class="form-group row">
						{{Form::label('country', 'Country',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::text('country',$item->country ?? null ,['class'=>'form-control'])}}
						</div>
						@if($errors->has('country'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('country') }}
						  </div>
						@endif
   					</div>
   						<div class="form-group row">
						{{Form::label('city', 'City',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::text('city',$item->city ?? null ,['class'=>'form-control'])}}
						</div>
						@if($errors->has('city'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('city') }}
						  </div>
						@endif
   					</div>
   						<div class="form-group row">
						{{Form::label('street_adress', 'Street Adress',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::text('street_adress',$item->street_adress ?? null ,['class'=>'form-control'])}}
						</div>
						@if($errors->has('street_adress'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('street_adress') }}
						  </div>
						@endif
   					</div>
   					<div class="form-group row">
						{{Form::label('phone', 'Phone',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::text('phone',$item->phone ?? null ,['class'=>'form-control'])}}
						</div>
						@if($errors->has('phone'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('phone') }}
						  </div>
						@endif
   					</div>
   					<div class="form-group row">
						{{Form::label('email', 'Email',array('class'=>'col-sm-2 col-form-label text-light'))}}
						<div class="col-sm-10">
						{{Form::email('email',$item->email ?? null ,['class'=>'form-control'])}}
						</div>
						@if($errors->has('email'))
						  <div class="alert alert-danger col-sm-2" role="alert">
						  {{ $errors->first('email') }}
						  </div>
						@endif
   					</div>

   				
   				

   					{{ Form::submit('Save',['class' => 'btn btn-primary'])}}




				{{ Form::close() }}
				<br>
   
    
  			
		</div>
	</div>

	  

	



</div>
		<!-- admin-dashboard-content -->
@endsection