viewPermissionsPanelState = true;

function viewUserPermissionsPanel() {
	if (viewPermissionsPanelState) {
    	viewPermissionsPanelState = false;
		$("#viewUserPermissionsPanel").animate({right: "0",}, 200, function() {});

    	return;
	} else {
    	viewPermissionsPanelState = true;
		$("#viewUserPermissionsPanel").animate({right: "-290px",}, 200, function() {});

    	return;
	}
}

function viewUser(id) {
	$('#loadSpinner').removeClass('d-none');

    $(".onoffswitch-checkbox").each(function( index ) {
        $(this).removeAttr('checked');
    });

	$.ajax({
        url: "/administrator/user/permissions/"+id,
        type: 'GET',
        dataType: 'json',
        timeout: 5000,
        success: function(res) {
        	$('#emailUserPermission').val(res.user.email);
            $('#usernameUserPermission').val(res.user.username);
            $('#accountTypeUserPermission').val(res.user.account_type.name);

            for (const permission of res.user.user_permissions) {
                $('#permissionSwitch' + permission.permission_id + " input").attr('checked', 'true');
            }

            if (res.user.account_type_id == 3) {
                $('#makeUserAdministrator').hide();
            } else {
                $('#makeUserAdministrator').show();
            }

            if (res.user.account_type_id == 5) {
                $('#makeUserStaff').hide();
                $('#revokeUserStaff').show();
            } else {
                $('#revokeUserStaff').hide();
                $('#makeUserStaff').show();
            }

            $('#makeUserStaff').attr('onclick', 'toggleUserStaff('+ res.user.id + ',' + "true" + ')');
            $('#revokeUserStaff').attr('onclick', 'toggleUserStaff('+ res.user.id + ',' + "false" + ')');
            $('#makeUserAdministrator').attr('onclick', 'makeUserAdministrator('+ res.user.id + ',' + "true" + ')');

            $('#updateUserPermissions').attr('onclick', 'updateUserPermissions('+ res.user.id +')');

        	viewUserPermissionsPanel();

			$('#loadSpinner').addClass('d-none');
        },

        error: function() {
			$('#loadSpinner').addClass('d-none');
        	alert('An unexpected error has occured, you may not have the relevant permissions to access.');
        }
    });
}

function updateUserPermissions(id) {
    $('#loadSpinner').removeClass('d-none');

    var permissions = [];

    var count = 0;

    $('.onoffswitch-checkbox').each(function() {
        count++;

        if ($(this).prop('checked')) {
            permissions.push(count);
        }
    });

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $.ajax({
        url: "/administrator/user/permissions/" + id,
        type: "PUT",
        datatype: 'JSON',
        data: {
            permissions:permissions,
        },

        success: function () { 
            $('#loadSpinner').addClass('d-none');

            alert('User permissions updated successfully');
        },

        error: function(xhr) {
            $('#loadSpinner').addClass('d-none');

            $.each(xhr.responseJSON.errors, function(key,value) {
                alert(value);
            }); 
        }
    });
}

function toggleUserStaff(id, state) {
    $('#loadSpinner').removeClass('d-none');

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $.ajax({
        url: "/administrator/user/staff/" + id,
        type: "PUT",
        datatype: 'JSON',
        data: {
            "state": state,
        },

        success: function () { 
            $('#loadSpinner').addClass('d-none');

            alert('User account type updated');
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

function makeUserAdministrator(id, state) {
    $('#loadSpinner').removeClass('d-none');

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $.ajax({
        url: "/administrator/user/administrator/" + id,
        type: "PUT",
        datatype: 'JSON',
        data: {
            "state": state,
        },

        success: function () { 
            $('#loadSpinner').addClass('d-none');

            alert('User account type updated');
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
                $('#searchedUser').attr('onclick', 'viewUser('+ res.user[0].id +')');
                $('#searchedUsername').text(res.user[0].username + " • ");
                $('#searchedEmail').text(res.user[0].email);

                if (res[0].disabled) {
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