<div id="viewGeoprofilePanel" class="panel-right">
	<div id="indexContent" class="panel-content">
		<div class="static-group">
			<a class="menu-item" href="#" onclick="viewGeoprofilePanel()">
				<span class="item-icon">
					<i class="fas fa-times"></i>
				</span>

				<span class="item-title">Close</span>
			</a>

			{{-- Modify Group --}}

			<div class="group-title">
				<span class="title-content">Modify Profile</span>
			</div>

			<a class="menu-item" href="#" onclick="showContent()">
				<span class="item-icon">
					<i class="fas fa-receipt"></i>
				</span>

				<span class="item-title">Profile Details</span>
			</a>

			@if(Auth::user()->account_type_id == 3)
				<a id="deleteProfile" class="menu-item" href="#">
					<span class="item-icon">
						<i class="fas fa-exclamation-circle text-warning"></i>
					</span>

					<span class="item-title">Delete Profile</span>
				</a>
			@endif
		</div>
	</div>

	<div id="userDetailsContent" class="panel-content d-none">
		<div class="content-header border-bottom">
			<a class="menu-item" href="#" onclick="hideContent()">
				<span class="item-icon">
					<i class="fas fa-arrow-left"></i>
				</span>

				<span class="item-title">Return</span>
			</a>

			<a id="updateGeoprofileDetails" class="menu-item" href="#" onclick="">
				<span class="item-icon">
					<i class="fas fa-save"></i>
				</span>

				<span class="item-title">Save Changes</span>
			</a>
		</div>

		<div class="content-details w-100">
			<div class="details-form">
	            <div class="input-item">
	                <span>Name - <i>required</i></span>
					<input id="profileName" type="text">
	            </div>

	            <div class="input-item">
	                <span>Description - <i>required</i></span>
					<textarea id="profileDescription"></textarea>
	            </div>
	            
	            <div class="input-item">
	                <span>Country - <i>required</i></span>
					
					<select id="profileCountry" class="form-control" required>
						@foreach($countries as $country)
							<option value="{{ $country->id }}">{{ $country->name }}</option>
						@endforeach
					</select>
	            </div>

	            <div class="input-item">
	                <span>Cost Per Click ($) - <i>required</i></span>
					<input id="profileCPC" type="text">
	            </div>

	            <div class="input-item">
	                <span>Cost Per Impression ($) - <i>required</i></span>
					<input id="profileCPM" type="text">
	            </div>

	            <div class="input-item">
	                <span>Revenue Share (%) - <i>required</i></span>
					<input id="profileRevenueShare" type="text">
	            </div>
	        </div>

			<div class="group-title">
				<span class="title-content">Domains</span>
			</div>

			<div id="domainList" class="details-form">

			</div>
		</div>
	</div>
</div>