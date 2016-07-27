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
											<th>Designation</th>
											<th>Basic Salary</th>
											<th>Add Salary</th>
											<th>View Salary</th>
										</tr>
									</thead>
<?php									
$i=1;
if(isset($_GET['view_emp'])){
	$query = "select * from employee ";
	$run =mysql_query($query);
	while($row=mysql_fetch_array($run)){
	$employeeId = $row['emp_id'];	
    $employeeFirstName = $row['emp_fname'];
	$employeeLastName = $row['emp_lname'];
	//$employeeImage =$row['emp_img'];
	$employeeDesignation = $row['emp_designation'];
	$employeeBasicSalary = $row['emp_basic_salary'];
	//$employeeContactNumber = $row['emp_contact_num'];
	//$employeeAddress = $row['emp_address'];
	//$employeeDob = $row['emp_dob'];
	//$employeeEmail = $row['emp_email'];
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
									<?php echo $employeeDesignation; ?>
								</td>
								<td>
									<?php echo $employeeBasicSalary; ?>
								</td>
								<td>
								<a href='add_salary.php?id=<?php echo $employeeId;?>'><input type='button' value='Add Salary'data-toggle="tooltip" data-placement="top" title="View to Add Salary" class='btn btn-info'/></a>
								</td>
								<td>
								<a href='view_salary.php?id=<?php echo $employeeId;?>'><input type='button' value='View Salary'data-toggle="tooltip" data-placement="top" title="View Employee's Salary" class='btn btn-info'/></a>
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