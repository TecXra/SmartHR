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

$query = mysql_query("SELECT * FROM employee where emp_id='$employeeId' ");

while ($row=mysql_fetch_array($query)){
	
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

<div class="container">
<h1><?php echo $employeeFirstName."'s";?> Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-4">
        <div class="text-center">
          <img src="../employee/emp_images/<?php echo $employeeImage; ?>" class="img-circle" alt="<?php echo $employeeImage; ?>" width="400" height="400" >
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-8 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control"  type="text" value="<?php echo $employeeFirstName; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $employeeLastName; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Designation:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $employeeDesignation; ?>">
            </div>
          </div>
		 
		  <div class="form-group">
            <label class="col-lg-3 control-label">Basic Salary:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $employeeBasicSalary; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $employeeEmail; ?>">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label">Contact Number:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="<?php echo $employeeContactNumber; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $employeeAddress; ?>">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Birth Date:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $employeeDob; ?>">
            </div>
          </div>
<?php } ?>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <a href="view_employees.php?view=view"><button type="button" id="submit" name="submit" class="btn btn-primary">Go Back</button></a>
              <span></span>
			  
			  
              
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
</body>
</html>
<?php } ?>