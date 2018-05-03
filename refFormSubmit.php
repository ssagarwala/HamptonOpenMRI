<?php session_start(); 
$lName = check_input($_POST['lName']);
$fName=check_input($_POST['fName']);
$mName=check_input($_POST['mName']);
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
$planNumber=check_input($_POST['planNumber']);


$physician=check_input($_POST['physician']);
$paddress=check_input($_POST['paddress']);
$pcity=check_input($_POST['pcity']);
$pstate=check_input($_POST['pstate']);
$pzip=check_input($_POST['pzip']);
$pphone=check_input($_POST['pphone']);
$pfax=check_input($_POST['pfax']);
$preport=check_input($_POST['report']);

$diagnosis=check_input($_POST['diagnosis']);
$mriRequest=check_input($_POST['mriRequest']);
$insurance=check_input($_POST['insurance']);

$myemail="services@webna.us";
$subject="Patient Referral from website";


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
$message = "Hello! Patient Referral Form:" ;
$message .="\n";
$message .= "Last name :     ".$lName;
$message .="\n";
$message .="First name :   " .$fName;
$message .="\n";
$message .="Middle name :   " .$mName;
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
$message .="Plan Number: ".$planNumber;

$message .="-----------------------------------\n";



$message .= "Referring Physician Information ";
$message .="\n";
$message .= "Physician Name  : ". $physician;
$message .="\n";
$message .= "Physician Adderss  : " .$paddress;
$message .="\n";
$message .= "City  :" .$pcity;
$message .="\n";
$message .= "State   :" .$pstate;
$message .="\n";
$message .= "Zip   :" .$pzip;
$message .="\n";
$message .= "Phone  :" .$pphone;
$message .="\n";
$message .= "Fax  :" .$pfax;
$message .="\n";

$message .= "Report Required    :" . $preport;

$message .="\n-----------------------------------\n";
$message .= "Diagnosis   :" . $diagnosis;
$message .="\n-----------------------------------\n\n";
$message .="MRI EXAM REQUEST (With CPT/ Diagnosis Code Included )    :" . $mriRequest;
$message .="\n-----------------------------------\n\n";
$message .="Insurance Authoriztion #    :" .$insurance;


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
