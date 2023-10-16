<?php
include("../Assets/Connection/Connection.php");
ob_flush();
include('Head.php');

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$selQry="select * from tbl_owner where owner_id=".$_SESSION['oid'];
$result=$connection->query($selQry);
$row=$result->fetch_assoc();

if(isset($_POST['btn_save']))
{
	$owner_name=$_POST['txt_name'];
	$owner_email=$_POST['txt_email'];
	$owner_address=$_POST['txt_address'];
	$owner_number=$_POST['txt_number'];
	$updtQry="update tbl_owner set owner_name='".$owner_name."',owner_email='".$owner_email."',owner_address='".$owner_address."',owner_number='".$owner_number."' where owner_id=".$_SESSION['oid'];
	
	if($connection->query($updtQry))
	{ header("location:Myprofile.php");
	}
}
?>

<form id="form1" name="form1" method="post" action="">
<table width="530" border="1">
  <tr>
    <td width="92">NAME</td>
    
    <td width="336"><label for="txt_name"></label>
      <input type="text" name="txt_name" value="<?php echo $row['owner_name'] ?>" id="txt_name" /></td>
  </tr>
  <tr>
    <td>EMAIL</td>
    
    <td><label for="txt_email"></label>
      <input type="email" name="txt_email" value="<?php echo $row['owner_email'] ?>" id="txt_email" /></td>
  </tr>
  <tr>
    <td>ADDRESS</td>
    
    <td><label for="txt_address"></label>
      <textarea name="txt_address"  id="txt_address" cols="45" rows="5"><?php echo $row['owner_address'] ?></textarea>
      <label for="txt_number"></label></td>
  </tr>

    <td>CONTACT</td>
   
    <td>
      <label for="txt_number"></label>
      <input type="number" name="txt_number" value="<?php echo $row['owner_number'] ?>" id="txt_number" />
    </td>
   <tr>
    <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="SAVE" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="CANCEL" /></td>
    <tr>
</table>

</form>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>