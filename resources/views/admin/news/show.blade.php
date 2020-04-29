@extends('admindashboard')


@section('admin-content')
	<!-- admin-dashboard-content -->
<div class="card content-card">

	<h1 class="text-center text-light">News</h1>
	<br>

		<a href="{{route('admin.news.index')}}" class="btn btn-info font-weight-bold">Back</a>
	<br>

<div class="container-fluid text-light">
	<div class="col-xl-12 col-12 im100 description-news">
		<!-- <div class="row im100 text-light"> -->
			{!!$news->description!!}
 		
		<!-- </div> -->
		
	</div>

</div>

</div>
		<!-- admin-dashboard-content -->
@endsection


