<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$selQry="select * from tbl_subadmin where subadmin_id=".$_SESSION['sid'];
$result=$connection->query($selQry);
$row=$result->fetch_assoc();

if(isset($_POST['btn_save']))
{
	$subadmin_name=$_POST['txt_name'];
	$subadmin_number=$_POST['txt_number'];
$subadmin_email=$_POST['txt_email'];
	
	$updtQry="update tbl_subadmin set subadmin_name='".$subadmin_name."',subadmin_number='".$subadmin_number."',subadmin_email='".$subadmin_email."' where subadmin_id=".$_SESSION['sid'];
	
	if($connection->query($updtQry))
	{ header("location:Myprofile.php");
	}
}
?>

<form action="#" method="post" class="form-reg"  enctype="multipart/form-data">
<div class="form-group first">
								<label for="txt_name">Name</label>
								<input type="text" class="form-control" placeholder="Name"
									value="<?php echo $row['subadmin_name'] ?>"
                                    name="txt_name" id="txt_name">
							</div>
              <div class="form-group first">
								<label for="txt_number">Contact</label>
								<input type="text" class="form-control" placeholder="Contact Number" value="<?php echo $row['subadmin_number'] ?>"
									name="txt_number" id="txt_number">
							</div>
              <div class="form-group first">
								<label for="txt_email">Email</label>
								<input type="email" class="form-control" placeholder="E-mail" value="<?php echo $row['subadmin_email'] ?>"
									name="txt_email" id="txt_email">
							</div>
                            <div align="center">
                            <div class="col-sm-3">
                <input type="submit" name="btn_save" id="btn_save" value="SAVE" class="btn btn-success" />
                </div>
                </div>

</form>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>