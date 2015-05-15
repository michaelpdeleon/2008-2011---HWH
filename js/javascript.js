function ClearNewsletter() {
	document.newsletter.first_name.value = "";
	document.newsletter.email_address.value = "";
	document.newsletter.postalcode.value = "";
}
//Request Proposal
function ClearProposal() { 
	document.proposal.firstname.value = "";
	document.proposal.lastname.value = "";
	document.proposal.title.value = "";
	document.proposal.company.value = "";
	document.proposal.address1.value = "";
	document.proposal.address2.value = "";
	document.proposal.city.value = "";
	document.proposal.state.value = "";
	document.proposal.zip.value = "";
	document.proposal.email.value = "";
	document.proposal.phone.value = "";
	document.proposal.fax.value = "";
	document.proposal.eventname.value = "";
	document.proposal.eventdescription.value = "";
	document.proposal.eventtype.value = "";
	document.proposal.arrivaldate.value = "";
	document.proposal.departuredate.value = "";
	document.proposal.alteventdate.value = "";
	document.proposal.altdeparturedate.value = "";
	document.proposal.guests.value = "";
	document.proposal.rooms.value = "";
	document.proposal.contactmeby.value = "";
	document.proposal.contactmeon.value = "";
	document.proposal.comments.value = "";
}

//Site Feedback
function ClearFeedback() { 
	document.feedback.name.value = ""; 
	document.feedback.email.value = "";
	document.feedback.phone.value = "";
	document.feedback.comments.value = "";
}

// JavaScript Document
function ImageOn(section) {
	switch(section) {
		case 'nav_your_stay':
			document.nav_your_stay.src = 'images/global_navigation/nav_your_stay_off.gif'
		break;
		case 'nav_dining_entertainment':
			document.nav_dining_entertainment.src = 'images/global_navigation/nav_dining_entertainment_of.gif'
		break;
		case 'nav_health_fitness':
			document.nav_health_fitness.src = 'images/global_navigation/nav_health_fitness_off.gif'
		break;
		case 'nav_specials':
			document.nav_specials.src = 'images/global_navigation/nav_specials_off.gif'
		break;
		case 'nav_your_event':
			document.nav_your_event.src = 'images/global_navigation/nav_your_event_off.gif'
		break;
	}
}

function ImageOff(section) {
	switch(section) {
		case 'nav_your_stay':
			document.nav_your_stay.src = 'images/global_navigation/nav_your_stay.gif'
		break;
		case 'nav_dining_entertainment':
			document.nav_dining_entertainment.src = 'images/global_navigation/nav_dining_entertainment.gif'
		break;
		case 'nav_health_fitness':
			document.nav_health_fitness.src = 'images/global_navigation/nav_health_fitness.gif'
		break;
		case 'nav_specials':
			document.nav_specials.src = 'images/global_navigation/nav_specials.gif'
		break;
		case 'nav_your_event':
			document.nav_your_event.src = 'images/global_navigation/nav_your_event.gif'
		break;
	}
}