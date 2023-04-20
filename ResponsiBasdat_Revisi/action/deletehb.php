<?php
include '../koneksi.php';

$id = $_GET['no_nota'];


$query = "CALL del_header_bayar('$id')";

if (mysqli_query($conn, $query)) {
?>

    <script>
        alert('Data Header Bayar Berhasil Dihapus');
        window.location = "../procedure.php";
    </script>

<?php
} else {
?>

    <script>
        alert('Data Header Bayar Berhasil');
        window.location = "../procedure.php";
    </script>

<?php
}
