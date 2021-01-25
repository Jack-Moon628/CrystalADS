<div id="viewDomainModal" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
		<div class="modal-content border-0">
			<div class="modal-header mb-2">
				<h5 class="modal-title ml-4">Modify Domain</h5>
			</div>

			<div class="modal-body mt-0 pt-0 text-center" style="max-height: 500px; overflow-y: auto;">
				<div class="details-form">
		            <div class="input-item">
		                <span>Domain Name</span>
						<input id="viewDomainName" type="text">
		            </div>

		            <div class="input-item">
		                <span>GeoProfile</span>
		                <select id="viewGeoprofile">
		                	@foreach($geoprofiles as $profile)
		                		<option value="{{ $profile->id }}">{{ $profile->name }}</option>
		                	@endforeach
		                </select>
		            </div>
		        </div>
			</div>

			<div class="text-center p-2 border-top mt-3">
				<a id="updateDomainBtn" class="menu-item text-success" style="display: inline-block; width: 48%; text-align: center;" href="#">
					<span class="item-icon">
						<i class="fas fa-check"></i>
					</span>

					<span class="item-title">Update</span>
				</a>

				<a class="menu-item" style="display: inline-block; width: 48%; text-align: center;" href="#" onclick="$('#viewDomainModal').modal('toggle');">
					<span class="item-icon">
						<i class="fas fa-minus"></i>
					</span>

					<span class="item-title">Cancel</span>
				</a>
			</div>
		</div>
	</div>
</div>