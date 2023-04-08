<?php

include('includes/config.php');

if (isset($_POST['update'])) {
  $cid = $_GET['cid'];
  $remark = $_POST['remark'];
  $status =$_POST['status'];
  $query = mysqli_query($bd, "insert into feedback(cid,remark,status) values('$cid','$remark','$status')");
  // $sql=mysqli_query($bd, "update tblcomplaints set status='$status' where complaintNumber='$complaintnumber'");

  echo "<script>alert('Feedback submitted successfully');</script>";

}

?>
<script language="javascript" type="text/javascript">
  function f2() {
    window.close();
  } ser
  function f3() {
    window.print();
  }
</script>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>User Profile</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="anuj.css" rel="stylesheet" type="text/css">
</head>

<body>

  <div style="margin-left:50px;">
    <form name="updateticket" id="updatecomplaint" method="post">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr height="50">
          <td><b>FeedBack </b></td>
          <td>
            <?php echo htmlentities($_GET['cid']); ?>
          </td>
        </tr>
        <tr height="50">
          <td><b>Rate Your experience</b></td>
          <td><select name="status" required="required">
              <option value="">Select Status</option>
              <option value="⭐">worst</option>
              <option value="⭐⭐">average</option>
              <option value="⭐⭐⭐">good</option>
              <option value="⭐⭐⭐⭐">very good</option>
              <option value="⭐⭐⭐⭐⭐">excellent</option>

            </select></td>
        </tr>


        <tr height="50">
          <td><b>Remark</b></td>
          <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
        </tr>



        <tr height="50">
          <td>&nbsp;</td>
          <td><input type="submit" name="update" value="Submit"></td>
        </tr>



        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>

        <tr>
          <td></td>
          <td>
            <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();"
              style="cursor: pointer;" />
          </td>
        </tr>



      </table>
    </form>
  </div>

</body>

</html>

<?php ?>