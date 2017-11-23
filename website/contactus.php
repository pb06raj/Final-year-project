<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Contact Us Page</title>
	
	<meta name="viewport" content="width=device-width">
	
	<!-- css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/media.css" media="screen and (max-width: 900px)">
	<link rel="stylesheet" href="../css/custom.css" media="all">
     <!-- Javascript For Navigation -->
     <script>
function responsive() {
    var x = document.getElementById("nav");
    if (x.className === "nav") {
        x.className += " respnav";
    } else {
        x.className = "nav";
    }
}
</script>
	
</head>
<body>

    <!-- header -->
	<div class="header">
	  <div class="row">
        <div class="col-12" style="padding:10px 0 0 54px ">
        <a href="http://localhost/home.html"> <img src="images/logo-gray.png" width="300" ></a>
            </div>
            </div>
            </div><!--/header-->
   	<!-- nav -->
     <div class="nav" id="nav">
    <a href="index.html">Home</a>
    <a href="beforecoming.html">Before Coming</a>
    <a href="whilestudy.html">Living and Studying</a>
    <a href="future.html">Future prospects</a>
         <a href="contactus.php">Contact</a>
    <a href="javascript:void(0);" style="" class="icon" onclick="responsive()">&#9776;</a>
</div>
		</ul>
	</div></div><!--/nav-->
	
	<!-- body-content -->
	<div class="body-content"><div class="section-inner">
		
		<!-- thirds --><!--/thirds-->
		
		<!-- two-columns -->
		<div class="two-columns clearfix">
			
			<!-- main -->
			<div class="main mobile-collapse">
				
				<h2 class="titlefont  title-size-2 bluedark" >Contact Us</h2>
                 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			  <table width="100%" border="0" cellpadding="5">
  <tr>
    <td width="42%" class="titlefont  title-size-1-5 bluedark">Name</td>
    <td width="6%">:</td>
    <td width="52%"><label for="textfield"></label>
      <input type="text" name="txtname"></td>
  </tr>
  <tr>
    <td class="titlefont  title-size-1-5 bluedark">Phone No</td>
    <td>:</td>
    <td><input type="text" name="txtphone"></td>
  </tr>
  <tr>
    <td class="titlefont  title-size-1-5 bluedark">Email </td>
    <td>:</td>
    <td><input type="text" name="txtemail"></td>
  </tr>
  <tr>
    <td class="titlefont  title-size-1-5 bluedark">Your Message</td>
    <td>:</td>
    <td><label for="textarea"></label>
      <textarea name="txtmessage"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" id="Submit" value="Submit">
      <input type="submit" name="Cancel" id="Cancel" value="Cancel"></td>
  </tr>
</table>

		</form>		
                
                <?php
if ( isset($_POST['Submit']) ) {
	
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
$mail->setFrom('dmuisw@outlook.com', 'DMU ISW');
//Set an alternative reply-to address
//$mail->addReplyTo('srajvir@outlook.com', 'Rajvir Last');
//Set who the message is to be sent to
$mail->addAddress('srajvir@outlook.com', 'Admin');
//Set the subject line
$mail->Subject = 'Query from website';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

//$mail->msgHTML = 'this is message';

 $email_message = "Query details below......\n\n <br/>";

 $email_message .= "Name: ".trim($_POST['txtname'])."<br/>";
    $email_message .= "Phone: ".trim($_POST['txtphone'])."<br/>";
    $email_message .= "Email: ".trim($_POST['txtemail'])."<br/>";
    $email_message .= "Message: ".trim($_POST['txtmessage'])."<br/>";


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
    echo "Your message has been sent to the relevant team. We will reply within 24 hours.";
}

	
}

?>
                
                
                
			</div><!--/main-->
			
			<!-- side -->
			<div class="side mobile-collapse">
				
				<!-- info-box -->
				<div class="info-box-a">
					<h4>De Montfort University</h4>
					<p>De Montfort University
                        The Gateway
                        Leicester
                        LE1 9BH
                        UNITED KINGDOM
                        Tel: +44 (0)116 255 1551</p>
				</div><!--/info-box-->
				
				<!-- info-box -->
				<div class="info-box-b hide-mobile">
					<h4>International Office</h4>
					<p>De Montfort University, The Portland Building, Room 0.22, The Gateway, Leicester, LE1 9BH</p>
				</div><!--/info-box-->
				
				<!-- info-box -->
				<div class="info-box-b hide-mobile">
					<h4>Admission enquiries</h4>
					<p>If you have a question about your application, supporting documents, offer letter or visa documents, email us at iao@dmu.ac.uk or phone +44 (0)116 257 7713</p>
				</div><!--/info-box-->
				
			</div><!--/side-->
			
		</div><!--/two-columns-->
		
	</div></div><!--/body-content-->
	
	<!-- footer -->
	<div class="footer"><div class="section-inner">
		
		<p>De Montfort University</p>
		
	</div></div><!--/footer-->
	
</body>
</html>