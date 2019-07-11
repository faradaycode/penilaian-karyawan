<!DOCTYPE html>
<html lang="en">

<?php
$icon = "";
$titled = "";
$pagepath = "";
$urli = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
?>

<!-- header -->
<?php include "./partials/header.php"; ?>

<!-- body -->

<body class="app sidebar-mini rtl">

    <!-- Navbar-->
    <?php include "./partials/topnavigation.php"; ?>

    <!-- Sidebar menu-->
    <?php include "./partials/sidemenu.php"; ?>

    <!-- side menu event on php -->
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'dashboard':
                $titled = "dashboard";
                $icon = "fa-home";
                $pagepath = "./pages/dashboard.php";
                break;
            case 'datakaryawan':
                $titled = "data karyawan";
                $icon = "fa-users";
                $pagepath = "./pages/datakaryawan.php";
                break;
            case 'datapenilaian':
                $titled = "data nilai karyawan";
                $icon = "fa-star";
                $pagepath = "./pages/datapenilaian.php";
                break;
            case 'penilaian':
                $titled = "data karyawan";
                $icon = "fa-check-circle";
                $pagepath = "./pages/formpenilaian.php";
                break;
            default:
                $titled = "dashboard";
                $icon = "fa-home";
                $pagepath = "./pages/dashboard.php";
                break;
        }
    } else {
        $titled = "dashboard";
        $icon = "fa-home";
        $pagepath = "./pages/dashboard.php";
    }
    ?>

    <!-- main content -->
    <main class="app-content">

        <!-- title and breadcrumb -->
        <div class="app-title">
            <div>
                <h1 class="text-capitalize">
                    <i class="fa <?php echo $icon; ?>"></i> <?php echo $titled; ?>
                </h1>
                <!--
                    <p>A free and open source Bootstrap 4 admin template</p>
                    -->
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>

        <div class="container-fluid">
            <!-- $pagepath = all content here -->
            <?php include $pagepath; ?>
        </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="assets/js/plugins/chart.js"></script>
    <!-- datatables -->
    <script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="assets/js/func.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#tb_datakyw').DataTable({
            "columns": [
                null,
                null,
                null,
                {
                    "width": "20%"
                }
            ]
        });
    </script>


    <script type="text/javascript">
        $('#rinciNilai').on('shown.bs.modal', function(event) {

            var button = $(event.relatedTarget);
            var modal = $(this);
            var canvas = modal.find('.modal-body canvas');

            // Chart initialisieren
            var ctx = canvas[0].getContext("2d");
            var chart = new Chart(ctx).Line({
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        fillColor: "rgba(190,144,212,0.2)",
                        strokeColor: "rgba(190,144,212,1)",
                        pointColor: "rgba(190,144,212,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }
                ]
            }, {});
        });
    </script>

</body>

</html>