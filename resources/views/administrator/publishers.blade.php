@extends('layouts.auth')

@section('title', Auth::user()->accountType->name . ' | Global Publisher Manager')
@section('crumb', 'Global Publisher Manager')

@section('styling')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/administrator/logs.css') }}">

@endsection

@section('content')

@include('layouts.nav.auth')

@include('administrator.modals.view-domain')
@include('administrator.modals.create-geoprofile')
@include('administrator.snapins.view-geoprofile')

<div class="container mt-3">
	<div class="row">
		<div class="action-bar pt-1 rounded">
			<button class="toggle-button ripple input-tip" onclick="viewCreateGeoprofileModal()">Create GeoProfile</button> •

			<button class="toggle-button ml-2" onclick="refresh()">
				<i class="fas fa-sync"></i>
			</button>
		</div>
	</div>
</div>

<div class="container mb-4">
	<div class="row bg-white rounded mb-3">
		<div class="col-md-12">
			<div id="logs" class="log-list pt-4">
				<div class="w-100 mt-3 pb-2 mb-3 text-primary text-left">
					<span class="ml-3 d-inline-block">
						GeoProfiles
					</span>
				</div>

				<hr>

				@foreach($geoprofiles as $profile)

					<div class="log-row ripple" onclick="viewGeoprofile({{ $profile->id }})">
						<span class="details">
							<span class="text-secondary">{{ $profile->name }}</span> •
							{{ $profile->country->name }}
						</span>
					</div>

				@endforeach
			</div>

			<div class="log-footer mt-4 pb-2 bg-white">
				{{ $geoprofiles->links() }}
			</div>
		</div>
	</div>

	<div class="row bg-white rounded">
		<div class="col-md-12">
			<div id="logs" class="log-list pt-4">
				<div class="w-100 mt-3 pb-2 mb-3 text-primary text-left">
					<span class="ml-3 d-inline-block">
						Approved Domains
					</span>
				</div>

				<hr>

				@foreach($domains as $domain)

					<div class="log-row ripple" onclick="viewDomain('{{ $domain->id }}', '{{ $domain->name }}', '{{ $domain->domainCategory->geoprofile->id }}')">
						<span class="details">
							<span class="text-secondary">{{ $domain->name }}</span> •
							{{ $domain->domainCategory->geoprofile->name }}
						</span>
					</div>

				@endforeach
			</div>

			<div class="log-footer mt-4 pb-2 bg-white">
				{{ $domains->links() }}
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/views/administrator/publishers.js"></script>

@endsection