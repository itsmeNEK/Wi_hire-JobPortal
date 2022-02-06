// validation example for Login form
$("#btnLogin").click(function(event) {

    var form = $("#loginForm");

    if (form[0].checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
    }

    // if validation passed form
    // would post to the server here

    form.addClass('was-validated');
});

$(document).ready(function() {
    $("#inputPasswordNew, #inputPasswordNewVerify").keyup(checkPasswordMatch);
});

// Function to check Whether both passwords are equal
function checkPasswordMatch() {
    var password = $("#inputPasswordNew").val();
    var confirmPassword = $("#inputPasswordNewVerify").val();

    if (password != confirmPassword) {
        $("#divCheckPasswordMatch").html("Passwords do not match!").css('color', 'red');
        $("#inputPasswordNew").css('background', 'rgba(255, 0, 0, 0.433)');
        $("#inputPasswordNewVerify").css('background', 'rgba(255, 0, 0, 0.433)');
    } else if ((password == '') && (confirmPassword == '')) {
        $("#divCheckPasswordMatch").html("Enter Password!").css('color', 'red');
        $("#inputPasswordNew").css('background', 'white');
        $("#inputPasswordNewVerify").css('background', 'white');
    } else if (password == '') {
        $("#divCheckPasswordMatch").html("Enter Password!").css('color', 'red');
        $("#inputPasswordNew").css('background', 'rgba(255, 0, 0, 0.433)');
        $("#inputPasswordNewVerify").css('background', 'rgba(255, 0, 0, 0.433)');
    } else if (confirmPassword == '') {
        $("#divCheckPasswordMatch").html("Enter Password!").css('color', 'red');
        $("#inputPasswordNew").css('background', 'rgba(255, 0, 0, 0.433)');
        $("#inputPasswordNewVerify").css('background', 'rgba(255, 0, 0, 0.433)');
    } else {
        $("#divCheckPasswordMatch").html("Passwords match.").css('color', 'green');
        $("#inputPasswordNew").css('background', 'rgba(34, 255, 0, 0.433)');
        $("#inputPasswordNewVerify").css('background', 'rgba(34, 255, 0, 0.433)');
    }
}

$(document).ready(function() {
    $("#inputPasswordNew, #inputPasswordNewVerify").keyup(checkPasswordMatch);
});
