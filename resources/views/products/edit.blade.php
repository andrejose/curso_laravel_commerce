@extends('app')

@section('content')

{{-- Inspiring::quote() --}}

	<div class="container">
		<h1>Editing Product: {{ $product->name }}</h1>

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!! Form::open([ 'route' => ['products.update', $product->id], 'method'=>'put']) !!}

			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('category_id', 'Price:') !!}
				{!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('description', 'Description:') !!}
				{!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('price', 'Price:') !!}
				{!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::checkbox('featured', 1, $product->featured, ['id'=>'featured']) !!}
				{!! Form::label('featured', 'Featured') !!}
			</div>

			<div class="form-group">
				{!! Form::checkbox('recommend', 1, $product->recommend, ['id'=>'recommend']) !!}
				{!! Form::label('recommend', 'Recommend') !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Save Product', ['class' => 'btn btn-primary'])!!}
			</div>

		{!! Form::close() !!}

	</div>

@endsection
