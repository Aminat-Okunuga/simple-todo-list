<?php
session_start();
include 'db.php';
// insert into database
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $status = $_POST['status'];

    $mysqli->query("INSERT INTO todos(title, status) VALUES ('$title', '$status')") or die($mysqli->error);
    
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