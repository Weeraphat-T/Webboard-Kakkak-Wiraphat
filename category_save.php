<?php
    session_start();
    $category = $_POST['new_category'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql = "INSERT INTO category (name)
            VALUES ('$category')";
    $conn -> exec($sql);

    $_SESSION['Category_Status'] = 'New_Category';

    $conn = null;
    header("location:category.php");
    die();
?>