//== Class definition
var NewClient = function() {

    var handleNewClient = function() {
        $('#new_client_submit').click(function(e) {
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
            var staff_name    = document.getElementById('staff-name').value;
            var record_number = document.getElementById('client-record-number').value;
            var client_location = document.getElementById('client-location').value;

            var appointmentVal = document.getElementById('m_datetimepicker_3').value;
            var appointment = Math.round(new Date(appointmentVal).getTime()/1000);

            post_data = {
              'action'        : 'submitNewClient',
              'first_name'    : first_name,
              'last_name'     : last_name,
              'phone'         : phone,
              'locationId'    : client_location,
              'record_number' : record_number,
              'appointment'   : appointment,
              'staff_name'    : staff_name
            };

            form.ajaxSubmit({
                type: 'POST',
                url:  'controllers/new-client.php',
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
            handleNewClient();
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    NewClient.init();
});
