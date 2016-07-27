<?php include ("header.php");?>
<?php include ("navbar.php");?>
<?php

if(!isset($_SESSION['admin_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
<body>
	<div class="container-fluid">
			<div class="row" style="margin-top: 50px;">
				<div class="col-md-4"></div>
				
					<div class="col-md-8 ">
						<h2>Employee Leave Denied</h2>
					
				</div>
			</div>
			<?php
include("../connect.php");

$select = "SELECT * FROM leaves, employee
									WHERE leaves.emp_id = employee.emp_id AND leaves.leave_id='$_GET[id]'";
					$qry=mysql_query($select);
				?>
				<?php
					while($rec = mysql_fetch_array($qry))
					{
				?>
				
					<div class="col-md-12" style="margin-top:40px">
						<div class="col-md-4 col-md-offset-4">				
										Employee Designation: &nbsp <strong><?php echo $rec['emp_designation'];?></strong>&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Date: &nbsp <strong><?php echo $rec['date']; ?></strong><hr/>
										Full Name: &nbsp <strong><?php echo $rec['emp_fname'];?> <style="margin-left: 20px;"/><?php echo $rec['emp_lname'];?></strong><hr/>
										Leave Type: &nbsp <strong><?php echo $rec['leave_type'];?></strong><hr/>
										Leave Duration: &nbsp <strong><?php echo $rec['start_date'];?></strong> &nbsp to &nbsp <strong><?php echo $rec['end_date'];?></strong><hr/>
										Total Days Leave: &nbsp <strong><?php echo $rec['no_days'];?></strong><hr/>
						</div>
						<div class="col-md-8 col-md-offset-4">
								<a href="accept.php?id=<?php echo $rec['leave_id'];?>"><input type='button' value='Approve' class='btn btn-info'/></a>
								<a href="emp_leave_deny.php"><input type = "button" value="Back" class="btn btn-default"/></a>
						</div>
					</div>
				<?php
					}
				?>
		</div>
<?php } ?>