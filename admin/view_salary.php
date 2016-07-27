<?php include ("header.php");?>
<?php include ("navbar.php");?>
<?php

if(!isset($_SESSION['admin_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
  <body>
<?php
include("../connect.php");

//$employeeUsername=$_SESSION['emp_username'];

$employeeId=$_GET['id'];
$query = mysql_query("SELECT * FROM salary where emp_id='$employeeId' ");

while ($row=mysql_fetch_array($query)){
	
	$employeeFirstName = $row['emp_fname'];
	$employeeLastName = $row['emp_lname'];
	//$employeeImage =$row['emp_img'];
	$employeeDesignation = $row['designation'];
	$employeeBasicSalary = $row['basic_salary'];
	$houseRent = $row['house_rent'];
	$transport = $row['transport'];
	$utility = $row['utility'];
	$tax = $row['tax_deductions'];
	$total = $row['total'];
    $salaryDate = $row['salary_date'];
	//$employeeUsername = $row['emp_uname'];
	//$employeePassword = $row['emp_password'];
	

?>

<div class="container">
<h1 class="text-center"><?php echo $employeeFirstName."'s";?> Salary</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      
      <!-- edit form column -->
        
        <form method="post" action="add_salary.php" class="form-horizontal" role="form" enctype="multipart/form-data">
          
		  
		<!--  <input type="hidden" id="salary_id" name="salary_id" value="<?php echo $employeeId1; ?>" -->
          
		  <div class="form-group">
            <label class="col-lg-3 control-label">Salary Added On:</label>
            <div class="col-lg-8">
              <input class="form-control" id="salaryDate" name="salaryDate" type="text" value="<?php echo $salaryDate; ?>" readonly>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeFirstName" name="employeeFirstName" type="text" value="<?php echo $employeeFirstName; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeLastName" name="employeeLastName" type="text" value="<?php echo $employeeLastName; ?>" readonly>
            </div>
          </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Designation:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeDesignation" name="employeeDesignation" type="text" value="<?php echo $employeeDesignation; ?>" readonly>
            </div>
          </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Basic Salary:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeBasicSalary" name="employeeBasicSalary" type="text" value="<?php echo $employeeBasicSalary; ?>" readonly>
            </div>
          </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">House Rent Allowance:</label>
            <div class="col-md-8">
              <input class="form-control" id="houseRent" name="houseRent" type="text" value="<?php echo $houseRent; ?>" readonly>
            </div>
          </div>
		  
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Transport Allowance:</label>
            <div class="col-md-8">
              <input class="form-control" id="transport" name="transport" type="text" value="<?php echo $transport; ?>" readonly>
            </div>
          </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Utility Bills Allowance:</label>
            <div class="col-md-8">
              <input class="form-control" id="utility" name="utility" type="text" value="<?php echo $utility; ?>" readonly>
            </div>
          </div>  
		 
          <div class="form-group">
            <label class="col-md-3 control-label">Tax Deductions:</label>
            <div class="col-md-8">
              <input class="form-control" id="tax" name="tax" type="text" value="<?php echo $tax; ?>" readonly>
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Total Salary:</label>
            <div class="col-md-8">
              <input class="form-control" id="total" name="total" type="text" value="<?php echo $total; ?>" readonly>
            </div>
          </div>
		  
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <a href="salary.php?view_emp=view_emp"><button type="button" id="submit" name="submit" class="btn btn-primary">Go Back</button></a>
              <span></span>
			  
			  
              
            </div>
          </div>
<?php } ?>  
        </form>
<?php } ?>