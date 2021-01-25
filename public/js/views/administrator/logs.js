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

	window.location.href = "/api/user/logs/" + email;
}

function filterLogs(filterId) {
	$('#loadSpinner').removeClass('d-none');

	window.location.href = "/api/filter/logs/" + filterId;
}

function viewLog(id) {
	$('#loadSpinner').removeClass('d-none');

	$.ajax({
        url: "/administrator/logs/"+id,
        type: 'GET',
        dataType: 'json',
        timeout: 5000,
        success: function(res) {
        	console.log(res);
        	$('#actionAccountLog').val(res.actionUser.username);
        	$('#targetAccountLog').val(res.targetUser.username);
        	$('#reasonLog').val(res.log.reason);

			$('#viewLogModal').modal('toggle');

			$('#loadSpinner').addClass('d-none');
        },

        error: function() {
			$('#loadSpinner').addClass('d-none');
        	alert('An unexpected error has occured, try again later');
        }
    });
}