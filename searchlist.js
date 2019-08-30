(function( $ ) { 
	$( document ).ready(function() {
	//Map view search
	$('body').on('click','.searchlist3',function() { 
		var data = {
		"action": "testdssd"
		};
		data = $(this).serialize() + "&" + $.param(data);
		$.ajax({
		type: "POST",
		dataType: "json",
		url: "function.php", //Relative or absolute path to response.php file
		data: data,
		success: function(data) {
		$(".the-return").html(data);
		alert("Form submitted successfully.\nReturned json:");
		}
		});
		return false;
		});
		
		$( "#datepicker" ).datepicker({
		  changeMonth: true,
		  changeYear: true
		});
	
		$('.display').DataTable( {
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"bAutoWidth": false
			});		
		})
})( jQuery );