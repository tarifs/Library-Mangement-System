@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Notice</b></div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="{{ route('notices.create') }}" class="btn btn-primary">Add Notice</a>
                    </div>
                </div>

                <div class="panel-body">
                  <table class="table datatable table-bordered">
                    <thead>
                      <th>Serial</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Published</th>
                      <th>Action</th>
                    </thead>

                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @if ($notices)
                                @foreach ($notices as $notice)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $notice->title }}</td>
                                    <td>{!! str_limit($notice->description, 10) !!}</td>
                                    <td>{{ $notice->created_at->diffForHumans() }}</td>
                                    <td>
                                      <form class="" action="{{ route('notices.destroy',  $notice->id) }}" method="post">
                                        {{ csrf_field() }} {{ method_field('delete') }}
                                        <a class="btn btn-xs btn-dark" href="{{ route('notices.edit',  $notice->id) }}">Edit</a>
                                        <a class="btn btn-xs btn-success"   href="{{ route('notices.show',$notice->id) }}">Details</a>
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
