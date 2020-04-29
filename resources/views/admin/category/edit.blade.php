@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light"> Edit Category</h1>
	<br>
		<a href="{{route('admin.category.index')}}" class="btn btn-info font-weight-bold">Back</a>
		<br>
		<div class="card-body">
			<form action="{{route('admin.category.update',$category->id)}}" method="POST">
				{{method_field('PATCH')}}
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group row">
			    <label for="name" class="col-sm-2 col-form-label text-light">Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control"  placeholder="Name" name="name" value="{{$category->name}}">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="name" class="col-sm-2 col-form-label text-light">Sort Order</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="sort_order" placeholder="" name="sort_order" value="{{$category->sort_order}}">
			    </div>
			  </div>
			   <div class="form-group row">
			    <div class="col-sm-10">
			      <button type="submit" class="btn btn-primary">Save</button>
			    </div>
			</form>




		</div>




	  

	



</div>
		<!-- admin-dashboard-content -->
@endsection