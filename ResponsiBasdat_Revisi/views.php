<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Function</title>
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
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
    <div class="mx-auto">
        <div class="card">
            <div class="card-header text-white bg-dark">
                Pemasukan Harian
            </div>
            <div class="card-body">
                <table class="table" id="data">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No Nota</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Total Pemasukan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qry    = "SELECT * FROM pemasukan_harian";
                        $q2     = mysqli_query($conn, $qry);
                        $urut   = 1;
                        while ($row = mysqli_fetch_array($q2)) {
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $urut++; ?>
                                </th>
                                <td scope="row">
                                    <?php echo $row['No Nota']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['Tanggal']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['Total Pemasukan']; ?>
                                <td></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header text-white bg-dark">
                Sepatu Puma
            </div>
            <div class="card-body">
                <table class="table" id="data">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Merk</th>
                            <th scope="col">Model Sepatu</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Harga</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $qry    = "SELECT * FROM sepatu_puma";
                        $q2     = mysqli_query($conn, $qry);
                        $urut   = 1;
                        while ($row = mysqli_fetch_array($q2)) {
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $urut++; ?>
                                </th>
                                <td scope="row">
                                    <?php echo $row['nama_merk']; ?>
                                </td>
                                <td scope="row">
                                    <?php echo $row['model_sepatu']; ?>
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