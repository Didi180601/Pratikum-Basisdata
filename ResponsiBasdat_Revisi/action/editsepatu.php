<?php
include '../koneksi.php';

$id = $_GET['id_sepatu'];
$query = "SELECT * FROM sepatu WHERE id_sepatu = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sepatu = $_POST['id_sepatu'];
    $id_merk   = $_POST['id_merk'];
    $ukuran    = $_POST['ukuran'];
    $warna     = $_POST['warna'];
    $harga     = $_POST['harga'];
    $stok      = $_POST['stok'];

    $query_update = "CALL up_sepatu($id_sepatu,$id_merk,$ukuran,'$warna',$harga,$stok)";
    mysqli_query($conn, $query_update);

    header("Location: ../procedure.php");
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Edit Data
            </div>
            <div class="card-body">
                <form action="" method="post">

                    <div class="col-sm-10">
                        <input type="hidden" name="id_sepatu" value="<?php echo $row['id_sepatu']; ?>">
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">ID Merk</label>
                        <div class="col-sm-10">
                            <input type="text" name="id_merk" value="<?php echo $row['id_merk']; ?>" class="form-control" placeholder="Masukkan ID Merk">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Ukuran</label>
                        <div class="col-sm-10">
                            <input type="text" name="ukuran" value="<?php echo $row['ukuran']; ?>" class="form-control" placeholder="Masukkan Ukuran Sepatu">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Warna</label>
                        <div class="col-sm-10">
                            <input type="text" name="warna" value="<?php echo $row['warna']; ?>" class="form-control" placeholder="Masukkan Warna Sepatu">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" name="harga" value="<?php echo $row['harga']; ?>" class="form-control" placeholder="Masukkan Harga Sepatu">
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="text" name="stok" value="<?php echo $row['stok']; ?>" class="form-control" placeholder="Masukkan Stok Sepatu Yang Tersedia">
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" name="simpan" class="btn btn-dark text-light">Simpan</button>
                        <button type="submit" name="simpan" class="btn btn-dark text-light"><a href="../procedure.php"></a>Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>