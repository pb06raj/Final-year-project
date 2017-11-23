<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
require_once 'config.php';

 if( !isset($_SESSION['user']) ) {

  header("Location: index.php");

  exit;

 }

 

 //

  $error = false;





if( isset($_POST['btn-submit']) ) { 





  $catid=$_POST['category'];

  $tname=$_POST['tname'];

  $messaage=$_POST['message'];

  $userid=$_SESSION['user'];

  $username1=$_POST['username'];

  $email1=$_POST['useremail'];

  
 if ($tname == "" ||  $messaage == "" ) {

     $msg = "All Fields are Required..";

   }  

  else  {
  $query = "UPDATE categories SET topic_count = topic_count + 1 WHERE catid = $catid";

 $res = mysql_query($query);

 $query = "INSERT INTO topics(catid,c_date,userid,useremail,tname,message,replies,last_reply_date,last_reply_by) VALUES($catid,now(),$userid,'$email1', '$tname','$messaage',0,now(),'$email1')";

 $res = mysql_query($query);
 $msg = "New Topic Added Successfully ......";

 }

 

}

 // select loggedin users detail

 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);

 $userRow=mysql_fetch_array($res);

 $username=$userRow['fname']. " "  .$userRow['lname'] ;

 $email=$userRow['email'];

?>







<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/screen.css"> 
 <link rel="stylesheet" href="../css/custom.css" media="all">
<title>Welcome - <?php echo $userRow['email']; ?></title>
</head>
<body>



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
<div align="center">
<div  class="nav">
<div class="section-inner">
		<ul class="clearfix">
            <li><a href="http://localhost/home.html">Website Homepage</a></li>
			<li><a href="index.php">Forum Homepage</a></li>
			<li><a href="newtopic.php">Create New Topic</a></li>
			<li><a href="logout.php?logout">Log Out</a></li>
            
			
		</ul>
	</div>
    </div>


</header>
<section id="maincontent">
<div class="row">
<div class="col-10 "></div><!-- col 11 End -->
<div class="col-2 ">
 <span class="forum-wel"> Welcome
<span class="nbold"><?php echo $userRow['fname']."&nbsp;&nbsp;". $userRow['lname']; ?> </span>
 </span>
</div><!-- col 2 End -->
</div><!-- row End -->
<div class="error">
<?php

   if ( isset($msg) ) {

    echo $msg; 

   }

?>
</div>
</h1>
</div>


<div id="container1">
 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

     <input name="username" type="hidden" value="<?php echo $username; ?>">

     <input name="useremail" type="hidden" value="<?php echo $email;?>">

    

    

    <table align="center" width="95%" border="0">

      <tr align="center">

        <td>&nbsp;<?php  $res=mysql_query("SELECT catid,cat_name FROM categories order by catid");                                        
        
       echo "Select Category : ";
	   echo "<br/>";

echo "<select name=\"category\">";

 while($row=mysql_fetch_array($res))

 { 

       echo "<option value='".$row['catid']."'>".$row['cat_name']."</option>";

 }

 echo "</select>";

		echo "<br><br>";

echo "Title of Your Topic <br>";

echo "<input type=\"text\" name=\"tname\">"

	   

	   ?>

		

		</td>

      </tr>

      <tr>

        <td align="center">

		<?php

		      

 

 echo " Enter Your Message : <br>";

 echo "<textarea name=\"message\" cols=\"45\" rows=\"5\"></textarea>";

		?>

		</td>

      </tr>

      <tr>

        <td align="center"><input type="submit" name="btn-submit"  value="Submit Message" /></td>

      </tr>

  </table>

    

    </form>


</div>
</section>  <footer id="footer">
<p><?php include 'footer.php';?></p>
</footer>
<?php ob_end_flush(); ?>
</body>
</html>