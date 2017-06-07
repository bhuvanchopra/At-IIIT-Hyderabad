<?php

$host="localhost"; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name="test"; // Database name
$tbl_name="response"; // Table name
$score='0';// Initial raw score set to zero
$starttime;
$endtime; 


// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Collects data from "friends" table 
  $data=mysql_query("SELECT * FROM user ORDER BY userid DESC LIMIT 1") 
 or die(mysql_error()); 

while($info = mysql_fetch_array( $data )) 
 { 

print "<center><table><strong>User Details</strong>
<tr>
<td>
<table>
<tr>
<td>UserID</td>
<td>Name</td>
<td>Gender</td>
<td>Age</td>
<td>D.O.B.</td>
<td>Qualification</td>
<td>Handedness</td>
<td>Date of Experiment</td>
<td>Starting time of Experiment</td>

</tr>
<tr>
<td>" .$info['userid']. "</td>
<td>" .$info['name']. "</td>
<td>" .$info['gender']. "</td>
<td>" .$info['age']. "</td>
<td>" .$info['dob']. "</td>
<td>" .$info['qualification']. "</td>
<td>" .$info['hand']. "</td>
<td>" .$info['date']. "</td>
<td>" .$info['time']. "</td>
</tr>

</table>
</td>
</tr>
</table>";
$starttime=$info['time'];
$startdate=$info['date'];
$uid=$info['userid'];

}

$data1=mysql_query("SELECT * FROM response WHERE time > '$starttime' AND date = '$startdate' LIMIT 36 ") 
 or die(mysql_error());

print "<strong>Question Details</strong>";

while($info1 = mysql_fetch_array( $data1 )) 
 {
print "<table>
<tr>
<td>
<table>
<td>Ques No.</td>
<td>Correct Answer</td>
<td>User Response</td>
<td>Accuracy</td>
<td>Time</td>
</tr>
<tr>
<td>" .$info1['quesid']. "</td>
<td>" .$info1['correctans']. "</td>
<td>" .$info1['userres']. "</td>
<td>" .$info1['accuracy']. "</td>
<td>" .$info1['time']. "</td>
</tr>";
if ($info1['quesid']=="36")
  {
  
$endtime=$info1['time'];
  }

if ($info1['accuracy']=="1")
  {
  
$score++;
  }

print "
</table>
</td>
</tr>
</table>";
}
$perc=($score/36)*100;
print "<b>Raw Score : $score / 36.</b><br>";
print "<b>Percentage : " .round($perc,2). " %.</b><br>";
print "<b>Start time :  $starttime.</b><br>";
print "<b>End time :  $endtime.</b><br>";
$totaltime=mysql_query("SELECT TIMEDIFF('$endtime','$starttime')") or die(mysql_error());
while($info2 = mysql_fetch_row( $totaltime ))
{
print "<b>Total time :  $info2[0].</b>";
}

$sql="UPDATE user SET score='$score' WHERE userid='$uid'";
$result=mysql_query($sql);

?>
