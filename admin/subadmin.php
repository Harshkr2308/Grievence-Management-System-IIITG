<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit'])) {
		$subadminName = $_POST['subname'];
		$subdname = $_POST['subdname'];
		$password = md5($_POST['password']);
		$contactno = $_POST['subno'];
		$email = $_POST['subemail'];
		$status = 1;
		$query = mysqli_query($bd, "insert into subadmin(subadminName,sb_dname,subadminEmail,contactNo,password,status) values('$subadminName','$subdname','$email','$contactno','$password','$status')");
		$_SESSION['msg'] = "Subadmin Created !!";
	}
	if (isset($_GET['del'])) {
		mysqli_query($bd, "delete from subadmin where id = '" . $_GET['id'] . "'");
		$_SESSION['delmsg'] = "Subadmin deleted !!";
	}
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin|Add Subadmin</title>
		<link type="text/css" href="./../tools/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="./../tools/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="./../tools/css/theme.css" rel="stylesheet">
		<link type="text/css" href="./../tools/images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
			rel='stylesheet'>
		<script type="text/javascript">

		</script>
	</head>

	<body>
		<?php include('include/header.php'); ?>

		<div class="wrapper">
			<div class="container">
				<div class="row">
					<?php include('include/sidebar.php'); ?>
					<div class="span9">
						<div class="content">

							<div class="module">
								<div class="module-head">
									<h3>Add Subadmin</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong>
											<?php echo htmlentities($_SESSION['msg']); ?>
											<?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>


									<?php if (isset($_GET['del'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong>
											<?php echo htmlentities($_SESSION['delmsg']); ?>
											<?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<br />


									<form class="form-horizontal row-fluid" name="chngpwd" method="post">

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






										<div class="control-group">
											<div class="controls">
												<button style="background-color:blue; color:white;"type="submit" name="submit" class="btn">Submit</button>
											</div>
										</div>
									</form>
								</div>

							</div>
							<div class="module">
								<div class="module-head">
									<h3>Manage Subadmin</h3>
								</div>
								<div class="module-body table">
									<table cellpadding="0" cellspacing="0" border="0"
										class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Subadmin's</th>
												<th>Department</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

											<?php $query = mysqli_query($bd, "select * from subadmin");
											$cnt = 1;
											while ($row = mysqli_fetch_array($query)) {
												?>
												<tr>
													<td>
														<?php echo htmlentities($cnt); ?>
													</td>
													<td>
														<?php echo htmlentities($row['subadminName']); ?>
													</td>
													<td>
														<?php echo htmlentities($row['sb_dname']); ?>
													</td>
													<td>
														<a href="edit-subadmin.php?id=<?php echo $row['id'] ?>"><i
																class="icon-edit"></i></a>
														<a href="subadmin.php?id=<?php echo $row['id'] ?>&del=delete"
															onClick="return confirm('Are you sure you want to delete?')"><i
																class="icon-remove-sign"></i></a>
													</td>
												</tr>
												<?php $cnt = $cnt + 1;
											} ?>

									</table>
								</div>
							</div>



						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div><!--/.wrapper-->

		<?php include('include/footer.php'); ?>

		<script src="./../tools/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="./../tools/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
		<script src="./../tools/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="./../tools/scripts/flot/jquery.flot.js" type="text/javascript"></script>
	</body>
<?php } ?>