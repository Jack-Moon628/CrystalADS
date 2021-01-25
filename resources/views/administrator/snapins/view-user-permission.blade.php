<div id="viewUserPermissionsPanel" class="panel-right">
	<div id="indexContent" class="panel-content">
		<div class="content-header border-bottom">
			<a class="menu-item" href="#" onclick="viewUserPermissionsPanel()">
				<span class="item-icon">
					<i class="fas fa-arrow-left"></i>
				</span>

				<span class="item-title">Cancel</span>
			</a>

			<a id="updateUserPermissions" class="menu-item" href="#">
				<span class="item-icon">
					<i class="fas fa-save"></i>
				</span>

				<span class="item-title">Update Permissions</span>
			</a>
		</div>

		<div class="content-details w-100">
			<div class="details-form">
	            <div class="input-item">
	                <span>Email Address</i></span>
					<input id="emailUserPermission" type="text" disabled>
	            </div>

	            <div class="input-item">
	                <span>Username</i></span>
					<input id="usernameUserPermission" type="text" disabled>
	            </div>

	            <div class="input-item">
	                <span>Account Type</i></span>
					<input id="accountTypeUserPermission" type="text" disabled>
	            </div>
	        </div>

	        <div class="permissions-wrapper text-left">
	            @if(Auth::user()->account_type_id == 3)
				
					<div class="group-title">
						<span class="title-content">Upgrade User</span>
					</div>

					<a id="makeUserStaff" class="menu-item" href="#">
						<span class="item-icon">
							<i class="fas fa-user-plus"></i>
						</span>

						<span class="item-title">Make User Staff</span>
					</a>

					<a id="revokeUserStaff" class="menu-item" href="#">
						<span class="item-icon">
							<i class="fas fa-user-minus"></i>
						</span>

						<span class="item-title">Revoke Staff Status</span>
					</a>

					<a id="makeUserAdministrator" class="menu-item" href="#">
						<span class="item-icon">
							<i class="fas fa-user-plus"></i>
						</span>

						<span class="item-title">Make User Administrator</span>
					</a>
				@endif
			</div>

			<div class="details-form">
				<div class="group-title">
					<span class="title-content">Permissions</span>
				</div>


				<div id="permissionInputWrapper">			
					@foreach($permissions as $permission)

			            <div class="w-100 mt-4 pr-2">
			            	<span class="text-secondary">
			            		{{ $permission->name }}
			            	</span>

			            	<div class="d-inline-block float-right mt-2">
								<div id="permissionSwitch{{ $permission->id }}" class="onoffswitch permission-input-wrapper">
								    <input id="switch{{ $permission->id }}" type="checkbox" class="onoffswitch-checkbox" tabindex="0">
								    <label class="onoffswitch-label" for="switch{{ $permission->id }}"></label>
								</div>
							</div>
						</div>

					@endforeach
				</div>
	        </div>
		</div>
	</div>
</div>