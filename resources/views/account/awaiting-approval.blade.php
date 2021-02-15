@extends('layouts.auth')

@section('title', 'Account Awaiting Approval')
@section('crumb', 'Awaiting Approval')

@section('content')

@include('layouts.nav.auth')

<div class="container-fluid">
	<div class="row mt-5">
		<div class="offset-md-4 col-md-4">
			<div class="card border-0">
				<div class="card-header border-0">
					<span>Awaiting Account Approval</span>
				</div>
				<div class="card-body text-center border-0">
					<span class="d-block mt-3 mb-3">Your account is waiting to be approved by an Administrator</span>
					<a href="/dashboard" class="btn btn-primary mb-3">Refresh</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection