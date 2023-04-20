<?php
include '../koneksi.php';

$id = $_GET['id_sepatu'];


$query = "CALL del_sepatu('$id')";

if (mysqli_query($conn, $query)) {
?>

    <script>
        alert('Data Sepatu Berhasil Dihapus');
        window.location = "../procedure.php";
    </script>

<?php
} else {
?>

    <script>
        alert('Data Sepatu Tidak Berhasi Dihapus');
        window.location = "../procedure.php";
    </script>

<?php
}
