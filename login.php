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
    <title>Login</title>
</head>
<body>
    <h1 style="text-align: center;"><b>Webboard Kakkak</b></h1>
    <hr>
    <center> <form action="verify.php" method="post">
    <table style="border:2px solid black ; width : 40%">
        <tr><td colspan="2" style="background-color: #6cd2fe">เข้าสู่ระบบ</td></tr>
        <tr><td>Login</td><td><input type="text" name="Login"></td></tr>
        <tr><td>Password</td><td><input type="password" name="Password"></td></tr>
        <tr><td colspan="2"><center><input type="submit" value="Login"></center></td></tr>
    </table>
    <p>ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></p>
    </center> </form>
</body>
</html>