
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/screen.css">
<link rel="stylesheet" href="../css/custom.css" media="all">
<title>Welcome to DMU International Students Forum</title>
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
<!--<header id="header">
<h1><img src="images/logo.png" width="180" height="90"></h1>
</header>
<section id="maincontent">
<br/><br/>
<div align="center"><h1> USER LOGIN </h1>
</div>-->
<div class="row">
<div class="col-12 " >
<div clas="body-content">
<!--<div class="imgresforumhome"></div>   -->
  <div class="col-5" style="float: none; margin: 0 auto;">
  <div class="forumreg">

       <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post" autocomplete="on" >


    <label for="email">Email</label>
    <input type="text" name="username"  name="email" placeholder="Email" />

    <label for="password">Password </label>
    <input type="password" id="password" name="password" placeholder="Password" />
    <input type="submit" name="btn-login"  value="Login" class="btn" />
  <a href="register.php" target="_parent" class="btn">REGISTER</a>
   <a href="reset.php" target="_parent" class="btn" >RESET PASSWORD</a>
  </form>
      <?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

 if(isset($_SESSION['user']) ){
  header("Location: home.php");
 }

include_once 'config.php';

 $error = false;


if( isset($_POST['btn-login']) ) {


  $username = trim($_POST['username']);
  $username = strip_tags($username);
  $username = htmlspecialchars($username);

  $password = trim($_POST['password']);
  $password = strip_tags($password);
  $password = htmlspecialchars($password);
   echo $username;
 if (!$error) {


   $res=mysql_query("SELECT * FROM users WHERE email='$username'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

   if( $count == 1 && $row['password']==base64_encode($password )) {
    $_SESSION['user'] = $row['userid'];

    header('Location: home.php');
   // header("Location: home.php",TRUE,302);
   } else {
    $errMSG = " you entered incorrect credentials, Try again...";
    echo $errMSG;
   }

  }

}

?>


      </div> <!-- Forumreg End -->
      </div><!-- Col 5 End -->


</div><!-- Body-Content End -->
</div>  <!-- End Col 12 -->
</div><!-- End Row  -->


<footer id="footer">
<p><?php include 'footer.php';?></p>
</footer>

<?php // ob_end_flush(); ?>

</body>
</html>