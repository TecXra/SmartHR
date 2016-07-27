<?php include ("header.php");?>
<?php include ("navbar.php");?>
<?php

if(!isset($_SESSION['admin_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
  <body>
      <!-- left column -->

<?php
include("../connect.php");

//$employeeUsername=$_SESSION['emp_username'];

 @$employeeId=$_GET['id'];

$query = mysql_query("SELECT * FROM employee where emp_id='$employeeId' ");

while ($row=mysql_fetch_array($query)){
	$employeeId1 = $row['emp_id'];
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
	
//house rent is 15% of basic salary
$house_rent = (0.15 * $employeeBasicSalary);


//transport is 10% of basic salary
$transport = (0.10 * $employeeBasicSalary);	


//utility allownce is 10% of basic salary
$utility = (0.10 * $employeeBasicSalary);	


//tax is 9% of basic salary
$tax = (0.09 * $employeeBasicSalary);




$total = ($employeeBasicSalary + $house_rent + $transport + $utility - $tax);	
	
	
?>

<div class="container">
    <h1 class="text-center">Adding Salary Of Employee <?php echo $employeeFirstName; ?></h1>
  	<hr>
	<div class="row">



<form method="post" action="add_salary.php" class="form-horizontal" role="form" enctype="multipart/form-data">
          
		  
		  <input type="hidden" id="salary_id" name="salary_id" value="<?php echo $employeeId1; ?>" >
          
		  
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
              <input class="form-control" id="houseRent" name="houseRent" type="text" value="<?php echo $house_rent; ?>" readonly>
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
              <button type="submit" id="submit" name="submit" class="btn btn-info">Add Salary</button>
              <span></span>
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
		
	</div>
  </div>
</body>
</html>
<?php

if(isset($_POST['submit'])){            
	 $employeeId = $_POST['salary_id'];
	 $employeeFirstName = $_POST['employeeFirstName'];
	 $employeeLastName = $_POST['employeeLastName'];
	 //$employeeUserName = $_POST['employeeUserName'];
	 //$employeeImage = $_FILES['employeeImage']['name'];
	 //$employeeImage_tmp = $_FILES['employeeImage']['tmp_name'];
	 $employeeDesignation = $_POST['employeeDesignation'];
	 $employeeBasicSalary = $_POST['employeeBasicSalary'];
	 $HouseRent = $_POST['houseRent'];
	 $transport = $_POST['transport'];
	 $utility = $_POST['utility'];
	 $tax = $_POST['tax'];
	 $total = $_POST['total'];
	 //$employeeCPassword = $_POST['employeeCPassword'];
	
	
	
	$query = "SELECT * FROM salary WHERE emp_id = '$employeeId' AND month(salary_date) = month(now())";
	$result = mysql_query($query);
	//$row_usercheck = mysql_fetch_assoc($result);
	$num = mysql_num_rows($result);
	if($num>0)
		{
			echo'<div class="alert alert-warning alert-dismissible text-center" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>Warning!! </strong> '.$employeeFirstName.'\'s Salary  Has Been Added For This Month  </div>';
		}
	
	else
	
		{
			$qry = "INSERT INTO salary (emp_id, emp_fname, emp_lname, designation, basic_salary, house_rent, transport, utility, tax_deductions, total)			VALUES ('$employeeId', '$employeeFirstName', '$employeeLastName', '$employeeDesignation', '$employeeBasicSalary', '$HouseRent', '$transport', 		'$utility', '$tax', $total)";
			$query = mysql_query($qry);
			//header('Location:print.php');
			if($query){
      
	  
			 echo "<div class='text-center text-success'>
			 <h1>Salary Has Been Added!!</h1>
			 </div>";
		 }

		}

}

?>



  
<?php

}
?>		
		
		