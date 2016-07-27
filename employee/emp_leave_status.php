<?php include ("header.php");?>
<?php include ("../navbar.php");?>
<?php

if(!isset($_SESSION['emp_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
<body>
	<div class="container-fluid">	
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-2 col-md-offset-1">
						<h1>Sick Leave</h1>
					</div>
				</div>
					<br/>
				
			<div class = "col-md-10 col-md-offset-1">
					<?php
					include("../connect.php");
						//this codes is that all the approve will go to the approve submenu
						$sql = "SELECT * FROM employee, leaves, admin_approve
									WHERE employee.emp_id = leaves.emp_id 
									AND admin_approve.admin_approve = leaves.admin_approve
									AND leaves.leave_id = '$_GET[id]'";
						$qry=mysql_query($sql);
						$rec=mysql_fetch_array($qry)
					?>
				<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee First Name</th>
											<th>Employee Last Name</th>
											<th>Leave Type</th>
											<th>Leave Duration</th>
											<th>Total Leave Days</th>
											<th>Status</th>
										</tr>
									</thead>
					<tbody>
						<tr>
								<td>
									<?php echo $rec['emp_fname']; ?>
								</td>
								<td>
									<?php echo $rec['emp_lname']; ?>
								</td>
								<td>
									<?php echo $rec['leave_type']; ?>
								</td>
								<td>
									&nbsp <strong><?php echo $rec['start_date'];?></strong> &nbsp to &nbsp <strong><?php echo $rec['end_date'];?></strong>
								</td>
								<td>
									<?php echo $rec['no_days']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat']; ?>
								</td>
							</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4 col-md-offset-1">
					<a href="emp_leave_track.php"><input type = "button" value="Back" class="btn btn-default"/></a>
			</div>
	</div>
<?php } ?>