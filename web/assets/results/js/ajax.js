$(function(){
	$('.sb_wrapper').submit(function(e){
		e.preventDefault();
	});
	$('#search').keyup(function(){


		var envio= $('#search').val();
			console.log(envio);
		$('#results').html("<h2 class='loading'>Loading...</h2>")
		$.ajax({
			type: 'POST',
			url:  'searcher.php',
			data:('search='+envio),
			success: function(resp){
					if(resp!=""){
					//	$('#results').html(resp);
			$('#results').html(resp);

					}
			}
		});
	});

});

