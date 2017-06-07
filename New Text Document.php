<?php

$host="localhost"; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 


// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Collects data from "friends" table 
 $data = mysql_query("SELECT * FROM questions") 
 or die(mysql_error()); 
print "<center>";
while($info = mysql_fetch_array( $data )) 
 { 
 Print "<b>Ques.no.</b> ".$info['quesid'] . " "; 
 Print "<b>Ans:</b> ".$info['correctans'] . " <br>"; 
 }




?>