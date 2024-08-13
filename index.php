<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1 style="text-align: center;"><b>Webboard Kakkak</b></h1>
    <hr>
    หมวดหมู่ :
    <select name="category">
        <option value="ทั้งหมด">--ทั้งหมด--</option>
        <option value="เรื่องทั่วไป">เรื่องทั่วไป</option>
        <option value="เรื่องเรียน">เรื่องเรียน</option>
    </select>
    <?php
    if (!isset($_SESSION['id'])) {
        echo "<a href='login.php' style='float: right'>เข้าสู่ระบบ</a>";
    }
    else {
        echo "<span style='float: right'>ผู้ใช้งานระบบ : $_SESSION[username]&nbsp
        <a href='logout.php' style='float: right'>ออกจากระบบ</a></span>";
        echo "<br><a href='newpost.php'>สร้างกระทู้ใหม่</a>";
    }
    ?>
    <ul> 
        <?php
        for($i = 1; $i <= 10; $i++) {
            if (!isset($_SESSION['id']) || $_SESSION['role']=="m") {
                echo "<li><a href=post.php?id=$i>กระทู้ $i</a></li>";
            }
            else if ($_SESSION['role']=="a") {
                echo "<li><a href=post.php?id=$i>กระทู้ $i</a>
                <a href=delete.php?id=$i>ลบ</a></li>";
            }
        }
        ?>
    </ul>
</body>
</html>