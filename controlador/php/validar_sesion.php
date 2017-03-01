<?php 
	session_start();
	if(empty($_SESSION['acti']))
	{
		echo"<meta http-equiv='refresh' content='0;/sigteg/'>";
	}
?>