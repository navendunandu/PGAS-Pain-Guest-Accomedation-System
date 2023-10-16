




<?php
        $res=NULL;
		if(isset($_POST["btn_add"]))
			{
				$num1=$_POST["txt_num1"];
				$num2=$_POST["txt_num2"];
				$res=$num1 +  $num2;
			}
		if(isset($_POST["btn_mul"]))
			{
				$num1=$_POST["txt_num1"];
				$num2=$_POST["txt_num2"];
				$res=$num1 *  $num2;
			}
		if(isset($_POST["btn_div"]))
			{
				$num1=$_POST["txt_num1"];
				$num2=$_POST["txt_num2"];
				$res=$num1 /  $num2;
			}
		if(isset($_POST["btn_sub"]))
			{
				$num1=$_POST["txt_num1"];
				$num2=$_POST["txt_num2"];
				$res=$num1 -  $num2;
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
  <table bordercolor="#CCFF33" background="" width="200" border="1">
    <tr>
      <td>NUMBER-1</td>
      <td><label for="txt_num1"></label>
      <input type="text" name="txt_num1" id="txt_num1" /></td>
    </tr>
    <tr>
      <td>NUMBER-2</td>
      <td><label for="txt_num2"></label>
      <input type="text" name="txt_num2" id="txt_num2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_add" id="btn_add" value="ADD" />
      <input type="submit" name="btn_sub" id="btn_sub" value="SUB" />
      <input type="submit" name="btn_div" id="btn_div" value="DIV" />
<label for="btn_mul"></label>
      <input type="submit" name="btn_mul" id="btn_mul" value="MUL" /></td>
      
    </tr>
    <tr>
      <td>RESULT</td>
      <td><?php echo $res ?></td>
    </tr>
  </table>
</form>
</body>
</html>
