<?php
session_start();
include('include/config.php');

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
        <script language="javascript" type="text/javascript">
            var popUpWin = 0;
            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 500 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
            }

        </script>
    </head>

    <body>

        <div style="margin-left:50px;">
            <form name="updateticket" id="updateticket" method="post">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <?php
                     
                       ?> 
                      <?php $ret1 = mysqli_query($bd, "select * FROM feedback where cid='" . $_GET['cid'] . "'");
                     $row1= mysqli_fetch_array($ret1)
                      ?>
                        <!-- <tr>
                            <td colspan="2"><b>
                                    <?php
                        //             $r2 = mysqli_query($bd, "select name from");
                        //             echo $row1['name']; ?>'s Feedback
                        //         </b></td>

                        // </tr> -->
                      <?php if($row1 !==null){
                        
                      ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr height="50">
                            <td><b>Rating :</b></td>
                            <td>
                                <?php echo htmlentities($row1['status']); ?>
                            </td>
                        </tr>
                        <tr height="90">
                            <td><b>Remark </b></td>
                            <td>
                                <?php echo htmlentities($row1['remark']); ?>
                            </td>
                        </tr>

                        <tr>

                            <td colspan="2">
                                <input name="Submit2" type="submit" class="txtbox4" value="Close this window "
                                    onClick="return f2();" style="cursor: pointer;" />
                            </td>
                        </tr>

                    <?php }else{
                       
                        echo htmlentities ("No feedback");
                    }


                    ?>

                </table>
            </form>
        </div>

    </body>

    </html>

 <?php ?>