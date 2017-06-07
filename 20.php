<html>
<head>
<title>Ravens Advanced Matrices Test</title>
</head>
<body>
<b>Question 20 of 36</b>
<center>
<img src="images\raven20\ques20.jpg" width="450" height="300">
<br>
<form name="form1" method="post" action="21.php">
<input name="userres" type="image" src="images\raven20\1.jpg" value="1"/>
</input>
<input name="userres" type="image" src="images\raven20\2.jpg" value="2"/>
</input>
<input name="userres" type="image" src="images\raven20\3.jpg" value="3"/>
</input>
<input name="userres" type="image" src="images\raven20\4.jpg" value="4"/>
</input>
<br>
<input name="userres" type="image" src="images\raven20\5.jpg" value="5"/>
</input>
<input name="userres" type="image" src="images\raven20\6.jpg" value="6"/>
</input>
<input name="userres" type="image" src="images\raven20\7.jpg" value="7"/>
</input>
<input name="userres" type="image" src="images\raven20\8.jpg" value="8"/>
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
$tbl_name="response"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$userres=$_POST['userres'];
$correctans=3;
$quesid=19;
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