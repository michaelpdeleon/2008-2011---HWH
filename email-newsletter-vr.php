<?
	include('includes/common.php');
	$valid = false;	
	$unsubscribed = false;
	
	if ($_POST['newsletter_submitted']) {
		$errors = array();
		if (empty($_POST['first_name'])) $errors[] = 'Please enter your first name';
		if (empty($_POST['email_address'])) $errors[] = 'Please enter your email address';
		if (empty($_POST['postalcode'])) $errors[] = 'Please enter your zip code';
		if (!count($errors)) {
			$output = HTTP_Post("http://oi.vresp.com/",$_POST);
			//echo $output;
			$success = SuccessSignup($output);
			if ($success['valid']) {
				$valid = true;
			}
			else {
				$errors[] = $success['error'];
			}
		}
		else {
			$valid = false;
		}
	}
	if ($_POST['unsubscribe_submitted']) {
		$errors = '';
		if (empty($_POST['email_address'])) $errors = 'Please enter your email address';
		if (empty($errors)) {
			$output = HTTP_Post("http://optout.verticalresponse.com/do_opt_out.html",$_POST);
			$success = SuccessUnsubscribe($output);
			//echo $output;
			if ($success['valid']) {
				$unsubscribed = true;
				unset($_POST);
			}
			else {
				$errors = $success['error'];
			}
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/forms.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Email Newsletter</title>
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
              <td colspan="3"><img src="images/main-images/email-newsletter.jpg" alt="Email newsletter" width="625" height="160"></td>
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
				?>	<span class="copy">Thank you for signing up for our email newsletter.</span><?	
					}
					else { ?>
				  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="52%" class="copy"><strong>Make the most of the Hilton Woodbridge.<br>
                          </strong>Sign up for our email newsletter today and take advantage of upcoming events and promotions. Submit your information and we'll keep you posted on what's happening at the Hilton Woodbridge.
							<?
							if ($_POST['newsletter_submitted']) {
								echo '<br/><br/><b>Form not submitted</b> ';
								foreach($errors as $error) {
									echo '<br/><span class="error">'.$error.'</span>';
								}
							}
						  ?>
						  </td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td class="emailnewsletter_lpad">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="emailnewsletter_lpad">
						<form action="email-newsletter.php" method="post" name="newsletter">
						<input type=hidden name=fid value="2a88877636">
						<input type=hidden name=form_submitted value=1>
						<input type=hidden value=1 name=optin>
						<input type="hidden" name="newsletter_submitted" value="1">
                        <table width="313" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td colspan="2"><img src="images/email-newsletter/head.jpg" width="313" height="20"></td>
                        </tr>
                        <tr>
                          <td colspan="2" class="emailnewsletter_bg"><table width="313" border="0" cellpadding="3" cellspacing="0">
                              <tr>
                                <td width="30">&nbsp;</td>
                                <td width="72"><strong class="form_text">First Name: </strong></td>
                                <td width="211"><input name="first_name" type="text" id="first_name" style="width: 155px;" value="<?=$_POST['first_name'];?>"></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><strong class="form_text">Email:</strong></td>
                                <td><input name="email_address" type="text" id="email_address" style="width: 155px;" value="<?if ($_POST['newsletter_submitted']) echo $_POST['email_address'];?>"></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><strong class="form_text">Zip Code:</strong></td>
                                <td><input name="postalcode" type="text" id="postalcode" style="width: 70px;" value="<?=$_POST['postalcode'];?>"></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td colspan="2" valign="bottom"><img src="images/email-newsletter/line.jpg" width="260" height="1"></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td colspan="2"><table width="260" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="96"><strong class="form_text">Bold = Required </strong></td>
                                      <td width="76" align="right" class="emailnewsletter_link"><a href="javascript:onClick=ClearNewsletter();">Clear Form</a> </td>
                                      <td width="10" align="right" class="emailnewsletter_link"></td>
                                      <td width="83" align="right"><input type=image border=0 src="images/buttons/subscribe.jpg" name="form_submitted" value="submit"></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="2"><img src="images/email-newsletter/foot.jpg" width="313" height="14"></td>
                        </tr>
                      </table>
                      </form></td>
                    </tr>
                  </table>
				  <? } ?>
				  </td>
                  <td width="15" valign="top">&nbsp;</td>
                  <td width="227" valign="top">
				  <form action="email-newsletter.php" method="post" name="unsubscribe">
				  <input type=hidden name=uid value="67509d6e74">
				  <input type="hidden" name="unsubscribe_submitted" value="1">
				  <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="images/email-newsletter/easy-to-unsubscribe.jpg" alt="It's easy to unsubscribe." width="227" height="28"></td>
                        </tr>
                        <tr>
                          <td class="sidebar_text">
						  <?
							if ($unsubscribed) {
							?><div class="error">You have unsubscribed from the newsletter</div><?
							}
							else if ($errors) {
							?>
								<div class="error"><?=$errors;?></div>
							<?
							}
						  ?>
							Just enter your email adress in the field below and click the unsubscribe button and you'll be take off our list. 
							</td>
                        </tr>
                        <tr>
                          <td class="sidebar_text" height="8px"></td>
                        </tr>
                        <tr>
                          <td class="sidebar_text"><input name="email_address" type="text" style="width: 155px;" value="<?if ($_POST['unsubscribe_submitted']) echo $_POST['email_address'];?>">
                            </td>
                        </tr>
                        <tr>
                          <td class="sidebar_text" height="8"></td>
                        </tr>
                        <tr>
                          <td class="sidebar_text"><input type=image border=0 src="images/buttons/unsubscribe.jpg" name="form_submitted" value="Unsubscribe"></td>
                        </tr>
						</table>
					</form>
					</td>
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
