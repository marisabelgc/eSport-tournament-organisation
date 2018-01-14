var sponsorName = document.querySelector('#name');
var url = document.querySelector('#url');
var description = document.querySelector('#description');

function validate(e){
	if( e.target.value == "" ){
		e.target.classList.add('border-red');
		e.target.labels[0].childNodes[1].innerHTML="Fill in the field";

	}else if( e.target.id == 'url' && url.value.indexOf("www.") < 0 && url.value.indexOf("http://") < 0 && url.value.indexOf("https://") < 0){
			e.target.className += " border-red";
			e.target.labels[0].childNodes[1].innerHTML="Include 'www.' 'http://' or 'https://'";

	}else{
		if(e.target.classList.contains('border-red') ){
			e.target.classList.remove('border-red');
			e.target.labels[0].childNodes[1].innerHTML="";
		} 
	}
}

sponsorName.addEventListener('focusout', validate);
url.addEventListener('focusout', validate);
description.addEventListener('focusout', validate);