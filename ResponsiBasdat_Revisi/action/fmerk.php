<?php
include '../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $merk   = $_POST['id_merk'];
    $stmt = mysqli_prepare($conn, "SELECT merk(?) as idmerk");
    mysqli_stmt_bind_param($stmt, "s", $merk);
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $idmerk);
        while (mysqli_stmt_fetch($stmt)) {
            echo "<script>alert ('Merk Sepatu Dari Id Merk Tersebut Adalah: $idmerk');</script>";
        }
?>
        <script>
            window.location = "../function.php";
        </script>
<?php
    } else {
        echo "Tidak Ada ID Merk";
    }
    mysqli_stmt_close($stmt);
}
?>