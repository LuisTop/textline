//== Class definition
var Dashboard = function() {
  
  // basic demo
  var todayClients = function() {

    var datatable = $('.m_datatable').mDatatable({
      // datasource definition
      data: {
        type: 'remote',
        source: {
          read: {
            // sample GET method
            method: 'GET',
            // url: 'https://keenthemes.com/metronic/preview/inc/api/datatables/demos/default.php',
            url: '../../../controllers/clients-data-handler.php',
            map: function(raw) {
              // sample data mapping
              var dataSet = raw;
              if (typeof raw.data !== 'undefined') {
                dataSet = raw.data;
              }
              return dataSet;
            },
          },
        },
        pageSize: 10,
        serverPaging: true,
        serverFiltering: true,
        serverSorting: true,
      },

      // layout definition
      layout: {
        scroll: false,
        footer: false
      },

      // column sorting
      sortable: false,

      pagination: true,

      toolbar: {
        // toolbar items
        items: {
          // pagination
          pagination: {
            // page size select
            pageSizeSelect: [10, 20, 30, 50, 100, -1],
          },
        },
      },

      // columns definition
			columns: [{
        field: 'first_name',
        title: 'Name',
        template: '{{first_name}} {{last_name}}',
      }, {
				field: "phone",
				title: "Phone"
			}, {
				field: "record_number",
				title: "Record Number"
			}, {
				field: "appointment",
				title: "Appointment",
        type: "date",
				format: "MM/DD/YYYY"
			}]
    });

  };

    var logout = function() {
      $('#logout').click(function(e) {
          e.preventDefault();
          $.ajax({
              type: 'POST',
              url:  'controllers/logout.php',
              success: function() {
                location.reload();
              }
          });
      });

    }

    var deactivate = function() {
      $('.deactivate').click(function(e) {
          e.preventDefault();
          keyid = this.id;

          post_data = {
            'action'     : 'deactivate',
            'keyid'      : keyid,
          };

          $.ajax({
              type: 'POST',
              url:  'controllers/index-handler.php',
              data: post_data,
              success: function() {
                location.reload();
              }
          });
      });

    }

    return {
        //== Init demos
        init: function() {
            // init charts
            todayClients();
            logout();
            deactivate();
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    Dashboard.init();
});

function search() {
    var input, filter, table, tr, span, i;
    input = document.getElementById("generalSearch");
    filter = input.value.toUpperCase();
    table = document.getElementsByClassName('m-datatable__table')[0];
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      if (i != 0) {
        span0 = tr[i].getElementsByTagName("span")[0];
        span1 = tr[i].getElementsByTagName("span")[1];
        span2 = tr[i].getElementsByTagName("span")[2];
        span3 = tr[i].getElementsByTagName("span")[3];
        if (span0.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else if (span1.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else if (span2.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else if (span3.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
      } else {
        tr[i].style.display = "";
      }
    }
}
