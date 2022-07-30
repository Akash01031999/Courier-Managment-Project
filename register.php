<?php
	require 'dbcon.php';
			
	if(isset($_POST['submit_btn']))
	{

		$fname =$_POST['fname'];
		$lname =$_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$mobile = $_POST['mobile'];
		$state = $_POST['state'];
		$district = $_POST['district'];
		$address2 = $_POST['address2'];
		$address1 = $_POST['address1'];
		$pincode = $_POST['pincode'];

		if($password==$cpassword)
		{
			$qemail = "select * from registration WHERE email='$email'";
			$query_run = mysqli_query($con,$qemail);
						
			if(mysqli_num_rows($query_run)>0)
			{
				$errTyp = "warning";
				$errMSG = "ERROR! User Email already exists...";
			}
			else
			{
				session_start();
				$_SESSION['fname'] = $fname;
				$_SESSION['lname'] = $lname;
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['mobile'] = $mobile;
				$_SESSION['state'] = $state;
				$_SESSION['district'] = $district;
				$_SESSION['address2'] = $address2;
				$_SESSION['address1'] = $address1;
				$_SESSION['pincode'] = $pincode;


			    $query = " INSERT INTO `registration`(`first_name`, `last_name`, `email`, `password`, `mobile`, `country`, `state`, `district`, `address1`, `address2`, `pincode`) VALUES ('$fname', '$lname', '$email', '$password', '$mobile', '$country', '$state', '$district', '$address2', '$address1', '$pincode') ";
				
				$query_run = mysqli_query($con,$query);		

				if($query_run)
				{
					$errTyp = "primary";
					$errMSG = "Successfully Registered, GO to Login Page to login...! ";
					header('location:customer/welcome.php');
					
				}
			    else
			    {
			    	 $errTyp = "danger";
				 	 $errMSG = "Registration Failed!";
				 	 session_destroy();
			    }
			}
						
		}
		else
		{
			$errTyp = "success";
			$errMSG = "ERROR! Password and confirm password does not match";
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
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="card">

		<div class="card-header bg-dark">

			<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
				<div class="container-fluid">
					<a href="" class="navbar-brand font-weight-bold bg-warning text-dark">&nbsp;&nbsp;COURIER MANAGEMENT SYSTEM &nbsp; &nbsp;</a>
					<ul class="navbar-nav">
						<li class="nav-item"><a href="index.php" class="nav-link">BACK</a></li>
					</ul>
				</div>
			</nav>

		</div>
		<div class="card-body">

			<div class="card m-auto" style="width: 1080px;">
				<div class="card-header bg-warning">
					<h1 class="text-dark font-weight-bold">REGISTRATION</h1>
				</div>
				<div class="card-body">

					<form action="register.php" method="post">
					<?php
			                if (isset($errMSG)) {

			                    ?>
			                    <div class="form-group">
			                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
			                            <i class="fa fa-info-circle"></i> <?php echo $errMSG; ?>
			                        </div>
			                    </div>
			                    <?php
			                }
			                ?>

			            <div class="row">
			             	<div class="col-lg-6">
			             		<div class="form-group">
			             			<label for="fname" class="font-weight-bold">Firstname</label>
			             			<input type="text" class="form-control" placeholder="First Name" name="fname" id="fname" autocomplete="off" required>
			             			<h6 id="fnamecheck"></h6>
			             		</div>
			             	</div>
			             	<div class="col-lg-6">
			             		<div class="form-group">
			             			<label for="lname" class="font-weight-bold">Lastname</label>
			             			<input type="text" class="form-control " placeholder="Last Name" name="lname" id="lname" autocomplete="off" required>
			             			<h6 id="lnamecheck"></h6>
			             		</div>
			             	</div>
			            </div>

			            <div class="row">
			               	<div class="col-lg-6">
			               		<div class="form-group">
			               			<label for="email" class="font-weight-bold">Email</label>
									<input type="email" name="email" id="email" placeholder="Email" class="form-control" autocomplete="off" required>
									<h6 id="emailcheck"></h6>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="mobile" class="font-weight-bold">Mobile Number</label>
									<input type="text" name="mobile" id="mobile" placeholder="Mobile" class="form-control" autocomplete="off" required>
									<h6 id="mobilecheck"></h6>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="password" class="font-weight-bold">Password</label>
									<input type="password" name="password" id="password" placeholder="Password" class="form-control" autocomplete="off" required>
									<h6 id="passwordcheck"></h6>
								</div>
							</div>
							<div class="col-lg-6">
								<label for="cpassword" class="font-weight-bold">Confirm Password</label>
								<input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" autocomplete="off" required>
								<h6 id="cpasswordcheck"></h6>
							</div>
						</div>



						<div class="row">
			             	<div class="col-lg-4">
			             		<div class="form-group">
			             			<label class="font-weight-bold">Street / Area / Locality</label>
			             			<input type="text" name="address2" placeholder="Street / Area / Locality" class="form-control" required>
			             		</div>
			             	</div>
			             	<div class="col-lg-4">
			             		<label class="font-weight-bold">House No.</label>
			             		<input type="text" name="address1" placeholder="House No." class="form-control" required>
			             	</div>
			             	<div class="col-lg-4">
			             		<label class="font-weight-bold">Country</label>
			             		<input type="text" name="country" value = "India" class="form-control" disabled required>
			             	</div>
			            </div>

			            <div class="row">
			               	<div class="col-lg-4">
			               		<div class="form-group">
				               		<label class="font-weight-bold">State</label>
				               		<select class="form-control"  name="state" onchange="myfun(this.value)">
											<option>---Select State---</option>
											<?php
											$qry = "select * from state";
											$result = mysqli_query($con,$qry);
											while ($row = mysqli_fetch_array($result)) 
											{
											?>
												<option value="<?php echo $row['sid'];?>"><?php echo $row['name']; ?></option>
											<?php
											}

											?>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label class="font-weight-bold">District</label>
									<select class="form-control " name="district" id="dataget">
											<option>---Select District---</option>
											<?php
											$qry = "select * from district";
											$result = mysqli_query($con,$qry);
											while ($row = mysqli_fetch_array($result)) 
											{
											?>
												<option value="<?php echo $row['did'];?>"><?php echo $row['name']; ?></option>
											<?php
											}

											?>
									</select>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="zipcode" class="font-weight-bold">Zipcode</label>
									<input type="text" name="pincode" id="zipcode" placeholder="Zipcode" class="form-control" autocomplete="off" required>
									<h6 id="zipcodecheck"></h6>
								</div>
							</div>
						</div><br>

							<center>
								<button type="reset" class="btn btn-danger" style="width: 200px;">Clear</button>&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="submit" name="submit_btn" class="btn btn-success" style="width: 200px;">Register</button>
							</center><br>
					</form>
				</div>
			</div>

		</div>

		<div class="card-footer bg-warning">
			<div class="row" style="background-color: yellow; ">
					<div class="col-lg-4"><br>
						<center><h4><i class="fa fa-envelope"></i><br>Akashchoudhary19553@gmail.com</h4></center><br>
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


<script type="text/javascript">
	
function myfun(datavalue)
	{
		$.ajax({
			url: 'state.php',
			type: 'POST',
			data: { datapost : datavalue },

			success: function(result)
			{
				$('#dataget').html(result);
			}
		});
	}

	$(document).ready(function(){
		$('#fnamecheck').hide();
		$('#lnamecheck').hide();
		$('#emailcheck').hide();
		$('#passwordcheck').hide();
		$('#cpasswordcheck').hide();
		$('#mobilecheck').hide();

		var fname_err = true;
		var lname_err = true;
		var email_err = true ;
		var password_err = true ;
		var cpassword_err = true ;
		var mobile = true ;


		$('#fname').keyup(function(){
			fname_check();
		});

		function fname_check()
		{
			var fname_val = $('#fname').val();
			var fname_reg = /^[A-Za-z]*$/;
			if (fname_val.length=='') 
			{
				$('#fnamecheck').show();
				$('#fnamecheck').html("Enter Firstname");
				$('#fnamecheck').focus();
				$('#fnamecheck').css("color", "red");
				fname_err=false;
				return false;
			}
			else if (fname_val.length<3) 
			{
				$('#fnamecheck').show();
				$('#fnamecheck').html("Firstname should conatin atleast 3 charater");
				$('#fnamecheck').focus();
				$('#fnamecheck').css("color", "red");
				fname_err=false;
				return false;
			}
			else if (!fname_reg.test(fname_val)) 
			{
				$('#fnamecheck').show();
				$('#fnamecheck').html("Invalid Firstname");
				$('#fnamecheck').focus();
				$('#fnamecheck').css("color", "red");
				fname_err=false;
				return false;
			}
			else
			{
				$('#fnamecheck').hide();
			}
		}

		$('#lname').keyup(function(){
			lname_check();
		});

		function lname_check()
		{
			var lname_val = $('#lname').val();
			var lname_reg = /^[A-Za-z]*$/;
			if (lname_val.length=='') 
			{
				$('#lnamecheck').show();
				$('#lnamecheck').html("Enter Lastname");
				$('#lnamecheck').focus();
				$('#lnamecheck').css("color", "red");
				lname_err=false;
				return false;
			}
			else if (lname_val.length<3) 
			{
				$('#lnamecheck').show();
				$('#lnamecheck').html("Lastname should conatin atleast 3 charater");
				$('#lnamecheck').focus();
				$('#lnamecheck').css("color", "red");
				lname_err=false;
				return false;
			}
			else if (!lname_reg.test(lname_val)) 
			{
				$('#lnamecheck').show();
				$('#lnamecheck').html("Invalid Lastname");
				$('#lnamecheck').focus();
				$('#lnamecheck').css("color", "red");
				lname_err=false;
				return false;
			}
			else
			{
				$('#lnamecheck').hide();
			}
		}


		$('#email').keyup(function(){
			email_check();
		});

		function email_check()
		{
			var email_val = $('#email').val();
			var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/
			if (email_reg.test(email_val) && (email_val.length!=='')) 
			{
				$('#emailcheck').hide();
			}
			else 
			{
				$('#emailcheck').show();
				$('#emailcheck').html("Invalid Email Id");
				$('#emailcheck').focus();
				$('#emailcheck').css("color", "red");
				email_err=false;
				return false;
			}
		}


		$('#mobile').keyup(function(){
			mobile_check();
		});

		function mobile_check()
		{
			var mobile_val = $('#mobile').val();
			var mobile_reg = /^[789][0-9]{9}$/;
			if (mobile_val.length=='') 
			{
				$('#mobilecheck').show();
				$('#mobilecheck').html("Please Enter the Mobile");
				$('#mobilecheck').focus();
				$('#mobilecheck').css("color", "red");
				mobile_err=false;
				return false;
			}
			else if (mobile_val.length>10) 
			{
				$('#mobilecheck').show();
				$('#mobilecheck').html("Mobile Number is greater than 10 digit");
				$('#mobileheck').focus();
				$('#mobilecheck').css("color", "red");
				mobile_err=false;
				return false;
			}
			else if (!mobile_reg.test(mobile_val)) 
			{
				$('#mobilecheck').show();
				$('#mobilecheck').html("Mobile Number is Invalid");
				$('#mobilecheck').focus();
				$('#mobilecheck').css("color", "red");
				mobile_err=false;
				return false;
			}
			else
			{
				$('#mobilecheck').hide();
			}

		}


		$('#password').keyup(function(){
			password_check();
		});

		function password_check()
		{
			var password_val = $('#password').val();
			var password_reg = /(?=^.{6,10}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?!.*\s).*$/;

			if (password_val.length=='') 
			{
				$('#passwordcheck').show();
				$('#passwordcheck').html("Please Enter Password");
				$('#passwordcheck').focus();
				$('#passwordcheck').css("color", "red");
				password_err=false;
				return false;	
			}
			else if (!password_reg.test(password_val)) 
			{
				$('#passwordcheck').show();
				$('#passwordcheck').html("Password must be between 6 to 10 and contain Special Charater Uppercase Lowercase Number");
				$('#passwordcheck').focus();
				$('#passwordcheck').css("color", "red");
				password_err=false;
				return false;
			}
			else
			{
				$('#passwordcheck').hide();
			}
		}

		$('#cpassword').keyup(function(){
			cpassword_check();
		});

		function cpassword_check()
		{
			var cpassword_val = $('#cpassword').val();
			var password_val = $('#password').val();

			if (cpassword_val != password_val) 
			{
				$('#cpasswordcheck').show();
				$('#cpasswordcheck').html("Confirm Password not Match");
				$('#cpasswordcheck').focus();
				$('#cpasswordcheck').css("color", "red");
				cpassword_err=false;
				return false;
			}
			else
			{
				$('#cpasswordcheck').hide();
			}
		}

		$('#zipcode').keyup(function(){
			zipcode_check();
		});

		function zipcode_check()
		{
			var zipcode_val = $('#zipcode').val();
			var zipcode_reg = /^[0-9]{6,6}$/
			if (zipcode_val.length=='') 
			{
				$('#zipcodecheck').show();
				$('#zipcodecheck').html("Enter Zipcode ");
				$('#zipcodecheck').focus();
				$('#zipcodecheck').css("color", "red");
				zipcode_err=false;
				return false;
			}
			else if(!zipcode_reg.test(zipcode_val)) 
			{
				$('#zipcodecheck').show();
				$('#zipcodecheck').html("Invalid Zipcode ");
				$('#zipcodecheck').focus();
				$('#zipcodecheck').css("color", "red");
				zipcode_err=false;
				return false;
			}
			else
			{
				$('#zipcodecheck').hide();
			}
		}


		$('#submitbtn').click(function(){
			email_err = true ;
			password_err = true ;
			cpassword_err = true ;

			email_check();
			password_check();
			cpassword_check();
			if ((email_err==true) && (password_err==true) && (cpassword_err==true)) 
			{
				return true;
			}
			else
			{
    			return false
			}
		});

	});



</script>
</div>
</body>
</html>
