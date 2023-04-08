
<link rel="stylesheet" href="style1.css">
<div class="span3">
					<div class="sidebar">
                  
					<p style="margin:0 100px 10px;" class="centered"><a href="profile.html"><img src="images/ui-sam.png" class="img-circle" width="60"></a></p>
                   <?php $query=mysqli_query($bd, "select subadminName from subadmin where subadminEmail='".$_SESSION['alogin']."'");
                    $row =mysqli_fetch_array($query)
 ?> 
<ul class="widget widget-menu unstyled">			
		<li>
  <h5 class="centered"><?php echo htmlentities($row['subadminName']);?></h5>
                  <?php  ?>
		</li>
</ul>

<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Manage Complaint
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="notprocess-complaint.php">
											<i class="icon-tasks"></i>
											Not Process Yet Complaint
											<?php
$rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where status is null AND forwardered=1 AND category=
(select id from category where categoryName =(select sb_dname from subadmin where subadminEmail= '".$_SESSION['alogin']."'))");
$num1 = mysqli_num_rows($rt);
{?>
		
											<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="inprocess-complaint.php">
											<i class="icon-tasks"></i>
											Pending Complaint
                   <?php 
  $status="in Process";                   
$rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where status='$status' AND forwardered=1 AND category=
(select id from category where categoryName =(select sb_dname from subadmin where subadminEmail= '".$_SESSION['alogin']."'))");
$num1 = mysqli_num_rows($rt);
{?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="closed-complaint.php">
											<i class="icon-inbox"></i>
											Closed Complaints
	     <?php 
  $status="closed";                   
$rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where status='$status' AND forwardered=1 AND category=
(select id from category where categoryName =(select sb_dname from subadmin where subadminEmail= '".$_SESSION['alogin']."'))");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
								</ul>
							</li>
							
						</ul>


					
						<ul class="widget widget-menu unstyled">			
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
