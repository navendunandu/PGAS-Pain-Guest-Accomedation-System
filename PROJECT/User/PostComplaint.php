
<?php
include("../Assets/Connection/Connection.php");
  //include("sessionvalidation.php");
  session_start();
  ob_flush();
include('Head.php');
  if(isset($_POST['btn_post']))
  {
	 $title=$_POST['txt_title'];
	  $content=$_POST['txt_content'];
	  $insQry="insert into tbl_complaint(complaint_title,complaint_content,complaint_date,user_id,room_id)values('".$title."','".$content."',curdate(),'".$_SESSION["uid"]."','".$_GET["cid"]."')";
		$connection->query($insQry);	  
  }
  if(isset($_GET['cid']))
{	
	$delqry="delete from tbl_complaint where complaint_id=".$_GET['cid'];
	$connection->query($delqry);
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
  <table align="center" border="1" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>TITLE</td>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" /></td>
    </tr>
    <tr>
      <td>CONTENT</td>
      <td><label for="txt_content"></label>
      <textarea name="txt_content" id="txt_content" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_post" id="btn_post" value="POST" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="CANCEL" /></td>
    </tr>
  </table>
  <br/>
  <br/>
  <br />
   <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>SL. NO.</td>
      <td>TITLE</td>
      <td>CONTENT</td>
      <td>DATE</td>

      <td>ACTION</td>
    </tr>
     <?php
	$selqry="select * from tbl_complaint where user_id='".$_SESSION["uid"]."'";
	$row=$connection->query($selqry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["complaint_title"]?></td>
       <td><?php echo $data["complaint_content"]?></td>
       <td><?php echo $data["complaint_date"]?></td>
       

      <td><a href="PostComplaint.php?cid=<?php echo $data['complaint_id']?>">Delete</a></td>
    </tr>
<?php
	}
?>
  </table>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>