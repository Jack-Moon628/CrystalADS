@extends('layouts.auth')

@section('title', Auth::user()->accountType->name . ' | Pending Users')
@section('crumb-parent', 'Global User Manager')
@section('crumb-parent-url', '/administrator/users')
@section('crumb', 'Pending Users')

@section('styling')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/administrator/users.css') }}">

@endsection

@section('content')

@include('layouts.nav.auth')

@include('administrator.modals.pending-user')

<div class="container mt-3">
	<div class="row">
		<div class="action-bar pt-1 rounded">
			<button class="toggle-button ripple input-tip" onclick="redirect('/administrator/settings#:~:text=user%20approval%20required')">Approval Settings</button> •
			<button class="toggle-button input-tip" onclick="refresh()">
				<i class="fas fa-sync"></i>
			</button>

			<input id="emailSearch" type="text" class="user-search mr-2" placeholder="Search by email address">
		</div>
	</div>
</div>

<div class="container">
	<div class="row mb-4 bg-white rounded">
		<div class="col-md-12 mb-2 mt-4">
			<div class="mt-0 user-list">
				<div class="w-100 mt-3 pb-2 mb-3 text-primary text-left">
					<span class="ml-3 d-inline-block">
						Pending Users
					</span>
				</div>

				<hr>

				<div class="dynamic-users">
					@foreach($users as $user)
						<div class="user-row ripple" onclick="viewApprovalRequest({{ $user->id }})">
							<span class="details">
								<span class="text-secondary">{{ $user->username }}</span> •
								{{ $user->accountType['name'] }}

								<span class="float-right text-secondary more-details">


									@if($user->disabled)
										<i class="fas fa-ban text-danger" title="Account Disabled"></i>
									@endif
								</span>
							</span>
						</div>
					@endforeach
				</div>
			</div>

			{{-- Searched User --}}
			<div id="searchedUser" class="user-row ripple d-none" onclick="">
				<span class="details">
					<span id="searchedUsername" class="text-secondary"></span>
					<span id="searchedEmail"></span>

					<span id="searchedDisabled" class="float-right text-secondary more-details d-none">
						<i class="fas fa-ban text-danger" title="Account Disabled"></i>
					</span>
				</span>
			</div>
		</div>

		<div class="user-list-footer">
			{{ $users->links() }}
		</div>
	</div>
</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/views/administrator/pendingusers.js"></script>

@endsection