@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Staffs
                    <span class="badge bg-info">{{ $staffs->count() }}</span>
                    </h2>
                </div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="{{ route('staffs.create') }}" class="btn btn-primary"><span class="fa fa-user"></span>Add Staff</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Degree</th>
                            <th>Rank</th>
                            <th>Email</th>
                            <th>Cell</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @if ($staffs)
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <td class="text-center"><img width="40px" style="border-radius: 50%;" src="{{ $staff->image }}" alt="" /></td>
                                        <td>{{ $staff->name }}</td>
                                        <td>{{ $staff->degree }}</td>
                                        <td>{{ $staff->rank }}</td>
                                        <td>{{ $staff->email }}</td>
                                        <td>{{ $staff->cell }}</td>
                                        <td>
                                            <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-xs btn-dark">Edit</a>

                                            {{-- <button class="btn btn-xs btn-danger" type="button" onclick="deleteStaff({{ $staff->id }})">
                                                Delete
                                            </button>
                                            <form id="delete-form-{{ $staff->id }}" action="{{ route('staffs.destroy', $staff->id) }}" method="post" style="display: none;">
                                                {{ csrf_field() }} {{ method_field('delete') }}
                                            </form> --}}
                                            <form class="" action="{{ route('staffs.destroy', $staff->id) }}" method="post">
                                        {{ csrf_field() }} {{ method_field('delete') }}
                                        <input class="btn btn-xs btn-danger" type="submit" name="" value="Delete">
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
    function deleteStaff(id) {
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
