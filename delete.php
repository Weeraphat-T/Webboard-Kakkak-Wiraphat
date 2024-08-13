<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] != "a") {
    header("location:index.php");
    die();
}
else {
    echo "ลบกระทู้ หมายเลข $_GET[id]";
}
?>