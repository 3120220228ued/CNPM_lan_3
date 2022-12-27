<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý máy tính";
require_once('./db_connect.php');
require_once('./include/function.php');
require_once('./header.php');
$queryinsert = 0;
if (isset($_POST['submit']) && $_POST['submit'] == 'Thêm máy tính') {
    $queryinsert = mysqli_query($conn, "INSERT INTO `maytinh` (`id`, `tenmay`, `tinhtrang`) VALUES (NULL, '" . $_POST['tenmay'] . "', '" . $_POST['tinhtrang'] . "')");
}

$querydel = 0;
if (isset($_POST['xoaid'])) {
    $querydel = mysqli_query($conn, "DELETE FROM `maytinh` WHERE `maytinh`.`id` = " . $_POST['xoaid']);
}

$queryupdate = 0;
if (isset($_POST['update'])) {
    $queryupdate = mysqli_query($conn, "UPDATE `maytinh` SET `tenmay` = '" . $_POST['suatenmay'] . "', `tinhtrang` = '" . $_POST['suatinhtrang'] . "' WHERE `maytinh`.`id` = " . $_POST['suaid']);
}

$querymay = mysqli_query($conn, "SELECT * FROM `maytinh` WHERE 1 ORDER BY `tenmay` ASC");
?>


<?php
require_once('./footer.php');
?>
