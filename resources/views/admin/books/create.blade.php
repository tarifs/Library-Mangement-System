@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><strong>Add Book</strong></h2></div>

                <div class="panel-body">

                    {{-- @include('includes.errors') --}}

                    <form class="form-horizontal" method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" >

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                            <label for="author" class="col-md-4 control-label">Author <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" value="{{ old('author') }}" >

                                @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('edition') ? ' has-error' : '' }}">
                            <label for="edition" class="col-md-4 control-label">Edition</label>

                            <div class="col-md-6">
                                <input id="edition" type="text" class="form-control" name="edition" value="{{ old('edition') }}" >

                                @if ($errors->has('edition'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('edition') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
                            <label for="session" class="col-md-4 control-label">Session</label>

                            <div class="col-md-6">
                                <input id="session" type="text" class="form-control" name="session" value="{{ old('session') }}" >

                                @if ($errors->has('session'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('session') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="categories" class="col-md-4 control-label">Department <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <select name="category_id" id="category" onchange="getSubCategory(this.value)" class="form-control" required="">
                                    <option>Select a Department</option>
                                    @foreach($categories as $cat)
                                    <optgroup>

                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                                    </optgroup>

                                    @endforeach
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
                            <label for="categories" class="col-md-4 control-label">Subject</label>

                            <div class="col-md-6">
                                <select name="sub_category_id" id="sub_category" class="form-control">
                                    <option>Select a Subject</option>
                                </select>

                                @if ($errors->has('sub_category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('page') ? ' has-error' : '' }}">
                            <label for="page" class="col-md-4 control-label">Page <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <input id="page" type="number" class="form-control" name="page" value="{{ old('page') }}" >

                                @if ($errors->has('page'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('page') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
                            <label for="publisher" class="col-md-4 control-label">Publisher <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <input id="publisher" type="text" class="form-control" name="publisher" value="{{ old('publisher') }}" >

                                @if ($errors->has('publisher'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publisher') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                            <label for="language" class="col-md-4 control-label">Language <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <input id="language" type="text" class="form-control" name="language" value="{{ old('language') }}" >

                                @if ($errors->has('language'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('isbn') ? ' has-error' : '' }}">
                            <label for="isbn" class="col-md-4 control-label">ISBN</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" >

                                @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('purchase_date') ? ' has-error' : '' }}">
                            <label for="purchase_date" class="col-md-4 control-label">Purchase Date</label>

                            <div class="col-md-6">
                                <input id="purchase_date" type="date" class="form-control" name="purchase_date" value="{{ old('purchase_date') }}" >

                                @if ($errors->has('purchase_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('purchase_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('accession_no') ? ' has-error' : '' }}">
                            <label for="accession_no" class="col-md-4 control-label">Accession No</label>

                            <div class="col-md-6">
                                <input id="accession_no" type="number" class="form-control" name="accession_no" value="{{ old('accession_no') }}" >

                                @if ($errors->has('accession_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('accession_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('doa') ? ' has-error' : '' }}">
                            <label for="doa" class="col-md-4 control-label">Date of Accession</label>

                            <div class="col-md-6">
                                <input id="doa" type="date" class="form-control" name="doa" value="{{ old('doa') }}" >

                                @if ($errors->has('doa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('doa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantity <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" >

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" >

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('call_no') ? ' has-error' : '' }}">
                            <label for="call_no" class="col-md-4 control-label">Call No <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <input id="call_no" type="text" class="form-control" name="call_no" value="{{ old('call_no') }}" >

                                @if ($errors->has('call_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('call_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('shelf_id') ? ' has-error' : '' }}">
                            <label for="shelves" class="col-md-4 control-label">Shelf <span style="color: red"><b>*</b></span></label>

                            <div class="col-md-6">
                                <select name="shelf_id" class="form-control" required="">
                                    <option>Select a Shelf</option>

                                    @foreach($shelves as $shelf)
                                    <optgroup>

                                    <option value="{{ $shelf->id }}">{{ $shelf->name }}</option>

                                    </optgroup>

                                    @endforeach
                                </select>

                                @if ($errors->has('shelf_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shelf_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
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

@section('js')
    <script type="text/javascript">
        function getSubCategory(val) {
            $.ajax({
                type: "get",
                url: "{{route('sub.category.ajax')}}",
                data:{category_id : val},
                success: function(data){
                    $('#sub_category').html("<option value=\"\">Choose</option>");
                    $.each(data, function(key, value) {
                        $('#sub_category')
                        .append($("<option></option>")
                        .attr("value",value.id)
                        .text(value.name));
                    });
                }
            });
        }
    </script>
@endsection
