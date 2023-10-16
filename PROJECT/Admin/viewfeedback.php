
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
<form id="form1" name="form1" method="post" action="">
  <br/>
  <br/>
  <br />
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>SL. NO.</td>
      <td>NAME</td>
      <td>TITLE</td>
      <td>CONTENT</td>
    
      <td>DATE</td>
  
    </tr>
     <?php
	$selqry="select * from tbl_feedback f inner join tbl_user u on f.user_id=u.user_id";
	$row=$connection->query($selqry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["user_name"]?></td>
      <td><?php echo $data["feedback_title"]?></td>
       <td><?php echo $data["feedback_content"]?></td>

       <td><?php echo $data["feedback_date"]?></td>
     
    
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