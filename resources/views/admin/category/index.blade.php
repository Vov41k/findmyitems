@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light">Categorys</h1>
	<br>
		<a href="{{route('admin.category.create')}}" class="btn btn-warning font-weight-bold">Create Category</a>


	<div class="table-responsive">
			<table class="table table-dark">
				  <thead>
				    <tr>


				      <th scope="col">ID</th>
				      <th scope="col">Name</th>
				      <th scope="col">Sort Order</th>
				      <th scope="col">Modify Category</th>
				      <th scope="col">Delete Category</th>
				    </tr>
				  </thead>
				  <tbody>
				   
				    	@foreach($categorys as $category)
				    	 <tr>
							<th>{{$category->id}}</th>
							<td>{{$category->name}}</td>
							<td>{{$category->sort_order}}</td>
							<td><a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-success">Modify</a></td>
							<td>
								<form action="{{route('admin.category.destroy',$category->id)}}" method="post">
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