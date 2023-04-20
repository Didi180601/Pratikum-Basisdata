<?php
include '../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $stmt = $conn->prepare("SELECT pemasukan_harian(?) as hasil");
    $stmt->bind_param("s", $tanggal);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<script>alert('Total Pemasukan Hari ini Adalah: $row[hasil]');</script>";
        }
?>
        <script>
            window.location = "../function.php";
        </script>
<?php
    } else {
        echo "Tidak ada hasil";
    }
}
?>