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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        function OnblurPWD() {
            let Pwd1 = document.getElementById("pwd1");
            let Pwd2 = document.getElementById("pwd2");
            if (Pwd1.value !== Pwd2.value) {
                alert("รหัสผ่านทั้งสองช่องไม่ตรงกัน");
                Pwd1.value = "";
                Pwd2.value = "";
            }
        }
    </script>
</head>
<body>
    <div class="container-lg">
    <h1 style="text-align: center;" class="mt-3">Webboard Kakkak</h1>
    <?php include "nav.php" ?>

    <div class="row mt-4">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
        <?php 
            if(isset($_SESSION['add_login'])){
                if($_SESSION['add_login']=='error'){
                    echo "<div class='alert alert-danger'>ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
                }
                else{
                    echo "<div class='alert alert-success'>เพื่มบัญชีเรียบร้อยแล้ว</div>";
                }
                unset($_SESSION['add_login']);
            }
        ?>
        <div class="card border-primary">
        <h5 class="card-header bg-primary text-white">สมัครสมาชิก</h5>
            <div class="card-body">
            <form action="register_save.php" method="post">
                <div class="row">
                    <label for="login" class="col-lg-3 col-form-label">ชื่อบัญชี:</label>
                    <div class="col-lg-9 mb-3">
                        <input id="login" type="text" class="form-control" name="login" required>
                    </div>
                    <label for="pwd1" class="col-lg-3 col-form-label">รหัสผ่าน:</label>
                    <div class="col-lg-9 mb-3">
                        <input id="pwd1" type="password" class="form-control" name="pwd" required>
                    </div>
                    <label for="pwd2" class="col-lg-3 col-form-label">ใส่รหัสผ่านซ้ำ:</label>
                    <div class="col-lg-9 mb-3">
                        <input id="pwd2" type="password" class="form-control" name="pwd2" onblur="OnblurPWD()" required>
                    </div>
                    <label for="name" class="col-lg-3 col-form-label">ชื่อ-นามสกุล:</label>
                    <div class="col-lg-9 mb-3">
                        <input id="name" type="text" class="form-control" name="name" required>
                    </div>
                    <label for="gender" class="col-lg-3 col-form-label">เพศ:</label>
                    <div class="col-lg-9 mb-3">
                        <div class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="gender" value="m" id="m">
                            <label class="form-check-label" for="m">ชาย</label>
                        </div>
                        <div class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="gender" value="f" id="f">
                            <label class="form-check-label" for="f">หญิง</label>
                        </div>
                        <div class="list-group-item">
                            <input class="form-check-input me-1" type="radio" name="gender" value="o" id="o">
                            <label class="form-check-label" for="o">อื่นๆ</label>
                        </div>
                    </div>
                    <label for="email" class="col-lg-3 col-form-label">อีเมล:</label>
                    <div class="col-lg-9 mb-3">
                        <input id="email" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="col-lg-3 mb-3"></div>
                    <div class="col-lg-9">
                        <button href="index.php" type="submit" class="btn btn-primary btn-sm me-3"><i class="bi bi-box-arrow-in-down"></i> สมัครสมาชิก</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    <center><p><a href="index.php">กลับไปหน้าหลัก</a></p></center>
</body>
</html>