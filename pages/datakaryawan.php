<div class="upper-button">
    <div class="flexbox">
        <div>
            <button class="btn btn-success" data-toggle="modal" data-target="#im-karyawanModal">
                <i class="fa fa-file"></i>
                <span>import file csv/xls</span>
            </button>
        </div>
        <div>
            <button class="btn btn-secondary">
                <i class="fa fa-plus"></i>
                <span>tambah data</span>
            </button>
        </div>
    </div>
</div>

<div class="tile">
    <div class="tile-body">
        <table class="table table-hover table-bordered" id="tb_datakyw">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>
                        <div class="flexbox">
                            <div>
                                <button class="btn btn-sm btn-info">
                                    Nilai
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-primary">
                                    Edit
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="im-karyawanModal" tabindex="-1" role="dialog" aria-labelledby="importkywLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importkywLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" name="fr_importxls">
                <div class="modal-body">
                    <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" multiple lang="ar" dir="rtl">
                                <label class="custom-file-label text-left" for="customFile">choose files to upload</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['action'])) {
    // switch ($_POST['action']) {
    //     case 'fr_importxls':
    //         doUploadExcel();
    //         break;
    // }
    echo "<h1>" . $_POST['action'] . "</h1>";

}
?>