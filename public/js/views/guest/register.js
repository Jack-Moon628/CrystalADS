$(document).ready(function() {
    $(".input-tip i").hover(function() {
        $(this).css("color", "#444");
        $(".input-tip span").css("visibility", "visible");
    }, function() {
        $(this).css("color", "hsla(226, 14%, 38%, 0.5)");
        $(".input-tip span").css("visibility", "hidden");
    });
});

function validateEmail(email) {
    $("#emailValidation").css("display", "block");

    const $result = $("#emailValidation");

    var criteria = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (criteria.test(email.value) == false) {
        showValidationError("#emailValidation", "Oops, that email doesn't look right. Try again?");

        return false;
    }

    showValidationSuccess("#emailValidation", "That email looks great!");

    return true;
}

function validatePassword(password) {
    $("#passwordValidation").css("display", "block");

    const $result = $("#passwordValidation");

    var criteria = /^(?=.*[!@#$%^&*_])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (criteria.test(password.value) == false) {
        showValidationError("#passwordValidation", "Oops, that password doesn't look right. Try again?");

        return false;
    }

    showValidationSuccess("#passwordValidation", "That password looks great!");

    return true;
}

function validateConfirmPassword(password) {
    $("#passwordConfirmValidation").css("display", "block");

    const $result = $();

    if ($('#password').val() == password.value) {
        $("#passwordConfirmValidation").css("display", "none");

        return true;
    }

    showValidationError("#passwordConfirmValidation", "Oops, that doesn't match. Try again?");

    return false;
}

function showValidationError(element, msg) {
    $(element).text(msg);
    $(element).css("color", "red");

    return false;
}

function showValidationSuccess(element, msg) {
    $(element).text(msg);
    $(element).css("color", "green");

    return true;
}