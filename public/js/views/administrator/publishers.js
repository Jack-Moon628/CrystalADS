geoprofilePanelState = true;

function viewCreateGeoprofileModal() {
	$('#createGeoprofileModal').modal('show');
}

function viewDomain(id, domainName, geoprofileId) {
	$('#viewDomainName').val(domainName);
	$('#updateDomainBtn').attr('onclick', 'updateDomain("' + id + '")');
	$('#viewGeoprofile').val(geoprofileId);
	

	$('#viewDomainModal').modal('show');
}

function updateDomain(id) {
	$('#loadSpinner').removeClass('d-none');

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/publisher/domain/" + id,
		type: "PUT",
		datatype: 'JSON',
		data: {
	        "name": $('#viewDomainName').val(),
	        "geoprofileid": $('#viewGeoprofile').val(),
        },

		success: function () { 
			$('#loadSpinner').addClass('d-none');
			alert('Doamin updated successfully');

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

function viewGeoprofilePanel() {
	hideContent();

	if (geoprofilePanelState) {
    	geoprofilePanelState = false;
		$("#viewGeoprofilePanel").animate({right: "0",}, 200, function() {});

    	return;
	} else {
    	geoprofilePanelState = true;
		$("#viewGeoprofilePanel").animate({right: "-290px",}, 200, function() {});

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

function viewGeoprofile(id) {
	$("#domainList").empty();
	$('#loadSpinner').removeClass('d-none');

	$.ajax({
        url: "/administrator/geoprofile/"+id,
        type: 'GET',
        dataType: 'json',
        timeout: 5000,
        success: function(res) {
        	$('#profileName').val(res.geoprofile.name);
        	$('#profileDescription').val(res.geoprofile.description);
        	$('#profileCountry').val(res.geoprofile.country.id);
        	$('#profileCPC').val(res.geoprofile.cost_per_click);
        	$('#profileCPM').val(res.geoprofile.cost_per_impression);
        	$('#profileRevenueShare').val(res.geoprofile.revenue_share);

        	$('#updateGeoprofileDetails').attr('onclick', 'updateGeoprofile('+ res.geoprofile.id +')');
        	$('#deleteProfile').attr('onclick', 'deleteProfile('+ res.geoprofile.id +')');

        	for (var i = 0; i < res.domains.length; i++) {
        		$("#domainList").append('<div class="w-100 mt-2 mb-2"> <span>'+ res.domains[i].domain.name +'</span> <a href="#" class="float-right card-link" onclick="removeDomain('+ res.domains[i].domain.id +', '+ res.geoprofile.id +')">Remove</a></div>');
        	}

        	viewGeoprofilePanel();

			$('#loadSpinner').addClass('d-none');
        },

        error: function() {
			$('#loadSpinner').addClass('d-none');
        	alert('An unexpected error has occured, try again later');
        }
    });
}

function createGeoprofile() {
	$('#loadSpinner').removeClass('d-none');

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/administrator/geoprofile",
		type: "POST",
		datatype: 'JSON',
		data: {
	        "name": $('#createProfileName').val(),
	        "description": $('#createProfileDescription').val(),
	        "country_id": $('#createProfileCountry').val(),
	        "cpc": $('#createProfileCPC').val(),
	        "cpm": $('#createProfileCPM').val(),
	        "revenue_share": $('#createProfileRevenueShare').val(),
        },

		success: function () { 
			$('#loadSpinner').addClass('d-none');
			alert('Profile created successfully');

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

function updateGeoprofile(id) {
	$('#loadSpinner').removeClass('d-none');

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/administrator/geoprofile/" + id,
		type: "PUT",
		datatype: 'JSON',
		data: {
	        "name": $('#profileName').val(),
	        "description": $('#profileDescription').val(),
	        "countryid": $('#profileCountry').val(),
	        "cpc": $('#profileCPC').val(),
	        "cpm": $('#profileCPM').val(),
	        "revenue_share": $('#profileRevenueShare').val(),
        },

		success: function () { 
			$('#loadSpinner').addClass('d-none');
			alert('Geoprofile updated successfully');

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

function removeDomain(id, geoprofileid) {
	$('#loadSpinner').removeClass('d-none');

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/domain/category/" + id,
		type: "PUT",
		datatype: 'JSON',
		data: {
	        "geoprofileid": geoprofileid,
        },

		success: function () { 
			$('#loadSpinner').addClass('d-none');
			alert('Domain removed successfully');

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

function deleteProfile(id) {
	$('#loadSpinner').removeClass('d-none');

	$.ajaxSetup({
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
	});

	$.ajax({
		url: "/administrator/geoprofile/" + id,
		type: "DELETE",
		datatype: 'JSON',

		success: function () { 
			$('#loadSpinner').addClass('d-none');
			alert('Profile deleted');

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