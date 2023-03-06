<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../../web/css/login.css">
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data">
        <h2>Đăng nhập</h2>
        <span style='color:red;'>
            <?php 
                if (isset($error_message)) { 
                    printError($error_message, 'login_password'); 
                }
            ?></span>
        <div class="username">
            <label>User</label><br>
            <input type='textbox' name='loginid' placeholder='Enter username' value="<?php echo isset($_POST['login']) ? $_POST['loginid'] : ""; ?>">                 
            <br><span style='color:red;'>
            <?php 
                if (isset($error_message)) { 
                    printError($error_message, 'loginid'); 
                }
            ?></span>
        </div>
        <br>    
        <div class="password">
            <label>Password</label><br>
            <input type='password' name='password' placeholder='Enter password' value="<?php echo isset($_POST['login']) ? $_POST['password'] : ""; ?>">
            <br><span style='color:red;'>
            <?php 
                if (isset($error_message)) { 
                    printError($error_message, 'password'); 
                } 
            ?></span>
        </div>    
        <input type='submit' name='login' value='Đăng nhập'>
        <div class="register">
            <a href="../controller/register_input.php"><em>Chưa có tài khoản</em></a>       
        </div>
    </form>
</body>
</html>
