@extends('layouts.frontend')

@section('content')
<style>
table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
}
th, td {
	padding: 5px;
	text-align: left;    
}
</style>
<!-- banner -->
<div class="banner-bottom">
	<div class="container">
		
		<h1 class="text-center" style="background-color: #00ba66;">Our Location</h1><br>
		<div style="width: 100%; height: 500px;">
			{!! Mapper::render() !!}
		</div><br><br>

		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<table style="width:100%">
						<tr>
							<th class="text-center" style="background-color: #00ba66;">Central Library</th>
						</tr>
						<tr>
							<td>
								<p>{{ $central_lib->address }}</p><br>
								<p><b>Phone:</b> {{ $central_lib->Phone }}</p>
								<p><b>Fax :</b> {{ $central_lib->Fax }}</p>
								<p><b>Email :</b> {{ $central_lib->email }}</p>
								<p><b>Website :</b> {{ $central_lib->web }}</p>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					<table style="width:100%">
						<tr>
							<th class="text-center" style="background-color: #00ba66;">Medical Science & Dental Unit  Library</th>
						</tr>
						<tr>
							<td>
								<p>{{ $medical_lib->address }}</p>
								<p><b>Phone:</b> {{ $medical_lib->Phone }}</p>
								<p><b>Fax :</b> {{ $medical_lib->Fax }}</p>
								<p><b>Email :</b> {{ $medical_lib->email }}</p>
								<p><b>Website :</b> {{ $medical_lib->web }}</p>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


</div>
<!-- //banner-bottom -->

@endsection
