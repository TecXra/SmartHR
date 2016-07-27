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
				<div class = "row" style = "margin-top:10px">
                    <div class="col-md-4">
					</div>				
					<div class = "col-md-8">
						<h1>Employee Leave Track</h1>
					</div>
				</div>
	<br>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php
					
						//INITIALIZE DATE RANGE Start
						/*
				$nw = strtotime("now");
				$tdy = date("m-d",$nw);
				
				$mjune = strtotime("june 1");
				$djune = date("m-d",$mjune);
				
				$mdec = strtotime("December 31");
				$ddec = date("m-d",$mdec);
				
				$mjan = strtotime("January 1");
				$djan = date("m-d",$mjan);
				
				$mmay = strtotime("May 31");
				$dmay = date("m-d",$mmay);
			//INITIALIZE DATE RANGE End
			
			//START FUNCTION
				if(($djune <= $tdy)&&($ddec >= $tdy)):
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("now");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
						//this codes is that all the approve will go to the approve submenu
						$sql = "SELECT * FROM employee, leaves, admin_approve
									WHERE employee.emp_id = leaves.emp_id 
									AND admin_approve.admin_approve = leaves.admin_approve  
									AND date >= '$cyrr-$cyr' AND date <= '$cya'";
						$qry=mysql_query($sql);
						
					elseif(($djan <= $tdy)&&($dmay >= $tdy)):
					
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("lastyear");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
					
					//this codes is that all the approve will go to the approve submenu
						$sql = "SELECT * FROM employee, leaves, admin_approve
									WHERE employee.emp_id = leaves.emp_id 
									AND admin_approve.admin_approve = leaves.admin_approve
									AND date >= '$cyrr-$cyr' AND date <= '$cya'";
						$qry=mysql_query($sql);
					
					endif;
					//END FUNCTION
					*/
					
					?>
						<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee First Name</th>
											<th>Employee Last Name</th>
											<th>Employee Email</th>
											<th>Employee Designation</th>
											<th>Leave Application Date</th>
											<th>View Status</th>
										</tr>
									</thead>
					<?php
					/*
						while($rec=mysql_fetch_array($qry))
						{
							*/
					?>
					<?php
include("../connect.php");

$employeeUsername=$_SESSION['emp_username'];
$query = mysql_query("SELECT * FROM employee where emp_uname='$employeeUsername' ");
while ($row=mysql_fetch_array($query)){

    $employeeId = $row['emp_id'];
	$employeeFirstName = $row['emp_fname'];
	$employeeLastName = $row['emp_lname'];
	$employeeEmail = $row['emp_email'];
	$employeeDesignation = $row['emp_designation'];

$query1 = mysql_query("SELECT * FROM leaves where emp_id='$employeeId' ");
while ($row1=mysql_fetch_array($query1)){
	
	$leaveId = $row1['leave_id'];
	$leaveDate = $row1['date'];
	
?>
					<tbody>
						<tr>
								<td>
									<?php echo $employeeFirstName; ?>
								</td>
								<td>
									<?php echo $employeeLastName; ?>
								</td>
								<td>
									<?php echo $employeeEmail; ?>
								</td>
								<td>
									<?php echo $employeeDesignation; ?>
								</td>
								<td>
									<?php echo $leaveDate; ?>
								</td>
								<td>
									<a href='emp_leave_status.php?id=<?php echo $leaveId;?>'><input type='button' value='View' data-toggle="tooltip" data-placement="top" title="View Status" class='btn btn-info'/></a>
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