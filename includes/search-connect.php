<?php

 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
 define('DBHOST', 'localhost');
 define('DBUSER', 'bin');
 define('DBPASS', '1234');
 define('DBNAME', 'art');
 
 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysqli_select_db($conn,DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysqli_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysqli_error());
 }
?>