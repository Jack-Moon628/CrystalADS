<div id="viewUserPanel" class="panel-right">
	<div id="indexContent" class="panel-content">
		<div class="static-group">
			<a class="menu-item" href="#" onclick="viewUserPanel()">
				<span class="item-icon">
					<i class="fas fa-times"></i>
				</span>

				<span class="item-title">Close</span>
			</a>

			{{-- Modify Group --}}

			<div class="group-title">
				<span class="title-content">Modify User</span>
			</div>

			<a class="menu-item" href="#" onclick="showContent()">
				<span class="item-icon">
					<i class="fas fa-receipt"></i>
				</span>

				<span class="item-title">User Details</span>
			</a>

			@if(Auth::user()->account_type_id == 3)
				<a id="restrictUser" class="menu-item" href="#">
					<span class="item-icon">
						<i class="fas fa-exclamation-circle text-warning"></i>
					</span>

					<span class="item-title">Restrict User</span>
				</a>
			@endif

			@if(Auth::user()->account_type_id == 3)
				<a id="disableUser" class="menu-item" href="#">
					<span class="item-icon">
						<i class="fas fa-ban text-danger"></i>
					</span>

					<span class="item-title">Disable User</span>
				</a>
			@endif

			{{-- Meta Information Group --}}

			<div class="group-title">
				<span class="title-content">Meta Information</span>
			</div>

			<a class="menu-item" href="#">
				<span class="item-icon">
					<i class="fas fa-info-circle"></i>
				</span>

				<span id="userCreated" class="item-title"></span>
			</a>

			<a class="menu-item" href="#">
				<span class="item-icon">
					<i class="fas fa-info-circle"></i>
				</span>

				<span id="userModified" class="item-title"></span>
			</a>
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

			<a id="updateUserDetails" class="menu-item" href="#" onclick="">
				<span class="item-icon">
					<i class="fas fa-save"></i>
				</span>

				<span class="item-title">Save Changes</span>
			</a>
		</div>

		<div class="content-details w-100">
			<div class="details-form">
	            <div class="input-item">
	                <span>Email Address - <i>required</i></span>
					<input id="emailInput" type="text">
	            </div>

	            <div class="input-item">
	                <span>Username - <i>required</i></span>
					<input id="usernameInput" type="text">
	            </div>
	            
	            <div class="input-item">
	                <span>Country - <i>required</i></span>
					<input id="countryInput" type="text">
	            </div>

	            <div class="input-item">
	                <span>First Name - <i>required</i></span>
					<input id="firstNameInput" type="text">
	            </div>

	            <div class="input-item">
	                <span>Last Name</span>
					<input id="lastNameInput" type="text">
	            </div>

	            <div class="input-item">
	                <span>Address</span>
					<input id="addressInput" type="text">
	            </div>

	            <div class="input-item">
	                <span>City - <i>required</i></span>
					<input id="cityInput" type="text">
	            </div>

	            <div class="input-item">
	                <span>ZIP/Postal Code</span>
					<input id="zipCodeInput" type="text">
	            </div>

	            <div class="input-item">
	                <span>State - <i>required</i></span>
					<input id="stateInput" type="text">
	            </div>

	            <div class="input-item">
	                <span>Phone Number</span>
					<input id="phoneNumberInput" type="text">
	            </div>

	            <div class="input-item">
	                <span>Company Name - <i>required</i></span>
					<input id="companyNameInput" type="text">
	            </div>
	        </div>
		</div>
	</div>
</div>