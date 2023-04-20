<?php
include '../koneksi.php';

$detail = $_POST['id_detail'];
$bayar = $_POST['bayar'];
$sisa = $_POST['sisa_bayar'];
$tanggal = $_POST['tanggal'];


$queryBanyak = "SELECT * FROM detail_bayar WHERE id_detail = '$detail'";

$res = mysqli_query($conn, $queryBanyak);

$data = mysqli_fetch_assoc($res);

$total = $data['jumlah_beli'];

$query = "CALL insertheader_bayar( '$tanggal','$detail', '$total', '$bayar', '$sisa')";

if (mysqli_query($conn, $query)) {
?>

    <script>
        alert('Data Header Bayar Berhasil Masuk');
        window.location = "../procedure.php";
    </script>

<?php
} else {
?>

    <script>
       alert('Salah Anjeng');
        window.location = "../procedure.php";
    </script>

<?php
}
