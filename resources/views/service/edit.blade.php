@extends('service.layout')

@section('content')
<br><br><br>
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Edit Service</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('service.index') }}">Back</a>
		</div>
	</div>
</div>

<form action="{{ url('update/service/'.$services->id)}}" method="POST" enctype="multipart/form-data">
	@csrf

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<strong>Service title : </strong>
				<input type="text" name="service_title" class="form-control" value="{{ $services->service_title}}">
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Service description : </strong>
				<textarea class="form-control" name="service_description" placeholder="Description" style="height: 150px">
					{{ $services->service_description }}
				</textarea>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Service Image : </strong>
				<input type="file" name="service_picture" multiple>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Service old image : </strong>
				<img src="{{ URL::to($services->service_picture) }}" height="70px;" width="80px;">
				<input type="hidden" name="old_image" value="{{ $services->service_picture }}">
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>


	</div>

</form>

@endsection