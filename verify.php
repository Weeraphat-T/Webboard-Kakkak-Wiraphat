<?php
session_start();
if (isset($_SESSION['id']))
    header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <center>
        <p>
        <?php

        if ($_POST['Login'] == "admin" && $_POST['Password'] == "ad1234") {
            $_SESSION['username']="admin";
            $_SESSION['role']="a";
            $_SESSION['id']=session_id();
            header("location:index.php");
            die(); }

        else if ($_POST['Login'] == "member" && $_POST['Password'] == "mem1234") {
            $_SESSION['username']="member";
            $_SESSION['role']="m";
            $_SESSION['id']=session_id();
            header("location:index.php");
            die(); }

        else {
            $_SESSION['error']='error';
            header("location:login.php");
            die(); }

        ?> 
    <br><a href="index.php">กลับไปหน้าหลัก</a></p>  
    </center>
</body>
</html>
