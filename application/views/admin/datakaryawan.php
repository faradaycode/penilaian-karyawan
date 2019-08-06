<section id="datakyw-page">
    <div class="upper-button">
        <div class="flexbox text-capitalize">
            <div>
                <button class="btn btn-success" data-toggle="modal" data-target="#mdlkaryawan">
                    <i class="fa fa-file"></i>
                    <span>Import File CSV</span>
                </button>
            </div>
            <div>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#mdlinputk">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Data</span>
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
</section>