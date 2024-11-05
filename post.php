<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard Kakkak : Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container-lg">
    <h1 style="text-align: center;" class="mt-3">Webboard Kakkak</h1>
    <?php include "nav.php" ?>
    <center>
    <p class="mt-3">ต้องการดูกระทู้หมายเลข   
        <?php echo $_GET["id"]."<BR>";
        if (($_GET["id"] % 2) == 0)
            echo "เป็นกระทู้หมายเลขคู่";
        else
            echo "เป็นกระทู้หมายเลขคี่";
        ?>
    </p>
    </center>
    <div class="row mt-4">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
        <?php 
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            $sql1 = "SELECT t1.title , t1.content , t2.login , t1.post_date FROM post as t1
                    INNER JOIN user as t2 ON (t1.user_id=t2.id) where t1.id = $_GET[id]";
            $result1 = $conn->query($sql1);
            while($row1 = $result1->fetch()){
                echo "<div class='card text-dark bg-white border-primary mb-4'>
                        <div class='card-header bg-primary text-white'>$row1[0]</div>
                        <div class='card-body'>
                            $row1[1]<br><br>$row1[2] - $row1[3]
                        </div>
                    </div>";
            }
            $sql2 = "SELECT t3.id , t3.content , t2.login , t3.post_date FROM comment as t3
                    INNER JOIN user as t2 ON (t3.user_id=t2.id) where t3.post_id = $_GET[id]";
            $result2 = $conn->query($sql2);
            $i = 1;
            while($row2 = $result2->fetch()){
                echo "<div class='card text-dark bg-white border-info mb-4'>
                        <div class='card-header bg-info text-white'>ความคิดเห็นที่ $i</div>
                        <div class='card-body'>
                            $row2[1]<br><br>$row2[2] - $row2[3]
                        </div>
                    </div>";
                $i++;
            }
            $conn = null;

        if (isset($_SESSION['id']) && $_SESSION['role'] != "b") {
            echo "<div class='card text-dark bg-white border-success'>
                <div class='card-header bg-success text-white'>แสดงความคิดเห็น</div>
                <div class='card-body'>
                    <form action='post_save.php' method='post'>
                        <input type='hidden' name='post_id' value=$_GET[id]>
                        <div class='row mb-3 justify-content-center'>
                            <div class='col=lg-10'>
                                <textarea name='comment' class='form-control' rows='8'></textarea>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <center>
                                    <button type='submit' class='btn btn-success btn-sm text-white'>
                                    <i class='bi bi-box-arrow-up-right me-1'></i>ส่งข้อความ</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>";
        }
        ?>
        </div>
        </div>
    </div>
</body>
</html>