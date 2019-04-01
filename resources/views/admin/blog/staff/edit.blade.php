@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('staffs.update', $staff->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $staff->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('degree') ? ' has-error' : '' }}">
                            <label for="degree" class="col-md-4 control-label">Degree</label>

                            <div class="col-md-6">
                                <input id="degree" type="text" class="form-control" name="degree" value="{{ $staff->degree }}" required autofocus>

                                @if ($errors->has('degree'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('degree') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rank') ? ' has-error' : '' }}">
                            <label for="rank" class="col-md-4 control-label">Rank</label>

                            <div class="col-md-6">
                                <input id="rank" type="text" class="form-control" name="rank" value="{{ $staff->rank }}" required autofocus>

                                @if ($errors->has('rank'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rank') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $staff->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cell') ? ' has-error' : '' }}">
                            <label for="cell" class="col-md-4 control-label">Cell</label>

                            <div class="col-md-6">
                                <input id="cell" type="text" class="form-control" name="cell" value="{{ $staff->cell }}">

                                @if ($errors->has('cell'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cell') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Old Image</label>

                            <div class="col-md-6">
                                <img src="{{ $staff->image }}" alt="No Image" width="100px" height="100px">

                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong style="color:#a94442">{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control" name="image" >

                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong style="color:#a94442">{{ $errors->first('image') }}</strong>
                                </span>
                            @else
                                <span class="help-block">
                                    Only image supported
                                </span>
                            @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
