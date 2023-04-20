<?php
include '../koneksi.php';

$id = $_GET['id_detail'];


$query = "CALL del_detail_bayar('$id')";

if (mysqli_query($conn, $query)) {
?>

    <script>
        alert('Data Detail Bayar Berhasil Dihapus');
        window.location = "../procedure.php";
    </script>

<?php
} else {
?>

    <script>
        alert('Ga bisa dihapus mazzeh');
        window.location = "../procedure.php";
    </script>

<?php
}
