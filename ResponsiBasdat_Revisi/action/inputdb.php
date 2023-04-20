<?php
include '../koneksi.php';

$sepatu = $_POST['id_sepatu'];
$jumlah = $_POST['jumlah_beli'];


$query = "CALL insertdetail_bayar( '$sepatu', $jumlah)";

if (mysqli_query($conn, $query)) {
?>

    <script>
        alert('Data Detail Bayar Berhasil Masuk');
        window.location = "../procedure.php";
    </script>

<?php
} else {
?>

    <script>
        alert('Data Detail Bayar Tidak Berhasil Dimasukkan');
        window.location = "../procedure.php";
    </script>

<?php
}
