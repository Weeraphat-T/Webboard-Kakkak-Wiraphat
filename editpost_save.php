<?php 
    session_start();
    $title = $_POST['title'];
    $content = $_POST['content'];
    $cat_id = $_POST['category'];
    
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql = "UPDATE post SET title = '$title', content = '$content', cat_id = '$cat_id' WHERE id = $_GET[id]";
    $conn -> exec($sql);

    $_SESSION['editted']="success";
    $conn = null;
    header("location:editpost.php?id=$_GET[id]");
    die();
?>