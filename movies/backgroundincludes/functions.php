<?php


require("dib.inc.php");

function getUserData($id)
{
	$array = array();
	$q = mysql_query("SELECT * FROM users WHERE user_id='$id'");
	while($r = mysql_fetch_assoc($q))
	{
		$array['id'] = $r['user_id'];
		$array['first'] = $r['user_first'];
		$array['last'] = $r['user_last'];
		$array['email'] = $r['user_email'];
	}
	return $array;
}

function getID($id)
{
	$q = mysql_query("SELECT * FROM users WHERE users_id = '$id'");
	while($r = mysql_fetch_assoc($q)){
		return $r['users_id'];
	}
}

?>