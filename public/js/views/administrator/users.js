userPanelState = true;
newUserState = true;

function viewUserPanel() {
	hideContent();

	if (userPanelState) {
    	userPanelState = false;
		$("#viewUserPanel").animate({right: "0",}, 200, function() {});

    	return;
	} else {
    	userPanelState = true;
		$("#viewUserPanel").animate({right: "-290px",}, 200, function() {});

    	return;
	}
}

function viewNewUserPanel() {
	if (newUserState) {
    	newUserState = false;
		$("#newUserPanel").animate({right: "0",}, 200, function() {});

    	return;
	} else {
    	newUserState = true;
		$("#newUserPanel").animate({right: "-290px",}, 200, function() {});

    	return;
	}
}

function showContent() {
	$('#indexContent').addClass('d-none');
	$('#userDetailsContent').removeClass('d-none');

}

function hideContent() {
	$('#indexContent').removeClass('d-none');
	$('#userDetailsContent').addClass('d-none');
}

function viewUser(userId) {
	$('#loadSpinner').removeClass('d-none');

	$.ajax({
        url: "/api/user/"+userId,
        type: 'GET',
        dataType: 'json',
        timeout: 5000,
        success: function(res) {
        	$('#emailInput').val(res.user.email);
        	$('#usernameInput').val(res.user.username);
        	$('#accountTypeInput').val(res.user.account_type_id);
        	$('#countryInput').val(res.user.country);
        	$('#domainInput').val(res.user.domain);
        	$('#firstNameInput').val(res.user.first_name);
        	$('#lastNameInput').val(res.user.last_name);
        	$('#addressInput').val(res.user.address);
        	$('#cityInput').val(res.user.city);
        	$('#zipCodeInput').val(res.user.zip_code);
        	$('#stateInput').val(res.user.state);
        	$('#phoneNumberInput').val(res.user.phone_number);
        	$('#companyNameInput').val(res.user.company_name);

        	$('#userCreated').text('Registered ' + res.created_at);
        	$('#userModified').text('Updated ' + res.updated_at);

        	$('#updateUserDetails').attr('onclick', 'updateUserDetails('+ res.user.id +')');

        	if (res.user.account_type_id == 4) {
        		userRestricted = true;
				$('#restrictUser .item-title').text('Restore User');
	        	$('#restrictUser').attr('onclick', 'restrictUser('+ res.user.id +')');
        	} else {
        		userRestricted = false;
				$('#disableUser .item-title').text('Restrict User');
	        	$('#restrictUser').attr('onclick', 'restrictUser('+ res.user.id +')');
        	}

        	if (res.user.disabled) {
        		userDisabled = true;
				$('#disableUser .item-title').text('Enable User');
	        	$('#disableUser').attr('onclick', 'disableUser('+ res.user.id +')');
        	} else {
        		userDisabled = false;
				$('#disableUser .item-title').text('Disable User');
	        	$('#disableUser').attr('onclick', 'disableUser('+ res.user.id +')');
        	}

        	viewUserPanel();

			$('#loadSpinner').addClass('d-none');
        },

        error: function() {
			$('#loadSpinner').addClass('d-none');
        	alert('An unexpected error has occured, try again later');
        }
    });
}

function updateUserDetails(id) {
	$('#loadSpinner').removeClass('d-none');

	var accountTypeId = parseInt($('#accountTypeInput').val());

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/api/user/" + id,
		type: "PUT",
		datatype: 'JSON',
		data: {
	        "email": $('#emailInput').val(),
	        "username": $('#usernameInput').val(),
	        "country": $('#countryInput').val(),
	        "accountTypeId": accountTypeId,
	        "domain": $('#domainInput').val(),
	        "firstName": $('#firstNameInput').val(),
	        "lastName": $('#lastNameInput').val(),
	        "address": $('#addressInput').val(),
	        "city": $('#cityInput').val(),
	        "zipcode": $('#zipCodeInput').val(),
	        "state": $('#stateInput').val(),
	        "phone": $('#phoneNumberInput').val(),
	        "company": $('#companyNameInput').val(),
        },

		success: function () { 
			$('#loadSpinner').addClass('d-none');
			alert('User record updated successfully');
		},

		error: function(xhr) {
			$('#loadSpinner').addClass('d-none');

			$.each(xhr.responseJSON.errors, function(key,value) {
				alert(value);
			}); 
		}
	});
}

