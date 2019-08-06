<section id="datakyw-page">
    <div class="upper-button">
        <div class="flexbox">
            <div>
                <button class="btn btn-success" data-toggle="modal" data-target="#mdlkaryawan">
                    <i class="fa fa-file"></i>
                    <span>import file csv/xls</span>
                </button>
            </div>
            <div>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#mdlinputk">
                    <i class="fa fa-plus"></i>
                    <span>tambah data</span>
                </button>
            </div>
        </div>
    </div>

    <div class="tile">
        <div class="tile-body table-responsive">
            <table class="table table-hover table-bordered" id="tb_datakyw">
                <thead>
                    <tr class="table-success">
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal import -->
    <div class="modal fade" id="mdlkaryawan" tabindex="-1" role="dialog" aria-labelledby="importkywLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importkywLabel">Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../../controllers/controllers.php" id="formimport" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="hidden" name="prefix" value="import" />
                                <input type="file" id="filekaryawan" name="filekaryawan" class="custom-file-input">
                                <label class="custom-file-label text-left" for="customFile">choose files to upload</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                            <input id="it_nip" name="itnip" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="it_nama">Nama</label>
                            <input id="it_nama" name="itnama" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="seljbt">Jabatan</label>
                            <select name="seljbt" class="form-control" id="seljbt"></select>
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