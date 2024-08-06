<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h1 style="text-align: center;"><b>Webboard Kakkak</b></h1>
    <hr>
    <p>ต้องการดูกระทู้หมายเลข 
        <?php echo $_GET["id"]."<BR>";
        if (($_GET["id"] % 2) == 0)
            echo "เป็นกระทู้หมายเลขคู่";
        else
            echo "เป็นกระทู้หมายเลขคี่";
        ?>
    </p>
    <table style="border:2px solid black ; width : 40%">
        <tr><td style="background-color: #6cd2fe">แสดงความคิดเห็น</td></tr>
        <tr><td><center><textarea name="message"></textarea></center></td></tr>
        <tr><td><center><input type="submit" value="ส่งข้อความ"></center></td></tr>
    </table>
    <p><a href="index.php">กลับไปหน้าหลัก</a></p>
    </center>
</body>
</html>