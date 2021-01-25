function redirect(url) {
	window.location.href = url;
}

function viewDomainRequest(id) {
	$('#loadSpinner').removeClass('d-none');

	$.ajax({
        url: "/administrator/platforms/pending/"+id,
        type: 'GET',
        dataType: 'json',
        timeout: 5000,
        success: function(res) {

        	$('#pendingUserName').val(res.user.username);
        	$('#pendingUserEmail').val(res.user.email);

        	$('#pendingDomainName').val(res.name);

        	$('#approveUserBtn').attr('onclick', 'submitApproval('+ res.id + ',' + "true" + ')');
        	$('#denyUserBtn').attr('onclick', 'submitApproval('+ res.id + ',' + "false" + ')');


			$('#pendingDomainModal').modal('toggle');

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
		url: "/administrator/platforms/pending/" + id,
		type: "PUT",
		datatype: 'JSON',
		data: {
	        "status": status,
	        "geoprofile id": $('#pendingDomainGeoprofile').val(),
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