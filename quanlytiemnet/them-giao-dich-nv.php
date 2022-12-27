<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý giao dịch";
require_once('./db_connect.php');
require_once('./include/function.php');
require_once('./header-nv.php');

$querykhachhang = mysqli_query($conn, "SELECT * FROM `thongtinkhachhang`");
$querygia = mysqli_query($conn, "SELECT * FROM `giatien` WHERE 1 ORDER BY `idgiatien` DESC");
$querymay = mysqli_query($conn, "SELECT `tenmay` FROM `maytinh` WHERE `id`=" . $_GET['may']);
$maytinh = mysqli_fetch_assoc($querymay);
if (isset($_POST['submit'])) {
    $query = mysqli_query($conn, "INSERT INTO `giaodich` (`sdtkhachhang`, `idmay`, `idgiatien`, `thoigianbatdau`, `giamgia`, `ghichu`) VALUES ('" . $_POST['khachhang'] . "', '" . $_POST['idmay'] . "', '" . $_POST['giatien'] . "', '" . $_POST['thoigianbatdau'] . "', '" . $_POST['giamgia'] . "', '" . $_POST['ghichu'] . "');");
    if ($query) {
        echo "<script>Swal.fire('Thành công!','Đã lưu thông tin giao dịch!','success').then(function(){window.location = './index.php';});</script>";
    } else {
        echo "<script>Swal.fire('Thất bại!','Không thể lưu thông tin giao dịch!','error');</script>";
    }
}

?>

<?php
require_once('./footer.php');
?>
