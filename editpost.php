<?php
session_start();
if (!isset($_SESSION['id']))
    header("location:index.php");
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$sql = $sql = "SELECT t1.id,t1.title,t1.content,t1.cat_id,t2.name,t1.user_id FROM post as t1 INNER JOIN category as t2 ON (t1.cat_id=t2.id)";
$result = $conn->query($sql);
while($row = $result->fetch()){
    if ($_GET["id"] == $row[0]) {
        if ($_SESSION['user_id'] != $row[5])
            header("location:index.php");
        else {
            $title = $row[1];
            $content = $row[2];
            $cat_id = $row[3];
            $cat_name = $row[4];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body onload="Autofill">
    <div class="container-lg">
    <h1 style="text-align: center;" class="mt-3">Webboard Kakkak</h1>
    <?php include "nav.php" ?>
    <div class="row mt-4">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
        <?php 
            if(isset($_SESSION['editted'])){
                echo "<div class='alert alert-success'>แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
                unset($_SESSION['editted']);
            }
        ?>
            <div class="card border-warning">
            <h5 class="card-header bg-warning text-white">แก้ไขกระทู้</h5>
                <div class="card-body">
                <?php
                echo "<form action='editpost_save.php?id=$_GET[id]' method='post'>";
                ?>
                    <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                            <div class="col-lg-9">
                                <select name="category" class="form-select">
                                    <?php
                                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                                        $sql = "SELECT * FROM category";
                                        echo "<option value=".$cat_id.">".$cat_name."</option>";
                                        foreach($conn->query($sql) as $row){
                                            if ($row['id'] != $cat_id)
                                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                                        }
                                        $conn = null;
                                    ?>
                                </select>
                            </div>
                    </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">หัวข้อ :</label>
                            <div class="col-lg-9">
                                <?php
                                echo "<input type='text' name='title' class='form-control' value=$title require>";
                                ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">เนื้อหา :</label>
                            <div class="col-lg-9">
                                <?php
                                echo "<textarea class='form-control' name='content' rows='8' require>$content</textarea>";
                                ?>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-lg-12">
                                <center>
                                    <button type="submit" class="btn btn-warning btn-sm text-white">
                                        <i class="bi bi-caret-right-square me-1"></i>บันทึกข้อความ
                                    </button>
                                </center>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>