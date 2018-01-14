(function($) {
	// AJAX
	$('form.ajax').on('submit', function(){
		var that = $(this),
		url = that.attr('action'),
		type = that.attr('method'),
		data = {},
		tournament = [],
		sponsor = [],
		player = [];

		that.find('[name]').each(function(index, value){
			var that = $(this),
			name = that.attr('name');
			if( name == "tournament"){
				if(that.is(':checked') ){
					tournament.push( that.val() );
					data[name] = tournament;
				}				
			}else if( name == "sponsor"){
				if(that.is(':checked') ){
					sponsor.push( that.val() );
					data[name] = sponsor;
				}
			}else if( name == "player"){
				if(that.is(':checked') ){
					player.push( that.val() );
					data[name] = player;
				}
			}else{
				data[name] = that.val();	
			}		
			
		});	

		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response){
				if(response === "success"){
					location.href='http://localhost/GamesRise-BackEndUI';					
				}else{
					if(response === "Dashes are the only valid date separator" ||
						response === "Include a valid date"){
						$('#start_date').addClass('border-red');
					$('#start_date_span').html(response);

				}else if(response === "Invalid schedule hour"){
					if( $('#scheduleHour1').value == "" ){
						$('#scheduleHour1').addClass('border-red');
					}
					if( $('#scheduleHour2').value == "" ){
						$('#scheduleHour2').addClass('border-red');
					}
					$('#schedule_span').html(response);				
				}else if(response === "Invalid schedule minute"){
					if( $('#scheduleMin1').value == "" ){
						$('#scheduleMin1').addClass('border-red');
					}
					if( $('#scheduleMin2').value == "" ){
						$('#scheduleMin2').addClass('border-red');
					}
					$('#schedule_span').html(response);				
				}else if(response === "Invalid URL"){
					$('#url').addClass('border-red');
					$('#url_span').html(response);
				}else if(response === "This sponsor already exist"){
					$('#name').addClass('border-red');
					$('#name_span').html(response);						
				}else if(response === "Email already in use"){
					$('#email').addClass('border-red');	
					$('#email_span').html(response);	
				}else{
					console.log(response);
				}
			}
		}
	});
		return false;
	});
})(jQuery);