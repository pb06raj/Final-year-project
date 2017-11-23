<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
require_once 'config.php';


 /*if(!isset($_SESSION['user']) ||  $_SESSION['user'] == '' ) {

  header("Location: index.php");

 }*/

 // select loggedin users detail

 $res=mysql_query("SELECT * FROM users WHERE userid='".$_SESSION['user']."'");

 $userRow=mysql_fetch_array($res);
// echo $userRow['email'];
  
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/screen.css">
<link rel="stylesheet" href="../css/custom.css" media="all">
<title>Welcome - <?php echo $userRow['fname']; ?></title>
</head>
<body >
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
</div>

<!--</header>-->
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
 <?php
  $res=mysql_query("SELECT * FROM categories");
?>

<div class="row">
<div class="col-12" style="padding:0;background-color: #65726A;    ">
<span class="forum-title" >Discussion Forums</span>
 </div> <!-- Col 12 End -->
 </div>      <!-- Row End -->
<div class="row">
<div class="col-12 forumbox">
    <hr/>


<table width="95%" border="0" align="center">
  <tr  align="left">
      <th>Titles</th>
      <th>Description</th>
      <th>Topics</th>
      <th>Views</th>
      <th>Topic URL</th>
  </tr>


<?php  while ($row = mysql_fetch_array($res)) {     ?>
    <tr  >

    <td colspan="0" class="pad" width="22%"><h4><?php echo $row[1]  ; ?> </h4></td>

    <td class="pad" width="50%"><?php echo $row[2];?></td>

    <td class="pad" width="10%"><?php echo $row[3]; ?> TOPICS</td>
    <td class="pad" width="9%">
    <?php $datei = fopen("/clog.txt","r");
$count = fgets($datei,1000);
fclose($datei);
// $count=$count + 1 ;
echo "$count" ;
echo "&nbsp;Views" ;
echo "\n" ;
    ?>
    </td>
    <td class="pad" ><a href="showcategory.php?catid=<?php echo $row[0];?>" >View Topic</a></td>


   </tr>

 <?php } ?>
</table>
 </div> <!-- Col 11 End -->
 </div>      <!-- Row End -->


</div>
</section>  <footer id="footer">
<p><?php include 'footer.php';?></p>
</footer>
<?php ob_end_flush(); ?>
</body>
</html>