@extends('service.layout')

@section('content')
<br><br><br>
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Add new Service</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('service.index') }}">Back</a>
		</div>
	</div>
</div>

<form action=" {{ route('service.store') }}" method="POST" enctype="multipart/form-data">
	@csrf

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<div class="form-group">
				<strong>Service title : </strong>
				<input type="text" name="service_title" class="form-control" placeholder="Service title">
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Service description : </strong>
				<textarea class="form-control" name="service_description" placeholder="Description" style="height: 150px"></textarea>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Service Image : </strong>
				<input type="file" name="service_picture" multiple>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>


	</div>

</form>

@endsection