<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../../web/css/register.css">
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <h2>Đăng ký</h2>
        <div class="username">
            <label>User</label><br>
            <input type='textbox' name='loginid' placeholder='Enter username' value="<?php echo isset($_POST['register']) ? $_POST['loginid'] : "";?>">         
            <br><span style='color:red;'>
            <?php 
                if (isset($error_message)) { 
                    printError($error_message, 'loginid'); 
                }
            ?></span>  
        </div>
        <br>    
        <div class="email">
            <label>Email</label><br>
            <input type="textbox" id="email" name="email" placeholder='Enter email' value="<?php echo isset($_POST['register']) ? $_POST['email'] : "";?>">
            <br><span style='color:red;'>
            <?php 
                if (isset($error_message)) { 
                    printError($error_message, 'email'); 
                }
            ?></span>
        </div>  
        <br>
        <div class="password">
            <label>Password</label><br>
            <input type='password' name='password' placeholder='Enter password' value="<?php echo isset($_POST['register']) ? $_POST['password'] : "";?>">
            <br><span style='color:red;'>
            <?php 
                if (isset($error_message)) { 
                    printError($error_message, 'password'); 
                } 
            ?></span>
        </div>
        <br>
        <div class="password">
            <label>Confirm password</label><br>
            <input type='password' name='confirm_password' placeholder='Enter password again' value="<?php echo isset($_POST['register']) ? $_POST['confirm_password'] : "";?>">
            <br><span style='color:red;'>
            <?php
                if (isset($error_message)) { 
                    printError($error_message, 'confirm_password'); 
                }
            ?></span>
        </div>
        <input type='submit' name='register' value='Đăng ký'>
    </form>
</body>
</html>