<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="css/main.87c0748b313a1dda75f5.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.min.css">
    <script type="text/javascript" src="main.87c0748b313a1dda75f5.js"> </script>
    <script type="text/javascript" src="kembali.js"> </script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
    </style>

</head>

<body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css" type="text/css" />
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="app-header__logo scrollbar-container ps">
                </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="fas fa-users fa-2x mr-2"></i>
                                                <?= $_SESSION['username'] ?>
                                                <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                            </div>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-sm dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                            </div>
                                            <div class="scroll-area-xs">
                                                <div class="scrollbar-container ps">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">My Account
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Settings
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider mb-0 nav-item"></li>
                                            </ul>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item">
                                                </li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <a href="logout.php" class="btn-wide btn btn-primary btn-sm">Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li>
                                <a href="dashboard.php">
                                    <i class="fas fa-columns fa-lg mr-2"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="daftarwarkop.php">
                                    <i class="fas fa-coffee fa-lg mr-2"></i>Manage Warkop
                                </a>
                            </li>
                            <li>
                                <a href="ketersediaan.php">
                                    <i class="fas fa-money-check-alt mr-2"></i>Ketersediaan Warkop
                                </a>
                            </li>
                            <li>
                                <a href="about.php">
                                    <i class="fas fa-info-circle fa-lg mr-2"></i>about
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="app-main__outer">
                <div class="animated slideInLeft">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>Dashboard
                                        <div class="page-title-subheading">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        include 'koneksi.php';
                        $sql = "SELECT count(*) FROM data_location";
                        $hasil = $koneksi->query($sql);
                        $jumlah_warkop = $hasil->fetch_array();

                        $sql = "SELECT last_update FROM data_location";
                        $hasil = $koneksi->query($sql);
                        $last_update = $hasil->fetch_array();

                        $sql = "SELECT count(*) from data_location where max_cap = curr_cap";
                        $hasil = $koneksi->query($sql);
                        $warkop_full = $hasil->fetch_array();

                        $sql = "SELECT count(*) from data_location where curr_cap < max_cap";
                        $hasil = $koneksi->query($sql);
                        $warkop_tersedia = $hasil->fetch_array();

                        $sql = "select curr_cap from data_location";
                        $hasil = $koneksi->query($sql);
                        $jumlah = 0;
                        while ($jumlah_pengunjung = $hasil->fetch_array()) {
                            $jumlah = $jumlah + $jumlah_pengunjung['curr_cap'];
                        }

                        ?>
                        <div class="row mx-auto mb-5">
                            <div class="col-md-3 mx-auto">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">

                                        <h5 class="card-title">Jumlah Warkop</h5>
                                        <p class="card-text"><?= $jumlah_warkop[0] ?></p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mx-auto">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">

                                        <h5 class="card-title">Last Update</h5>
                                        <p class="card-text"><?= $last_update[0] ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mx-auto">
                            <div class="col-md-3 mx-auto">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">

                                        <h5 class="card-title">Total Pengunjung Warkop</h5>
                                        <p class="card-text"><?= $jumlah ?></p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mx-auto">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">

                                        <h5 class="card-title">Jumlah Warkop Full</h5>
                                        <p class="card-text"><?= $warkop_full[0] ?></p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mx-auto">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">

                                        <h5 class="card-title">Jumlah Warkop Tersedia</h5>
                                        <p class="card-text"><?= $warkop_tersedia[0] ?></p>

                                    </div>
                                </div>
                            </div>


                        </div>



                    </div>
                </div>

            </div>

            <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.js">
            <script>
                $(document).ready(function() {
                    $('#example').DataTable({
                        "responsive": true,
                        "columnDefs": [{
                                responsivePriority: 1,
                                targets: 0
                            },
                            {
                                responsivePriority: 2,
                                targets: 4
                            },
                        ]
                    });
                });
            </script>
</body>

</html>