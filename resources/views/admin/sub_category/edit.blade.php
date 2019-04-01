@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Subject-Wise List</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('sub-category.update', $subcategory->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        {{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="cat_id" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select name="cat_id" class="form-control">
                                    <option>Select a category</option>
                                    @foreach ($category as $cat)
                                        <option value="{{$cat->id}}">{{ $cat->name }}</option>
                                    @endforeach


                                </select>

                                @if ($errors->has('cat_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cat_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $subcategory->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
