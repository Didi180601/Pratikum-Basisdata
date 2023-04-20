<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stored Procedure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<header>
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="index.php">DASHBOARD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="procedure.php">Stored Procedure</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="function.php">Function</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="views.php">Views</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>
<body>
    <!-- TABEL MERK -->
    <div class="mx-auto">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Create / Edit Data
            </div>
            <div class="card-body">
                <form action="action/inputmerk.php" method="POST">
                    <div class="mb-3 row">
                        <label for="nama_merk" class="col-sm-2 col-form-label">Merk Sepatu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_merk" name="nama_merk" placeholder="Masukkan Nama Merk">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="model_sepatu" class="col-sm-2 col-form-label">Model sepatu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Model_sepatu" name="model_sepatu" placeholder="Masukkan Model Sepatu">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-dark" />
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-white bg-dark">
                Data Merk
            </div>
            <div class="card-body">
                <table class="table" id="data">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Merk</th>
                            <th scope="col">Nama Merk</th>
                            <th scope="col">Model Sepatu</th>
                            <th></th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qry    = "SELECT * FROM merk";
                        $q2     = mysqli_query($conn, $qry);
                        $urut   = 1;
                        while ($row = mysqli_fetch_array($q2)) {
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $urut++; ?>
                                </th>
                                <td scope="row">
                                    <?php echo $row['id_merk']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['nama_merk']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['model_sepatu']; ?>
                                </td>
                                <td></td>
                                <td scope="row">
                                    <a href="action/editmerk.php?id_merk=<?php echo $row['id_merk']; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="action/deletemerk.php?id_merk=<?php echo $row['id_merk']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <!-- TABEL SEPATU -->
    <div class="mx-auto">
        <div class="card">
            <div class="card-header text-white bg-dark">
                Create / Edit Data
            </div>
            <div class="card-body">
                <form action="action/inputsepatu.php" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">ID Merk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_merk" name="id_merk" placeholder="Masukkan ID Merk">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Ukuran Sepatu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Masukkan Ukuran Sepatu">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Warna Sepatu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukkan Warna Sepatu">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Harga Sepatu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Sepatu">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Stok Sepatu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Sepatu">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-dark" />
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-white bg-dark">
                Data Sepatu
            </div>
            <div class="card-body">
                <table class="table" id="data">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Sepatu</th>
                            <th scope="col">ID Merk</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th></th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qry    = "SELECT * FROM sepatu";
                        $q2     = mysqli_query($conn, $qry);
                        $urut   = 1;
                        while ($row = mysqli_fetch_array($q2)) {
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $urut++; ?>
                                </th>
                                <td scope="row">
                                    <?php echo $row['id_sepatu']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['id_merk']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['ukuran']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['warna']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['harga']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['stok']; ?>
                                </td>
                                <td></td>
                                <td scope="row">
                                    <a href="action/editsepatu.php?id_sepatu=<?php echo $row['id_sepatu']; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="action/deletesepatu.php?id_sepatu=<?php echo $row['id_sepatu']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Tabel Detail Bayar -->
    <div class="mx-auto">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Create / Edit Data
            </div>
            <div class="card-body">
                <form action="action/inputdb.php" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">ID Sepatu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_sepatu" name="id_sepatu" placeholder="Masukkan ID Sepatu">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Jumlah Beli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah_beli" name="jumlah_beli" placeholder="Masukkan Jumlah Beli">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-dark" />
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-white bg-dark">
                Data Detail Bayar
            </div>
            <div class="card-body">
                <table class="table" id="data">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Detail</th>
                            <th scope="col">ID Sepatu</th>
                            <th scope="col">Jumlah Beli</th>
                            <th></th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qry    = "SELECT * FROM detail_bayar";
                        $q2     = mysqli_query($conn, $qry);
                        $urut   = 1;
                        while ($row = mysqli_fetch_array($q2)) {
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $urut++; ?>
                                </th>
                                <td scope="row">
                                    <?php echo $row['id_detail']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['id_sepatu']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['jumlah_beli']; ?>
                                </td>
                                <td></td>
                                <td scope="row">
                                    <a href="action/editdb.php?id_detail=<?php echo $row['id_detail']; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="action/deletedb.php?id_detail=<?php echo $row['id_detail']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Tabel Header Bayar -->
    <div class="mx-auto">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Create / Edit Data
            </div>
            <div class="card-body">
                <form action="action/inputhb.php" method="POST">
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal Transaksi">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_detail" class="col-sm-2 col-form-label">ID Detail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_detail" name="id_detail" placeholder="Masukkan id detail">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="total_pembelian" class="col-sm-2 col-form-label">Total Beli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="total_pembelian" name="total_pembelian" placeholder="Masukkan Total Yang di Beli">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bayar" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bayar" name="bayar" placeholder="Masukkan Jumlah Yang Dibayarkan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sisa_bayar" class="col-sm-2 col-form-label">Sisa Bayar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sisa_bayar" name="sisa_bayar" placeholder="Masukkan Total Kembalian">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-dark" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-dark">
                Data Header Bayar
            </div>
            <div class="card-body">
                <table class="table" id="data">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No Nota</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">ID Detail</th>
                            <th scope="col">Total Pembelian</th>
                            <th scope="col">Jumlah Bayar</th>
                            <th scope="col">Kembalian</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qry    = "SELECT * FROM header_bayar";
                        $q2     = mysqli_query($conn, $qry);
                        $urut   = 1;
                        while ($row = mysqli_fetch_array($q2)) {
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $urut++; ?>
                                </th>
                                <td scope="row">
                                    <?php echo $row['no_nota']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['tanggal']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['id_detail']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['total_pembelian']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['bayar']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['sisa_bayar']; ?>
                                </td>
                                <td scope="row">
                                    <a href="action/edithb.php?no_nota=<?php echo $row['no_nota']; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="action/deletehb.php?no_nota=<?php echo $row['no_nota']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>