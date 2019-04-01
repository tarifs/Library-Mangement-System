@extends('layouts.frontend')

@section('content')

<!-- banner -->

<div class="col-sm-12">
	<h1 style="text-align:center; color:#00ba66; margin:0" class="">EBOOKS</h1>
</div>
<div class="banner-bottom">

	<div class="container">


		{{-- <div class="col-sm-12"> --}}

			{{-- <div class="col-sm-12">
				<hr style="border-top: 1px solid #a9a9a9;">
			</div> --}}

			{{-- <div class="col-sm-12"> --}}
				{{-- <div class="col-sm-12" style="background:white;padding:20px;font-size:15"> --}}
					{{-- <div class="col-sm-12"> --}}
						<div class="col-md-3">
							
						</div>
						<div class="col-md-6">
							<table class="table">
								@if($ebooks->count() > 0)
								<th>Name</th>
								<th>File</th>

								<tbody>
									
									@foreach($ebooks as $ebook)
									<tr>
										<td width="100%">
											<a href="">{{ $ebook->file }}</a>
										</td>
										<td>
											<a class="btn btn-xs btn-primary" href="uploads/file/{{$ebook->file}}" download="{{$ebook->file}}">Download</a>
										</td>
									</tr>
									@endforeach
									@else
									<h4 class="text-center" style="color: red">Not Available</h4>
									@endif




								</tbody>
							</table>
							
						</div>

					{{-- </div> --}}

				{{-- </div> --}}

			{{-- 	</div> --}}
			

		</div>

	</tbody>
	<div class="text-center">
		{{ $ebooks->links() }}
	</div>
</table>



</div>


</div>



</div>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->

<!-- //banner-bottom -->


@endsection


