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
    <a href="login.html" style="float: right">เข้าสู่ระบบ</a>
    <ul>
        <?php
        for($i = 1; $i <= 10; $i++) 
        {
            echo "<li><a href=post.php?id=$i>กระทู้ $i</a></li>";
        }
        ?>
    </ul>
</body>
</html>