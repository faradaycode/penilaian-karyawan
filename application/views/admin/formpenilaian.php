<!DOCTYPE html>
<html>

<head>
    <!-- load partials head -->
    <?php $this->view('partials/head'); ?>
</head>

<body class="app sidebar-mini rtl">

    <!-- navbar -->
    <?php $this->view('partials/topmenu'); ?>

    <!-- sidenav -->
    <?php $this->view('partials/sidemenu'); ?>

    <section id="sec-input-nilai" class="text-capitalize">
        <!-- <div id="loadinger" class="loading-container">
        <img src="./assets/imgs/loading.gif" />
    </div> -->
        <main class="app-content">

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

            <form id="form_penilaian" action="" name="form_penilaian" method="POST">
                <div class="tile">
                    <div class="tile-body">
                        <div class="form-group text-capitalize">
                            <label for="selkaryawan">nama karyawan</label>
                            <select name="selkaryawan" id="selkaryawan" class="form-control">
                                <option value="0" selected>Pilih Karyawan</option>
                                <?php
                                foreach ($dtkyw as $rows) {
                                    echo "<option value='" . $rows->id_k . "'>" . $rows->nama_k . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- pertanyaan -->
                <div class="tile">

                    <!-- <div class="tile-title"><?php //echo $tanya->aspek_ket; 
                                                    ?></div> -->
                    <?php
                    $ni = 1;
                    foreach ($dtpty as $tanya) { ?>
                        <div class="tile-body">
                            <div class="form-group">
                                <label><?php echo $ni . ". " . $tanya->isi_pertanyaan; ?></label>
                                <div class="row">
                                    <div class="col-11">
                                        <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_kualitas" oninput="updateRangetoText(this.value, 'ite_kualitas')">
                                    </div>
                                    <div class="col-1">
                                        <input type="text" value="0" name="pty<?php echo $tanya->id_pty; ?>" class="form-control form-control-plaintext" id="ite_kualitas" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $ni++;
                    } ?>
                </div>

                <input type="submit" class="btn btn-success" value="Submit" />
            </form>
        </main>
    </section>

    <!-- partials scripts -->
    <?php $this->view('partials/scripts'); ?>

    <script type="text/javascript" src="<?php echo base_url('assets/js/my.js'); ?>"></script>
</body>

</html>