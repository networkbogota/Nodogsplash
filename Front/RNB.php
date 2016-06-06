<?php
$db_host="localhost";
$db_user="NetBog";
$db_password="LFCS13";
$db_name="Data";
$db_table_name="Users_NetBog";
$db_connection = mysql_connect($db_host, $db_user, $db_password);
 
if (!$db_connection) 
{
	die(header('Location: http://networkbogota.org/#fail'));
}
$subs_name = utf8_decode($_POST['name']);
$subs_email = utf8_decode($_POST['email']);

mysql_select_db($db_name, $db_connection);
$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);

if (mysql_num_rows($resultado)==0)
{ 
	
	mysql_select_db($db_name, $db_connection);
	$retry_value = mysql_query($insert_value, $db_connection);
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Name`, `Email`) VALUES ("' . $subs_name . '", "' . $subs_email . '")';
	if (!$retry_value) 
	{
	   die('Error: ' . mysql_error());
	}
	header('Location: http://networkbogota.org/#succ2');
}
else
{
	header('Location: http://networkbogota.org/#fail'); 
} 
	mysql_close($db_connection);	
?>