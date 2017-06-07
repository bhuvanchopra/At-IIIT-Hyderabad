<html>
<head>
<title>Ravens Advanced Matrices Test</title>
</head>
<body>
<b>Question 1 of 36</b>
<center>
<img src="images\raven1\ques1.jpg" width="450" height="300">
<br>
<form name="form1" method="post" action="2.php">
<input name="userres" type="image" src="images\raven1\1.jpg" value="1"/>
</input>
<input name="userres" type="image" src="images\raven1\2.jpg" value="2"/>
</input>
<input name="userres" type="image" src="images\raven1\3.jpg" value="3"/>
</input>
<input name="userres" type="image" src="images\raven1\4.jpg" value="4"/>
</input>
<br>
<input name="userres" type="image" src="images\raven1\5.jpg" value="5"/>
</input>
<input name="userres" type="image" src="images\raven1\6.jpg" value="6"/>
</input>
<input name="userres" type="image" src="images\raven1\7.jpg" value="7"/>
</input>
<input name="userres" type="image" src="images\raven1\8.jpg" value="8"/>
</input>
</form>
</center>
</a>
</body>
</html>

<?php

$host="localhost"; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="user"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$hand=$_POST['hand'];
$qualification=$_POST['qualification'];


// Insert data into mysql 
$sql="INSERT INTO $tbl_name(name,age,gender,dob,hand,qualification,date,time)VALUES('$name','$age','$gender','$dob','$hand','$qualification',now(),now())";
$result=mysql_query($sql);


?> 

<?php 
// close connection 
mysql_close();
?>

