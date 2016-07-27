<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">Smart HR Manager</a>
					</div>
					
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="myNavbar">
					  <ul class="nav navbar-nav">
						<li><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
						<li><a href="emp_profile.php">View Profile<span class="sr-only">(current)</span></a></li>
						<li><a href="emp_attendance.php">Mark Attendence<span class="sr-only">(current)</span></a></li>
						<li><a href="emp_salary.php">View Salary Details<span class="sr-only">(current)</span></a></li>
						<li><a href="leave_application.php">Apply For Leave<span class="sr-only"></span></a></li>
						<li><a href="emp_leave_track.php">View Leave Status<span class="sr-only"></span></a></li>
					  </ul>
					<ul class="nav navbar-nav navbar-right">
						<!-- Brand and toggle get grouped for better mobile display -->
						<p class="navbar-text">Welcome! <strong class="text-danger"><?php echo ($_SESSION['emp_username']) ?></strong></p>
						
						
						<li><p class="navbar-text"><a href="logout.php" class="navbar-link"  data-placement="bottom" title="Log Out">Logout</a></p></li>
					</ul>
					
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>