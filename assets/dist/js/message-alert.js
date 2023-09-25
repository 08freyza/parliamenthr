const authMessage = document.getElementById("message-login-page");

if(authMessage) {
    if(authMessage.innerHTML.trim() == 'emailinvalid') {
        swal({
            icon: "error",
            title: "Login Failed!",
            type: "error",
            text: "Email is not correct! Please try again!",
            buttons: {
                confirm: {
                    text: "OK",
                    className: "btn btn-primary",
                },
            },
        });
    } else if (authMessage.innerHTML.trim() == 'passwordinvalid') {
        swal({
            icon: "error",
            title: "Login Failed!",
            type: "error",
            text: "Password is not correct! Please try again!",
            buttons: {
                confirm: {
                    text: "OK",
                    className: "btn btn-primary",
                },
            },
        });
    } else if (authMessage.innerHTML.trim() == 'captchainvalid') {
        swal({
            icon: "error",
            title: "Captcha Invalid!",
            type: "error",
            text: "Captcha you just typed is invalid!",
            buttons: {
                confirm: {
                    text: "OK",
                    className: "btn btn-primary",
                },
            },
        });
    } else if (authMessage.innerHTML.trim() == 'accountlocked') {
        swal({
            icon: "error",
            title: "Your account has been locked!",
            type: "error",
            text: "Please contact your administrator to unlock your account!",
            buttons: {
                confirm: {
                    text: "OK",
                    className: "btn btn-primary",
                },
            },
        });
    } else if (authMessage.innerHTML.trim() == 'successrequestchangepassword') {
        swal({
            icon: "success",
            title: "Request Success!",
            type: "success",
            text: "Request change password has sent to email!",
            buttons: {
                confirm: {
                    text: "OK",
                    className: "btn btn-primary",
                },
            },
        });
    } else if (authMessage.innerHTML.trim() == 'failedrequestchangepassword') {
        swal({
            icon: "error",
            title: "Request Failed!",
            type: "error",
            text: "Email you typed is invalid!",
            buttons: {
                confirm: {
                    text: "OK",
                    className: "btn btn-primary",
                },
            },
        });
    } else if (authMessage.innerHTML.trim() == 'successchangepassword') {
        swal({
            icon: "success",
            title: "Change Password Success!",
            type: "success",
            text: "Please login to enter to your account!",
            buttons: {
                confirm: {
                    text: "OK",
                    className: "btn btn-primary",
                },
            },
        });
    } else if (authMessage.innerHTML.trim() == 'failedchangepassword') {
        swal({
            icon: "error",
            title: "Change Password Failed!",
            type: "error",
            text: "New password you typed doesn't match with confirm new password!",
            buttons: {
                confirm: {
                    text: "OK",
                    className: "btn btn-primary",
                },
            },
        });
    }
}