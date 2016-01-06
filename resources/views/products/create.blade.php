@extends('app')

@section('content')

{{-- Inspiring::quote() --}}

	<div class="container">
		<h1>Create Product</h1>

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!! Form::open(['route' => 'products' ]) !!}

			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('description', 'Description:') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('price', 'Price:') !!}
				{!! Form::text('price', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::checkbox('featured', 1, false, ['id'=>'featured']) !!}
				{!! Form::label('featured', 'Featured') !!}
			</div>

			<div class="form-group">
				{!! Form::checkbox('recommend', 1, false, ['id'=>'recommend']) !!}
				{!! Form::label('recommend', 'Recommend') !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Add Product', ['class' => 'btn btn-primary'])!!}
			</div>

		{!! Form::close() !!}

	</div>

@endsection
