function redirect(url) {
	window.location.href = url;
}

function refresh() {
	location.reload();
}

function viewApprovalRequest(id) {
	$('#loadSpinner').removeClass('d-none');

	$.ajax({
        url: "/api/user/"+id,
        type: 'GET',
        dataType: 'json',
        timeout: 5000,
        success: function(res) {
        	$('#emailReview').val(res.user.email);
        	$('#usernameReview').val(res.user.username);
        	$('#accountTypeReview').val(res.user.account_type.name);
        	$('#companyReview').val(res.user.company_name);
        	$('#registeredReview').val('Registered ' + res.created_at);



        	$('#approveUserBtn').attr('onclick', 'submitApproval('+ res.user.id + ',' + "true" + ')');
        	$('#denyUserBtn').attr('onclick', 'submitApproval('+ res.user.id + ',' + "false" + ')');


			$('#pendingUserModal').modal('toggle');

			$('#loadSpinner').addClass('d-none');
        },

        error: function() {
			$('#loadSpinner').addClass('d-none');
        	alert('An unexpected error has occured, try again later');
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

	        	$('#searchedUser').attr('onclick', 'viewApprovalRequest('+ res[0].id +')');
				$('#searchedUsername').text(res[0].username + " • ");
				$('#searchedEmail').text(res[0].email);

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

function submitApproval(id, status) {
	$('#loadSpinner').removeClass('d-none');

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/administrator/users/pending/" + id,
		type: "PUT",
		datatype: 'JSON',
		data: {
	        "status": status,
        },

		success: function () { 
			$('#loadSpinner').addClass('d-none');
			alert('Updated successfully');
			refresh();
		},

		error: function(xhr) {
			$.each(xhr.responseJSON.errors, function(key,value) {
				alert(value);
			}); 
		}
	});
}