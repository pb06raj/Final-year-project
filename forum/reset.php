<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="css/screen.css"> 
<link rel="stylesheet" href="../css/custom.css" media="all">
<title>Reset User Password</title>
</head>
<body class="regbody">
 <div class="row">
        <div class="col-12" style="padding:0px !important;" >


		<div class="header" id="header" align="center">
           <div class="headerbg"></div>
		    <div class="logo" style="padding: 10px 10px;">
		    <img src="images/logo-gray.png" width="300" alt="Welcome to De Montfort University" width="300" />
		    </div>
             </div>
              </div>
               </div>
  <div class="row">
<div class="col-12 " >
<div clas="body-content">
<!--<div class="imgresforumhome"></div>   -->
  <div class="col-5" style="float: none; margin: 0 auto;">
  <div class="forumreg">

       <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post" autocomplete="on" >


    <label for="email">Email</label>
    <input type="text" name="username"  name="email" placeholder="Email" />
    <input type="submit" name="btn-login"  value="RESET PASSWORD" >
  <a href="index.php" target="_parent" class="btn">Sign IN</a>
  </form>


      </div> <!-- Forumreg End -->
      </div><!-- Col 5 End -->

  <div style="width:100%; height: 20vh;"></div>
</div><!-- Body-Content End -->
</div>  <!-- End Col 12 -->
</div><!-- End Row  -->
    <?php

 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 
include_once 'config.php';

 $error = false;


if( isset($_POST['btn-login']) ) { 
  
  
  $username = trim($_POST['username']);
  $username = strip_tags($username);
  $username = htmlspecialchars($username);
  
   
 if (!$error) {
   
    
   $res=mysql_query("SELECT * FROM users WHERE email='$username'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 ) {
	    $password = $row['password'];
		$email= $row['email'];
	   
	   date_default_timezone_set('Etc/UTC');

require 'phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.live.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "dmuisw@outlook.com";
//Password to use for SMTP authentication
$mail->Password = "demontfort28";
//Set who the message is to be sent from
$mail->setFrom('dmuisw@outlook.com', 'Admin- DMU ISW');
//Set an alternative reply-to address
//$mail->addReplyTo('srajvir@outlook.com', 'Rajvir Last');
//Set who the message is to be sent to
$mail->addAddress($email, '');
//Set the subject line
$mail->Subject = 'DMU-ISW Login details ';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

//$mail->msgHTML = 'this is message';

 $email_message = "Login Details\n\n <br/>";

 $email_message .= "Email ID : ".trim($email)."<br/>";
    $email_message .= "Password : ".base64_decode($password)."<br/>";



$mail->Body = $email_message;
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = $email_message;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Your login credentials sent to your registered email address.";
}

	   
	   
	   
	   
	   
	   
    //echo ("Email Send With Your Password");
	$errMSG = "Login Information Send to Your Email ID.";
	
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
}

?>
<div class="row">
<div class="col-12">
<footer id="footer">
<p><?php include 'footer.php';?></p>
</footer>
</div> <!-- Col 12 End -->
</div>  <!-- Row End -->
<?php ob_end_flush(); ?>
</body>
</html>