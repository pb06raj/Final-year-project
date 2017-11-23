<?php
 define('DBHOST', '127.0.0.1');
 define('DBUSER', 'root');
 define('DBPASS', '');
 define('DBNAME', 'forum');

// Create connectio#

 $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysql_select_db(DBNAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }

?>