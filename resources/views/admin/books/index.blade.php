@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        All Books
                    <span class="badge bg-info">{{ $books->count() }}</span>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Serial No.</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Session</th>
                            <th>Department</th>
                            <th>Subject</th>
                            <th>Shelf</th>
                            {{-- <th>Download</th> --}}
                            <th>Availabilty</th>
                            <th>Issue Book</th>
                            <th>Action</th>
                        </thead>

                        <tbody>

                            @php
                                $i=1;
                            @endphp
                            @if ($books)
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->edition }}</td>
                                        <td>{{ $book->session }}</td>
                                        <td>{{ $book->category->name }}</td>
                                        <td>{{ $book->sub_category ? $book->sub_category->name : ''}}</td>
                                        <td>{{ $book->shelf->name }}</td>
                                        {{-- <td>
                                                <a href="{{ $book->file }}" download="{{ $book->file }}">
                                                <i class="fa fa-download"></i>
                                                </a> --}}
                                        </td>
                                        <td>{{ $book->issues->count() ? $book->quantity - $book->issues->count(): $book->quantity }}</td>
                                        <td>
                                            @if ($book->quantity - $book->issues->count())
                                                <a href="{{ route('book.issue', $book->id) }}" class="btn btn-xs btn-info">Issue</a>
                                            @else
                                                <button class="btn btn-xs btn-danger" disabled>Unavailable</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a style="width: 50px" class="btn btn-xs btn-dark" href="{{ route('books.edit', $book->id) }}">Edit</a>

                                            <a style="width: 50px" class="btn btn-xs btn-success" href="{{ route('books.show', $book->id) }}">Details</a>

                                            {{-- <button class="btn btn-xs btn-danger" type="button" onclick="deleteBook({{ $book->id }})">
                                                Delete
                                            </button>
                                            <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}" method="post" style="display: none;">
                                                {{ csrf_field() }} {{ method_field('delete') }}
                                            </form> --}}
                                            <form class="" action="{{ route('books.destroy', $book->id) }}" method="post">
                                        {{ csrf_field() }} {{ method_field('delete') }}
                                        <input style="width: 50px" class="btn btn-xs btn-danger" type="submit" name="" value="Delete">
                                        </form>
                                            </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script type="text/javascript">
    function deleteBook(id) {
        const swalWithBootstrapButtons = swal.mixin({
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
      })

        swalWithBootstrapButtons({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
    // Read more about handling dismissals
    result.dismiss === swal.DismissReason.cancel
    ) {
            swalWithBootstrapButtons(
              'Cancelled',
              'Your data is safe :)',
              'error'
              )
        }
    })
  }
</script>
@endsection
