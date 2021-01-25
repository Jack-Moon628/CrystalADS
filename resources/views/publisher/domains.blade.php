@extends('layouts.auth')

@section('title', Auth::user()->accountType->name . ' | Domains')
@section('crumb', 'Domains')

@section('styling')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/domains.css') }}">

@endsection

@section('content')

@include('publisher.modals.register-domain')

@include('layouts.nav.auth')

<div class="container">
	<div class="row mt-5">
		<div class="col-md-3 bg-white rounded p-2 mb-4">
			<div class="w-100 mt-3 pb-2 mb-3 text-primary">
				<span class="wallet-icon bg-light ml-1 p-3 rounded">
					<i class="fas fa-info pr-1 pl-2"></i>
				</span>

				<span class="ml-3 d-inline-block">
					Domain Actions
				</span>
			</div>

			<hr>

			<button class="toggle-button pl-2 text-primary bg-light input-tip w-100" onclick="viewAddDomainModal()">
				Register a Domain
			</button>
		</div>

		<div class="col-md-8 offset-md-1 bg-white rounded p-2">
			@if ($errors->any())
			   @foreach ($errors->all() as $error)
			      <div class="card card-danger p-2 text-danger w-100">{{ $error }}</div>
			  @endforeach
			@endif

			<p class="h5 p-3 w-100 border-bottom">
				Registered Domains
			</p>

			@if(!$domains->count())
				<div class="domain-row w-100 bg-light p-2 rounded mt-1 mb-1"">
					<span class="p-2">No domains are registered to this account</span>
				</div>
			@endif

			@foreach($domains as $domain)

			<div class="domain-row w-100 bg-light p-2 rounded mt-1 mb-1" onclick="viewDomain({{ $domain->id }})">
				<span class="p-2">{{ $domain->name }}</span>

				@if($domain->approved == 1)
					<span class="float-right text-success" title="Domain Approved">
						<i class="fas fa-check"></i>
					</span>
				@elseif($domain->approved == 2)
					<span class="float-right text-danger" title="Domain Denied">
						<i class="fas fa-times"></i>
					</span>
				@else
					<span class="float-right text-secondary" title="Awaiting Approval">
						<i class="fas fa-spinner"></i>
					</span>
				@endif
			</div>

			@endforeach	

			<div class="w-100 border-top pt-3 mt-2">
				{{ $domains->links() }}
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/views/domains.js"></script>

@endsection