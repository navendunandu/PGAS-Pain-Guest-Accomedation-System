<?php
include("../Assets/Connection/Connection.php");
ob_flush();
include('Head.php');

session_start();

$selQry="select * from tbl_owner o inner join tbl_place p on o.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where owner_id=".$_SESSION['oid'];
$result=$connection->query($selQry);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

	<table width="361" border="1" align="center" bordercolor="#CC3366">
  <tr>
    <td colspan="3"><img src="../Assets/Files/Owner/Photos/<?php echo $row['owner_photo'] ?>" width="300px" /></td>
  </tr>
  <tr>
    <td width="171">NAME</td>
    
    <td width="84"><?php echo $row['owner_name'] ?></td>
  </tr>
  <tr>
    <td><p>EMAIL</p></td>
    
    <td><?php echo $row['owner_email'] ?></td>
  </tr>
  <tr>
    <td>ADDRESS</td>
   
    <td><?php echo $row['owner_address'] ?></td>
  </tr>
  <tr>
    <td>CONTACT</td>
   
    <td><?php echo $row['owner_number'] ?></td>
  </tr>
  <tr>
    <td>DISTRICT</td>
  
    <td><?php echo $row['district_name']?></td>
  </tr>
  <tr>
    <td>PLACE</td>
   
    <td><?php echo $row['place_name']?></td>
  </tr>
  
  <tr>
    <td>GENDER</td>
  
    <td><?php echo $row['owner_gender']?></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <a href="Editprofile.php"><button>EDIT PROFILE</button></a>
     <a href="Changepassword.php"><button>CHANGE PASSWORD</button></a>
   </td>
    </tr>


</table>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>