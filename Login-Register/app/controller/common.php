<?php
    function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        return false;
    }

    function printError($error, $type) {
        if (isset($error[$type])) {
            echo $error[$type];
        }
    }

    function isLogin()
    {
        $login_id = $_SESSION['loginid'];
        $login_time = $_SESSION['logintime'];
        if (!empty($login_id) && !empty($login_time)) {
            return true;
        }
        return false;
    }
?>