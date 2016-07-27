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
}
?>
<body>
<div class="container">
    
<div class="row">
				<div class="col-md-6 col-md-offset-4">
					<h1 style = "margin-left:80px">Leave Form For Employee <?php echo $employeeFirstName.'&nbsp'.$employeeLastName; ?></h1>
				</div>
			</div>
			<br/>
		<form method="POST" class="form-horizontal">
		<div style = "margin-left:-130px">
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-6 control-label" for="edate">Leave Type</label>  
			  <div class="col-md-2">
			  <input class="form-control" id="leaveType" name="leaveType" type="text" placeholder="Enter Leave Type" required>
			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-6 control-label" for="edate">Leave Start Date</label>  
			  <div class="col-md-2">
			  <input id="startDate" name="startDate" type="date" placeholder="Date Start" class="form-control input-md" required="">
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-6 control-label" for="endate">Leave End Date</label>  
			  <div class="col-md-2">
			  <input id="endDate" name="endDate" type="date" placeholder="Date End" class="form-control input-md" required="">
				
			  </div>
			</div>
						

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-6 control-label" for="submit"></label>
			  <div class="col-md-3">
				<button id="submit" name="submit" class="btn btn-success">Submit Leave</button>
							<input type="button" value="Back" name="cancel" 
							onclick="history.back()" class="btn btn-default"/>
			  </div>
			 
			</div>
		</div>

		</form>
		</div>
</body>
</html>	
<?php

if (isset($_POST['submit'])){

   $leaveType = $_POST['leaveType'];
   $startDate = $_POST['startDate'];
   $endDate = $_POST['endDate'];   

     $startDate1 = strtotime("$_POST[startDate]");
     $endDate1 = strtotime("$_POST[endDate]");

     $today = strtotime("now");  
     $todayDate = date("Y-m-d",$today);

     $totalLeaveDays = ($endDate1-$startDate1) / 86400;

//INITIALIZE DATE RANGE Start
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
					
			$sql="select SUM(no_days) AS nod From leaves where emp_id = '$employeeId' AND date >= '$cyrr-$cyr' AND date <= '$cya' ";
			$qry = mysql_query($sql);
			$rec = mysql_fetch_array($qry);
			echo $value=$rec ['nod'];
	        if($value <= 15){
				$getval=$totalLeaveDays+$value;
				if($getval <= 15){
						$insert = "INSERT INTO leaves
									(`leave_id`,`emp_id`,`date`,`leave_type`,`start_date`,`end_date`,`no_days`,`admin_approve`)
										values('','$employeeId','$todayDate','$leaveType','$startDate','$endDate','$totalLeaveDays','1')";
					$qry = mysql_query($insert);
				if ($qry){
						echo '<div class="container-fluid">
								<div class="row">
									<div class="col-md-4 col-md-offset-4">
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												×</button>
										   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
											<hr class="message-inner-separator">
											<p><strong>Success</strong> Employee Leave added!
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											
											</p>
										</div>
									</div>
								</div>
							</div>';
						}
						else {
							echo '<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-ok"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> Not Posted!</p>
											</div>
										</div>
									</div>
								</div>';
							 }
					}
					else
						echo '<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-remove"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> Not Enough Credits!</p>
											</div>
										</div>
									</div>
							</div>';
				}
				else
					echo '<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-ok"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> No More Credits Left!</p>
											</div>
										</div>
									</div>
							</div>';
				elseif(($djan <= $tdy)&&($dmay >= $tdy)):
					
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("lastyear");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
				
			$sql="select SUM(no_days) AS nod From leaves where emp_id = '$employeeId' AND date >= '$cyrr-$cyr' AND date <= '$cya'";
			$qry = mysql_query($sql);
			$rec = mysql_fetch_array($qry);
			$value=$rec ['nod'];
				if($value <= 15){
				$getval=$totalLeaveDays+$value;
				if($getval <= 15){
						$insert = "INSERT INTO leaves
						            (`leave_id`,`emp_id`,`date`,`leave_type`,`start_date`,`end_date`,`no_days`,`admin_approve`)
										values('','$employeeId','$todayDate','$leaveType','$startDate','$endDate','$totalLeaveDays','1')";
										$qry = mysql_query($insert);
					if ($qry){
						echo '<div class="container-fluid">
								<div class="row">
									<div class="col-md-4 col-md-offset-4">
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												×</button>
										   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
											<hr class="message-inner-separator">
											<p><strong>Success!</strong> Employee Leave added!
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											
											</p>
										</div>
									</div>
								</div>
							</div>';
						}
						else {
							echo '<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-remove"></span> <strong>Warning</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> Not Posted!</p>
											</div>
										</div>
									</div>
							</div>';
							 }
					}
					else
						echo'<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-remove"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> Not Enough Credits!</p>
											</div>
										</div>
									</div>
							</div>';
				}
				else
					echo'<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-remove"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> No more Credits left!</p>
											</div>
										</div>
									</div>
							</div>';
							else: echo "No Month";
			endif;	
				//END FUNCTION
				
				
				
				
				}
		
		
}?>