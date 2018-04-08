//== Class definition
var Newstaff = function() {

    var handleNewStaff = function() {
        $('#staff_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $('#staff-form');

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            var staff_name      = document.getElementById('staff-name').value;
            var staff_location  = document.getElementById('staff-location').value;
            post_data = {
              'action'          : 'submitStaff',
              'staff_name'      : staff_name,
              'staff_location'  : staff_location
            };

            form.ajaxSubmit({
                type: 'POST',
                url:  'controllers/new-staff.php',
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
            handleNewStaff();
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    Newstaff.init();
});
