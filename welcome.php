<?php

	session_start();

	if (isset($_SESSION['uid'])) 
	{
		$uid = $_SESSION['uid'];
		$_SESSION['uid'] = $uid;
	}
	else
	{
		//echo "ERROR";
		header('location:index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Courier Management System</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container-fluid">

	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container-fluid">
			<a href="" class="navbar-brand font-weight-bold bg-warning text-dark">&nbsp;&nbsp;COURIER MANAGEMENT SYSTEM &nbsp; &nbsp;</a>

			<ul class="navbar-nav">
				<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
			      <i class="fa fa-user-circle px-2">&nbsp;</i><strong>Logged in: </strong><?php echo $_SESSION['uid']; ?>
			    </button>
			    <div class="dropdown-menu dropdown-menu-right bg-primary text-white">
			      <a class="dropdown-item" href="logout.php"><i class="fa fa-unlock"></i>&nbsp;Logout</a>
			       <a class="dropdown-item" href="forgotpassword.php"><i class="fa fa-unlock"></i>&nbsp;forgotpassword</a>
			   </div>
			</ul>
		</div>
	</nav>

		
	 <img src="image/banner.jpg" class="img-rounded img-responsive" style="width: 100%; height: 250px;">
	 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>








