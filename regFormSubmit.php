<?php session_start(); 
$lastName = check_input($_POST['lastName']);
$firstName=check_input($_POST['firstName']);
$midName=check_input($_POST['midName']);
$sex=check_input($_POST['sex']);
$byear=check_input($_POST['byear']);
$bmonth=check_input($_POST['bmonth']);
$bday=check_input($_POST['bday']);

$address=check_input($_POST['address']);
$city=check_input($_POST['city']);
$state=check_input($_POST['state']);
$zip=check_input($_POST['zip']);
$phone=check_input($_POST['phone']);
$email=check_input($_POST['email']);
$eContact=check_input($_POST['eContact']); 
$ePhone=check_input($_POST['ePhone']); 

$pacemaker=check_input($_POST['pacemaker']); 
$shrapnel=check_input($_POST['shrapnel']); 
$mImplants=check_input($_POST['mImplants']); 
$pregnant=check_input($_POST['pregnant']); 
$headSurgery=check_input($_POST['headSurgery']); 
$clips=check_input($_POST['clips']); 
$anySurgery=check_input($_POST['anySurgery']); 
$catScan=check_input($_POST['catScan']); 
$xray=check_input($_POST['xray']); 

$accident=check_input($_POST['accident']);
$workcomp=check_input($_POST['workcomp']);
$iyear=check_input($_POST['iyear']);
$imonth=check_input($_POST['imonth']);
$iday=check_input($_POST['iday']);

$attEmp=check_input($_POST['attEmp']);
$attphone=check_input($_POST['attphone']);
$addressAtt=check_input($_POST['addressAtt']);
$acity=check_input($_POST['acity']);
$stateatt=check_input($_POST['stateatt']);
$azip=check_input($_POST['azip']);

$physician=check_input($_POST['physician']);
$paddress=check_input($_POST['paddress']);
$pcity=check_input($_POST['pcity']);
$pstate=check_input($_POST['pstate']);
$pzip=check_input($_POST['pzip']);
$pphone=check_input($_POST['pphone']);
$pfax=check_input($_POST['pfax']);


$pinsurance=check_input($_POST['pinsurance']);
$piaddress=check_input($_POST['piaddress']);
$picity=check_input($_POST['picity']);
$insuranceState=check_input($_POST['insuranceState']);
$pizip=check_input($_POST['pizip']);
$pipolicy=check_input($_POST['pipolicy']);
$pigroup=check_input($_POST['pigroup']);
$piholder=check_input($_POST['piholder']);

$myemail="services@webna.us";
$subject="Patient Registration from website";


include_once 'securimage/securimage.php';
$securimage = new Securimage();
if ($securimage->check($_POST['captcha_code']) == false) {
  // the code was incorrect
  // you should handle the error so that the form processor doesn't continue

  // or you can use the following code if there is no validation or you do not know how
  header('Location:errorpage.html');
  echo "The security code entered was incorrect.<br /><br />";
  echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
  exit;
}
/* Let's prepare the message for the e-mail */

$message .="\n";
$message .="\n";
$message = "Hello! New Patient Registration:" ;
$message .="\n";
$message .= "Last name :     ".$lastName;
$message .="\n";
$message .="First name :   " .$firstName;
$message .="\n";
$message .="Middle name :   " .$midName;
$message .="\n";
$message .="Gender :   " .$sex;
$message .="\n";

$message .= "Date of Birth :";
$message .= $bmonth ."-".$bday ."-".$byear;
$message .="\n";

$message .="Address : " .$address;
$message .="\n";
$message .="City : " .$city;
$message .="\n";
$message .="State : " .$state;
$message .="\n";
$message .="Zip : " .$zip;
$message .="\n";
$message .="Phone : " .$phone;
$message .="\n";
$message .="Email : " .$email;
$message .="\n";
$message .= "Emergency Contact : " .$eContact;
$message .="\n";
$message .= "Emergency Phone  : " .$ePhone;
$message .="\n";


$message .= "Personal Information - I have the following ";
$message .="\n";
if($pacemaker)
{
$message .= "Pacemaker";	
$message .="\n";	
}
if($shrapnel)
{
$message .= " Sharpnel";	
$message .="\n";	
}
if($mImplants)
{
$message .= " Metal Implants";	
$message .="\n";	
}
if($pregnant)
{
$message .= " Pregnant";	
$message .="\n";	
}
if($headSurgery)
{
$message .= " Head Surgery";	
$message .="\n";	
}
if($clips)
{
$message .= "Clips";	
$message .="\n";	
}
if($anySurgery)
{
$message .= " Any other Surgery";	
$message .="\n";	
}
if($catScan)
{
$message .= "Cat Scan";	
$message .="\n";	
}
if($xray)
{
$message .= " X-ray";	
$message .="\n";	
}


$message .= "------------------------------------------------------";
$message .="\n";
$message .="Auto Accident  : " .$accident;
$message .="\n";
$message .="WORK COMP :" .$workcomp;
$message .="\n";
$message .= "Injury Date   :";
$message .=$imonth ."-".$iday ."-" .$iyear;
$message .="\n";
$message .= "Attorney/Employer :" .$attEmp;
$message .="\n";
$message .= "Attorney Phone  :" .$attphone;
$message .="\n";
$message .= "Address :".$addressAtt;
$message .="\n";
$message .="City :" .$acity;
$message .="\n";
$message .="State  :  ".$stateatt;
$message .="\n";
$message .="Zip :  ".$azip;
$message .="\n";

$message .= "------------------------------------------------------";
$message .="\n";
$message .= "Referring Physician Information ";
$message .="\n";
$message .= $physician;
$message .="\n";
$message .= "Street  :" .$paddress;
$message .="\n";
$message .= "City  :" .$pcity;
$message .="\n";
$message .= "State  :" .$pstate;
$message .="\n";
$message .= "Zip  :" .$pzip;
$message .="\n";
$message .= "Phone : " .$pphone;
$message .="\n";
$message .= "Fax  :" .$pfax;
$message .="\n";

$message .= "------------------------------------------------------";
$message .="\n";
$message .= "Primary Insurance Information ";
$message .="\n";
$message .= "Insurance : " .$pinsurance;
$message .="\n";
$message .="Address  :" .$piaddress;
$message .="\n";
$message .="City  :" .$picity;
$message .="\n";
$message .="State  :" .$insuranceState;
$message .="\n";
$message .="Zip  :"  .$pizip;
$message .="\n";
$message .="Policy  :" .$pipolicy;
$message .="\n";
$message .="Group   :" .$pigroup;
$message .="\n";
$message .="Policy Holder :" .$piholder;
$message .="\n";



/* Send the message using mail() function */
mail($myemail,$subject,$message);

/* Redirect visitor to the thank you page */
header('Location:thanks.html');
exit();
function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
