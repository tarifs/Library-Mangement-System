@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Contacts
                    <span class="badge bg-info">{{ $contacts->count() }}</span>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th>Web</th>
                            <th>Edit</th>
                        </thead>

                        <tbody>
                            @if ($contacts)
                                @foreach ($contacts as $key=>$contact)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->Phone }}</td>
                                        <td>{{ $contact->Fax }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->web }}</td>
                                        <td>
                                            <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-success">Edit</a>
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
@endsection
