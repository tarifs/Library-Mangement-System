  @extends('layouts.frontend')

  @section('content')

  <div class="container">

    <h2>Librarians are tour-guides for all of knowledge.</h2>
    <p>Libraries were full of ideas – perhaps the most dangerous and powerful of all weapons.</p>
    
    <br>

<div class="container-fluid">
    <div class="col-md-12">
      @foreach ($staffs as $staff)
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="{{ $staff->image }}" class="img-rounded" alt="{{ $staff->name }}">
              <div>
                <h4>{{ $staff->name }}</h4>
                <p>{{ $staff->degree }}</p>
                <p>{{ $staff->cell }}</p>
                {{-- <p width="100%">{{ $staff->email }}</p> --}}
                <hr>
                <p class="text-center">
                  <a href="" class="btn btn-success btn-sm">{{ $staff->rank }}</a>
                </p>
              </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  </div>



  @endsection
