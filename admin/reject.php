<?php include ("header.php");?>
<?php include ("navbar.php");?>
<?php

if(!isset($_SESSION['admin_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>

<?php
include("../connect.php");


$query = mysql_query("UPDATE leaves SET admin_approve='3' where leave_id='$_GET[id]'");
if($query){
echo'<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×</button>
							<span class="glyphicon glyphicon-remove"></span> <strong>Done!</strong>
							<hr class="message-inner-separator">
						<p><strong>Employee Leave Denied!!</strong></p><br>
						<div class="col-md-offset-9">
							<a href="emp_leave_deny.php"><button type="button" class="btn btn-success">Continue</button></a>
						</div>
					</div>
			</div>
		</div>
	</div>';
	
}}?>