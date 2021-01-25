@extends('layouts.auth')

@section('title', Auth::user()->accountType->name . ' | Finance Center')
@section('crumb-parent', 'Global User Manager')
@section('crumb-parent-url', '/administrator/users')
@section('crumb', 'Finance Center')

@section('styling')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/administrator/logs.css') }}">

@endsection

@section('content')

@include('layouts.nav.auth')

@include('administrator.modals.modify-wallet')

<div class="container mt-3">
	<div class="row">
		<div class="action-bar pt-1 rounded">
			<button class="toggle-button ml-2" onclick="refresh()">
				<i class="fas fa-sync"></i>
			</button>

			<input id="emailSearch" type="text" class="user-search mr-2" placeholder="Search by email address">
		</div>
	</div>
</div>

<div class="container mb-4">
	<div class="row">
		<div class="col-md-12 bg-white">
			<div id="logs" class="log-list pt-4">
				<div class="w-100 mt-3 pb-2 mb-3 text-primary text-left">
					<span class="ml-3 d-inline-block">
						Users
					</span>
				</div>

				<hr>

				<div class="dynamic-users">

					@foreach($users as $user)

						<div class="log-row ripple" onclick="viewUser({{ $user->id }})">
							<span class="details">
								<span class="text-secondary">{{ $user->username }}</span>

								<span class="d-none d-lg-block float-right text-secondary">
									{{ $user->accountType->name }}
								</span>
							</span>
						</div>

					@endforeach

				</div>

				{{-- Searched User --}}
				<div id="searchedUser" class="log-row ripple d-none" onclick="">
					<span class="details">
						<span id="searchedUsername" class="text-secondary"></span>

						<span id="searchedAccountType" class="d-none d-lg-block float-right text-secondary"></span>
					</span>
				</div>
			</div>

			<div class="log-footer mt-4 pb-2 bg-white">
				{{ $users->links() }}
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/views/administrator/finance.js"></script>

@endsection