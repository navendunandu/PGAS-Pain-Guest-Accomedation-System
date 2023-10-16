<?php
include("sessionvalidation.php");
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
$roomid=$_GET['rid'];
if(isset($_POST["btn_request"]))
{
	$insQry="insert into tbl_booking(user_id,room_id,booking_date,booking_fromdate,booking_todate,booking_guest)values('".$_SESSION["uid"]."','".$roomid."',curdate(),'".$_POST["txt_fromdate"]."','".$_POST["txt_todate"]."','".$_POST["txt_guest"]."')";
	$connection->query($insQry);
	header("location:Homepage.php");
	
}
$selQry="select * from tbl_room r inner join tbl_owner o on r.owner_id=o.owner_id inner join tbl_place p on o.place_id=p.place_id inner join tbl_category c on r.category_id=c.category_id where room_id='".$roomid."'";
$res=$connection->query($selQry);
$row=$res->fetch_assoc();
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form" name="form" method="post" action="">
<table border="1"  align="center" cellpadding="10" style="border-collapse:collapse" >
  <tr>
    <td width="146"><p><strong><u>OWNER:<br />
<br />
<br />
<?php echo $row['owner_name'] ?>
</u></strong></p>
      <p><u><strong>PLACE:  
      <br />
<br />
<br />
<?php echo $row['place_name']?>
  </strong></u></p>
    <p><u><strong>PHONE:
    <br />
<br />
<?php echo $row['owner_number'] ?>
</strong></u><strong></strong></p>
</td>
    <td width="182"><p><strong><u>CATEGORY:
    <br />
<br />
<?php echo $row['category_name'] ?>
</u></strong></p>
      <p><u><strong>SECURITY:
      <br />
<br />

<?php echo $row['room_security'] ?>
</strong></u></p>
    <p><u><strong>RENT/mon: 
    <br />
<br />
<?php echo $row['room_rent'] ?>
   </strong></u><strong></strong></p></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><strong><u>DISCRIPTION
    <br />
<br />
<?php echo $row['room_discription'] ?>
</u></strong></div></td>
  </tr>
  <tr>
    <td>FROM DATE</td>
    <td>
      
<label for="txt_dadte"></label>
<input type="date" name="txt_fromdate" id="txt_fromdate" onchange="getChnage(this.value)" />


      
    </td>
  </tr>
  
  <tr>
  <td>TO DATE</td>
  <td>
    <label for="txt_todate"></label>
    <input type="date" name="txt_todate" id="txt_todate" disabled="true" />
  </td>
  <tr>
    <td>NUMBER OF GUEST</td>
    <td><label for="txt_guest"></label>
      <input type="number" name="txt_guest" id="txt_guest"  min="1" max="<?php echo $row['room_guest'] ?>"/>
      
    </td>
  </tr>
  <tr>
  <td colspan="2" align="center"><input type="submit" name="btn_request" id="btn_request" value="REQUEST" />
    <input type="reset" name="btn_cancel" id="btn_cancel" value="CANCEL" />
  
  </td>
  </tr>
  </table>
  </tr>
</table>
</form>

</body>
<script>
  function getChnage(val)
  {
    var todate = document.getElementById('txt_todate');
    todate.disabled='';
    const inputDate = new Date(val);
    const newDate = new Date(inputDate);
    newDate.setDate(newDate.getDate() + 15);
    const formattedDate = newDate.toISOString().split('T')[0];
    todate.min=formattedDate;

  }
  // Get a reference to the input element
  const fromDateInput = document.getElementById("txt_fromdate");

  // Get the current date in the format "YYYY-MM-DD"
  const currentDate = new Date().toISOString().split('T')[0];

  // Set the min attribute to the current date
  fromDateInput.min = currentDate;
</script>

<?php
include('Foot.php');
ob_flush();
?>
</html>