<?php
include("../Assets/Connection/Connection.php");
ob_flush();
include('Head.php');

session_start();
	$selQry="select * from tbl_room r inner join tbl_category c on r.category_id=c.category_id inner join tbl_ftype f on r.ftype_id=f.ftype_id where owner_id=".$_SESSION['oid'];
$result=$connection->query($selQry);
$row=$result->fetch_assoc();
?>
<?php
if(isset($_GET['rid']))
{	$delqry="delete from tbl_room where room_id=".$_GET['rid'];
	if($connection->query($delqry))
	
	{
			?>
                <script>
				alert("Data Deleted");
				window.location="Addroom.php";
                </script>
                <?php
	}
	else
	{
			?>
                <script>
				alert("FAILED");
				window.location="Addroom.php";
                </script>
                <?php
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
  <table width="234" border="1">
    <tr>
      <td width="178">GUEST NUMBER</td>
      <td width="40"><?php echo $row['room_guest'] ?></td>
    </tr>
    <tr>
      <td>DISCRIPTION</td>
      <td><?php echo $row['room_discription'] ?></td>
    </tr>
    <tr>
      <td>RENT AMOUNT</td>
      <td><?php echo $row['room_rent'] ?></td>
    </tr>
    <tr>
      <td>SECURITY AMOUNT</td>
      <td><?php echo $row['room_security'] ?></td>
    </tr>
    <tr>
      <td>CATEGORY</td>
      <td><?php echo $row['category_name'] ?></td>
    </tr>
    <tr>
      <td>FOOD TYPE</td>
      <td><?php echo $row['ftype_name'] ?></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="MyRoom.php?rid=<?php echo $row['room_id']?>">Delete</a>&nbsp;<a href="AddGallery.php?rid=<?php echo $row['room_id']?>">Gallery</a></td>
    </tr>
  </table>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>