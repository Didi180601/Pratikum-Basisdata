<?php
include '../koneksi.php';

$merk = $_POST['nama_merk'];
$sepatu = $_POST['model_sepatu'];

$query = "CALL insertdataMerk('$merk', '$sepatu')";

if (mysqli_query($conn, $query)) {
?>

    <script>
        alert('Data Merk Berhasil Diinputkan');
        window.location = '../procedure.php';
    </script>

<?php
} else {
?>

    <script>
       alert('Data Tidak Berhasil Diinputkan');
        window.location = '../procedure.php';
    </script>

<?php
}
