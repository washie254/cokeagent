<?php 
    if (isset($_POST['smail'])){	
            $ToEmail = 'washiemugo@gmail.com'; 
            $EmailSubject = 'From Mintari Contact Form'; 
            $mailheader = "From: ".$_POST["email"]."\r\n"; 
            $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
            $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            $MESSAGE_BODY = "Name: ".$_POST["name"]."<br>"; 
            $MESSAGE_BODY = "Subject: ".$_POST["subject"]."<br>"; 
            $MESSAGE_BODY .= "Email: ".$_POST["email"]."<br>"; 
            $MESSAGE_BODY .= "Message ".nl2br($_POST["message"])."<br>"; 
            mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
        echo "Message Successfully Sent !";
    } else { 
        echo "Message not sent";
    }
?>