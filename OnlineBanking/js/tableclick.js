$(document).ready(function(){
	
  var table = $('#dataTable').DataTable();


  table.destroy();

  $('#dataTable').DataTable( {
        "order": [[ 4, "asc" ]]
  });

  $('#dataTable tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('table-active') ) {
      $(this).removeClass('table-active');
    }
    else {
      table.$('tr.table-active').removeClass('table-active');
      $(this).addClass('table-active');
    }
  });

  $('#ueAgain').click( 
    function () {

      var id = table.$('tr.table-active').find("td").eq(0).html();
     
      if(id == null){
        document.getElementById("errorp").innerHTML = "Bitte wählen Sie eine Überweisung an!";
      } else {

        var vIban = table.$('tr.table-active').find("td").eq(1).html();
        var aIban = table.$('tr.table-active').find("td").eq(2).html();
        var ueBet = table.$('tr.table-active').find("td").eq(3).html();

        var data = 'vIban=' + encodeURIComponent(vIban) + '&aIban=' + encodeURIComponent(aIban) + '&ueBetrag=' + encodeURIComponent(ueBet);

        $.ajax({
          data: data,  
          url: 'incl/frontend/ueberweise.php',
          method: 'POST', // or GET
          success: function(msg) {
              $("p#successp").text('Überweisung erfolgreich');
          }
        });
      }

  });
});





