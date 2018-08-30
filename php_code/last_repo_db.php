<?php

//データベースの読み込み
function getDb(){


	$server="localhost";
	$username="root";
	$pass="rootpass";
	$dbname="lastrepodb";

	$mysqli=new mysqli($server,$username,$pass, $dbname);

	if ($mysqli->connect_error){
		echo $mysqli->connect_error;
		exit();
	}else{
		$mysqli->set_charset("utf8");
	}
	return $mysqli;
}
?>
