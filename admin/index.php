<?php include ("header.php");?>
<?php include ("navbar.php");?>
<?php

if(!isset($_SESSION['admin_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
<body>
<br/>
<div class="container-fluid text-center">
<div class="container " style="margin-top:160px;">
        <h1>Dear Admin  <strong class="text-success"><?php echo ($_SESSION['admin_username']); ?>! </strong></h1>
		
        <h1>Welcome to Admin panel of  <strong class="text-success">SMART HR MANAGER</strong></h1>
		<h3>you can keep track all of your employee's records here</h3>
        </div>

</div>

</div>

</body>
</html>
<?php } ?>