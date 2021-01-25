@extends('layouts.auth')

@section('title', 'Account Setup')
@section('crumb', 'Account Setup')

@section('styling')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/auth/setup.css') }}">
@endsection

@section('content')

@include('layouts.nav.auth')

<div class="container-fluid">
	<div class="row mt-5">
		<div class="offset-md-3 col-md-6 bg-dark rounded-top pb-3 text-light">
			<span class="h3 d-block mt-4">Account Setup</span>
			@if ($errors->any())
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
			@endif
		</div>
	</div>

	<div class="row mb-5">
		<div class="offset-md-3 col-md-6 bg-white rounded-bottom">
			<form action="/account/setup/{{ Auth::user()->id }}" method="POST">
				@csrf
				@method('PUT')

				<div class="row mt-3 mb-3">
					<div class="col-md-12">
						<div class="input-group">
							<span class="form-control border-light">Email address</span>
							<input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control border-light w-auto" disabled>
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">Username</span>
							<input type="text" name="username" value="{{ Auth::user()->username }}" class="form-control border-light w-auto" disabled>
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">Account Type (Required)</span>

							<select name="accountTypeId" class="form-control border-light" required>
								<option value="1">Advertiser</option>
								<option value="2">Publisher</option>
							</select>
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">Country (Required)</span>

							<select name="country" class="form-control border-light" required>
								@foreach($countries as $country)
									<option value="{{ $country->name }}">{{ $country->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">First Name (Required)</span>
							<input type="text" name="firstName" class="form-control border-light w-auto" required>
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">Last Name</span>
							<input type="text" name="lastName" class="form-control border-light w-auto">
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">Address</span>
							<input type="text" name="address" class="form-control border-light w-auto">
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">City (Required)</span>
							<input type="text" name="city" class="form-control border-light w-auto" required>
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">Zip Code</span>
							<input type="text" name="zipcode" class="form-control border-light w-auto">
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">State (Required)</span>
							<input type="text" name="state" class="form-control border-light w-auto" required>
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">Phone Number</span>
							<input type="text" name="phone" class="form-control border-light w-auto">
						</div>

						<div class="input-group mt-2">
							<span class="form-control border-light">Company Name (Required)</span>
							<input type="text" name="company" class="form-control border-light w-auto" required>
						</div>
					</div>
				</div>

				<div class="row mb-3">
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary w-100">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection