<?
function SuccessUnsubscribe($output) {
	$r = array();
	$r['valid'] = true;
	if (strstr($output, 'Invalid Email Address')) {
		$r['valid'] = false;
		$r['error'] = 'You entered an invalid email address';
	}
	return $r;
}
function SuccessSignup($output) {
	$r = array();
	$r['valid'] = true;
	if (strstr($output, 'invalid email address')) {
		$r['valid'] = false;
		$r['error'] = 'You entered an invalid email address';
	}
	if (strstr($output, 'already signed up')) {
		$r['valid'] = false;
		$r['error'] = 'You already signed up for our newsletter';
	}
	return $r;
}
function CheckEmail($email)
{
	return preg_match('/^[!#$%&\'*+\/=?^_`{|}~a-z0-9-]+([.][!#$%&\'*+\/=?^_`{|}~a-z0-9-]+)*@[!#$%&\'*+\/=?^_`{|}~a-z0-9-]+([.][!#$%&\'*+\/=?^_`{|}~a-z0-9-]+)*$/i', $email, $dummy);
}
function HTTP_Post($URL,$data, $referrer="") {

       // parsing the given URL
       $URL_Info=parse_url($URL);

       // Building referrer
       if($referrer=="") // if not given use this script as referrer
         $referrer=$_SERVER["SCRIPT_URI"];

       // making string from $data
       foreach($data as $key=>$value)
         $values[]="$key=".urlencode($value);
       $data_string=implode("&",$values);

       // Find out which port is needed - if not given use standard (=80)
       if(!isset($URL_Info["port"]))
         $URL_Info["port"]=80;

       // building POST-request:
       $request.="POST ".$URL_Info["path"]." HTTP/1.1\n";
       $request.="Host: ".$URL_Info["host"]."\n";
       $request.="Referer: $referer\n";
       $request.="Content-type: application/x-www-form-urlencoded\n";
       $request.="Content-length: ".strlen($data_string)."\n";
       $request.="Connection: close\n";
       $request.="\n";
       $request.=$data_string."\n";

       $fp = fsockopen($URL_Info["host"],$URL_Info["port"]);
       fputs($fp, $request);
       while(!feof($fp)) {
           $result .= fgets($fp, 128);
       }
       fclose($fp);

       return $result;
     }
?>