<?php

// Hàm kết nối CSDL

function db_connect()
{
    global $conn;

    $db = func_get_arg(0);


    $conn = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['dbname']);

    if (!$conn) {

        die("Lỗi kết nối đến CSDL của bạn: " . mysqli_connect_error());
    }

    return $conn;
}


// Hàm thực thi chuỗi truy vấn

function db_query($string_query)
{

    global $conn;

    $result = mysqli_query($conn, $string_query);

    if (!$result) {

        die("Lỗi không thực hiện được câu truy vấn" . "{$string_query}" . "của bạn.");
    }

    return $result;
}


// Hàm lấy một mảng CSDL

function db_fetch_array($string_query)
{

    global $conn;
    $result = [];
    $query_reuslt = db_query($string_query);

    while ($row = mysqli_fetch_assoc($query_reuslt)) {

        $result[] = $row;
    }

    mysqli_free_result($query_reuslt);

    return $result;
}

// Lấy số lượng bản ghi

function db_num_rows($string_query)
{

    global $conn;

    $result_query = db_query($string_query);
    return mysqli_num_rows($result_query);
}

// Hàm lấy một bản ghi cụ thể

function db_fetch_row($string_query)
{

    global $conn;
    $query_reuslt = mysqli_query($conn, $string_query);
    $result = mysqli_fetch_assoc($query_reuslt);
    mysqli_free_result($query_reuslt);
    return $result;
}

// Hàm thêm dữ liệu

function db_insert($table, $data)
{

    global $conn;

    $field = "(" . implode(', ', array_keys($data)) . ")";
    $value = "";

    foreach ($data as $key => $value_for_key) {

        if ($value_for_key === NULL) {

            $value .= "NULL, ";
        } else {

            $value .= " '" . escape_string($value_for_key) . "', ";
        }
    }

    $value = substr($value, 0, -2);

    db_query("INSERT INTO `{$table}` $field VALUES($value)");
    return mysqli_insert_id($conn);
}

// update tbl_user set field = value .... where id = 
function db_update($table, $data, $where)
{
    global $conn;
    $reset_filed = "";
    foreach ($data as $field => $value) {

        if ($value === NULL) {

            $reset_filed .= "{$field} = NULL, ";
        } else {
            $reset_filed .= "{$field} = '" . escape_string($value) . "', ";
        }
    }

    $reset_filed = substr($reset_filed, 0, -2);

    db_query("UPDATE `{$table}` SET $reset_filed WHERE $where");
    return mysqli_affected_rows($conn);
}

// DELETE FROM table where id =
function db_delete($table, $where)
{

    global $conn;

    $result = db_query("DELETE FROM `{$table}` WHERE $where");
    return mysqli_affected_rows($conn);
}


function escape_string($str)
{
    global $conn;
    return mysqli_real_escape_string($conn, $str);
}
