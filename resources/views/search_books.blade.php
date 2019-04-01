@extends('layouts.frontend')

@section('content')


<!-- banner -->
<div class="banner-bottom">
	<div class="container">
		<div class="filter-box">
			<h3>What are you looking for at the library?</h3>
			<form action="{{ route('book.search') }}" method="get" id="form1">
				<div class="col-md-4 col-sm-6">
					<div class="form-group">
						<label class="sr-only" for="keywords">Search by Keyword</label>
						<input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text" required>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="form-group">
						<select name="catalog" id="catalog" class="form-control" required>
							<option value="">Search the Catalog</option>
							<option value="title">Title</option>
							<option value="author">Author</option>
							<option value="isbn">ISBN</option>
							<option value="language">Language</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<input class="form-control" type="submit" value="Search" style="background-color: #00ba66;font-family: -webkit-body;font-size: 15px;font-weight: 900;">
					</div>
				</div>
			</form>
		</div>

		<table class="table data table-bordered">
			<thead>
				<th>Title</th>
				<th>Author</th>
				<th>Edition</th>
				<th>Session</th>
				<th>Image</th>
			</thead>
			<tbody>
				@if ($books->count())
				@foreach ($books as $book)
				<tr>
					<td width="20%"><a href="{{ route('book.detail',$book->id) }}" style="color:blue">{{ $book->title }}</a></td>
					<td width="20%" >{{ $book->author }}</td>
					<td width="20%" >{{ $book->edition }}</td>
					<td width="20%" >{{ $book->session }}</td>
					<td width="20%" >
						<img width="80px" src="{{ $book->image }}" alt="">
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td colspan="5" style="text-align:center" class="blink_me"><span style="color:red">NO BOOKS FOUND</span></td>
				</tr>

				@endif

			</tbody>
		</table>
		
		{{-- <div class="text-center">
			{{ $books->links() }}
		</div> --}}

	</div>

</div>


</div>
<!-- //banner-bottom -->

@endsection
