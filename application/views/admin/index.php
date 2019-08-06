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

        <!-- Modal input -->
        <div class="modal fade" id="mdlinputk" tabindex="-1" role="dialog" aria-labelledby="inputkywlabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputkywlabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('index.php/Karyawans/add'); ?>" id="forminputk" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="it_nip">NIP</label>
                                <input id="it_nip" name="itnip" type="number" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="it_nama">Nama</label>
                                <input id="it_nama" name="itnama" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="seljbt">Jabatan</label>
                                <select name="seljbt" class="form-control" id="seljbt">
                                    <option value="0">Pilih Jabatan</option>
                                    <?php
                                    foreach ($jabatan as $j) {
                                        echo "<option value='$j->id_j'>$j->nama_j</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Masuk Kerja</label>
                                <div id="holder-calendar" class="input-group mb-3 date" data-provide="datepicker">
                                    <input type="text" class="form-control" name="itwaktu" aria-describedby="icondate">

                                    <div class="input-group-append text-center">
                                        <span class="input-group-text fa fa-calendar" id="icondate"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input class="btn btn-success" type="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
</body>

</html>