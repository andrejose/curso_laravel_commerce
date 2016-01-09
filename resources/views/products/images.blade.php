@extends('app')

@section('content')

{{-- Inspiring::quote() --}}

	<div class="container">
		<h1>Images of {{ $product->name }}</h1>
		<a href="#" class="btn btn-primary">New image</a>
		<br>
		<br>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Extension</th>
				<th>Action</th>
			</tr>
			@foreach ($product->images as $image)
			<tr>
				<td>{{ $image->id }}</td>
				<td></td>
				<td>{{ $image->extension }}</td>
				<td>
				</td>
			</tr>
			@endforeach
		</table>

	</div>

@endsection
