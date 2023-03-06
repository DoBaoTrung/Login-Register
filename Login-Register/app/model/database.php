<?php
    function query($sql, $data = array(), $statementStatus = false)
    {
        global $conn;
        $query = false;
        try {
            $statement = $conn->prepare($sql);
            if (empty($data)) {
                $query = $statement->execute();
            } else {
                $query = $statement->execute($data);
            }
        } catch (Exception $exception) {
            die();
        }
    
        if ($statementStatus) {
            return $statement;
        }
        return $query;
    }
    
    function insert($table, $dataInsert)
    {
        global $conn;
        $keyArr = array_keys($dataInsert);
        $fieldStr = implode(', ', $keyArr);
        $valueStr = ':' . implode(', :', $keyArr);
        $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";
        query($sql, $dataInsert);
        return $conn->lastInsertId();
    }

    function getFirstRow($sql)
    {
        $statement = query($sql, array(), true);
        $dataFetch = $statement->fetch(PDO::FETCH_ASSOC);
        return $dataFetch;
    }
    
    function resetId() {
        global $conn;
        $id = $conn->lastInsertId();
        $conn->query('ALTER TABLE `users` AUTO_INCREMENT = ' . $id);
    }
?>