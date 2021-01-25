@extends('layouts.auth')

@section('title', 'Account Restricted')

@section('content')

@include('layouts.nav.auth')

<div class="container-fluid">
	<div class="row mt-5">
		<div class="offset-md-4 col-md-4">
			<div class="card border-0">
				<div class="card-header border-0">
					<span>Account Restricted</span>
				</div>

				<div class="card-body text-center border-0">
					<span class="d-block mt-3">Your account has been restricted by an Administrator</span>
					<span class="d-block mb-3">Create a support ticket if you believe this to be a mistake</span>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection