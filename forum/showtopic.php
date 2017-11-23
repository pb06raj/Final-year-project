<?php
  session_start();
  error_reporting(E_ALL ^ E_DEPRECATED);
 require_once 'config.php';
 include("/pcount.php");
 $topicid= $_GET['topicid'];

   

 if( !isset($_SESSION['user']) ) {

  header("Location: index.php");

  exit;

 }

 

$error = false;





if( isset($_POST['btn-submit']) ) { 





 $topicid=$_POST['topicid1'];

 $replymsg=$_POST['replymsg'];

 $userid=$_SESSION['user'];

 $useremail=$_POST['useemail'];

  

 $query = "UPDATE topics SET replies = replies + 1 WHERE 	topic_Id = $topicid";

 

$res = mysql_query($query);

  

$query = "INSERT INTO replies(topic_id,date,userid,useremail,reply_message) VALUES($topicid, now(),$userid,'$useremail','$replymsg')";

	 

  $res = mysql_query($query);

  

  if ($res) {

    $errTyp = "success";

  $msg = "Reply Added ......";

 // echo $email;

   } else {

	   

   $msg = "Some Error ......";

   }



}

 
 // select loggedin users detail

 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);

 $userRow=mysql_fetch_array($res);

 $useremail=$userRow['email'];

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
<section id="maincontent">
 <div class="row">
<div class="col-10 "></div><!-- col 11 End -->
<div class="col-2 ">
 <span class="forum-wel"> Welcome
<span class="nbold"><?php echo $userRow['fname']."&nbsp;&nbsp;". $userRow['lname']; ?> </span>
 </span>
</div><!-- col 2 End -->
</div><!-- row End -->
<div id="container1">
 <div align="center">
    <?php



$res=mysql_query("SELECT * FROM topics where topic_id=$topicid");



$row = mysql_fetch_array($res);

?>

<div class="row">
<div class="col-12" style="padding:0;background-color: #65726A;    ">
<span class="forum-title" >Topics Name : <?php echo $row['tname'];?></span>
 </div> <!-- Col 12 End -->
 </div>      <!-- Row End -->

<?php
echo "<p> Posted On :"  . date("d/m/Y H:i:s",strtotime($row['c_date'])). " <p>";

echo "<br/>";



echo "<br/>";

echo "Message :". $row['message']."";

echo "<br/>";





$res=mysql_query("SELECT * FROM replies where topic_id=$topicid");


	?>
 
  </div>
  
  <?php
  while ($row = mysql_fetch_array($res)) {
	  ?>
	 <hr/>  
  <table width="75%" border="0" align="center">

  <tr>

    <td width="80%"><h3><?php  

	echo $row['reply_message']

	?> </h3> Posted by : <?php echo $userRow['fname']; ?> &nbsp;<?php echo $userRow['lname']. "  On " .

	date("d/m/Y H:i:s",strtotime($row['date']));?>

	

	</td>  

    <td width="20%">&nbsp;</td>

  </tr>

  <tr>

    <td><?php  

	//echo $row['reply_message']

	?></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

  

    <td>

</td>

    <td>&nbsp;</td>

  </tr>

</table>
<?php

}

	?>
     <div align="center">
	 <?php  
	// echo $msg;
	 ?>
     <br>
     Reply Here<br/>

     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

       <input name="useemail" type="hidden" value="<?php echo $useremail; ?>">

       <input name="topicid1" type="hidden" value="<?php echo $topicid; ?>">

       <textarea name="replymsg" rows="10" style="width:350px"></textarea><br/>

    <input type="submit" name="btn-submit"  value="Submit Message" />
	<br/>
	<br/>
	<br/>

    </form>
  </div>
</div>

<footer id="footer">
<p><?php include 'footer.php';?></p>
</footer>
<?php // ob_end_flush(); ?>
</body>
</html>
