<?php
    include '../common/db.php';
    include 'database.php';
    function insertUser($dataInsert)
    {
        $lastInsertID = insert('users', $dataInsert);
        return $lastInsertID;
    }

    function existAdmin($loginId)
    {
        global $conn;
        $sql = "SELECT password FROM users WHERE username='$loginId'";
        $adminQuery = getFirstRow($sql);
        return $adminQuery;
    }

    function existUsers($loginId) {
        global $conn;
        $sql_1 = "SELECT username FROM users where username='$loginId'";
        $adminQuery_1 = getFirstRow($sql_1);
        if ($adminQuery_1 == "") {
            return 0;
        } else {
            return 1;
        }
    }
?>