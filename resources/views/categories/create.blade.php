@extends('app')

@section('content')

{{-- Inspiring::quote() --}}

	<div class="container">
		<h1>Create Category</h1>

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!! Form::open(['route' => 'categories' ]) !!}

			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('description', 'Description:') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Add Category', ['class' => 'btn btn-primary'])!!}
			</div>

		{!! Form::close() !!}

	</div>

@endsection
