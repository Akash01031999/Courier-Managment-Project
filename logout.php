<?php

	session_start();

	if (isset($_SESSION['uid']) )
	{
		unset($_SESSION['uid']);
		header('location:index.php');

	}
	else
	{
		//echo "ERROR";
		echo "not destroy";
	}

?>
