//== Class Definition
var SnippetLogin = function() {

    var login = $('#m_login');

    var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="m-alert m-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
			<span></span>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        alert.animateClass('fadeIn animated');
        alert.find('span').html(msg);
    }

    //== Private Functions

    var displaySignUpForm = function() {
        login.removeClass('m-login--forget-password');
        login.removeClass('m-login--signin');

        login.addClass('m-login--signup');
        login.find('.m-login__signup').animateClass('flipInX animated');
    }

    var displaySignInForm = function() {
        login.removeClass('m-login--forget-password');
        login.removeClass('m-login--signup');

        login.addClass('m-login--signin');
        login.find('.m-login__signin').animateClass('flipInX animated');
    }

    var displayForgetPasswordForm = function() {
        login.removeClass('m-login--signin');
        login.removeClass('m-login--signup');

        login.addClass('m-login--forget-password');
        login.find('.m-login__forget-password').animateClass('flipInX animated');
    }

    var handleFormSwitch = function() {
        $('#m_login_forget_password').click(function(e) {
            e.preventDefault();
            displayForgetPasswordForm();
        });

        $('#m_login_forget_password_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });

        $('#m_login_signup').click(function(e) {
            e.preventDefault();
            displaySignUpForm();
        });

        $('#m_login_signup_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });
    }

    var handleSignInFormSubmit = function() {
        $('#m_login_signin_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            var email = document.getElementById('login_email').value;
            var password = document.getElementById('login_password').value;

            post_data = {
              'action'     : 'login',
              'email'      : email,
              'password'   : password
            };

            form.ajaxSubmit({
                type: 'POST',
                url:  '../controllers/login.php',
                data: post_data,
                success: function(response) {
                  data = JSON.parse(response);
                  if (data.success == 1) {
                    window.location.href = "../index.php";
                  } else {
                    // similate 2s delay
                  	setTimeout(function() {
  	                    btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
  	                    showErrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');
                      }, 2000);
                  }  	
                }
            });
        });
    }

    var handleSignUpFormSubmit = function() {
        $('#m_login_signup_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    firstname: {
                        required: true
                    },
                    lastname: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                    rpassword: {
                        required: true,
                        equalTo: '#signup_password'
                    },
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            var first_name = document.getElementById('signup_first_name').value;
            var last_name  = document.getElementById('signup_last_name').value;
            var email      = document.getElementById('signup_email').value;
            var password   = document.getElementById('signup_password').value;

            post_data = {
              'action'     : 'signup',
              'first_name' : first_name,
              'last_name'  : last_name,
              'email'      : email,
              'password'   : password
            };

            form.ajaxSubmit({
                type: 'POST',
                url:  '../controllers/login.php',
                data: post_data,
                success: function(response, status, xhr, $form) {
                   btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                   form.clearForm();
                   form.validate().resetForm();

                   // display signup form
                   displaySignInForm();
                   var signInForm = login.find('.m-login__signin form');
                   signInForm.clearForm();
                   signInForm.validate().resetForm();

                   showErrorMsg(signInForm, 'success', 'Thank you. You have been registered.');
                }
            });
        });
    }

    var handleForgetPasswordFormSubmit = function() {
        $('#m_login_forget_password_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            var email     = document.getElementById('forgot_email').value;

            post_data = {
              'action'     : 'forgotPassword',
              'email'      : email
            };

            form.ajaxSubmit({
                type: 'POST',
                url:  '../controllers/login.php',
                data: post_data,
                success: function(response, status, xhr, $form) {
                	// similate 2s delay
                	setTimeout(function() {
                		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states

	                    // display signup form
	                    displaySignInForm();
	                    var signInForm = login.find('.m-login__signin form');
	                    signInForm.clearForm();
	                    signInForm.validate().resetForm();

	                    showErrorMsg(signInForm, 'success', 'Cool! Check your email. And hey, try not to lose your password again.');
                	}, 2000);
                }
            });
        });
    }

    //== Public Functions
    return {
        // public functions
        init: function() {
            handleFormSwitch();
            handleSignInFormSubmit();
            handleSignUpFormSubmit();
            handleForgetPasswordFormSubmit();
        }
    };
}();

//== Class Initialization
jQuery(document).ready(function() {
    SnippetLogin.init();
    
    $('#registrarse').click(function(e) {
      e.preventDefault();
      window.location.href="../register.php"
    });
          
    $('#ver-turno').click(function(e) {
      e.preventDefault();
      window.location.href="../ver-turno.php"
    });
    
    $('#m_login_signup').click(function(e) {
      e.preventDefault();
      window.location.href="login.php"
    });
});
