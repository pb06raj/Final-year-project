<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
 require_once 'config.php';

 $catid= $_GET['catid']; 

   

 if( !isset($_SESSION['user']) ) {

  header("Location: index.php");

  exit;

 }

 // select loggedin users detail

 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);

 $userRow=mysql_fetch_array($res);

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
  <p>
    <?php

  

$res=mysql_query("SELECT * FROM categories where catid=$catid");



$row = mysql_fetch_array($res);

?>

<div class="row">
<div class="col-12" style="padding:0;background-color: #65726A;    ">
<span class="forum-title" >Topics For Category : <?php echo $row['cat_name'];?></span>
 </div> <!-- Col 12 End -->
 </div>      <!-- Row End -->

<?php
$res=mysql_query("SELECT * FROM topics where catid=$catid");



while ($row = mysql_fetch_array($res)) {
        $user_id =   $row['userid'];
       
	?>
    	<hr/>
  </p>
  <table width="75%" border="0" align="center">

  <tr>

    <td width="80%"><h3 class="forum-title" style="color:#4A5952;"><?php

	echo $row['tname']

	?> </h3>
    <?php
    //codes for to Display Post Author Name
    $res_author=mysql_query("SELECT * FROM users where userid=$user_id");
    while ($at_row = mysql_fetch_array($res_author) ){
    echo "Posted By :&nbsp;". $at_row[1]."&nbsp;". $at_row['lname'];} //author loop end
    echo "  On " . date("d/m/Y H:i:s",strtotime($row['c_date']));?>


	

	</td>  

    <td width="20%">&nbsp;</td>

  </tr>

  <tr>

    <td><?php  

	echo $row['message']

	?></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

  

    <td>

      <p>

        <?php

  // if ($row['replies']<>0) {

    ?>

        

        No of Replies : <a href="showtopic.php?topicid=<?php 

	echo $row[0];?>"><?php 

	echo $row['replies'];

	echo "<br/>";

	echo "View Replies";

	echo "</a>"

 

     

  // else {

	//  echo "<a href=\"reply.php?topicid=\"" . $row['replies']. "> No Reply </a>";

	  

  //}?>

      </p>

      <p>&nbsp;</p></td>

    <td>&nbsp;</td>

  </tr>

</table>
<?php

}

	?>
 
</div>
<footer id="footer">
<p><?php include 'footer.php';?></p>
</footer>
<?php ob_end_flush(); ?>
</body>
</html>