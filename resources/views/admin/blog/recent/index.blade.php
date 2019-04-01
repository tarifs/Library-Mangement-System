@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Recent Addition 
                    <span class="badge bg-info">{{ $recent->count() }}</span>
                    </h2>
                </div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="{{ route('recent.create') }}" class="btn btn-primary">Add Recent Addition</a>
                    </div>
                </div>

                <div class="panel-body">
                  <table class="table datatable table-bordered">
                    <thead>
                      <th>Serial</th>
                      <th>Title</th>
                      <th>File</th>
                      <th>Published</th>
                      <th>Action</th>
                    </thead>

                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @if ($recent)
                                @foreach ($recent as $shelf)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $shelf->title }}</td>
                                    <td>{{ $shelf->file }}</td>
                                    <td>{{ $shelf->created_at->diffForHumans() }}</td>
                                    <td>
                                      <form class="" action="{{ route('recent.destroy',  $shelf->id) }}" method="post">
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
@endsection
