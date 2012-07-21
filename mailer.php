<?php

$to = 'skmvasu@gmail.com';
	echo "<div id=\"response\">";


  $name            = $_POST['contname'];
  $email           = $_POST['email'];
  $subject       = $_POST['subject'];
  $message         = $_POST['message'];
  
  if ( ($name=='') || ($email=='') || ($telephone=='') || ($message=='')) { 
  
  		echo "<p>Please fill all the required fields<span>*</span></em></p>";
  	
  }
  else {
  
	 	echo "<p>Submitting ok, server response:</p>";
		echo "<ul>";
		echo "<li>Name: ".$name."</li>";
	 	echo "<li>E-mail: ".$email."</li>";
		echo "<li>Subject: ".$subject."</li>";
		echo "<li>Message:".$message."</li>";
		echo "</ul>";
  }  
  echo "</div>";
 $msg  = "From : $name \r\n";  //add sender's name to the message
$msg .= "e-Mail : $email \r\n";  //add sender's email to the message
$msg .= "Subject : $subject \r\n\n"; //add subject to the message (optional! It will be displayed in the header anyway)
$msg .= "---Message--- \r\n".stripslashes($_POST['message'])."\r\n\n";  //the message itself

mail($to, $subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n");

?>         
            
            
            