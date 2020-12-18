<?php
require_once 'db_connection.php';
createDB();
$conn = OpenCon();
createTable($conn);
CloseCon($conn);

function db_add($title, $description, $image, $status, $create_at)
{
    $conn = OpenCon();
    $conn->query("INSERT INTO posts(title, description,image, status, create_at)values ('$title', '$description','$image',  $status, '$create_at'); ") or die($conn->error);
    CloseCon($conn);
}

function db_getPageData()
{
    $conn = OpenCon();
    global $page_id;
    $no_recore_per_page = 5;
    $offset = ($page_id - 1) * $no_recore_per_page;
    $sql = "select * from posts limit $offset, $no_recore_per_page";
    $res_data = mysqli_query($conn, $sql);
    CloseCon($conn);
    return $res_data;
}

function db_getTotalPages()
{
    $conn = OpenCon();
    $number_data_query = 'select count(*) from posts';
    $num = mysqli_query($conn, $number_data_query);
    $total_rows = mysqli_fetch_array($num)[0];
    $num_page = ceil($total_rows / 5);
    CloseCon($conn);
    return $num_page;
}

function db_delete($id)
{
    $conn = OpenCon();
    $sql = "delete from posts where id = $id";
    mysqli_query($conn, $sql);
    CloseCon($conn);
}

function db_update($p_id, $title, $description, $fileName, $status)
{
    $conn = OpenCon();
    $update_at = date('Y-m-d H:i:s');
    if ($fileName) {
        $conn->query("update posts set title= '$title', description= '$description', status= $status,image= '$fileName',update_at = '$update_at' where id=$p_id") or die($conn->error);;
    } else {
        $conn->query("update posts set title= '$title', description= '$description', status= $status where id=$p_id");
    }
    CloseCon($conn);
}

function db_get_list($id)
{
    $conn = OpenCon();
    $sql = "select * from posts where id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $conn->close();
    return $row;
}
