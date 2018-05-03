<?php
//create an html file and redirect to it 
 
//set some basic html content 
$sHTML_Header = "<html><head><title>Test an html page</title></head><body>"; 
$sHTML_Content = "<h2><center>This is a Test Page</center><h2><br /><hr />"; 
$sHTML_Footer =  "</body></html>"; 
 
$filename = "test.html"; 
 
// Let's make sure the file exists and is writable first. 
IF (IS_WRITABLE($filename)) { 
 
   // In our example we're opening $filename in append mode. 
   // The file pointer is at the bottom of the file hence 
   // that's where $somecontent will go when we fwrite() it. 
   IF (!$handle = FOPEN($filename, 'w')) { 
         ECHO "Cannot open file ($filename)"; 
         EXIT; 
   } 
 
   // Write $somecontent to our opened file. 
   IF (FWRITE($handle, $sHTML_Header) === FALSE) { 
       ECHO "Cannot write to file ($filename)"; 
       EXIT; 
   }ELSE{ 
      //file is ok so write the other elements to it 
      FWRITE($handle, $sHTML_Content); 
      FWRITE($handle, $sHTML_Footer); 
   } 
 
   FCLOSE($handle); 
 
}ELSE{ 
   ECHO "The file $filename is not writable"; 
} 
 
//redirect the user to the html page 
HEADER("location:$filename"); 
?>