<?php
include_once('../model/db_process.php');
$targetDir = "../uploads/";

#add page
function add()
{
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['select_option'];

        $create_at = date('Y-m-d H:i:s');
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            db_add($title, $description, $fileName, $status, $create_at);
            header('Location:../index.php');
        }
    }
}

function getPageData()
{
    $res_data = db_getPageData();
    return $res_data;
}

function getTotalPages()
{
    $num_page = db_getTotalPages();
    return $num_page;
}

function delete()
{
    $id = $_POST['delete'];
    db_delete($id);
    header('Location:../view/manage.php');
}

function update()
{

    $p_id = $_POST['update'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['select_option'];

    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            db_update($p_id, $title, $description, $fileName, $status);
        }
    } else {
        $fileName = NULL;
        db_update($p_id, $title, $description, $fileName, $status);
    }
    header('Location:../view/manage.php');
}

if (isset($_GET['page'])) {
    $page_id = $_GET['page'];
} else {
    $page_id = 1;
}

if (isset($_POST['add']) && !empty($_FILES['image']['name'])) {
    add();
}

if (isset($_POST['delete'])) {
    delete();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $p_id = $id;
    $row =  db_get_list($id);
    $image = $row['image'];
    $title = $row['title'];
    $status = $row['status'];
    $description = $row['description'];
}

if (isset($_POST['update'])) {
    update();
}
