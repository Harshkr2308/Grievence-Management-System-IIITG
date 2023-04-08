
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	// $category=$_POST['category'];
	// $description=$_POST['description'];
    $subadminName = $_POST['subname'];
		$subdname = $_POST['subdname'];
		$password = md5($_POST['password']);
		$contactno = $_POST['subno'];
		$email = $_POST['subemail'];
	$id=intval($_GET['id']);
$sql=mysqli_query($bd, "update subadmin set subadminName='$subadminName',password='$password',contactNo='$contactno',sb_dname='$subdname',subadminEmail='$email' where id='$id'");
$_SESSION['msg']="subadmin Updated !!";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Subadmin</title>
	<link type="text/css" href="./../tools/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="./../tools/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="./../tools/css/theme.css" rel="stylesheet">
	<link type="text/css" href="./../tools/images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Subadmin</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="Subadmin" method="post" >
<?php
$id=intval($_GET['id']);
$query=mysqli_query($bd, "select * from subadmin where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>									
<div class="control-group">
											<label class="control-label" for="basicinput">Subadmin Name</label>
											<div class="controls">
												<input type="text" placeholder="Enter the Subadmin Name " name="subname"
													class="span8 tip" required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">Subadmin Department</label>
											<div class="controls">
												<input type="text" placeholder="Enter  the Subadmin Department "
													name="subdname" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Email id</label>
											<div class="controls">
												<input type="email" placeholder="Enter the subadmin email id"
													name="subemail" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Contact No</label>
											<div class="controls">
												<input type="integer" placeholder="Enter the Subadmin contact no"
													name="subno" class="span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Password</label>
											<div class="controls">
												<input type="password" placeholder="Enter the Subadmin password"
													name="password" class="span8 tip" required>
											</div>
										</div>
                                        <?php } ?>	

<div class="control-group">


											<div class="controls">
												<button style="background-color:blue; color:white; type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
							</div>
						</div>


						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="./../tools/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="./../tools/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="./../tools/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./../tools/scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="./../tools/scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>