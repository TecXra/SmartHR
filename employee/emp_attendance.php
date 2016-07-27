<?php include ("header.php");?>
<?php include ("../navbar.php");?>
<?php

if(!isset($_SESSION['emp_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
<?php
include("../connect.php");

$employeeUsername=$_SESSION['emp_username'];

$query = mysql_query("SELECT * FROM employee where emp_uname='$employeeUsername' ");

while ($row=mysql_fetch_array($query)){
	$employeeId = $row['emp_id'];
	$employeeFirstName = $row['emp_fname'];
	$employeeLastName = $row['emp_lname'];
	//$employeeImage =$row['emp_img'];
	$employeeDesignation = $row['emp_designation'];
	//$employeeBasicSalary = $row['emp_basic_salary'];
	//$employeeContactNumber = $row['emp_contact_num'];
	//$employeeAddress = $row['emp_address'];
	//$employeeDob = $row['emp_dob'];
	$employeeEmail = $row['emp_email'];
	//$employeeUsername = $row['emp_uname'];
	//$employeePassword = $row['emp_password'];
	

?>

<body>
<div class="container">
    <h1>Employee's Attendance</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      
      
      <!--  form column -->
      
        
        <h2><b>Mark Your Attendence Here!!</b></h2>
		<br/>
        <form method="post" action="emp_attendance.php" accept-charset="utf-8"  class="form-horizontal" role="form" >
		
		
            <div class="form-group">
                  <label class="col-lg-3 control-label"><i class="fa fa-calendar"></i> Current Date:</label>
              <div class="col-lg-8 input-group">
                <input type="date" name="employeeAttendanceDate" class="form-control" placeholder="YYYY/mm/dd" id="employeeAttendanceDate" required="">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div> </div><br/><hr/>
		  
		  
		  <input type="hidden" name="employeeId" value="<?php echo $employeeId; ?>"/>
		  
          <div class="form-group">
            <label class="col-lg-3 control-label">Employee's name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeFirstName" name="employeeFirstName" type="text" value="<?php echo $employeeFirstName.'&nbsp;'.$employeeLastName; ?>" >
            </div>
          </div>
          
		  
		  <div class="form-group">
            <label class="col-md-3 control-label">Employee's Designation:</label>
            <div class="col-md-8">
              <input class="form-control" id="employeeDesignation" name="employeeDesignation" type="text" value="<?php echo $employeeDesignation; ?>" >
            </div>
          </div>
		  
		  
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" id="employeeEmail" name="employeeEmail" type="email" value="<?php echo $employeeEmail; ?>" required>
            </div>
          </div>
		  
		  
		  <label class="col-lg-3 control-label">Mark Attendance:</label>
		<input type="hidden" name="" value=""/>
					<div class="form-group">
				<select name="attendance" id="attendance" class="select2" style="width: 775px; height:37px;">
                    <option value="" >Mark Attendance</option>
					<option value="1">Present</option>
					<option value="2">Absent</option>
					<option value="3">Leave</option>
					<option value="4">Holiday</option>
                    </select></div>
						</td>  

						
						
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" id="submit" name="submit" title="Submit Attendance" class="btn btn-info">Submit</button>
              <span></span>
              <input type="reset" class="btn btn-primary" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</body>
</html>
<?php

if(isset($_POST['submit'])){
	
	  $employeeId = $_POST['employeeId']; 
	  $employeeAttendance = $_POST['attendance']; 
	  $employeeAttendanceDate = $_POST['employeeAttendanceDate']; 

	  $query1 = mysql_query("SELECT * FROM employee_attendance WHERE attend_date ='$employeeAttendanceDate' AND emp_id ='$employeeId'")or die(mysql_error());
	  if(mysql_num_rows($query1)>0){
				echo'<div class="alert alert-warning alert-dismissible text-center" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>Warning!! </strong> '.$employeeUsername.'\'s Today Attendance Already Exists Date: '.date('Y-M-d').' </div>';
			}
			
			
			
	  else{
	  
	  
		$query2 = mysql_query("INSERT INTO employee_attendance VALUES ('','$employeeId','$employeeAttendance','$employeeAttendanceDate')") or die(mysql_error());
			
			if($query2){
				
				echo'<div class="alert alert-warning alert-dismissible text-center" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>Success!! </strong> '.$employeeUsername.'\'s Today Attendance Add Successfully Date: '.date('Y-M-d').'</div>';				
			}
			
			
			}
	  }
?>

<?php  }} ?>

