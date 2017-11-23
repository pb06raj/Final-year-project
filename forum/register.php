<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
?>
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

<div class="row">
<div class="col-12 " >

<div clas="body-content">
  <!--<div class="imgresforumhome"></div>        -->
   <div class="col-5" style="float: none; margin: 0 auto;">
  <div class="forumreg">

       <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" >
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" placeholder="First Name">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" placeholder="Last Name">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Email">

    <label for="mobile">Mobile</label>
    <input type="text" id="mobile" name="mobile" placeholder="Mobile">

    <label for="password">Password </label>
    <input type="password" id="password" name="password" placeholder="Password" >

  <label for="cpassword">Confirm Password </label>
  <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" >


      <input type="submit" name="btn-create"  value="Create Account" />
      <a href="index.php" target="_parent" class="btn">SIGN IN</a>
  </form>
      <?php
if( isset($_SESSION['user'])!="" ){
 header("Location: index.php");
 }
 include_once 'config.php';
 $error = false;
// btn-create
if ( isset($_POST['btn-create']) ) {
  // Clear User Inputs
  $fname = trim($_POST['fname']);

  $fname = strip_tags($fname);

  $fname = htmlspecialchars($fname);

  

  $lname = trim($_POST['lname']);

  $lname = strip_tags($lname);

  $lname = htmlspecialchars($lname);

	  

  $email = trim($_POST['email']);

  $email = strip_tags($email);

  $email = htmlspecialchars($email);

  

  $lname = trim($_POST['lname']);

  $lname = strip_tags($lname);

  $lname = htmlspecialchars($lname);

  

  $mobile = trim($_POST['mobile']);

  $mobile = strip_tags($mobile);

  $mobile = htmlspecialchars($mobile);

  

   $cpassword = trim($_POST['cpassword']);

  $cpassword = strip_tags($cpassword);

  $cpassword = htmlspecialchars($cpassword);

  

    $password = trim($_POST['password']);

  $password = strip_tags($password);

  $password = htmlspecialchars($password);



 // check email exist or not

   $query = "SELECT email FROM users WHERE email= '$email' ";

   $result = mysql_query($query);

   $count = mysql_num_rows($result);

   if($count!=0){

    $error = true;

    $errMSG = "Provided Email is already in use.";

   }
 
 elseif($cpassword!=$password){

    $error = true;

    $errMSG = "Both Password are not Same...";

   }
   
elseif($password == "" ||  $fname == "" || $lname == ""|| $email == "" || $mobile == ""){

    $error = true;

    $errMSG = "All Fields are required...";

   }
   
   

elseif( !$error ) {

  $password=base64_encode($password);

   $query = "INSERT INTO users(fname,lname,email,mobile,password) VALUES('$fname','$lname','$email','$mobile','$password')";

   $res = mysql_query($query);

    

   if ($res) {

    $errTyp = "success";

    $errMSG = "Successfully registered, you may login now";

    unset($fname);

    unset($lname);

    unset($email);

	unset($mobile);

	unset($password);

   } else {

    $errTyp = "danger";

    $errMSG = "Something went wrong, try again later..."; 

   } 

  }

}

?>
      

      </div> <!-- Forumreg End -->
      </div><!-- Col 4 End -->
</div>  <!-- End Col 12 -->

</div><!-- End Row  -->

   <?php
   if ( isset($errMSG) ) {

    ?>

    <?php  echo ($errTyp=="success") ? "" : $errTyp; ?><?php  echo  $errMSG; ?>
	<?php
   }
   ?>
 <div class="row">
<div class="col-12">
<footer id="footer">
<p><?php include 'footer.php';?></p>
</footer>
</div> <!-- Col 12 End -->
</div>  <!-- Row End -->
</body>
</html>