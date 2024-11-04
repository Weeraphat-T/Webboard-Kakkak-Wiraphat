<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'a')
    header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard : Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<script>
    function myfunction(){
        let r = confirm("ต้องการจะลบจริงหรือไม่");
        return r;
    }
</script>
<body>
    <div class="container-lg">
    <h1 style="text-align: center;" class="mt-3">Webboard Kakkak</h1>
    <?php include "nav.php" ?>
    <div class="row mt-4">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
        <?php 
            if(isset($_SESSION['Category_Status'])){
                if ($_SESSION['Category_Status'] == 'New_Category') {
                    echo "<div class='alert alert-success'>เพิ่มหมวดหมู่เรียบร้อยแล้ว</div>";
                    unset($_SESSION['Category_Status']);
                }
                else if ($_SESSION['Category_Status'] == 'Edit_Category') {
                    echo "<div class='alert alert-success'>แก้ไขหมวดหมู่เรียบร้อยแล้ว</div>";
                    unset($_SESSION['Category_Status']);
                }
            }
        ?>
                <table class='table table-striped'>
                    <tr><th>ลำดับ</th><th>ชื่อหมวดหมู๋</th><th>จัดการ</th></tr>
                <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                    $sql = "SELECT * FROM category";
                    $result = $conn->query($sql);
                    while($row = $result->fetch()){
                        echo "<tr><td>$row[0]</td><td>$row[1]</td>
                        <td><a href='deletecategory.php' class='btn btn-danger btn-sm float-end' onclick='return myfunction()'><i class='bi bi-trash'></i>
                        <a href='category.php?id=$row[0]' class='btn btn-warning btn-sm float-end me-2' data-bs-target='#EditCategory' data-bs-toggle='modal'><i class='bi bi-pencil-fill'></i>
                    </td></tr>";
                    }
                ?>
                </table>
                <button class="btn btn-success btn-sm text-white" data-bs-target="#NewCategory" data-bs-toggle="modal">
                    <i class="bi bi-bookmark-plus"></i> เพิ่มหมวดหมู่ใหม่
                </button>
                <div class="modal fade" id="NewCategory">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">เพิ่มหมวดหมู่ใหม่</h5>
                                <button class="btn-clase" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="category_save.php" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>ชื่อหมวดหมู่ : </label>
                                        <input type="text" name='new_category' class="form-control">
                                    </div>
                                </div>
                            </form>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit" href="category_save.php">Save changes</button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="EditCategory">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">แก้ไขหมวดหมู่</h5>
                                <button class="btn-clase" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="editcategory.php" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>ชื่อหมวดหมู่ : </label>
                                        <input type="text" name='new_category' class="form-control">
                                    </div>
                                </div>
                            </form>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit" href="editcategory.php?id=$_GET[id]">Save changes</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</body>
</html>