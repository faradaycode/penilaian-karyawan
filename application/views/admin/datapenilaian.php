<a class="btn btn-primary" href="./pages/cetak.php" target="_BLANK">Cetak Laporan</a>

<div class="tile mt-2">
    <div class="tile-body">
        <table class="table table-hover table-bordered" id="tb_datanilai">
            <thead class="text-center">
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">NIP</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Jabatan</th>
                    <th colspan="3">Skor Nilai</th>
                </tr>
                <tr>
                    <th>Teknis</th>
                    <th>Nonteknis</th>
                    <th>Kepribadian</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="rinciNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <img class="img-thumbnail" src="./assets/imgs/stark.png" />
                        </div>
                        <div class="col-8">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Lama bekerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>001</td>
                                        <td>AX</td>
                                        <td>STD</td>
                                        <td>1 tahun 2 bulan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <h3 class="tile-title">Pie Chart</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>