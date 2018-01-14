var tournamentName = document.querySelector('#name');
var game = document.querySelector('#game');
var start_date = document.querySelector('#start_date');
var scheduleH1 = document.querySelector('#scheduleHour1');
var scheduleH2 = document.querySelector('#scheduleHour2');
var scheduleM1 = document.querySelector('#scheduleMin1');
var scheduleM2 = document.querySelector('#scheduleMin2');
var prize1 = document.querySelector('#prize1');
var prize2 = document.querySelector('#prize2');
var prize3 = document.querySelector('#prize3');
var address = document.querySelector('#address');

function validate(e){
	if( e.target.value == "" ){
		e.target.classList.add('border-red');
		if( e.target.id == "scheduleHour1" || e.target.id == "scheduleHour2" || e.target.id == "scheduleMin1" || e.target.id == "scheduleMin2"){
			document.getElementById('scheduleSpan').innerHTML="Fill in input field";
		}else{
			e.target.labels[0].childNodes[1].innerHTML="Fill in the field";
		}		

	}else if( (e.target.id == "scheduleHour1" && (e.target.value < 0 || e.target.value > 23) ) ||
		(e.target.id == "scheduleHour2" && (e.target.value < 0 || e.target.value > 23) ) ||
		(e.target.id == "scheduleMin1" && (e.target.value < 0 || e.target.value > 59) ) || 
		(e.target.id == "scheduleMin2" && (e.target.value < 0 || e.target.value > 59) ) ){

		e.target.className = "form-control border-red";
		document.getElementById('scheduleSpan').innerHTML="Invalid schedule hour";

	}else{
		if(e.target.classList.contains('border-red') ){			
			if(e.target.id == "scheduleHour1" || e.target.id == "scheduleHour2" || e.target.id == "scheduleMin1" || e.target.id == "scheduleMin2") {
				// Elimina el texto de error solo si hay un solo error
				$error = 0;

				scheduleHour1.classList.length > 1 ? $error++ : '';
				scheduleHour2.classList.length > 1 ? $error++ : '';
				scheduleMin1.classList.length > 1 ? $error++ : '';
				scheduleMin2.classList.length > 1 ? $error++ : '';

				if($error < 2){
					document.getElementById('scheduleSpan').innerHTML="";
				}
			}else{
				e.target.labels[0].childNodes[1].innerHTML="";
			}
			e.target.classList.remove('border-red');
		} 
	}
}

tournamentName.addEventListener('focusout', validate);
game.addEventListener('focusout', validate);
start_date.addEventListener('focusout', validate);
scheduleH1.addEventListener('focusout', validate);
scheduleH2.addEventListener('focusout', validate);
scheduleM1.addEventListener('focusout', validate);
scheduleM2.addEventListener('focusout', validate);
prize1.addEventListener('focusout', validate);
prize2.addEventListener('focusout', validate);
prize3.addEventListener('focusout', validate);
address.addEventListener('focusout', validate);