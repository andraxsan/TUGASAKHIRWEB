<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Siswa</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>template/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url('template') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda">
                <div class="sidebar-brand-text mx-3">Siswa</div>

            </a>
            <hr class="sidebar-divider">

            <div class="text-center">
                <img src="<?= base_url('template/images/SISWA.png') ?>" alt="ADMIN">
                <!-- Nav Item - User Information -->
                <li class="nav-item">
                    <a class="nav-link collapsed sidebar-brand d-flex align-items-center justify-content-center"
                        href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                        aria-controls="collapsePages">
                        <span><?php echo session()->get('username') ?></span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('logout') ?>" data-toggle="modal"
                                data-target="#logoutModal">Logout</a>
                        </div>
                    </div>
                </li>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="beranda">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard Siswa</h1>

                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs" id="guruTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pertemuan-tab" data-toggle="tab" href="#pertemuan" role="tab"
                                aria-controls="pertemuan" aria-selected="true">Pertemuan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pelajaran-tab" data-toggle="tab" href="#pelajaran" role="tab"
                                aria-controls="pelajaran" aria-selected="false">Pelajaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="file-tab" data-toggle="tab" href="#file" role="tab"
                                aria-controls="file" aria-selected="false">File</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tugas-tab" data-toggle="tab" href="#tugas" role="tab"
                                aria-controls="tugas" aria-selected="false">Tugas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="essay-tab" data-toggle="tab" href="#essay" role="tab"
                                aria-controls="essay" aria-selected="false">Essay</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="forum-tab" data-toggle="tab" href="#forum" role="tab"
                                aria-controls="forum" aria-selected="false">Forum</a>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tab-content mt-4" id="guruTabsContent">
                        <!-- Pertemuan -->
                        <div class="tab-pane fade show active" id="pertemuan" role="tabpanel"
                            aria-labelledby="pertemuan-tab">
                            <h4>Pertemuan</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Judul Pertemuan</th>
                                        <th scope="col">Materi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pertemuan as $p): ?>
                                        <tr>
                                            <td><?= $p['id_pertemuan']; ?></td>
                                            <td><?= $p['judul_pertemuan']; ?></td>
                                            <td><?= $p['materi']; ?></td>
                                            <td>
                                                <a href="https://docs.google.com/document/d/1QxKwEIml622oayO-a84c88sh9wg9qFbcswapUdqZTOs/edit?usp=sharing" class="btn btn-info btn-sm btn-detail-materi">
                                                    Lihat Materi
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pelajaran -->
                        <div class="tab-pane fade" id="pelajaran" role="tabpanel" aria-labelledby="pelajaran-tab">
                            <h4>Pelajaran</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Pelajaran</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Matematika</td>
                                        <td>Pengenalan Aljabar</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- File -->
                        <div class="tab-pane fade" id="file" role="tabpanel" aria-labelledby="file-tab">
                            <h4>File</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama File</th>
                                        <th>Tipe File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Materi Pertemuan 1.pdf</td>
                                        <td>PDF</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Tugas -->
                        <div class="tab-pane fade" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
                            <h4>Tugas</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul Tugas</th>
                                        <th>Batas Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tugas 1: Latihan Soal</td>
                                        <td>2025-01-30</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Essay -->
                        <div class="tab-pane fade" id="essay" role="tabpanel" aria-labelledby="essay-tab">
                            <h4>Essay</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul Essay</th>
                                        <th>Instruksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Essay 1: Sejarah</td>
                                        <td>Jelaskan latar belakang proklamasi!</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Forum -->
                        <div class="tab-pane fade" id="forum" role="tabpanel" aria-labelledby="forum-tab">
                            <h4>Forum</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Topik Diskusi</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Diskusi: Matematika</td>
                                        <td>2025-01-22</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- End of Begin Page Content -->



                <!-- End of Begin Page Content -->




                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url() ?>template/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url() ?>template/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url() ?>template/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url() ?>template/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url() ?>template/js/demo/chart-area-demo.js"></script>
        <script src="<?= base_url() ?>template/js/demo/chart-pie-demo.js"></script>

        <!-- Page level plugins -->
        <script src="<?php echo base_url('template') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url('template') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo base_url('template') ?>/js/demo/datatables-demo.js"></script>

        <!-- File JavaScript eksternal -->
        <script src="<?= base_url() ?>template/js/custom.js"></script>

</body>

</html>