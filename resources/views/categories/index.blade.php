@extends('app')

@section('content')

{{-- Inspiring::quote() --}}

	<div class="container">
		<h1>Categories</h1>
		<a href="{{ route('categories.create') }}" class="btn btn-primary">New category</a>
		<br>
		<br>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
			@foreach ($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				<td>{{ $category->description }}</td>
				<td>
					<a href="{{ route('categories.edit', [ 'id' => $category->id ]) }}" class="btn btn-xs btn-primary">Edit</a>
					<a href="{{ route('categories.destroy', [ 'id' => $category->id ]) }}" class="btn btn-xs btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>

		{!! $categories->render() !!}


	</div>

@endsection
