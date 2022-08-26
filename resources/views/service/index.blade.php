@extends('service.layout')

@section('content')
<br><br><br> 
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Company Services List</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('service.create') }}">Create new service</a>
		</div>
	</div>

</div>

@if($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
	
	<tr>
		<th width="150px">Service title</th>
		<th width="250px">Service description</th>
		<th width="100px">Service picture</th>
		<th width=200px">Action</th>
	</tr>

	@foreach($services as $serv)
	<tr>
		<td>{{ $serv->service_title }}</td>
		<td>
			{{ str_limit($serv->service_description, $limit = 70) }}
		</td>
		<td><img src="{{ URL::to($serv->service_picture) }}" height="70px;" width="80px;"></td>
		<td>
			<a class="btn btn-info" href="{{ URL::to('show/service/'.$serv->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ URL::to('edit/service/'.$serv->id) }}">Edit</a>
			<a class="btn btn-danger" href="{{ URL::to('delete/service/'.$serv->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
		</td>
	</tr>
	@endforeach
</table>

{!! $services->links() !!}


@endsection