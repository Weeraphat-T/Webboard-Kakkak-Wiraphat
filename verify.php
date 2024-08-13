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
    <h1 style="text-align: center;"><b>Webboard Kakkak</b></h1>
    <hr>
    <center>
        <p>
        <?php
        $login = $_POST['Login'];
        $password = $_POST['Password'];

        if ($login == "admin" && $password == "ad1234") {
            $_SESSION['username']="admin";
            $_SESSION['role']="a";
            $_SESSION['id']=session_id();
            echo "ยินดีต้อนรับคุณ ADMIN"; }
        else if ($login == "member" && $password == "mem1234") {
            $_SESSION['username']="member";
            $_SESSION['role']="m";
            $_SESSION['id']=session_id();
            echo "ยินดีต้อนรับคุณ MEMBER"; }
        else
            echo "ชื่อบัญชีหรือหรัสผ่านไม่ถูกต้อง";
        ?> 
    <br><a href="index.php">กลับไปหน้าหลัก</a></p>  
    </center>
</body>
</html>
