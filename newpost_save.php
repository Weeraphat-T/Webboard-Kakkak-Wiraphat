<?php 
    session_start();
    $title = $_POST['topic'];
    $content = $_POST['comment'];
    $category = $_POST['category'];
    $user = $_SESSION['user_id'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql = "INSERT INTO post (title, content, post_date, cat_id, user_id)
            VALUES ('$title', '$content', NOW() , '$category' , '$user')";
    $conn -> exec($sql);

    $conn = null;
    header("location:index.php");
    die();
?>