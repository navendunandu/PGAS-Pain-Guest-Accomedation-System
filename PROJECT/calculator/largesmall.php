


<?php
		$num1="";
		$num2="";
		$l="";
		$s="";
		$choice="";
		if(isset($_POST["btnFind"]))
			{
				$num1=$_POST["txt_num1"];
				$num2=$_POST["txt_num2"];
				$choice=$_POST["txt_select"];
				
				switch($choice)
				{
					case "l":
						 if($num1>$num2)
						 	{
								$l=$num1;
							}
						else
							{
								$l=$num2;
							}
					break;
					case "s":
						if($num1<$num2)
								{
								$s=$num1;
								}
						else
							{
								$s=$num2;
							}
					break;
				}
			}
?>
							


















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LARGE SMALL</title>
</head>

<body>
<form id="form2" name="form2" method="post" action="">
<table width="200" border="1">
  <tr>
    <td>NUMBER-1</td>
    <td>
      <label for="txt_num1"></label>
      <input type="text" name="txt_num1" id="txt_num1" />
      <label for="txt_num2"></label>
    </td>
  </tr>
  <tr>
    <td>NUMBER-2</td>
    <td>
      <label for="txt_num3"></label>
      <input type="text" name="txt_num2" id="txt_num2" />
   </td>
  </tr>
  <tr>
    <td>LARGE SMALL</td>
    <td>
      <label for="txt_select"></label>
      <select name="txt_select" id="txt_select">
      <option>Select option</option>
      <option value="l">LARGEST</option>
      <option value="s">SMALLEST</option>
      </select>
   </td>
  </tr>
      <tr>
      <td colspan="2" align="center"><input type="submit" name="btnFind" id="btnFind" value="Find" />
</td>
      
    </tr>
  <tr>
    <td>LARGEST</td>
    <td><?php echo $l ?></td>
  </tr>
  <tr>
    <td>SMALLEST</td>
    <td> <?php echo $s ?> </td>
  </tr>
</table>
</form>
</body>
</html>