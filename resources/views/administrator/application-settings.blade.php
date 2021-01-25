@extends('layouts.auth')

@section('title', Auth::user()->accountType->name . ' | Application Settings')
@section('crumb', 'Application Settings')

@section('content')

@include('layouts.nav.auth')

@include('administrator.modals.account-approval-setting')

<div class="root-wrapper container">
	<div class="row mt-3">
		<div class="col-md-4">
			<div class="card border-0">
				<div class="card-header bg-white border-bottom">
					User Registration Settings
				</div>

				<div class="card-body">
                	<span class="pt-3">
                		User Approval Required
                	</span>

                    @if($settings[0]->active)

                    	<div class="d-inline-block float-right mt-2">
							<div class="onoffswitch" onclick="accountApprovalSettingModal()">
							    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0" checked>
							    <label class="onoffswitch-label" for="myonoffswitch"></label>
							</div>
						</div>
                    @else
                    	<div class="d-inline-block float-right mt-2">
							<div class="onoffswitch" onclick="accountApprovalSettingModal()">
							    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">
							    <label class="onoffswitch-label" for="myonoffswitch"></label>
							</div>
						</div>
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/views/administrator/applicationsettings.js"></script>

@endsection