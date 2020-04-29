@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light">Items</h1>
	<div class="text-center">
		<br>
		<hr>
		<h1 class="text-light">You are searching for: {{$value}}</h1>
		<br>
		<hr>
		<form action="{{route('admin.searchitem')}}" method="post">
			<div class="form-group">
			   
			    <div class="col-md-12">
			    	 <label for="searchitem" class="text-light">Search item</label>
			    	<input type="text" class="form-control" id="searchitem"  placeholder="Enter item #id, brand or model name" name="searcheditem" value="{{$value}}">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    	  <br>
			    	 <button type="submit" class="btn btn-primary">Search</button>
			  
			    
			    </div>
			  
			    
			 </div>
		
		</form>
	</div>
	<br>
	<hr>
		<a href="{{route('admin.items.create')}}" class="btn btn-warning font-weight-bold">Create Items</a>


	<div class="table-responsive">
			<table class="table table-dark">
				  <thead>
				    <tr>


				      <th scope="col">ID</th>
				      <th scope="col">Brand</th>
				      <th scope="col">Model Name</th>
				      <th scope="col">Category</th>
				      <th scope="col">Title</th>
				      <th scope="col">Description</th>
				      <th scope="col">Image</th>
				      <th scope="col">Modify</th>
				      <th scope="col">Delete</th>
				    </tr>
				  </thead>
				  <tbody>
				  @foreach($itemsAll as $items) 
				    	@foreach($items as $item)
				    	 <tr>
							<th>{{$item->id}}</th>
							<td>{{$item->brand}}</td>
							<td>{{$item->model_name}}</td>
							<td>{{$item->categorys->name}}</td>
							<td>{{$item->title}}</td>
							<td>{{$item->description}}</td>
							<td><img src="" alt="image" width="5vh" height="5vh"></td>
							<td><a href="{{route('admin.items.edit',$item->id)}}" class="btn btn-success">Modify</a></td>
							<td>
								<form action="{{route('admin.items.destroy',$item->id)}}" method="post">
									 {{method_field('DELETE')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" name="submit" value="Delete" class="btn btn-danger">
							    </form>
						   </td>
				      		

						 </tr>
				    	@endforeach
				@endforeach

				  </tbody>
				</table>
	</div>

	  

	



</div>
		<!-- admin-dashboard-content -->
@endsection