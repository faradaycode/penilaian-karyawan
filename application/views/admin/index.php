<!DOCTYPE html>
<html>

<!-- load partials head -->
<?php $this->view('partials/head'); ?>

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
                        <i class="fa <?php //icon ?>"></i> <?php //judul; ?>
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
                <?php echo $content; ?>
            </div>
    </section>

    <!-- partials scripts -->
    <?php $this->view('partials/scripts'); ?>

</body>

</html>