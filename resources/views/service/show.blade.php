@extends('service.layout')

@section('content')
<br><br><br>
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Show Service</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('service.index') }}">Back</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Service title : </strong>
			{{ $data->service_title}}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Service description : </strong>
			{{ $data->service_description}}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Service Image : </strong>
			<img src="{{ URL::to($data->service_picture) }}" height="150px;" width="200px;">
			
		</div>
	</div>
</div>



@endsection