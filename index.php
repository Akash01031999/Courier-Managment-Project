<?php
	session_start();
	if (isset($_SESSION['email'])) 
	{
		header('location:customer/welcome.php');
	}
?>

<?php
	include('dbcon.php');

	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];

		if ($usertype=="admin") 
		{
			$qry="select * from admin where email='$email' and password='$password' ";
			$run=mysqli_query($con,$qry);
			$row = mysqli_num_rows($run);
			if($row<1 )
			{
				echo '<script type="text/javascript">alert("Invaild Username and Password")</script>';
				//header('location:index.php');
			}
			else
			{
				$data = mysqli_fetch_assoc($run);
				$id=$data['email'];
				$_SESSION['email']=$id;
				header('location:admin/index.php');
			}
		}

		if ($usertype=="employee") 
		{
			$qry="select * from employee where email='$email' and password='$password' ";
			$run=mysqli_query($con,$qry);
			$row = mysqli_num_rows($run);
			if($row<1 )
			{
				echo '<script type="text/javascript">alert("Invaild Username and Password")</script>';
				//header('location:index.php');
			}
			else
			{
				$data = mysqli_fetch_assoc($run);
				$id=$data['email'];
				$_SESSION['email']=$id;
				header('location:employee/index.php');
			}
		}

		if ($usertype=="user") 
		{
			$qry="select * from registration where email='$email' and password='$password' ";
			$run=mysqli_query($con,$qry);
			$row = mysqli_num_rows($run);

			if($row<1 )
			{
				echo '<script type="text/javascript">alert("Invaild Username and Password")</script>';
				header('location:index.php');
			}
			else
			{
				$data = mysqli_fetch_assoc($run);

				$id=$data['email'];
		
				
				$_SESSION['email']=$id;

				header('location:customer/welcome.php');
			}
		}		
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
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script language="javascript" type="text/javascript">
  	window.history.forward();
  </script>
</head>
<body>


<div class="container-fluid bg-light">


	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container-fluid">
			<a href="" class="navbar-brand font-weight-bold bg-warning text-dark brand">&nbsp;&nbsp;COURIER MANAGEMENT SYSTEM &nbsp; &nbsp;</a>

			<ul class="navbar-nav">
				<li class="nav-item"><a href="register.php" class="nav-link"><i class="fa fa-address-book"></i>&nbsp;SignUp</a></li>
				<li class="nav-item"><a href="#" class="nav-link" data-target="#mymodal" data-toggle="modal"><i class="fa fa-lock"></i>&nbsp; Login</a></li>
			</ul>
		</div>
	</nav>

		


		<div class="d-flex flex-column">
			<div class="p-3 text-white" style="background-color: black;">
				<div class="d-flex flex-row justify-content-between">
					<div><a href="" class="text-white font-weight-bold"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></div>
					
					<div><a href="about" class="text-white font-weight-bold"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;About_us</a></div>
					<div><a href="contact-form" class="text-white font-weight-bold"><i class="fa fa-book"></i>&nbsp;&nbsp;Contact_Us</a></div>
				</div>
			</div>
		</div>

				<h1 class="text-dark font-weight-bold text-center bg-warning">HOME</h1>
                <img src="image/trheader6.jpg" class="img-rounded img-responsive" style="width: 100%; height: 300px;">
    
					<div class="row bg-light">
                       
						<div class="col-lg-8">
							<?php include('home.php'); ?>
						</div>
						 <div class="col-lg-4">
							<img src="image/giphy1.gif" class="img-rounded img-responsive" style="width: 100%; height: 90%; border-radius: 10px; position: relative;top:40px;">
						</div>
					</div>

		<div class="container-fluid">
			<div class="row" style="background-color: yellow; ">
				<div class="col-lg-4"><br>
					<center><h4><i class="fa fa-envelope"></i><br>Akashchoudhry19553@gmail.com</h4></center>
				</div>
				<div class="col-lg-4"><br>
					<center><h4><i class="fa fa-map-marker"></i><br>Mumbai, Maharashtra,India</h4></center>
				</div>
				<div class="col-lg-4"><br>
					<center><h4><i class="fa fa-phone"></i><br>8104717271</h4></center>
				</div>
			</div>

			<div class="row" style="background-color: black;">
				<h3 class="text-warning">Thank You Visit Again</h3>
			</div>
		</div>


	<div class="modal fade" id="mymodal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-warning ">
					<h3 class="text-dark text-center font-weight-bold">Sign_In</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div> 
				<div class="modal-body">
					<form action="index.php" method="post">
						<div class="form-group">
								<label class="font-weight-bold"><i class="fa fa-user fa-2x"></i>&nbsp; E-Mail ID</label>
								<input type="text" name="email" class="form-control form-control-sm" style="border-radius: 20px;">
						</div>

						<div class="form-group">
							<label class="font-weight-bold"><i class="fa fa-lock fa-2x"></i>&nbsp; Password</label>
							<input type="password" name="password" class="form-control form-control-sm" style="border-radius: 20px;">
						</div>

						<div class="form-group">
							<label class="font-weight-bold"><i class="fa fa-user fa-2x"></i>&nbsp; User Type</label>
							<select class="form-control form-control-sm" name="usertype" style="border-radius: 20px;">
								<option>------Select-----</option>
								<option value="admin">Admin</option>
								<option value="employee">Employee</option>
								<option value="user">User</option>
							</select>
						</div>

						<div class="form-group">
							<center><button class="btn btn-primary btn-sm" name="login">&nbsp;&nbsp;Login&nbsp;&nbsp;</button></center>
						</div>


					</form>	
				</div>
					<div class="modal-footer bg-dark">
						<a href="forgotpassword.php">Forgot Password</a>
					</div>
				</div>	
			</div>
		</div>	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>









