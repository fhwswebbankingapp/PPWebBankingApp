$(document).ready(function(){
	var table = $('#dataTable').DataTable();
	
  $('#dataTable tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('table-active') ) {
      $(this).removeClass('table-active');
    }
    else {
      table.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
    }
  });

  $('#delete').click( function () {
    var id = table.$('tr.table-active').find("td").eq(0).html();       
    table.row('.table-active').remove().draw( false );
	

    $.ajax({
        url: 'delete.php',
		type: 'POST',
//		method: 'POST',
		data: {id},
        success: function(data) {
            console.log(data); // Inspect this in your console
        }
    });
  });
});










/*

$(document).ready(function(){
	var table = $('#dataTable').DataTable( {
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ]
    } );
	
  $('#dataTable tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('table-active') ) {
      $(this).removeClass('table-active');
    }
    else {
      table.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
    }
  });

  $('#delete').click( function () {
    var id = table.$('tr.table-active').find("td").eq(0).html();       
    table.row('.table-active').remove().draw( false );
	

    $.ajax({
        url: 'delete.php',
		type: 'POST',
//		method: 'POST',
		data: id,
        success: function(data) {
            console.log(data); // Inspect this in your console
        }
    });
  });
});

*/