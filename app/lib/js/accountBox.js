$('#loginTab').on('click', function () {
    $('#registerTab').removeClass("active");
    $('#loginTab').addClass("active");
    $('#registerForm').hide();
    $('#loginForm').show();
    $('#registerTitle').hide();
    $('#loginTitle').show();
});

$('#registerTab').on('click', function () {
    $('#loginTab').removeClass("active");
    $('#registerTab').addClass("active");
    $('#loginForm').hide();
    $('#registerForm').show();
    $('#loginTitle').hide();
    $('#registerTitle').show();
});

function passwordMatch() {
    var pass = $('#regPassword').val();
    var repass = $('#re-password').val();

    if(pass != repass){
        $('#passIcon, #re-passIcon').css("color", "red");
        $('#registerSubmit').addClass("disabled");
    }else{
        $('#passIcon, #re-passIcon').css("color", "green");
    }
}

$(document).ready(function () {
    $('#regPassword, #re-password').keyup(passwordMatch);
});
