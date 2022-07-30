<?php

require 'dbcon.php';

$nameid = $_POST['datapost'];

$qry = "select * from district where sid ='$nameid' ";

$result = mysqli_query($con,$qry);

while ($row = mysqli_fetch_array($result)) 
	{
?>
		<option><?php echo $row['name']; ?></option>
<?php
	
	}

?>