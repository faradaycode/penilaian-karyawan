<!DOCTYPE html>
<html>

<head>
    <!-- load partials head -->
    <?php $this->view('partials/head'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/datatables.min.css'); ?>">
</head>

<body class="app sidebar-mini rtl">
    <!-- navbar -->
    <?php $this->view('partials/topmenu'); ?>

    <!-- sidenav -->
    <?php $this->view('partials/sidemenu'); ?>

    <section id="adminpg">

        <!-- main content -->
        <main class="app-content">

            <!-- title and breadcrumb -->
            <div class="app-title">
                <div>
                    <h1 class="text-capitalize">
                        <i class="fa <?php echo $icon; ?>"></i> <?php echo $pagename; ?>
                    </h1>
                    <!--<p>A free and open source Bootstrap 4 admin template</p>-->
                </div>
                <!-- <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ul> -->
            </div>

            <div class="container-fluid">
                <?php echo $content; ?>
            </div>
        </main>
    </section>

    <!-- partials scripts -->
    <?php $this->view('partials/scripts'); ?>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
    <!-- datatables -->
    <script type="text/javascript" src="<?php echo base_url('assets/datatables/datatables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/my.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            //set datatables
            $('#tb_datakyw').DataTable({
                "columnDefs": [{
                        "width": "5%",
                        "targets": 0
                    },
                    {
                        "width": "15%",
                        "targets": 1
                    },
                    {
                        "width": "15%",
                        "targets": 3
                    },
                    {
                        "width": "10%",
                        "orderable": false,
                        "targets": 4
                    },
                ],
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo base_url('index.php/Karyawans/get_data_user'); ?>",
                    "type": "POST"
                }
            });

            //page data nilai
            $('#tb_datanilai').DataTable({
                "columnDefs": [{
                        "width": "5%",
                        "targets": 0
                    },
                    {
                        "width": "13%",
                        "targets": 1
                    },
                    {
                        "width": "15%",
                        "targets": 3
                    },
                    {
                        "width": "7%",
                        "targets": 4
                    },
                    {
                        "width": "7%",
                        "targets": 5
                    },
                    {
                        "width": "7%",
                        "targets": 6
                    },
                ],
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo base_url('index.php/Nilai/get_data_user'); ?>",
                    "type": "POST"
                }
                // dom: 'Bfrtip',
                // buttons: [
                //     'pdf'
                // ]
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
</body>

</html>