<?
	include('includes/class.phpmailer.php');
	include('includes/common.php');
	
	$valid = false;
	
	if ($_POST) {
		$errors = array();
		if (empty($_POST['firstname'])) $errors[] = 'Please enter your first name';
		if (empty($_POST['lastname'])) $errors[] = 'Please enter your last name';
		if (empty($_POST['address1'])) $errors[] = 'Please enter your address';
		if (empty($_POST['city'])) $errors[] = 'Please enter your city of residence';
		if (empty($_POST['state'])) $errors[] = 'Please select your state';
		if (empty($_POST['zip'])) $errors[] = 'Please enter your zipcode';
		if (empty($_POST['email']) || !CheckEmail($_POST['email'])) $errors[] = 'Please enter a valid email address';
		if (empty($_POST['phone'])) $errors[] = 'Please enter your phone number';
		if (empty($_POST['eventname'])) $errors[] = 'Please enter your event\'s name';
		if (empty($_POST['eventdescription'])) $errors[] = 'Please enter a short description for your event';
		if (empty($_POST['eventtype'])) $errors[] = 'Please select your event\'s type';
		if (empty($_POST['arrivaldate'])) $errors[] = 'Please select your arrival date';
		if (empty($_POST['departuredate'])) $errors[] = 'Please select your departure date';
		if (empty($_POST['guests'])) $errors[] = 'Please enter number of guests';
		if (empty($_POST['contactmeby'])) $errors[] = 'Please select how we can contact you by';
		if (empty($_POST['contactmeon'])) $errors[] = 'Please choose a date when we can contact you';
		
		if (!count($errors)) {
			$message .= "First Name: ".$_POST['firstname']."\n";
			$message .= "Last Name: ".$_POST['lastname']."\n";
			$message .= "Title: ".$_POST['title']."\n";
			$message .= "Company: ".$_POST['company']."\n";
			$message .= "Address 1: ".$_POST['address1']."\n";
			$message .= "Address 2: ".$_POST['address2']."\n";
			$message .= "City: ".$_POST['city']."\n";
			$message .= "State: ".$_POST['state']."\n";
			$message .= "Zip: ".$_POST['zip']."\n";
			$message .= "Email: ".$_POST['email']."\n";
			$message .= "Phone: ".$_POST['phone']."\n";
			$message .= "Fax: ".$_POST['fax']."\n\n";
			$message .= "Event Name: ".$_POST['eventname']."\n";
			$message .= "Event Description: ".$_POST['eventdescription']."\n";
			$message .= "Event Type: ".$_POST['eventtype']."\n";
			$message .= "Arrival Date: ".$_POST['arrivaldate']."\n";
			$message .= "Departure Date: ".$_POST['departuredate']."\n";
			$message .= "Alternate Event Date: ".$_POST['alteventdate']."\n";
			$message .= "Alternate Departure Date: ".$_POST['altdeparturedate']."\n";
			$message .= "No. of Guests: ".$_POST['guests']."\n";
			$message .= "No. of Rooms: ".$_POST['rooms']."\n";
			$message .= "Contact me by: ".$_POST['contactmeby']."\n";
			$message .= "Contact me on: ".$_POST['contactmeon']."\n";
			$message .= "Comments: ".$_POST['comments']."\n\n";
			$message .= "Sent: ".date('l dS \of F Y h:i:s A')."\n";

			$from = $_POST['email'];
			$fromName = $_POST['firstname']." ".$_POST['lastname'];
			$replyTo = $_POST['email'];
			$subject = 'Request Proposal';
			$to = 'proposals@hiltonwoodbridge.com';

			$mail = new phpmailer();
			$mail->IsMail();
			$mail->From        = $from;
			$mail->FromName    = $fromName;
			$mail->AddReplyTo($replyTo);
			$mail->Encoding = 'quoted-printable';
			$mail->IsHTML(false);
			$mail->Subject     = $subject;
			$mail->Body = $message;
			$mail->AddAddress($to);
			$mail->Send();
			$mail->ClearAllRecipients();
			
			$valid = true;
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/forms.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Hilton Woodbridge - <?= ($valid) ? 'Proposal Received' : 'Request Proposal';?></title>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="Generator" content="">
<meta name="Description" content="">
<meta name="Keywords" content="">
<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" /><script language="JavaScript" type="text/javascript" src="js/javascript.js"></script>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">@import url(js/calendar/calendar-win2k-1.css);</style>
<script type="text/javascript" src="js/calendar/calendar.js"></script>
<script type="text/javascript" src="js/calendar/calendar-en.js"></script>
<script type="text/javascript" src="js/calendar/calendar-setup.js"></script>
<!-- InstanceEndEditable -->
</head>

<body>
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="24" valign="top">&nbsp;</td>
    <td><table width="892" border="0" cellpadding="0" cellspacing="0" class="main">
      <tr valign="top">
        <td width="20">&nbsp;</td>
        <td colspan="3"><table width="852" height="110" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="140" rowspan="4"><a href="index.php"><img src="images/global_navigation/logo.jpg" alt="Hilton Woodbridge" width="140" height="110" border="0"></a></td>
              <td height="25" align="right"><a href="https://secure.hilton.com/en/hi/res/choose_dates.jhtml;jsessionid=VV43GQQTFV1I4CSGBIV222QKIYFC5UUC?ctyhocn=WDBWHHF" target="_blank"><img src="images/global_navigation/book_your_room.jpg" alt="Book Your Room" width="104" height="25" border="0"></a><a href="request-proposal.php"><img src="images/global_navigation/request_proposal.jpg" alt="Request a Proposal" width="111" height="25" border="0"></a><a href="directions.php"><img src="images/global_navigation/get_directions.jpg" alt="Get Directions" width="86" height="25" border="0"></a><a href="contact.php"><img src="images/global_navigation/contact_us.jpg" alt="Contact Us" width="75" height="25" border="0"></a></td>
            </tr>
            <tr>
              <td height="41">&nbsp;</td>
            </tr>
  <td height="20" valign="top" class="global_nav_dotted_bg"><a href="your-stay.php" onmouseover="ImageOn('nav_your_stay');" onmouseout="ImageOff('nav_your_stay');"><img name="nav_your_stay" src="images/global_navigation/nav_your_stay.gif" alt="Reservations, Rooms & Suites, Amenities, Local Attractions, Directions" width="66" height="16" border="0"></a><a href="your-event.php" onmouseover="ImageOn('nav_your_event');" onmouseout="ImageOff('nav_your_event');"><img name="nav_your_event" src="images/global_navigation/nav_your_event.gif" alt="Weddings, Private Events, Business Events" width="83" height="16" border="0"></a><a href="dining-entertainment.php" onmouseover="ImageOn('nav_dining_entertainment');" onmouseout="ImageOff('nav_dining_entertainment');"><img name="nav_dining_entertainment" src="images/global_navigation/nav_dining_entertainment.gif" alt="Bogat's Lounge, La Cafe Metro, Romulus, Spats Teak House, Hotel Room Service, Hotel Brunches, Holiday Parties" width="160" height="16" border="0"></a><a href="health-fitness.php" onmouseover="ImageOn('nav_health_fitness');" onmouseout="ImageOff('nav_health_fitness');"><img name="nav_health_fitness" src="images/global_navigation/nav_health_fitness.gif" alt="Facilities, Spa & Massage Therapy, Personal Training, Club Membership" width="119" height="16" border="0"></a><a href="specials.php" onmouseover="ImageOn('nav_specials');" onmouseout="ImageOff('nav_specials');"><img name="nav_specials" src="images/global_navigation/nav_specials.gif" alt="Special Packages, Special Promotions, Special Events" width="67" height="16" border="0"></a></td>
            </tr>
            <tr>
              <td height="24" valign="top" class="l2nav">&nbsp;</td>
            </tr>
        </table></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr valign="top">
        <td width="20">&nbsp;</td>
        <td width="625"><!-- InstanceBeginEditable name="MAINCOPY" -->
          <table width="625" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="3"><img src="images/main-images/request-proposal.jpg" alt="Request a proposal" width="625" height="160"></td>
            </tr>
            <tr>
              <td height="20" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">
			<?
				if ($valid) {
			?>
					<div class="copy">Thank you for contacting us about your event. One of our representatives will be in touch with you shortly. If you would like to follow up yourself, feel free to contact us at (732) 494-4964.</div>
			<?
				}
				else {
			?><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top">
					<p class="copy">If you would like additional information for planning your function, please complete and submit the form below and a Hilton Woodbridge Representative will contact you shortly.
						<?
							if ($_POST) {
								echo '<br/><br/><b>Form not submitted</b> ';
								foreach($errors as $error) {
									echo '<br/><span class="error">'.$error.'</span>';
								}
							}
						  ?>
</p>
					<table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2"><img src="images/request-proposal/head.jpg" width="625" height="53"></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="requestproposal_bg">
                          <form action="request-proposal.php" name="proposal" method="post">
                            <table width="625" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td>&nbsp;</td>
                                <td width="272" valign="top"><table border="0" cellpadding="3" cellspacing="0">
                                    <tr>
                                      <td><strong class="form_text">First Name: </strong></td>
                                      <td><input name="firstname" type="text" id="firstname" style="width: 155px;" value="<?=$_POST['firstname'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td><strong class="form_text">Last Name: </strong></td>
                                      <td><input name="lastname" type="text" id="lastname" style="width: 155px;" value="<?=$_POST['lastname'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text">Title:</td>
                                      <td><input name="title" type="text" id="title" style="width: 155px;" value="<?=$_POST['title'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text">Company:</td>
                                      <td><input name="company" type="text" id="company" style="width: 155px;" value="<?=$_POST['company'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>Address 1: </strong></td>
                                      <td><input name="address1" type="text" id="address1" style="width: 155px;" value="<?=$_POST['address1'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text">Address 2: </td>
                                      <td><input name="address2" type="text" id="address2" style="width: 155px;" value="<?=$_POST['address2'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>City:</strong></td>
                                      <td><input name="city" type="text" id="city" style="width: 155px;" value="<?=$_POST['city'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>State:</strong></td>
                                      <td>
                                        <select name="state">
                                          <option value="">--</option>
                                          <option <?=($_POST['state'] == 'AK') ? 'SELECTED' : '';?> value="AK">AK</option>
                                          <option <?=($_POST['state'] == 'AL') ? 'SELECTED' : '';?> value="AL">AL</option>
                                          <option <?=($_POST['state'] == 'AR') ? 'SELECTED' : '';?> value="AR">AR</option>
                                          <option <?=($_POST['state'] == 'AZ') ? 'SELECTED' : '';?> value="AZ">AZ</option>
                                          <option <?=($_POST['state'] == 'CA') ? 'SELECTED' : '';?> value="CA">CA</option>
                                          <option <?=($_POST['state'] == 'CO') ? 'SELECTED' : '';?> value="CO">CO</option>
                                          <option <?=($_POST['state'] == 'CT') ? 'SELECTED' : '';?> value="CT">CT</option>
                                          <option <?=($_POST['state'] == 'DC') ? 'SELECTED' : '';?> value="DC">DC</option>
                                          <option <?=($_POST['state'] == 'DE') ? 'SELECTED' : '';?> value="DE">DE</option>
                                          <option <?=($_POST['state'] == 'FL') ? 'SELECTED' : '';?> value="FL">FL</option>
                                          <option <?=($_POST['state'] == 'GA') ? 'SELECTED' : '';?> value="GA">GA</option>
                                          <option <?=($_POST['state'] == 'HI') ? 'SELECTED' : '';?> value="HI">HI</option>
                                          <option <?=($_POST['state'] == 'IA') ? 'SELECTED' : '';?> value="IA">IA</option>
                                          <option <?=($_POST['state'] == 'ID') ? 'SELECTED' : '';?> value="ID">ID</option>
                                          <option <?=($_POST['state'] == 'IL') ? 'SELECTED' : '';?> value="IL">IL</option>
                                          <option <?=($_POST['state'] == 'IN') ? 'SELECTED' : '';?> value="IN">IN</option>
                                          <option <?=($_POST['state'] == 'KS') ? 'SELECTED' : '';?> value="KS">KS</option>
                                          <option <?=($_POST['state'] == 'KY') ? 'SELECTED' : '';?> value="KY">KY</option>
                                          <option <?=($_POST['state'] == 'LA') ? 'SELECTED' : '';?> value="LA">LA</option>
                                          <option <?=($_POST['state'] == 'MA') ? 'SELECTED' : '';?> value="MA">MA</option>
                                          <option <?=($_POST['state'] == 'MD') ? 'SELECTED' : '';?> value="MD">MD</option>
                                          <option <?=($_POST['state'] == 'ME') ? 'SELECTED' : '';?> value="ME">ME</option>
                                          <option <?=($_POST['state'] == 'MI') ? 'SELECTED' : '';?> value="MI">MI</option>
                                          <option <?=($_POST['state'] == 'MN') ? 'SELECTED' : '';?> value="MN">MN</option>
                                          <option <?=($_POST['state'] == 'MO') ? 'SELECTED' : '';?> value="MO">MO</option>
                                          <option <?=($_POST['state'] == 'MS') ? 'SELECTED' : '';?> value="MS">MS</option>
                                          <option <?=($_POST['state'] == 'MT') ? 'SELECTED' : '';?> value="MT">MT</option>
                                          <option <?=($_POST['state'] == 'NC') ? 'SELECTED' : '';?> value="NC">NC</option>
                                          <option <?=($_POST['state'] == 'ND') ? 'SELECTED' : '';?> value="ND">ND</option>
                                          <option <?=($_POST['state'] == 'NE') ? 'SELECTED' : '';?> value="NE">NE</option>
                                          <option <?=($_POST['state'] == 'NH') ? 'SELECTED' : '';?> value="NH">NH</option>
                                          <option <?=($_POST['state'] == 'NJ') ? 'SELECTED' : '';?> value="NJ">NJ</option>
                                          <option <?=($_POST['state'] == 'NM') ? 'SELECTED' : '';?> value="NM">NM</option>
                                          <option <?=($_POST['state'] == 'NV') ? 'SELECTED' : '';?> value="NV">NV</option>
                                          <option <?=($_POST['state'] == 'NY') ? 'SELECTED' : '';?> value="NY">NY</option>
                                          <option <?=($_POST['state'] == 'OH') ? 'SELECTED' : '';?> value="OH">OH</option>
                                          <option <?=($_POST['state'] == 'OK') ? 'SELECTED' : '';?> value="OK">OK</option>
                                          <option <?=($_POST['state'] == 'OR') ? 'SELECTED' : '';?> value="OR">OR</option>
                                          <option <?=($_POST['state'] == 'PA') ? 'SELECTED' : '';?> value="PA">PA</option>
                                          <option <?=($_POST['state'] == 'PR') ? 'SELECTED' : '';?> value="PR">PR</option>
                                          <option <?=($_POST['state'] == 'RI') ? 'SELECTED' : '';?> value="RI">RI</option>
                                          <option <?=($_POST['state'] == 'SC') ? 'SELECTED' : '';?> value="SC">SC</option>
                                          <option <?=($_POST['state'] == 'SD') ? 'SELECTED' : '';?> value="SD">SD</option>
                                          <option <?=($_POST['state'] == 'TN') ? 'SELECTED' : '';?> value="TN">TN</option>
                                          <option <?=($_POST['state'] == 'TX') ? 'SELECTED' : '';?> value="TX">TX</option>
                                          <option <?=($_POST['state'] == 'UT') ? 'SELECTED' : '';?> value="UT">UT</option>
                                          <option <?=($_POST['state'] == 'VA') ? 'SELECTED' : '';?> value="VA">VA</option>
                                          <option <?=($_POST['state'] == 'VT') ? 'SELECTED' : '';?> value="VT">VT</option>
                                          <option <?=($_POST['state'] == 'WA') ? 'SELECTED' : '';?> value="WA">WA</option>
                                          <option <?=($_POST['state'] == 'WI') ? 'SELECTED' : '';?> value="WI">WI</option>
                                          <option <?=($_POST['state'] == 'WV') ? 'SELECTED' : '';?> value="WV">WV</option>
                                          <option <?=($_POST['state'] == 'WY') ? 'SELECTED' : '';?> value="WY">WY</option>
                                        </select>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>Zip:</strong></td>
                                      <td><input name="zip" type="text" id="zip" style="width: 155px;" value="<?=$_POST['zip'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>Email:</strong></td>
                                      <td><input name="email" type="text" id="email" style="width: 155px;" value="<?=$_POST['email'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>Phone:</strong></td>
                                      <td><input name="phone" type="text" id="phone" style="width: 155px;" value="<?=$_POST['phone'];?>"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text">Fax:</td>
                                      <td><input name="fax" type="text" id="fax" style="width: 155px;" value="<?=$_POST['fax'];?>"></td>
                                    </tr>
                                </table></td>
                                <td width="316" valign="top"><table border="0" cellpadding="3" cellspacing="0">
                                    <tr>
                                      <td width="107"><strong class="form_text">Event Name: </strong></td>
                                      <td width="155"><input name="eventname" type="text" id="eventname" style="width: 155px;" value="<?=$_POST['eventname'];?>"></td>
                                      <td width="36">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td valign="top"><strong class="form_text">Event Description: </strong></td>
                                      <td><textarea name="eventdescription" id="eventdescription" style="height: 44px; width: 155px;"><?=$_POST['eventdescription'];?></textarea></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>Event Type: </strong></td>
                                      <td>
                                        <select name="eventtype" id="eventtype" style="width: 155px;">
                                          <option value="">Select</option>
                                          <optgroup label="Wedding">
                                          <option value="Cocktail & Reception" <?=($_POST['eventtype'] == 'Cocktail & Reception') ? 'SELECTED' : '';?>>Cocktail & Reception</option>
                                          <option value="Reception" <?=($_POST['eventtype'] == 'Reception') ? 'SELECTED' : '';?>>Reception</option>
                                          <option value="Rehearsal Dinner" <?=($_POST['eventtype'] == 'Rehearsal Dinner') ? 'SELECTED' : '';?>>Rehearsal Dinner</option>
                                          </optgroup>
                                          <optgroup label="Private Event">
                                          <option value="Anniversaries" <?=($_POST['eventtype'] == 'Anniversaries') ? 'SELECTED' : '';?>>Anniversaries</option>
                                          <option value="Bar/Bat Mitzvahs" <?=($_POST['eventtype'] == 'Bar/Bat Mitzvahs') ? 'SELECTED' : '';?>>Bar/Bat Mitzvahs</option>
                                          <option value="Birthdays" <?=($_POST['eventtype'] == 'Birthdays') ? 'SELECTED' : '';?>>Birthdays</option>
                                          <option value="Christenings" <?=($_POST['eventtype'] == 'Christenings') ? 'SELECTED' : '';?>>Christenings</option>
                                          <option value="Graduations" <?=($_POST['eventtype'] == 'Graduations') ? 'SELECTED' : '';?>>Graduations</option>
                                          <option value="Reunions" <?=($_POST['eventtype'] == 'Reunions') ? 'SELECTED' : '';?>>Reunions</option>
                                          <option value="Showers" <?=($_POST['eventtype'] == 'Showers') ? 'SELECTED' : '';?>>Showers</option>
                                          <option value="Sweet Sixteens" <?=($_POST['eventtype'] == 'Sweet Sixteens') ? 'SELECTED' : '';?>>Sweet Sixteens</option>
                                          </optgroup>
                                          <optgroup label="Business Events">
                                          <option value="Conference" <?=($_POST['eventtype'] == 'Conference') ? 'SELECTED' : '';?>>Conference</option>
                                          <option value="Meeting" <?=($_POST['eventtype'] == 'Meeting') ? 'SELECTED' : '';?>>Meeting</option>
                                          <option value="Seminar" <?=($_POST['eventtype'] == 'Seminar') ? 'SELECTED' : '';?>>Seminar</option>
                                          </optgroup>
                                          <option value="Other (See Comments)" <?=($_POST['eventtype'] == 'Other (See Comments)') ? 'SELECTED' : '';?>>Other (See Comments)</option>
                                      </select></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>Arrival Date: </strong></td>
                                      <td><input name="arrivaldate" type="text" id="arrivaldate" style="width: 155px;" value="<?=$_POST['arrivaldate'];?>"></td>
                                      <td><img id="triggerarival" src="images/request-proposal/calendar.jpg" width="14" height="14"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>Departure Date: </strong></td>
                                      <td><input name="departuredate" type="text" id="departuredate" style="width: 155px;" value="<?=$_POST['departuredate'];?>"></td>
                                      <td><img id="triggerdeparture" src="images/request-proposal/calendar.jpg" width="14" height="14"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text">Alt. Event Date: </td>
                                      <td><input name="alteventdate" type="text" id="alteventdate" style="width: 155px;" value="<?=$_POST['alteventdate'];?>"></td>
                                      <td><img id="triggeraltevent" src="images/request-proposal/calendar.jpg" width="14" height="14"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text">Alt. Departure Date: </td>
                                      <td><input name="altdeparturedate" type="text" id="altdeparturedate" style="width: 155px;" value="<?=$_POST['altdeparturedate'];?>"></td>
                                      <td><img id="triggeraltdeparture" src="images/request-proposal/calendar.jpg" width="14" height="14"></td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>No. of Guests: </strong></td>
                                      <td><input name="guests" type="text" id="guests" style="width: 155px;" value="<?=$_POST['guests'];?>"></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="form_text">No. of Rooms Blocked: </td>
                                      <td><input name="rooms" type="text" id="rooms" style="width: 155px;" value="<?=$_POST['rooms'];?>"></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>Contact me by: </strong></td>
                                      <td><select name="contactmeby" id="contactmeby">
                                          <option value="">--</option>
                                          <option value="Phone" <?=($_POST['contactmeby'] == 'Phone') ? 'SELECTED' : '';?>>Phone</option>
                                          <option value="Email" <?=($_POST['contactmeby'] == 'Email') ? 'SELECTED' : '';?>>Email</option>
                                      </select></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="form_text"><strong>Contact me on: </strong></td>
                                      <td><input name="contactmeon" type="text" id="contactmeon" style="width: 155px;" value="<?=$_POST['contactmeon'];?>"></td>
                                      <td><img id="triggercontactmeon" src="images/request-proposal/calendar.jpg" width="14" height="14"></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td colspan="2"><table border="0" cellspacing="0" cellpadding="3">
                                    <tr>
                                      <td width="63" valign="top" class="form_text">Comments:</td>
                                      <td width="497"><textarea name="comments" id="comments" style="height: 50px; width: 470px;"><?=$_POST['comments'];?></textarea></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td colspan="2"><img src="images/email-newsletter/line.jpg" width="562" height="1"></td>
                              </tr>
                              <tr>
                                <td width="37">&nbsp;</td>
                                <td colspan="2"><table width="563" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="190"><strong class="form_text">Bold = Required </strong></td>
                                      <td width="266" align="right" class="emailnewsletter_link"><a href="javascript:onClick=ClearProposal();">Clear Form</a></td>
                                      <td width="8" align="right" class="emailnewsletter_link"></td>
                                      <td width="99" align="right"><input name="image" type="image" src="images/buttons/save-request.jpg"></td>
                                    </tr>
                                </table></td>
                              </tr>
                            </table>
                          </form>
                          <script type="text/javascript">
					  Calendar.setup(
						{
						  inputField  : "arrivaldate",  // ID of the input field
						  ifFormat    : "%B %e, %Y",    // the date format
						  button      : "triggerarival"       // ID of the button
						}
					  );
					  Calendar.setup(
						{
						  inputField  : "departuredate",  // ID of the input field
						  ifFormat    : "%B %e, %Y",    // the date format
						  button      : "triggerdeparture"       // ID of the button
						}
					  );					  
					  Calendar.setup(
						{
						  inputField  : "alteventdate",  // ID of the input field
						  ifFormat    : "%B %e, %Y",    // the date format
						  button      : "triggeraltevent"       // ID of the button
						}
					  );					  
					  Calendar.setup(
						{
						  inputField  : "altdeparturedate",  // ID of the input field
						  ifFormat    : "%B %e, %Y",    // the date format
						  button      : "triggeraltdeparture"       // ID of the button
						}
					  );					  
					  Calendar.setup(
						{
						  inputField  : "contactmeon",  // ID of the input field
						  ifFormat    : "%B %e, %Y",    // the date format
						  button      : "triggercontactmeon"       // ID of the button
						}
					  );					  
					</script>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" valign="top"><img src="images/request-proposal/foot.jpg" width="625" height="14"></td>
                      </tr>
                    </table>
					<p class="copy">&nbsp;					</p></td>
                </tr>
              </table>
			  <?	} ?>
			  </td>
              </tr>
          </table>
        <!-- InstanceEndEditable --></td>
        <td width="10">&nbsp;</td>
        <td width="217" align="left"><!-- InstanceBeginEditable name="SIDEBAR" -->
          <table width="217" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td> <img src="images/landing/book-your-stay.jpg" alt="Book Your Stay.  To find out more about availability and rates call us at 732 494 6200 or book online." width="217" height="38"></td>
            </tr>
            <tr>
              <td valign="top" class="news_content">To find out more about availability and rates call us at (732) 494-6200 or <a href="https://secure.hilton.com/en/hi/res/choose_dates.jhtml;jsessionid=VV43GQQTFV1I4CSGBIV222QKIYFC5UUC?ctyhocn=WDBWHHF" target="_blank">book online</a>. </td>
            </tr>
            <tr>
              <td><img src="images/news/foot.jpg" width="217" height="7"></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td width="20">&nbsp;</td>
        <td height="30" colspan="3">&nbsp;</td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" class="footer"><!-- #BeginLibraryItem "/Library/global-footer.lbi" --><a href="about.php">About Hilton</a> | <!--a href="#LINK">Careers</a> | <a href="#LINK">News Room</a> | --><a href="email-newsletter.php">Email Newsletter</a> | <a href="sitemap.php">Site Map</a> | <a href="contact.php">Contact</a> | <a href="site-feedback.php">Site Feedback</a><br>
<a href="http://www.facebook.com/pages/Hilton-Woodbridge-Hotel-Conference-Center/129873413731858">Facebook</a> | <a href="http://twitter.com/hiltonwoodbridg">Twitter</a><br>
© 2010 Hilton Woodbridge. All rights reserved. <a href="privacy-policy.php">Privacy Policy</a><!-- #EndLibraryItem --></td>
        <td colspan="3" align="right" class="footer"><div class="footer_contact">Hilton Woodbridge<br>
120 Wood Ave. South, Iselin, NJ 08830<br>
Tel: 732.494.6200 &nbsp;&nbsp;&nbsp;Fax: 732.603.7777</div></td>
        </tr>
    </table></td>
    <td width="24">&nbsp;</td>
  </tr>
</table>
<? include("includes/stats.php") ?>
</body>
<!-- InstanceEnd --></html>
