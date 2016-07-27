<?php include ("header.php");?>
<?php include ("navbar.php");?>
<?php

if(!isset($_SESSION['admin_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
<body>
<div class="container">
    <h1>Update Employee's Data</h1>
  	<hr>
	<div class="row">

<?php
include("../connect.php");

//$employeeUsername=$_SESSION['emp_username'];

@$employeeId=$_GET['id'];

$query = mysql_query("SELECT * FROM employee where emp_id='$employeeId' ");

while ($row=mysql_fetch_array($query)){
	$employeeId1 = $row['emp_id'];
	$employeeFirstName = $row['emp_fname'];
	$employeeLastName = $row['emp_lname'];
	$employeeUserName = $row['emp_uname'];
	$employeeImage =$row['emp_img'];
	$employeeDesignation = $row['emp_designation'];
	$employeeBasicSalary = $row['emp_basic_salary'];
	$employeeContactNumber = $row['emp_contact_num'];
	$employeeAddress = $row['emp_address'];
	$employeeDob = $row['emp_dob'];
	$employeeEmail = $row['emp_email'];
	$employeeUsername = $row['emp_uname'];
	$employeePassword = $row['emp_password'];
	

?>
<form method="post" action="edit_employee.php" class="form-horizontal" role="form" enctype="multipart/form-data">
          <input type="hidden" id="update_id" name="update_id" value="<?php echo $employeeId1; ?>"> 
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeFirstName" name="employeeFirstName" type="text" value="<?php echo $employeeFirstName; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeLastName" name="employeeLastName" type="text" value="<?php echo $employeeLastName; ?>">
            </div>
          </div>
		  
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeUserName" name="employeeUserName" type="text" value="<?php echo $employeeUserName; ?>">
            </div>
          </div>
		  
		  <div class="form-group">
		    <label class="col-md-3 control-label">User Image:</label>
			<div class="col-md-8">
           <input type="file" class="form-control" id="employeeImage" name="employeeImage"  required><img src="../employee/emp_images/<?php echo $employeeImage; ?>" class="img" alt="<?php echo $employeeImage; ?>" width="180" height="80" >
		   </div>
	      </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Designation:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeDesignation" name="employeeDesignation" type="text" value="<?php echo $employeeDesignation; ?>">
            </div>
          </div>
	
	
<div class="form-group">
            <label class="col-md-3 control-label">Basic Salary:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeBasicSalary" name="employeeBasicSalary" type="text" value="<?php echo $employeeBasicSalary; ?>">
            </div>
          </div>

		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Contact Number:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeContactNumber" name="employeeContactNumber" type="text" value="<?php echo $employeeContactNumber; ?>">
            </div>
          </div>
		  
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Address:</label>
            <div class="col-md-8">                                            
              <input class="form-control" id="employeeAddress" name="employeeAddress" type="text" value="<?php echo $employeeAddress; ?>">
            </div>
          </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Date Of Birth:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeDob" name="employeeDob" type="date" value="<?php echo $employeeDob; ?>">
            </div>
          </div>   
         
		 
		 
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeEmail" name="employeeEmail" type="email" value="<?php echo $employeeEmail; ?>">
            </div>
          </div>
          
		 
		 
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeePassword" name="employeePassword" type="password" value="<?php echo $employeePassword; ?>">
            </div>
          </div>
		  
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeCPassword" name="employeeCPassword" type="password" value="<?php echo $employeePassword; ?>">
            </div>
          </div>
		  
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" id="update" name="update" class="btn btn-info">Update</button>
              <span></span>
              <a href="view_employees.php?view=view"><button type="button" id="submit" name="submit" class="btn btn-primary">Cancel</button></a>
            </div>
          </div>
		  <?php } ?>
        </form>
      </div>
  </div>

<hr>
</body>
</html>
<?php

if(isset($_POST['update'])){
	 $employeeUpdateId = $_POST['update_id'];
	 $employeeFirstName = $_POST['employeeFirstName'];
	 $employeeLastName = $_POST['employeeLastName'];
	 $employeeUserName = $_POST['employeeUserName'];
	 $employeeImage = $_FILES['employeeImage']['name'];
	 $employeeImage_tmp = $_FILES['employeeImage']['tmp_name'];
	 $employeeDesignation = $_POST['employeeDesignation'];
	 $employeeBasicSalary = $_POST['employeeBasicSalary'];
	 $employeeContactNumber = $_POST['employeeContactNumber'];
	 $employeeAddress = $_POST['employeeAddress'];
	 $employeeDob = $_POST['employeeDob'];
	 $employeeEmail = $_POST['employeeEmail'];
	 $employeePassword = $_POST['employeePassword'];
	 $employeeCPassword = $_POST['employeeCPassword'];
	 
	 if($employeePassword==$employeeCPassword){
		 
		 
		 move_uploaded_file($employeeImage_tmp,"../employee/emp_images/$employeeImage");
		 
		 
		 
		 
		 $query = mysql_query("update employee set emp_fname= '$employeeFirstName',emp_lname='$employeeLastName',emp_uname='$employeeUserName',emp_img='$employeeImage',emp_designation='$employeeDesignation',emp_basic_salary='$employeeBasicSalary',emp_contact_num='$employeeContactNumber',emp_address='$employeeAddress',emp_dob='$employeeDob',emp_email='$employeeEmail',emp_password='$employeePassword' where emp_id='$employeeUpdateId'");
	     
		 if($query){
      
	  
			 echo "<div class='text-center text-success'>
			 <h1>Employee Has Been Updated!!</h1>
			 </div>";
		 }
?>
<hr/>
<?php	 
	 }
	 else
	 {
		 
		 echo '<div class="container-fluid">
								<div class="row">
									<div class="col-md-4 col-md-offset-4">
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												×</button>
										   <span class="glyphicon glyphicon-ok"></span> <strong>Warning!</strong>
											<hr class="message-inner-separator">
											<p><strong>Error!!</strong> Passwords Dont Match !
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<a href="edit_employee.php?id='.$employeeUpdateId.'"><button type="button" class="btn btn-success">Go Back</button></a>
											</p>
										</div>
									</div>
								</div>
							</div>';
	 }
}

}
?>


