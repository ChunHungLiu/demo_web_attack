<?php

require_once("DB.php");

// ƴ����ʽ��SQL����
$query="SELECT * from tb_user where user_name='".$_POST['user_name']."' and password='".$_POST['pass_word']."';"; 

echo "Query: ".$query;

echo "<hr />";

$result=$dbconn->query($query);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
if ($row) {
 echo "Login Success";
}
else {
 echo "Login Failed";
}
?>