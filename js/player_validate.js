var playerName = document.querySelector('#name');
var lastName = document.querySelector('#lastName');
var username = document.querySelector('#username');
var email = document.querySelector('#email');
var nameRegEx = /^[a-zA-Z ]{2,30}$/;
var emailRegEx = /\S+@\S+\.\S+/;

function validate(e){

	if( e.target.value == "" ){
		e.target.classList.add('border-red');
		e.target.labels[0].childNodes[1].innerHTML="Fill in input field";

	}else if( (e.target.id == "name" || e.target.id == "lastName") && !nameRegEx.test( e.target.value )){
		var placeholder = e.target.placeholder.toLowerCase();
		e.target.classList.add('border-red');
		e.target.labels[0].childNodes[1].innerHTML="Invalid " + placeholder;

	}else if(e.target.id == "email" && !emailRegEx.test( e.target.value )){
		e.target.classList.add('border-red');
		e.target.labels[0].childNodes[1].innerHTML="Invalid email";
	}else{
		if(e.target.classList.contains('border-red') ){
			e.target.classList.remove('border-red');
			e.target.labels[0].childNodes[1].innerHTML="";
		} 
	}
}

playerName.addEventListener('focusout', validate);
lastName.addEventListener('focusout', validate);
username.addEventListener('focusout', validate);
email.addEventListener('focusout', validate);