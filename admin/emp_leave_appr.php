<?php include ("header.php");?>
<?php include ("navbar.php");?>
<?php

if(!isset($_SESSION['admin_username']))	{
	
	header("location: ../index.php");
}
else{
	
?>
<body>
<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-5">
						<ul class="nav navbar-nav">
	<li><a href='emp_leave_pend.php'><input type='button' value='Pending'data-toggle="tooltip" data-placement="top" title="View to Approve" class='btn btn-info'/></a></li>
	<li><a href='emp_leave_appr.php'><input type='button' value='Approve'data-toggle="tooltip" data-placement="top" title="View to Approve" class='btn btn-info'/></a></li>
    <li><a href='emp_leave_deny.php'><input type='button' value='Deny'data-toggle="tooltip" data-placement="top" title="View to Approve" class='btn btn-info'/></a></li>	
						</ul>
					</div>
					<div class = "col-md-6">
						<h1>Employee's Approved Leaves</h1>
					</div>
				</div>
      <hr/>
<?php
include("../connect.php");
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
					
						//view nia d ang all pending sa HR_approve
						$sql = "SELECT * FROM employee, leaves, admin_approve
									WHERE employee.emp_id = leaves.emp_id 
									AND admin_approve.admin_approve = leaves.admin_approve
									AND admin_approve.admin_approve = '2'
									AND date >= '$cyrr-$cyr' AND date <= '$cya'";
						$qry=mysql_query($sql);
						
					elseif(($djan <= $tdy)&&($dmay >= $tdy)):
					
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("lastyear");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
					
						//view nia d ang all pending sa HR_approve
						$sql = "SELECT * FROM employee, leaves, admin_approve
									WHERE employee.emp_id = leaves.emp_id 
									AND admin_approve.admin_approve = leaves.admin_approve
									AND admin_approve.admin_approve = '2' 
									AND date >= '$cyrr-$cyr' AND date <= '$cya'";
						$qry=mysql_query($sql);
					endif;
					//END FUNCTION
					?><div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Employee First Name</th>
							<th>Emloyee Last Name</th>
							<th>Emloyee Contact Number</th>
							<th>Emloyee Email</th>
							<th>Leave Application Date</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<?php
						while($rec = mysql_fetch_array($qry))
						{
					?>
					<tbody>
						<tr>
								<td>
									<?php echo $rec['emp_fname']; ?>
								</td>
								<td>
									<?php echo $rec['emp_lname']; ?>
								</td>
								<td>
									<?php echo $rec['emp_contact_num']; ?>
								</td>
								<td>
									<?php echo $rec['emp_email']; ?>
								</td>
								<td>
									<?php echo $rec['date']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat']; ?>
								</td>
								<td>
									<a href='leave_approved.php?id=<?php echo $rec['leave_id'];?>'><input type='button' value='View Details' data-toggle="tooltip" data-placement="top" title="View to Check Leave Details" class='btn btn-info'/></a>
								</td>
						</tr>
					</tbody>
					<?php
						}
					?>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
<?php } ?>
</body>
</html>