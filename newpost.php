<?php
session_start();
if (!isset($_SESSION['id']))
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
    <?php
        echo "ผู้ใช้ : $_SESSION[username]"
    ?>
    <table>
    <form>
        <tr><td>หมวดหมู่ :</td><td><select name="Type">
            <option value="ทั้งหมด">--ทั้งหมด--</option>
            <option value="เรื่องทั่วไป">เรื่องทั่วไป</option>
            <option value="เรื่องเรียน">เรื่องเรียน</option>
        </select></td></tr>
        <tr><td>หัวข้อ : </td><td><input type="text" name="header"></td></tr>
        <tr><td>เนื้อหา : </td><td><textarea name="message"></textarea></td></tr>
        <tr><td></td><td colspan="2"><input type="submit" value="บันทึกข้อความ"></td></tr>
    </form>
    </table>
</body>
</html>