<?php include ("header.php");?>
<?php include ("navbar.php");?>
<?php

if(!isset($_SESSION['admin_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php
					include("../connect.php");
  
?>
						<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
										    <th>Sr No:</th>  
											<th>First Name</th>
											<th>Last Name</th>
											<th>Image</th>
											<th>Designation</th>
											<th>Basic Salary</th>
											<th>Contact Number</th>
											<th>Address</th>
											<th>Date Of Birth</th>
											<th>Email</th>
											<th>View Profile</th>
											<th>Delete</th>
											<th>Edit</th>
											
										</tr>
									</thead>
<?php									
$i=1;
if(isset($_GET['view'])){
	$query = "select * from employee ";
	$run =mysql_query($query);
	while($row=mysql_fetch_array($run)){
	$employeeId = $row['emp_id'];	
    $employeeFirstName = $row['emp_fname'];
	$employeeLastName = $row['emp_lname'];
	$employeeImage =$row['emp_img'];
	$employeeDesignation = $row['emp_designation'];
	$employeeBasicSalary = $row['emp_basic_salary'];
	$employeeContactNumber = $row['emp_contact_num'];
	$employeeAddress = $row['emp_address'];
	$employeeDob = $row['emp_dob'];
	$employeeEmail = $row['emp_email'];
	//$employeeUsername = $row['emp_uname'];
	//$employeePassword = $row['emp_password'];
				
					?>
									
					<tbody>
						<tr>
						         
								<td>
								<?php echo $i++; ?>
								</td>
								<td>
									<?php echo $employeeFirstName; ?>
								</td>
								<td>
									<?php echo $employeeLastName; ?>
								</td>
								<td>
									<img src="../employee/emp_images/<?php echo $employeeImage; ?>" class="img-circle" alt="<?php echo $employeeImage; ?>" width="80" height="80" >
								</td>
								<td>
									<?php echo $employeeDesignation; ?>
								</td>
								<td>
									<?php echo $employeeBasicSalary; ?>
								</td>
								<td>
									<?php echo $employeeContactNumber; ?>
								</td>
								<td>
									<?php echo $employeeAddress; ?>
								</td>
								<td>
									<?php echo $employeeDob; ?>
								</td>
								<td>
									<?php echo $employeeEmail; ?>
								</td>
								<td>
								<a href='emp_profile.php?id=<?php echo $employeeId;?>'><input type='button' value='Profile'data-toggle="tooltip" data-placement="top" title="View Profile" class='btn btn-info'/></a>
								</td>
								<td>
								<a href='delete_employee.php?id=<?php echo $employeeId;?>'><input type='button' value='Delete'data-toggle="tooltip" data-placement="top" title="Delete Employee" class='btn btn-info'/></a>
								</td>
								<td>
								<a href='edit_employee.php?id=<?php echo $employeeId;?>'><input type='button' value='Update'data-toggle="tooltip" data-placement="top" title="Update Employee's Data" class='btn btn-info'/></a>
								</td>
								
							</tr>
					</tbody>
				<?php
}}
					echo"</table>";
				?>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
<?php } ?>	