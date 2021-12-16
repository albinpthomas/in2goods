<?php
session_start();
include "./include/dbconnect.php";
$userId = $_SESSION['userId'];
//bussiness register
if (isset($_POST['saveAd'])) {
    $saveAd = $_POST['saveAd'];
    $insertAd = "INSERT INTO `tbl_save`(`user_id`, `items_id`) VALUES 
    ('$userId','$saveAd')";
    mysqli_query($connect, $insertAd);
    header("Location: ./home.php");
    die();
}
