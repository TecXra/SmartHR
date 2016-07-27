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
    <h1 class="text-center">Employee Registration</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      
<?php
include("../connect.php");

if(isset($_POST['submit'])){
	
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
		 
		 $query = mysql_query("INSERT INTO employee VALUES ('','$employeeFirstName','$employeeLastName','$employeeUserName','$employeeImage','$employeeDesignation','$employeeBasicSalary','$employeeContactNumber','$employeeAddress','$employeeDob','$employeeEmail','$employeePassword')");
	     
		 if($query){
      
	  
			 echo "<div class='text-center text-success'>
			 <h1>Employee Has Been Registered!!</h1>
			 </div>";
		 }
?>
<hr/>
<?php	 
	 }
	 else
	 {
		 echo "<script>alert('your passwords dont match!!')</script>";
	 }
}


?>






      
	  
	  
      <!--  form column -->
      
        
        <h2><b>Personal info</b></h2>
        <form method="post" action="emp_registration.php" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeFirstName" name="employeeFirstName" type="text" placeholder="First Name" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeLastName" name="employeeLastName" type="text" placeholder="Last Name" required>
            </div>
          </div>
		  
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeUserName" name="employeeUserName" type="text" placeholder="User Name" required>
            </div>
          </div>
		  
		  <div class="form-group">
		    <label class="col-md-3 control-label">User Image:</label>
			<div class="col-md-8">
           <input type="file" class="form-control" id="employeeImage" name="employeeImage" required>
		   </div>
	      </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Designation:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeDesignation" name="employeeDesignation" type="text" placeholder="Designation" required>
            </div>
          </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Basic Salary:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeBasicSalary" name="employeeBasicSalary" type="text" placeholder="Employee Basic Salary" required>
            </div>
          </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Contact Number:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeContactNumber" name="employeeContactNumber" type="text" placeholder="Contact Number" required>
            </div>
          </div>
		  
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Address:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeAddress" name="employeeAddress" type="text" placeholder="Address" required>
            </div>
          </div>
		  
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Date Of Birth:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeDob" name="employeeDob" type="date" placeholder="Date Of Birth" required>
            </div>
          </div>   
         
		 
		 
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeEmail" name="employeeEmail" type="email" placeholder="example@gmail.com" required>
            </div>
          </div>
          
		 
		 
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeePassword" name="employeePassword" type="password" placeholder="password" required>
            </div>
          </div>
		  
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeCPassword" name="employeeCPassword" type="password" placeholder="confirm password">
            </div>
          </div>
		  
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" id="submit" name="submit" class="btn btn-info">Register</button>
              <span></span>
              <input type="reset" class="btn btn-primary" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>

<hr>
</body>
</html>
<?php } ?>