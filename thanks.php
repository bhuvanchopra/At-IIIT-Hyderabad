<html>
<head>
<title>Ravens Advanced Matrices Test</title>
</head>
<body>
<center>
<br>
<br>
<h1>Thanks for taking the quiz!!</h1>
<br>
<br>
<a href="result.php">
<input type="button" name="View Result" value="View Result">
</a>
</center>

</body>
</html>
<?php

$host="localhost"; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="response"; // Table name
$score="0"; 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$userres=$_POST['userres'];
$correctans=2;
$quesid=36;
$data=mysql_query("SELECT * FROM user ORDER BY userid DESC LIMIT 1") 
 or die(mysql_error());
$info = mysql_fetch_array( $data );
$userid=$info['userid'];

if($userres==$correctans){
$accuracy="1";
}

else {
$accuracy="0";
}


// Insert data into mysql 
$sql="INSERT INTO $tbl_name(userid,quesid,userres,correctans,accuracy,time,date)VALUES('$userid','$quesid','$userres','$correctans','$accuracy',now(),now())";
$result=mysql_query($sql);


  ?> 

<?php 
// close connection 
mysql_close();
?>