<?php
include("../Assets/Connection/Connection.php");
ob_flush();
include('Head.php');
session_start();

if(isset($_POST["btn_save"]))
{
		$selQry="select * from tbl_owner where owner_id=".$_SESSION['oid'];
		$result=$connection->query($selQry);
		$row=$result->fetch_assoc();
		
		
		$mypassword=$row['owner_password'];
		$cpassword=$_POST['txt_cpassword'];
		$npassword=$_POST['txt_npassword'];
		$copassword=$_POST['txt_copassword'];
		
		if($cpassword ==  $mypassword)
		{
				if($npassword == $copassword)
				{
						$updtQry="update tbl_owner set owner_password='".$npassword."' where owner_id =".$_SESSION['oid'];
						if($connection->query($updtQry))
						{
								 header("location:Myprofile.php");
						}
						
				
				}
				else
				{
								echo "Not Match";
				}
					
		}
		else
		{
			echo "Wrong password";
		}
		
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_cpassword"></label>
      <input type="password" name="txt_cpassword" id="txt_cpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_npassword"></label>
      <input type="password" name="txt_npassword" id="txt_npassword" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_copassword"></label>
      <input type="password" name="txt_copassword" id="txt_copassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="SAVE" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="CANCEL" /></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>