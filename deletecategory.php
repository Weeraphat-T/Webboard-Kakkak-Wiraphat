<?php
session_start();
if (isset($_SESSION['id'])) {
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql = "DELETE FROM post WHERE id = $_GET[id]";
    $conn -> exec($sql);

    $conn = null;
    header("location:index.php");
    die();
}
else {
    header("location:index.php");
    die();
}
?>