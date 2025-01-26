<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>template/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda">
                <div class="sidebar-brand-text mx-3">Admin</div>

            </a>
            <hr class="sidebar-divider">

            <div class="text-center">
                <img src="<?= base_url('template/images/ADMIN.png') ?>" alt="ADMIN">
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
                            <a class="collapse-item" href="" data-toggle="modal" data-target="#logoutModal">Logout</a>
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

            <li class="nav-item active">
                <a class="nav-link" href="dataPengguna">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Pengguna</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manajemen</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="dataGuru">Data Guru</a>
                        <a class="collapse-item" href="dataSiswa">Data Siswa</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Data Belajar</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="dataMapel">Data Mapel</a>
                        <a class="collapse-item" href="dataJurusan">Data Jurusan</a>
                    </div>
                </div>
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
                <div class="container-fluid">

                    <!-- Alert Pesan -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>




                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                                        data-target="#Tambah-Siswa-Modal">
                                        Tambah Data Siswa
                                    </button>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">NIS</th>
                                                <th scope="col">Nama Siswa</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($siswa as $s): ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $s['nis']; ?></td>
                                                    <td><?= $s['nama_siswa']; ?></td>
                                                    <td><?= $s['alamat']; ?></td>
                                                    <td><?= $s['email']; ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-danger btn-hapus"
                                                            data-nis="<?= $s['nis']; ?>" data-toggle="modal"
                                                            data-target="#Hapus-Siswa-Modal">
                                                            Hapus
                                                        </a>

                                                        <!-- Tampilkan detail dengan menggunakan data dari tabel -->
                                                        <button class="btn btn-info btn-sm btn-detail-siswa"
                                                            data-nis="<?= $s['nis']; ?>" data-nama="<?= $s['nama_siswa']; ?>"
                                                            data-alamat="<?= $s['alamat']; ?>"
                                                            data-email="<?= $s['email']; ?>"
                                                            data-foto="<?= base_url('uploads/siswa/' . $s['foto']); ?>"
                                                            data-toggle="modal" data-target="#Detail-Siswa-Modal">
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Detail Siswa -->
                    <div class="modal fade" id="Detail-Siswa-Modal" tabindex="-1" role="dialog"
                        aria-labelledby="DetailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="DetailModalLabel">Detail Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <div class="text-center">
                                        <img id="foto-siswa" src="" alt="Foto Siswa" class="img-fluid rounded mb-3"
                                            style="max-width: 150px;">
                                    </div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>NIS</th>
                                            <td id="detail-nis"></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td id="detail-nama"></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td id="detail-alamat"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td id="detail-email"></td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Include jQuery (CDN) -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <!-- Include Bootstrap JS (CDN) -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

                    <script>
                        // JavaScript untuk mengisi data modal saat tombol Detail diklik
                        $('#Detail-Siswa-Modal').on('show.bs.modal', function (event) {
                            var button = $(event.relatedTarget); // Tombol yang memicu modal
                            var nis = button.data('nis');
                            var nama = button.data('nama');
                            var alamat = button.data('alamat');
                            var email = button.data('email');
                            var foto = button.data('foto');

                            // Set data modal
                            $('#detail-nis').text(nis);
                            $('#detail-nama').text(nama);
                            $('#detail-alamat').text(alamat);
                            $('#detail-email').text(email);
                            $('#foto-siswa').attr('src', foto);
                        });
                    </script>


                </div>
                <!-- End of Main Content -->

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

        <!-- The Modal -->
        <div class="modal fade" id="Tambah-Siswa-Modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Tambah Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Siswa</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="<?= base_url('Admin/tambahSiswa') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                            <div class="form-group">
                                <label for="nis">Nis:</label>
                                <input type="text" class="form-control" id="nis" name="nis" required>
                            </div>

                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa:</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="Hapus-Siswa-Modal" tabindex="-1" role="dialog" aria-labelledby="HapusModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="HapusModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data siswa ini?
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <form action="<?= base_url('Admin/hapusSiswa') ?>" method="POST">
                            <input type="hidden" id="hapus-nis" name="nis">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>





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
        <script src="<?= base_url() ?>template/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url() ?>template/js/demo/datatables-demo.js"></script>

        <!-- File JavaScript eksternal -->
        <script src="<?= base_url() ?>template/js/custom.js"></script>

</body>

</html>