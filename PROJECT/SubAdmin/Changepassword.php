<?php
include("../Assets/Connection/connection.php");
session_start();
ob_start();
include('head.php');
if(isset($_POST["btn_save"]))
{
		$selQry="select * from tbl_subadmin where subadmin_id=".$_SESSION['sid'];
		$result=$connection->query($selQry);
		$row=$result->fetch_assoc();
		
		
		$mypassword=$row['subadmin_password'];
		$cpassword=$_POST['txt_cpassword'];
		$npassword=$_POST['txt_npassword'];
		$copassword=$_POST['txt_copassword'];
		
		if($cpassword ==  $mypassword)
		{
				if($npassword == $copassword)
				{
						$updtQry="update tbl_subadmin set subadmin_password='".$npassword."' where subadmin_id =".$_SESSION['sid'];
						if($connection->query($updtQry))
						{
								 header("location:Myrofile.php");
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Password</title>
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.change-password-form {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    text-align: center;
}

h1 {
    color: #333;
}

.form-group {
    margin-bottom: 20px;
    text-align: left;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 16px;
}

button {
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}

    </style>
    <div class="container">
        <div class="change-password-form">
            <h1>Change Password</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="current-password">Current Password:</label>
                    <input type="password" id="txt_cpassword" name="txt_cpassword" required>
                </div>
                <div class="form-group">
                    <label for="new-password">New Password:</label>
                    <input type="password" id="txt_npassword" name="txt_npassword" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm New Password:</label>
                    <input type="password" id="txt_copassword" name="txt_copassword" required>
                </div>
                <button type="submit" id="btn_save" name="btn_save" >Change Password</button>
            </form>
        </div>
    </div>





</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>