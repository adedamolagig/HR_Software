<?php 
	$expire=time()+60*60*24*30;
	setcookie("user", "Ade Public", $expire);

	if (isset($_COOKIE["user"])){
		echo "Welcome " . $_COOKIE["user"] . "!";
	}else{
		echo "Welcome guest!";
	}