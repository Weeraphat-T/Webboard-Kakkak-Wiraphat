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
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;"><b>Webboard Kakkak</b></h1>
    <hr>
    <center>
    <table style="border:2px solid black ; width : 40%">
        <tr><td colspan="2" style="background-color: #6cd2fe">กรอกข้อมูล</td></tr>
        <tr><td>ชื่อบัญชี:</td><td><input type="text" name="Login-Name"></td></tr>
        <tr><td>รหัสผ่าน</td><td><input type="password" name="Password"></td></tr>
        <tr><td>ชื่อ-นามสกุล:</td><td><input type="text" name="Name-Lastname"></td></tr>
        <tr><td>เพศ:</td>
            <td><input type="radio" name="gender" value="Male">ชาย<br>
                <input type="radio" name="gender" value="Female">หญิง<br>
                <input type="radio" name="gender" value="Other">อื่นๆ
        </td></tr>
        <tr><td>อีเมล:</td><td><input type="text" name="Email"></td></tr>
        <tr><td colspan="2"><center><input type="submit" value="สมัครสมาชิก"></center></td></tr>
    </table>
    <p><a href="index.php">กลับไปหน้าหลัก</a></p>
    </center>
</body>
</html>