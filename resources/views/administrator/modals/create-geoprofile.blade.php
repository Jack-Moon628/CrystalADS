<div id="createGeoprofileModal" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
		<div class="modal-content border-0">
			<div class="modal-header mb-2">
				<h5 class="modal-title ml-4">Create GeoProfile</h5>
			</div>

			<div class="modal-body mt-0 pt-0 text-center" style="max-height: 500px; overflow-y: auto;">
				<div class="details-form">
		            <div class="input-item">
		                <span>Name</span>
						<input id="createProfileName" type="text">
		            </div>

		            <div class="input-item">
		                <span>Description</span>
						<textarea id="createProfileDescription"></textarea>
		            </div>

		            <div class="input-item">
		                <span>Country</span>

						<select id="createProfileCountry" type="text">
							@foreach($countries as $country)
								<option value="{{ $country->id }}">
									{{ $country->name }}
								</option>
							@endforeach
						</select>
		            </div>

					<div class="input-item">
		                <span>Cost Per Click ($)</span>

						<input id="createProfileCPC" type="text">
					</div>

					<div class="input-item">
		                <span>Cost Per Impression ($)</span>

						<input id="createProfileCPM" type="text">
					</div>

					<div class="input-item">
		                <span>Revenue Share (%)</span>

						<input id="createProfileRevenueShare" type="text">
					</div>
		        </div>
			</div>

			<div class="text-center p-2 border-top mt-3">
				<a id="createProfileBtn" class="menu-item text-success" style="display: inline-block; width: 48%; text-align: center;" href="#" onclick="createGeoprofile()">
					<span class="item-icon">
						<i class="fas fa-check"></i>
					</span>

					<span class="item-title">Create</span>
				</a>

				<a class="menu-item" style="display: inline-block; width: 48%; text-align: center;" href="#" onclick="$('#pendingUserModal').modal('toggle');">
					<span class="item-icon">
						<i class="fas fa-minus"></i>
					</span>

					<span class="item-title">Cancel</span>
				</a>
			</div>
		</div>
	</div>
</div>