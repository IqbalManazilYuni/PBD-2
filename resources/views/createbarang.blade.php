<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Create Data</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('styles/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ route('home') }}">Kelompok 2</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                {{-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> --}}
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading font-1">CRUD </div>
                            <a class="nav-link font-1" href="/create" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon pe-1"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                Create Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('barang') }}">Create Data  Barang</a>
                                    @if(auth()->user()->role == 'admin')
                                    <a class="nav-link" href="{{ route('pegawai') }}">Create Data Pegawai</a>
                                    <a class="nav-link" href="{{ route('tampil') }}">Create Data Transaksi</a>
                                    @endif
                                </nav>
                            </div>
                            <a class="nav-link font-1" href="/barangkeluar">
                                <div class="sb-nav-link-icon pe-1"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></div>
                                Data Keluar
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 font-1"><i class="fa fa-plus pe-2 " aria-hidden="true"></i>Create Data</h1>
                        {{-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> --}}
                    </div>
                    <form class="border" action="{{ route('postbarang') }}" method="post" >

                        {{ csrf_field() }}
                        <h1 class="font-1 mt-4 ">Create Data Barang</h1>
                        <div class="posisi2">
                              <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="namabarang" placeholder="Inputkan Nama Barang">
                              </div>
                              <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Harga Barang</label>
                                <input type="number" class="form-control" name="hargabarang" placeholder="Inputkan Harga Barang">
                              </div>
                              <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Jumlah Barang</label>
                                <input type="number" class="form-control" name="jumlahbarang" placeholder="Inputkan Jumlah Barang">
                              </div>
                              <button type="submit" class="btn btn-outline-primary posisi3" >Create</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('styles/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('styles/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('styles/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('styles/js/datatables-simple-demo.js') }}"></script>
    </body>
</html>
