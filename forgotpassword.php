<?php
	
	include('dbcon.php');

	if (isset($_POST['send']))
	{

		$to_email = $_POST['email'];
		
		$subject = "CMS Forgot Password Recovery";

		$headers = 'From: akash cms  @ company.com';

		$qry="select * from registration where email='$to_email'";
		$run=mysqli_query($con,$qry);
		$count = mysqli_num_rows($run);

		$row = mysqli_fetch_assoc($run);

		if ($row>0) 
		{
			$message = "Hi, ";
			$message .=$row['first_name'];
			$message .=$row['last_name'];
			$message .= "\n Your Request For Your's CMS Password";
			$message .= "\n Your CMS Password is ";
			$message .= $row['password'];
			
			$mail = mail($to_email,$subject,$message,$headers);

			if ($mail == true)
			{
				$errTyp = "primary";
				$errMSG = "Password is Send To Your G-mail ID... ";
			}	
			else
			{
				 $errTyp = "success";
				 $errMSG = "Mail Not Send...!";
			}
		}

		else
		{
				$errTyp = "success";
		    	$errMSG = "Mail Not Found...!";	
		}
		
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <script>
var bleep = new Audio();
bleep.src = "bleep.wav";
function loadContent(){
    bleep.play(); // Play button sound now
    var div1 = document.getElementById("div1");
    div1.innerHTML = "Loaded content for section ";
}
</script>

</head>
<body>
<div class="containerfluid">
	<div class="container-fluid">
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
			<div class="container-fluid">
				<a href="" class="navbar-brand font-weight-bold bg-warning text-dark" style="border-radius: 20px;">&nbsp;&nbsp;COURIER MANAGEMENT SYSTEM &nbsp; &nbsp;</a>

				<ul class="navbar-nav">
					<li class="nav-item"><a href="index.php" onclick="loadContent()" class="nav-link">BACK</a></li>
				</ul>
			</div>
		</nav>
        <img src="image/im.jpg" class="img-rounded img-responsive" style="width: 100%; height: 250px;">

      		<hr>
		<div class="row">
			<div class="container">
				<h1 class="text-dark text-center font-weight-bold bg-warning">Recover Forgot Password </h1>
				<hr>
				<div class="row justify-content-center ">
		
					<div class="col-lg-6"><br>
						 <?php
			                if (isset($errMSG)) {

			                    ?>
			                    <div class="form-group">
			                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
			                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
			                        </div>
			                    </div>
			                    <?php
			                }
			                ?>
						<form action="forgotpassword.php" method="post">
							<div class="form-group">
								<span class="help-block text-danger">*</span>
								<label class="control-label"><i class="fa fa-envelope"></i> E-mail &nbsp;</label>
								<input type="email" name="email" class="form-control form-control-sm">
							</div>
							
						
							<div class="form-group">
								<div class="container bg-secondary"><br>
									<center><button onclick="loadContent()" type="submit" name="send" class="btn btn-warning">Send</button></center><br>
								</div>
							</div>
						</form><hr>
					</div>
				</div>
			</div>
		</div><br>
		<div class="container-fluid">
			<div class="row" style="background-color: yellow; ">
					<div class="col-lg-4"><br>
						<center><h4><i class="fa fa-envelope"></i><br>akashchoudhary19553@gmail.com</h4></center><br>
					</div>
					<div class="col-lg-4"><br>
						<center><h4><i class="fa fa-map-marker"></i><br>Mumbai, Maharashtra,India</h4></center><br>
					</div>
					<div class="col-lg-4"><br>
						<center><h4><i class="fa fa-phone"></i><br>8104717271</h4></center><br>
					</div>
			</div>

			<div class="row" style="background-color: black;">
				<h3 class="text-warning">Thank You Visit Again</h3>
			</div>
		</div>
		

</div>
</div>
</body>
</html>









