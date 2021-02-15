@extends('layouts.auth')

@section('title', Auth::user()->accountType->name . ' | Filter Logs')
@section('crumb-parent', 'Logs')
@section('crumb-parent-url', '/administrator/logs')
@section('crumb', 'Filter Logs')

@section('styling')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/administrator/logs.css') }}">

@endsection

@section('content')

@include('layouts.nav.auth')

@include('administrator.modals.view-log')

<div class="container mt-3">
	<div class="row">
		<div class="action-bar pt-1 rounded">
			<button class="toggle-button ml-2" onclick="refresh()">
				<i class="fas fa-sync"></i>
			</button> •

			<button class="toggle-button ml-2" onclick="window.location.href = '/administrator/logs'">
				Go Back
			</button>
		</div>
	</div>
</div>
<div class="container bg-white rounded mb-4">
		<div class="col-md-12">
			<div id="logs" class="log-list pt-4">
				<div class="w-100 mt-3 pb-2 mb-3 text-primary text-left">
					<span class="ml-3 d-inline-block">
						Logs
					</span>
				</div>
				<hr>
				@foreach($logs as $log)

					<div class="log-row ripple" onclick="viewLog({{ $log->id }})">
						<span class="details">
							<span class="text-secondary">{{ $log->actionUser->username }}</span>

							<span class="d-none d-lg-block float-right text-secondary">
								{{ $log->type->name }}
							</span>
						</span>
					</div>
				@endforeach
			</div>

			<div class="log-footer mt-4 pb-2 bg-white">
				{{ $logs->links() }}
			</div>
		</div>
	</div>


</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/views/administrator/logs.js"></script>

@endsection