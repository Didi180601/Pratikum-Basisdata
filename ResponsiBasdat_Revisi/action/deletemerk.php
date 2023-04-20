<?php
include '../koneksi.php';

$id = $_GET['id_merk'];


$query = "CALL del_merk('$id')";

if (mysqli_query($conn, $query)) {
?>

    <script>
        alert('Data Merk Berhasil Dihapus');
        window.location = "../procedure.php";
    </script>

<?php
} else {
?>

    <script>
        alert('Data Tidak Berhasil Dihapus');
        window.location = "../procedure.php";
    </script>

<?php
}
