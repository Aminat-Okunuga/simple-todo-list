<?php
session_start();
include 'db.php';

// set default value of name and status
$title = "";
$status = "";
$update = false;

$id = 0;
// insert into database
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $status = $_POST['status'];

    $mysqli->query("INSERT INTO todos(title, status) VALUES ('$title', '$status')") or die($mysqli->error());
    
    // save message in session
    $_SESSION['message'] = "Task Saved Successfully!";
    $_SESSION['msg_type'] = "success";
    header("location: index.php");
}

// delete record
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM todos WHERE id = $id") or die($mysqli->error);

    // save message in session
    $_SESSION['message'] = "Task Deleted Successfully!";
    $_SESSION['msg_type'] = "danger";
    header("location: index.php");
}

// edit record
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM todos WHERE id = $id") or die($mysqli->error());

    // check if record exists in database 
    if(count($result)==1){
        $row = $result->fetch_array();
        $title = $row['title'];
        $status = $row['status'];  
        $update = true;
    }
}

// update record 
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $status = $_POST['status'];

    $mysqli->query("UPDATE todos SET title = '$title', status = '$status' WHERE id = $id") or die($mysqli->error());
    

    $_SESSION['message'] = "Task Updated Successfully!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}