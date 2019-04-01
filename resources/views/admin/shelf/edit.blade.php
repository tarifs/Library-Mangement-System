@extends('layouts.admin')

@section('content')

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h5>Edit Shelf</h5>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('shelves.update',$shelf->id) }}" method="post">
        {{ csrf_field() }}  {{ method_field('put') }}

        {{-- @include('includes.errors')
        @include('includes.message') --}}

        <div class="form-group">
          <label class="control-label col-sm-3" for="">shelf</label>
          <div class="col-sm-6">
            <input class="form-control" type="text" name="name" value="{{ $shelf->name }}"
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for=""></label>
          <div class="col-sm-6">
            <input class="btn btn-sm btn-primary pull-right" type="submit" name="submit" value="Update Shelf ">
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
