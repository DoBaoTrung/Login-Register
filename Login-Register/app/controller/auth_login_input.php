<?php
    session_start();
    include 'common.php';
    include '../model/admin.php';
    if (isPost()) {
        $error_message = array();
        if (isset($_POST['login'])) {
            if (empty($_POST['loginid'])) {
                $error_message['loginid']= "Hãy nhập login id"; 
            } elseif (strlen($_POST['loginid']) < 4) {
                $error_message['loginid'] = "Hãy nhập login id tối thiểu 4 ký tự";
            }
            if (empty($_POST['password'])) {
                $error_message['password'] = "Hãy nhập password"; 
            } elseif (strlen($_POST['password']) < 6) {
                $error_message['password'] = "Hãy nhập password tối thiểu 6 ký tự";
            }
        }

        if (empty($error_message)) {
            $loginId = $_POST['loginid'];
            $password = $_POST['password'];

            $adminQuery = existAdmin($loginId);

            if (!empty($adminQuery)) {
                if ($password == $adminQuery['password']) {
                    header('Location: ../view/auth_login_success_view.php');
                } else {
                    $error_message['login_password'] = "Login id và password không đúng";
                }
            } else {
                $error_message['login_password'] = "Login id và password không đúng";
            }
        }
    }
    require_once '../view/auth_login_view.php';
?>