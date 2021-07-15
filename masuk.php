<?php
require 'funtion.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laboran TIF UAD</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Laboran TIF</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Alat Laboran
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Alat Masuk
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Alat Laboran Masuk</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Alat Baru
                            </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Alat</th>
                                                <th>QTY</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                            $ambilsemuadataalat = mysqli_query($conn,"select * from masuk m, alat a where a.id_alat = m.id_alat");
                                            while($data=mysqli_fetch_array($ambilsemuadataalat)){
                                                $tanggal = $data['tanggal']
                                                $nama_alat = $data['nama_alat'];
                                                $qty = $data['qty'];
                                                $keterangan = $data['keterangan'];
                                            ?>

                                            <tr>
                                                <td><?=$tanggal;?></td>
                                                <td><?=$nama_alat;?></td>
                                                <td><?=$qty;?></td>
                                                <td><?=$keterangan;?></td>
                                            </tr>

                                            <?php
                                            };
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Tambah Barang Baru</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <from method="post">
                <div class="modal-body">

                <select nama="alatnya" class="from-control">
                    <?php
                        $ambilsemuadata = mysqli_query($conn,"Select * from  alat");
                        while($fatcharray = mysqli_fetch_array($ambilsemuadata)){
                            $nama_alatnya = $fatcharray['nama_alat'];
                            $idalatnyanya = $fatcharray['id_alat'];

                    ?>

                    <option velue = "<?=$idalatnyanya;?>"><?=$nama_alatnya;?></option>


                    <?php
                        }
                    ?>
                </select>
                <br>
                <input type="number" name="qty" class="from-control" placeholder="Quantity" require>
                <br>
                <input type="text" name="penerima" class="from-control" placeholder="penerima" require>
                <br>
                <button type="submit" class="btn btn-primary" data-dismiss="alatmasuk">Submit</button>
                </div>
                </from>
                
            </div>
            </div>
        </div>
</html>
