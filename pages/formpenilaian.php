<section id="sec-input-nilai">
    <form id="form_penilaian" action="./controllers/controllers.php" name="form_penilaian" method="POST">
        <div class="tile">
            <div class="tile-title">kemampuan teknis</div>
            <div class="tile-body">

                <div class="form-group">
                    <label>kualitas kerja</label>
                    <div class="row">
                        <div class="col-11">
                            <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_kualitas" oninput="updateRangetoText(this.value, 'ite_kualitas')">
                        </div>
                        <div class="col-1">
                            <input type="text" value="0" name="kualitas" class="form-control form-control-plaintext" id="ite_kualitas" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>kuantitas kerja</label>
                    <div class="row">
                        <div class="col-11">
                            <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_kuantitas" oninput="updateRangetoText(this.value, 'ite_kuantitas')">
                        </div>
                        <div class="col-1">
                            <input type="text" value="0" name="kuantitas" class="form-control form-control-plaintext" readonly id="ite_kuantitas">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>penguasaan kerja</label>
                    <div class="row">
                        <div class="col-11">
                            <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_penguasaan" oninput="updateRangetoText(this.value, 'ite_penguasaan')">
                        </div>
                        <div class="col-1">
                            <input type="text" value="0" name="penguasaan" class="form-control form-control-plaintext" readonly id="ite_penguasaan">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10"></div>

        <div class="tile">
            <div class="tile-title">kemampuan HAM</div>
            <div class="tile-body">
                <div class="form-group">
                    <label>kepemimpinan</label>
                    <div class="row">
                        <div class="col-11">
                            <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_pimpin" oninput="updateRangetoText(this.value, 'ite_pimpin')">
                        </div>
                        <div class="col-1">
                            <input type="text" value="0" name="kepemimpinan" class="form-control form-control-plaintext" readonly id="ite_pimpin">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>kerjasama</label>
                    <div class="row">
                        <div class="col-11">
                            <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_kerjasama" oninput="updateRangetoText(this.value, 'ite_kerjasama')">
                        </div>
                        <div class="col-1">
                            <input type="text" name="kerjasama" value="0" class="form-control form-control-plaintext" readonly id="ite_kerjasama">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>tanggung jawab</label>
                    <div class="row">
                        <div class="col-11">
                            <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_tanggungjawab" oninput="updateRangetoText(this.value, 'ite_tanggungjawab')">
                        </div>
                        <div class="col-1">
                            <input type="text" value="0" name="tanggungjawab" class="form-control form-control-plaintext" readonly id="ite_tanggungjawab">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10"></div>

        <div class="tile">
            <div class="tile-title">kepribadian</div>
            <div class="tile-body">
                <div class="form-group">
                    <label>disiplin kerja</label>
                    <div class="row">
                        <div class="col-11">
                            <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_disiplin" oninput="updateRangetoText(this.value, 'ite_disiplin')">
                        </div>
                        <div class="col-1">
                            <input type="text" value="0" name="disiplin" class="form-control form-control-plaintext" readonly id="ite_disiplin">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>integritas kerja</label>
                    <div class="row">
                        <div class="col-11">
                            <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_integritas" oninput="updateRangetoText(this.value, 'ite_integritas')">
                        </div>
                        <div class="col-1">
                            <input type="text" value="0" name="integritas" class="form-control form-control-plaintext" readonly id="ite_integritas">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>semangat kerja</label>
                    <div class="row">
                        <div class="col-11">
                            <input type="range" value="0" min="0" max="100" class="form-control-range" id="sld_semangat" oninput="updateRangetoText(this.value, 'ite_semangat')">
                        </div>
                        <div class="col-1">
                            <input type="text" value="0" name="semangat" class="form-control form-control-plaintext" readonly id="ite_semangat">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input class="btn btn-success" type="submit" value="Proses">
    </form>
</section>