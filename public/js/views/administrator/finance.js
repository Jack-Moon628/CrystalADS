var input = document.getElementById("emailSearch");

function modifyWalletModal() {
	$('#modifyWalletModal').modal('show');
}

function submitDomainForm() {
	document.getElementById("modifyWalletForm").submit();
}

function viewUser(id) {
	$('#loadSpinner').removeClass('d-none');

	$.ajax({
        url: "/administrator/finance/" + id,
        type: 'GET',
        dataType: 'json',
        timeout: 5000,
        success: function(res) {
        	$('#modifyWalletForm').attr('action', '/administrator/finance/' + id);
			$('#amountWallet').text(res[0].value);
			$('#modifyWalletModal').modal('show');

			$('#loadSpinner').addClass('d-none');

		},

        error: function() {
			$('#loadSpinner').addClass('d-none');
        	alert('An unexpected error has occured, try again later');
        }
    });
}

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
				$('#searchedUsername').text(res.user[0].username);
				$('#searchedAccountType').text(res.accountType);

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