<div id="newUserPanel" class="panel-right">
	<div id="indexContent" class="panel-content">
		<div class="content-header border-bottom">
			<a class="menu-item" href="#" onclick="viewNewUserPanel()">
				<span class="item-icon">
					<i class="fas fa-arrow-left"></i>
				</span>

				<span class="item-title">Cancel</span>
			</a>

			<a id="updateUserDetails" class="menu-item" href="#" onclick="createUser()">
				<span class="item-icon">
					<i class="fas fa-save"></i>
				</span>

				<span class="item-title">Create User</span>
			</a>
		</div>

		<div class="content-details w-100">
			<div class="details-form">
	            <div class="input-item">
	                <span>Email Address - <i>required</i></span>
					<input id="emailRegister" type="text">
	            </div>

	            <div class="input-item">
	                <span>Username - <i>required</i></span>
					<input id="usernameRegister" type="text">
	            </div>

	            <div class="input-item">
	                <span>Password - <i>required</i></span>
					<input id="passwordRegister" type="password">
	            </div>

	            <div class="input-item">
	                <span>Confirm Password - <i>required</i></span>
					<input id="confirmPasswordRegister" type="password">
	            </div>

				<div class="group-title">
					<span class="title-content">Options</span>
				</div>

	            <div class="w-100 mt-4 pr-2">
	            	<span class="text-secondary">
	            		Email List
	            	</span>

	            	<div class="d-inline-block float-right mt-2">
						<div class="onoffswitch">
						    <input id="mailListRegister" type="checkbox" class="onoffswitch-checkbox" tabindex="0" checked>
						    <label class="onoffswitch-label" for="myonoffswitch"></label>
						</div>
					</div>
				</div>
	        </div>
		</div>
	</div>
</div>