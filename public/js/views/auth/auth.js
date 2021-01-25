$(function() {	
	menuState = false;
	walletDropdownState = false;

	var view = window.location.pathname;

	$(document).click(function(){
		$(".dropdown").hide();

		walletDropdownState = false;
	});

	$('.menu-item').each(function(i, obj) {
		if($(this).attr('href') == view) {
			$(this).addClass('active');
		}
	});
});

function redirect(uri) {
	window.location.href = "/" + uri;
}

function toggleMenu() {
	if (menuState) { closeMenu(); } else { openMenu(); }
}

function openMenu() {
	menuState = true;
	animateRotate(180, "#menuIcon");
	$("#menu").animate({left: "0",}, 200, function() {});

	return;
}

function closeMenu() {
	menuState = false;
	animateRotate(-180, "#menuIcon");
	$("#menu").animate({left: "-280",}, 200, function() {});


	return menuState = false;
}

function bellAnimation() {
	animateRotate(20, this);

}

$("#walletButton").click(function(e){
	e.stopPropagation();

	if (walletDropdownState) {
		walletDropdownState = false;
		$("#walletButton .dropdown").hide();	
	} else {
		walletDropdownState = true;
		$("#walletButton .dropdown").show();
	}
});

function animateRotate(degree, element){
    $({deg: 0}).animate({deg: degree}, {
        step: function(now, fx){
            $(element).css({
                 transform: "rotate(" + now + "deg)"
            });
        }
    });
}

function refresh() {
	location.reload();
}