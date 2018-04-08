//== Class definition
var NewLocation = function() {

    var handleNewLocation = function() {
        $('#m_location_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            var location_name = document.getElementById('location-name').value;
            var location_type = document.getElementById('location-type').value; 
            var can_register  = document.getElementById('can-register').value;
            var record_number = document.getElementById('record-number').value;
            var location_pin  = document.getElementById('location-pin').value;
            
            post_data = {
              'action'        : 'submitLocation',
              'location_name' : location_name,
              'location_type' : location_type,
              'can_register'  : can_register,
              'record_number' : record_number,
              'location_pin'  : location_pin
            };

            form.ajaxSubmit({
                type: 'POST',
                url:  'controllers/new-location.php',
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
            handleNewLocation();
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    NewLocation.init();
});
