<?php
include '../koneksi.php';

$merk = $_POST['id_merk'];
$ukuran = $_POST['ukuran'];
$warna = $_POST['warna'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$query = "CALL insertdatasepatu( '$merk', '$ukuran', '$warna', '$harga', '$stok')";

if (mysqli_query($conn, $query)) {
?>

    <script>
        alert('Data Sepatu Berhasil Masuk');
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
