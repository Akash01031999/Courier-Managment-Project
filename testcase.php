<?php
function validate_email($email)
{
return eregi("^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]    {2,6}$", $email);
}

function validate_mobile($mobile)
{
  return eregi("/^[0-9]*$/", $mobile);
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
<div class="form-group">
<span class="help-block text-danger">*</span>
<label class="control-label"><i class="fa fa-envelope"></i> E-mail &nbsp;
</label><span class="help-block text-danger" id="error">Use Email-ID as a Username</span>
<input type="email" name="email" id="emailaddrID" class="form-control form-control-sm">
</div>
<div class="form-group">
<span class="help-block text-danger">*</span>
<label class="control-label"><i class="fa fa-mobile"></i> Mobile</label>
<div id="error"></div>
<input type="text" name="mobile" class="form-control form-control-sm">
</div>
<div class="form-group">
<span class="help-block text-danger">*</span>
<button type="submit" value="submit" name="mobile" class="form-control form-control-sm" id="validate">submit</button>
</div>
</body>
