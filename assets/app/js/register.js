//== Class definition
var SendKey = function() {

    var handleNewUser = function() {
        $('#m_client_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    phone: {
                        required: true
                    },
                    date: {
                        required: true
                    }
                }
            });
            
            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            var first_name    = document.getElementById('client-first-name').value;
            var last_name     = document.getElementById('client-last-name').value;
            var phone         = document.getElementById('client-phone').value;
            var location      = document.getElementById('client-location').value;
            var record_number = document.getElementById('client-record-number').value;
            
            var appointmentVal = document.getElementById('m_datetimepicker_3').value;
            var appointment = Math.round(new Date(appointmentVal).getTime()/1000);

            post_data = {
              'action'        : 'submitClient',
              'first_name'    : first_name,
              'last_name'     : last_name,
              'phone'         : phone,
              'location'      : location,
              'record_number' : record_number,
              'appointment'   : appointment
            };

            form.ajaxSubmit({
                type: 'POST',
                url:  'controllers/register.php',
                data: post_data,
                success: function(response) {
                  data = JSON.parse(response);
                  if (data.success == 1) {
                    $('#success-user-message').removeClass('hidden');
                    // similate 2s delay
                  	setTimeout(function() {
                      window.location.reload();
                  	}, 3000);
                  }
                }
            });

        });
    }

    return {
        //== Init demos
        init: function() {
            // init key
            handleNewUser();
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    SendKey.init();
});