function createUser() {
	if($('#mailListRegister').val() == "on") {
		var mailList = 1;
	} else { var mailList = 0; }

	$('#loadSpinner').removeClass('d-none');

	var accountTypeId = parseInt($('#accountTypeRegister').val());

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/api/user",
		type: "POST",
		datatype: 'JSON',
		data: {
	        "email": $('#emailRegister').val(),
	        "username": $('#usernameRegister').val(),
	        "password": $('#passwordRegister').val(),
	        "password_confirmation": $('#confirmPasswordRegister').val(),
	        "email_list": mailList,
        },

		success: function (resp) { 
			$('#loadSpinner').addClass('d-none');
			alert('User account created successfully');

			refresh();
		},

		error: function(xhr) {
			$('#loadSpinner').addClass('d-none');
			
			$.each(xhr.responseJSON.errors, function(key,value) {
				alert(value);
			}); 
		}
	});
}

function restrictUser(id) {
	$('#loadSpinner').removeClass('d-none');

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/administrator/user/security/" + id,
		type: "PUT",
		datatype: 'JSON',
		data: {
	        "securityRestrict": '1',
        },

		success: function (response) {
			$('#loadSpinner').addClass('d-none');

			if (userRestricted) {
				userRestricted = false;
				$('#restrictUser .item-title').text('Restrict User');
			} else {
				userRestricted = true;
				$('#restrictUser .item-title').text('Restore User');
			}
		},

		error: function() {
			$('#loadSpinner').addClass('d-none');
			alert('An unexpected error has occured. Your session may be expired, reload the page or try again')
		}
	});
}

function disableUser(id) {
	$('#loadSpinner').removeClass('d-none');

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/administrator/user/security/" + id,
		type: "PUT",
		datatype: 'JSON',
		data: {"securityDisable": '1',},

		success: function (response) { 
			$('#loadSpinner').addClass('d-none');

			if (userDisabled) {
				userDisabled = false;
				$('#disableUser .item-title').text('Disable User');
			} else {
				userDisabled = true;
				$('#disableUser .item-title').text('Enable User');
			}
		},

		error: function() {
			$('#loadSpinner').addClass('d-none');
			alert('An unexpected error has occured. Your session may be expired, reload the page or try again')
		}
	});
}

var input = document.getElementById("emailSearch");

input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
  	searchUser();
  }
});

function searchUser() {
	$('#loadSpinner').removeClass('d-none');
	var email = $('#emailSearch').val()

	if (email == null || email == "") {
		alert('A valid email is required');
		$('#loadSpinner').addClass('d-none');

		return;
	}

	$('.dynamic-users').empty();
	$('.user-list-footer').empty();

	$.ajax({
        url: "/api/user/email/" + email,
        type: 'GET',
        dataType: 'json',
        timeout: 5000,
        success: function(res) {
			if (res === undefined || res.length == 0) {
				alert('No user with that email address was found');
			} else {
				console.log(res);

	        	$('#searchedUser').attr('onclick', 'viewUser('+ res.user[0].id +')');
				$('#searchedUsername').text(res.user[0].username + " • ");
				$('#searchedEmail').text(res.user[0].email);

				if (res.user[0].disabled) {
					$('#searchedDisabled').removeClass('d-none');
				}

				$('#searchedUser').removeClass('d-none');
			}

			$('#loadSpinner').addClass('d-none');
        },

        error: function() {
			$('#loadSpinner').addClass('d-none');
        	alert('An unexpected error has occured, try again later');
        }
    });
}