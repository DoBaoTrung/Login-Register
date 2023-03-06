<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include 'common.php';
    include '../model/admin.php';
    if (isPost()) {
        $error_message = array();
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).*$/im";
        if (isset($_POST['register'])) {
            if (empty($_POST['loginid'])) {
                $error_message['loginid']= "Hãy nhập login id"; 
            } elseif (strlen($_POST['loginid']) < 4) {
                $error_message['loginid'] = "Hãy nhập login id tối thiểu 4 ký tự";
            }
            $registerId = $_POST['loginid'];
            if (existUsers($registerId) == 1) {
                $error_message['loginid'] = "Tên người dùng đã tồn tại";
            }
            if (empty($_POST['email'])) {
                $error_message['email'] = "Hãy nhập email";
            } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error_message['email']= "Hãy nhập đúng định dạng email"; 
            }
            if (empty($_POST['password'])) {
                $error_message['password'] = "Hãy nhập password"; 
            } elseif (strlen($_POST['password']) < 6 || strlen($_POST['password']) >= 6) {
                if (preg_match($pattern, $_POST['password']) == 0) {
                    $error_message['password'] = "Hãy nhập password tối thiểu 6 ký tự ít nhất 1 ký tự thường, hoa, số và đặc biệt";
                }
            }
            if (empty($_POST['confirm_password'])) {
                $error_message['confirm_password'] = "Hãy nhập password"; 
            } elseif ($_POST['password'] != $_POST['confirm_password']) {
                $error_message['confirm_password'] = "Mật khẩu không khớp";
            }
        }

        if (empty($error_message)) {            
            $dataInsert = array(
                'username' => $_POST['loginid'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'create_datetime' => date('Y-m-d H:i:s')
            );
            resetId();
            insertUser($dataInsert);
            header('Location: ../view/register_success_view.php');
        }
    }
    require_once '../view/register_view.php';
?>