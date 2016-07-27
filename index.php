<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart HR</title>
	<link rel="shortcut icon" href="images/hrlogo.png">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="js2/bootstrap.js"></script>
    <script src="js2/bootstrap.min.js"></script>   
	   <script src="js2/jquery.js"></script> 
    <script src="js2/bootstrap.min2.js"></script>  	   
<script src="js2/jquery.min.js"></script><body>

<style>
	body {
	margin-top: 50px;
	margin-bottom: 50px;
			
	background: url('images/background2.jpg') no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	}
</style>	
  </head>
<body>


	<div class="container-fluid">
	
	
<div class="container">


<?php
include("connect.php");
if(isset($_POST['emp_submit'])){
	
	$emp_username = $_POST['emp_username'];
	$emp_password = $_POST['emp_password'];
	
	$login_query = mysql_query("SELECT * FROM employee where emp_uname='$emp_username' AND emp_password='$emp_password'");
	
	if(mysql_num_rows($login_query)>0){
		
		//creating session of user name's input field.
		$_SESSION['emp_username']=$emp_username;
		echo "<script>window.open('employee/index.php','_self')</script>";
	}
	else{
		echo'<div class="alert alert-warning alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		<strong>Warning!</strong> Username or password is incorrect! </div>';
	}
	
}
if(isset($_POST['admin_submit'])){
	
	$admin_username = $_POST['admin_username'];
 	$admin_password = $_POST['admin_password'];

	
	$login_query = mysql_query("SELECT * FROM admin_login where admin_user_name='$admin_username' AND admin_password='$admin_password'");
	
	if(mysql_num_rows($login_query)>0){
		
		//creating session of user name's input field.
		$_SESSION['admin_username']=$admin_username;
		echo "<script>window.open('admin/index.php','_self')</script>";
	}
	else{
		echo'<div class="alert alert-warning alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		<strong>Warning!</strong>Admin Username or password is incorrect! </div>';
	}
	
}

?>

		<div class="row">
		
			<div class="col-md-6" style = "margin-top:110px;">
				<div class="panel panel-default">
				   <div class="page-header">
					  <h1 style = "margin-left:50px;">Employee <small>Login</small></h1>
					</div>
					<div class="panel-body">
						<form method="post" action="index.php" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-1 control-label"></label>
								<div class="col-sm-10">
									<input type="text" id="emp_username" name="emp_username" class="form-control" placeholder="Username" required >
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-1 control-label"></label>
								<div class="col-sm-10">
									<input type="password" id="emp_password" name="emp_password" class="form-control" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group last">
								<div class="col-sm-offset-1 col-sm-9">
									<button type="submit" id="emp_submit" name="emp_submit" class="btn btn-primary">Sign in</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6" style = "margin-top:110px;">
				<div class="panel panel-default">
				   <div class="page-header">
					  <h1 style = "margin-left:50px;">Administrator <small>Login</small></h1>
					</div>
					<div class="panel-body">
						<form method="post" action="index.php" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-1 control-label"></label>
								<div class="col-sm-10">
									<input type="text" id="admin_username" name="admin_username" class="form-control" placeholder="Username" required >
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-1 control-label"></label>
								<div class="col-sm-10">
									<input type="password" id="admin_password" name="admin_password" class="form-control" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group last">
								<div class="col-sm-offset-1 col-sm-9">
									<button type="submit" id="admin_submit" name="admin_submit" class="btn btn-danger">Sign in</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
</body>
</html>
