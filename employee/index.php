<?php include ("../header.php");?>
<?php include ("../navbar.php");?>

<?php

if(!isset($_SESSION['emp_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
<body>
<br/>
<div class="container-fluid text-center">
<div class="container " style="margin-top:160px;">
        <h1>Dear <strong class="text-success"><?php echo ($_SESSION['emp_username']); ?>! </strong></h1>
		
        <h1>Welcome to <strong class="text-success">SMART HR MANAGER</strong></h1>
		<h3>you can keep track your all records here</h3>
        </div>

</div>

</div>

</body>
</html>
<?php } ?>