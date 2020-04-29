@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card ">

	<h1 class="text-center text-light">News</h1>
	<br>

		<a href="{{route('admin.news.create')}}" class="btn btn-warning font-weight-bold mb-4">Create News</a>
	<br>

<div class="container-fluid text-light">
	<!-- <div class="col-xl-12 col-12 im100"> -->
		<div class="row im100 ">
			@foreach($news as $news)
  <div class="col-12 col-sm-12 col-sm-6 col-xl-6 pb-3 ">
  	<!-- <div class="container-fluid"> -->
  		  	<div class="row align-items-baseline  ">
		  		<div class=" col-xl-10 col-sm-12 col-12 ">
		  			    <div class="card news-card">
						      <div class="card-body ">
						      	<div class="container-fluid">
						      		<div class="row">
							      		<div class="col-xl-8">
								      		 <h2 class="card-title text-dark">{{$news->title}}</h2>
								       		 <p class="card-text text-dark">{{$news->description_short}}</p>
							      		</div>
								      	<div class="col-xl-4">
								      		<img src="{{asset($news->presentation_image_url)}}">
								      	</div>
						      		</div>
						      		
						      	</div>

						     
						       
						     <a href="{{route('admin.news.show',$news->id)}}" class="btn text-danger font-weight-bold">Read more...</a>
						      </div>

					    </div>
					    <br>
		  		</div>
		  		<div class="col-xl-2 col-sm-12 col-12">
		  			<div class="row btns">
		  				<div class="col-6 col-xl-12 mb-3 pl-xl-0"><a href="{{route('admin.news.edit',$news->id)}}" class="btn btn-info w-100">Modify</a></div>
		  				<div class="col-6 col-xl-12  pl-xl-0">
		  					<form action="{{route('admin.news.destroy',$news->id)}}" method="post">
									 {{method_field('DELETE')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" name="submit" value="Delete" class="btn btn-danger w-100">
							    </form>
		  					<!-- <a href="" class="btn btn-danger w-100">delete</a> -->
		  				</div>

		  			</div>
		  			<!-- 	<div class="row">
		  				
		  				
		  			</div> -->
		  				<!-- <div class="col-xl-12"> -->
		  					<!-- <a href="" class="btn btn-danger">Delete</a> -->
		  						
		  				<!-- </div> -->
		  					<!-- <div class="col-xl-12"> -->
		  						<!-- <a href="" class="btn btn-info">Modify</a> -->
		  						
		  				<!-- </div> -->
		  		<!-- 	<div class="row">

		  				<br>
		  				<div class="col-xl-12">
		  						<a href="" class="btn btn-info">Modify</a>
		  							<br>
		  				</div>

		  			</div> -->
				  				<!-- <div class="container-fluid"> -->
						    		<!-- <div class="row"> -->
						    			<!-- <div class="col-xl-6"> -->
						    				
						    			<!-- </div> -->
						    			<!-- <br> -->
						    			<!-- <div class="col-xl-6"> -->
						    			
						    			<!-- </div> -->
						    		<!-- </div> -->
				    			<!-- </div> -->
		  		</div>
  	</div>
  	<!-- </div> -->

<!--     <div class="card">
      <div class="card-body">
      	<div class="container-fluid">
      		<div class="row">
	      		<div class="col-xl-8">
		      		 <h2 class="card-title text-dark">{{$news->description_short}}</h2>
		       		 <p class="card-text text-dark">With supporting text below as a natural lead-in to additional content.</p>
	      		</div>
		      	<div class="col-xl-4">
		      		<img src="{{asset($news->presentation_image_url)}}">
		      	</div>
      		</div>
      		
      	</div>

     
       
        <a href="#" class="btn text-danger">Read more...</a>
      </div>

    </div>
    <br> -->
<!--     <div class="buttons">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-xl-6">
    				<a href="" class="btn btn-danger">Delete</a>
    			</div>
    			<div class="col-xl-6">
    				<a href="" class="btn btn-info">Modify</a>
    			</div>
    		</div>
    	</div>
    </div> -->
  </div>


  			@endforeach
  		
 
</div>
		
	<!-- </div> -->

</div>

	  

	



</div>
		<!-- admin-dashboard-content -->
@endsection

