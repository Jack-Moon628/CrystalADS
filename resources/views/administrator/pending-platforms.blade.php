@extends('layouts.auth')

@section('title', Auth::user()->accountType->name . ' | Pending Platforms')
@section('crumb-parent', 'Global Publisher Manager')
@section('crumb-parent-url', '/administrator/publishers')
@section('crumb', 'Pending Platforms')

@section('styling')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/administrator/users.css') }}">

@endsection

@section('content')

@include('layouts.nav.auth')

@include('administrator.modals.pending-domain')

<div class="container mt-3">
	<div class="row">
		<div class="action-bar pt-1 rounded">
			<button class="toggle-button input-tip" onclick="refresh()">
				<i class="fas fa-sync"></i>
			</button>
		</div>
	</div>
</div>

<div class="container">
	<div class="row mb-4 bg-white rounded">
		<div class="col-md-12 mb-2 mt-4">
			<div class="mt-0 user-list">
				<div class="w-100 mt-3 pb-2 mb-3 text-primary text-left">
					<span class="ml-3 d-inline-block">
						Pending Domains
					</span>
				</div>

				<hr>

				<div class="dynamic-users">
					@foreach($domains as $domain)
						<div class="user-row ripple" onclick="viewDomainRequest({{ $domain->id }})">
							<span class="details">
								<span class="text-secondary">{{ $domain->name }}</span> •
								{{ $domain->user->username }}
							</span>
						</div>
					@endforeach
				</div>
			</div>
		</div>

		<div class="user-list-footer">
			{{ $domains->links() }}
		</div>
	</div>
</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/views/administrator/pendingplatforms.js"></script>

@endsection