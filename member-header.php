<!-- 會員系統的頭 僅能使用於會員系統-->
<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$_SESSION['email'] = "okihanukus@gmail.com";
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./template.css">
    <link rel="stylesheet" href="./nav-footer.css">