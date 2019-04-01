@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        All Department
                    <span class="badge bg-info">{{ $categories->count() }}</span>
                    </h2>
                </div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="{{ route('category.create') }}" class="btn btn-primary">Add Department</a>
                    </div>
                </div>

                <div class="panel-body">
                  <table class="table datatable table-bordered">
                    <thead>
                      <th>Serial</th>
                      <th>Department</th>
                      <th>Published</th>
                      <th>Action</th>
                    </thead>

                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @if ($categories)
                                @foreach ($categories as $category)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a href="{{ route('category.books', $category->id) }}" style="text-decoration: none;">{{ $category->name }}</a></td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>
                                      <form class="" action="{{ route('category.destroy',  $category->id) }}" method="post">
                                        {{ csrf_field() }} {{ method_field('delete') }}
                                        <a class="btn btn-xs btn-dark" href="{{ route('category.edit',  $category->id) }}">Edit</a>
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
