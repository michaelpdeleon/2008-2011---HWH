<?
	include('includes/class.phpmailer.php');
	include('includes/common.php');

	function sanitize_paranoid_string($string, $min='', $max='') {
		$string = preg_replace("/[^a-zA-Z0-9\s\-\.\!\?]/", "", $string);
		return $string;
	}

	$valid = false;
	
	if ($_POST) {
		$errors = array();
		if (empty($_POST['email']) || !CheckEmail($_POST['email']))	$errors[] = 'Please enter a valid email address';
		if (empty($_POST['name']))		$errors[] = 'Please enter your name';
		if (empty($_POST['comments']))	$errors[] = 'Please enter your comments';
		if (count($errors)) {
			$valid = false;
		}
		else {
			$message = "Site Feedback\n\n";
			$message .= "From: ".sanitize_paranoid_string($_POST['name'])."\n\n";
			$message .= "Email: ".$_POST['email']."\n\n";
			$message .= "Phone: ".sanitize_paranoid_string($_POST['phone'])."\n\n";
			$message .= "Rating: ".$_POST['rating']."\n\n";
			$message .= "Comment: ".sanitize_paranoid_string($_POST['comments'])."\n\n";
			$message .= "Sent: ".date('l dS \of F Y h:i:s A')."\n\n";
			
			$from = $_POST['email'];
			$fromName = $_POST['name'];
			$replyTo = $_POST['email'];
			$subject = 'Site Feedback';
			$to = 'feedback@hiltonwoodbridge.com';
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
<title>Site Feedback</title>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="Generator" content="">
<meta name="Description" content="">
<meta name="Keywords" content="">
<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" /><script language="JavaScript" type="text/javascript" src="js/javascript.js"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
              <td colspan="3"><img src="images/main-images/site-feedback.jpg" alt="Site feedback" width="625" height="160"></td>
            </tr>
            <tr>
              <td height="20" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="381" valign="top">
					<?
					if ($valid) {
					?>						<div class="copy"><strong>We received your feedback. <br/>						
					</strong><br/>
						Thank you for sharing your thoughts with us. We will be reviewing them shortly.<br/>						
						<br/>
						Hilton Woodbridge</div>
					<?
					}
					else {
					?>
                    <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="52%" class="copy"><strong>Make the most of the Hilton Woodbridge.<br>
                          </strong>Sign up for our email newsletter today and take advantage of upcoming events and promotions. Submit your information and we'll keep you posted on what's happening at the Hilton Woodbridge.
						  <p>
						  <?
							if ($_POST) {
								echo '<b>Form not submitted</b> ';
								foreach($errors as $error) {
									echo '<br/><span class="error">'.$error.'</span>';
								}
							}
						  ?>
						  </p>
						  </td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td class="emailnewsletter_lpad"><table width="313" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td colspan="2"><img src="images/site-feedback/head.jpg" width="372" height="20"></td>
                        </tr>
                        <tr>
                          <td colspan="2" class="sitefeedback_bg">
						<form action="site-feedback.php" method="post" name="feedback">
						<table width="372" border="0" cellpadding="3" cellspacing="0">
                            <tr>
                              <td width="21">&nbsp;</td>
                              <td width="91"><strong class="form_text"> Name: </strong></td>
                              <td width="242"><input name="name" type="text" id="name" style="width: 155px;" value="<?=sanitize_paranoid_string($_POST['name']);?>"></td>
                            </tr>
                            <tr>
                              <td width="21">&nbsp;</td>
                              <td><strong class="form_text">Email:</strong></td>

                              <td><input name="email" type="text" id="email" style="width: 155px;" value="<?=$_POST['email'];?>"></td>
                            </tr>
                            <tr>
                              <td width="21">&nbsp;</td>
                              <td class="form_text">Phone:</td>
                              <td><input name="phone" type="text" id="phone" style="width: 155px;" value="<?=sanitize_paranoid_string($_POST['phone']);?>"></td>
                            </tr>
                            <tr>
                              <td width="21"></td>
                              <td height="8" colspan="2"></td>
                              </tr>
                            <tr>
                              <td width="21">&nbsp;</td>
                              <td colspan="2" class="form_text">How would you rate our site? </td>
                            </tr>
                            <tr>
                              <td width="21">&nbsp;</td>
                              <td colspan="2" class="form_text"><input name="rating" type="radio" value="Excellent" checked>
                                Excellent<img src="images/spacer.gif" width="20" height="8">
                                  
                                  <input name="rating" type="radio" value="Good"> 
                                  Good<img src="images/spacer.gif" width="20" height="8">
                                  <input name="rating" type="radio" value="Fair">
                                  Fair</td>
                              </tr>
                            <tr>
                              <td width="21">&nbsp;</td>
                              <td valign="top" class="form_text"><strong>Comments</strong></td>
                              <td valign="bottom"><textarea name="comments" id="comments" style="height: 50px; width: 215px;"><?=sanitize_paranoid_string($_POST['comments']);?></textarea></td>
                            </tr>
                            <tr>
                              <td width="21">&nbsp;</td>
                              <td colspan="2" valign="bottom"><img src="images/email-newsletter/line.jpg" width="310" height="1"></td>
                            </tr>
                            <tr>
                              <td width="21">&nbsp;</td>
                              <td colspan="2"><table width="315" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="128"><strong class="form_text">Bold = Required </strong></td>
                                    <td width="69" align="right" class="emailnewsletter_link"><a href="javascript:onClick=ClearFeedback();">Clear Form</a></td>
                                    <td width="8" align="right" class="emailnewsletter_link"></td>
                                    <td width="112" align="right">
									<input type="image" src="images/buttons/send-feedback.jpg">
									</td>
                                  </tr>
                              </table></td>
                            </tr>
                          </table>
						</form>
						</td>
                        </tr>
                        <tr>
                          <td colspan="2"><img src="images/site-feedback/foot.jpg" width="372" height="14"></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
				  <?	}
					?>	
				  </td>
                  <td width="15" valign="top">&nbsp;</td>
                  <td width="227" valign="top">                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="images/site-feedback/need-help.jpg" width="227" height="28"></td>
                        </tr>
                        <tr>
                          <td class="sidebar_text"><a href="sitemap.php">&raquo; Site Map</a></td>
                        </tr>
                                        </table></td>
                </tr>
              </table></td>
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
              <td valign="top" class="news_content">To find out more about availability and rates call us at (732) 494-6200 or book online. </td>
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
