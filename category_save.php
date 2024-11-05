<?php
    session_start();
    $category = $_POST['new_category'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql1 = "SELECT name FROM category";
    $result = $conn->query($sql1);
    while ($row = $result->fetch()) {
        if ($category == $row[0]){
            header("location:category.php");
            die();
        }
    }
    $sql2 = "INSERT INTO category (name)
    VALUES ('$category')";
    $conn -> exec($sql2);

    $_SESSION['Category_Status'] = 'New_Category';

    $conn = null;
    header("location:category.php");
    die();
?>