<section class="content">
    <header class="content__title">
        <h1>EDIT MEMO</h1>

        <div class="actions">
                <a href="" class="actions__item zmdi zmdi-trending-up"></a>
                <a href="" class="actions__item zmdi zmdi-check-all"></a>

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Refresh</a>
                    </div>
                </div>
            </div>
    </header>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Memo</h2>
            <small class="card-subtitle">Please make sure you're fill all data correctly. Thank you!</small>
        </div>
        <div class="card-block">
            <?php 
                foreach ($getMemobyID as $m) {
                    # code...
                    $kepada = $m['kepada']
            ?>
            <form action="<?php echo base_url() ?>memo/editmemoreject" method="post">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group form-group--float">
                            <input type="text" class="form-control" name="namamemo" id="namamemo" value="<?php echo $m['nama']; ?>" required title="Tidak boleh kosong." rel="tooltip">
                            <label>Nama Memo <a class="text-danger"> *</a></label>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-group--float">
                            <input type="text" class="form-control" name="nomemo" title="generated automatically." rel="tooltip"  value="<?php echo $m['no_memo']; ?>" readonly>
                            <label>No Memo<a class="text-success"><small> (generated by system)</small></a></label>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Kepada</label>
                            <select class="select2" name="kepada[]" multiple data-placeholder="Pilih satu atau lebih bagian." required>
                                <option value="Blown Film" <?php if (strpos($m['kepada'], "Blown Film") !== FALSE) {
                                echo "selected"; } ?>>Blown Film</option>
                                <option value="Warehouse" <?php if (strpos($m['kepada'], "Warehouse") !== FALSE) {
                                echo "selected"; } ?>>Warehouse</option>
                                <option value="PCM" <?php if (strpos($m['kepada'], "PCM") !== FALSE) {
                                echo "selected"; } ?>>PCM</option>
                                <option value="CPP" <?php if (strpos($m['kepada'], "CPP") !== FALSE) {
                                echo "selected"; } ?>>CPP</option>
                                <option value="Metalize" <?php if (strpos($m['kepada'], "Metalize") !== FALSE) {
                                echo "selected"; } ?>>Metalize</option>
                                <option value="PL 2 Laminasi" <?php if (strpos($m['kepada'], "PL 2 Laminasi") !== FALSE) {
                                echo "selected"; } ?>>PL 2 Laminasi</option>
                                <option value="PL 2 PRINTING" <?php if (strpos($m['kepada'], "PL 2 PRINTING") !== FALSE) {
                                echo "selected"; } ?>>PL 2 PRINTING</option>
                                <option value="PL 2 SLITTER" <?php if (strpos($m['kepada'], "PL 2 SLITTER") !== FALSE) {
                                echo "selected"; } ?>>PL 2 SLITTER</option>
                                <option value="PL 1 PRINTING" <?php if (strpos($m['kepada'], "PL 1 PRINTING") !== FALSE) {
                                echo "selected"; } ?>>PL 1 PRINTING</option>
                                <option value="PL 1 Laminasi" <?php if (strpos($m['kepada'], "PL 1 Laminasi") !== FALSE) {
                                echo "selected"; } ?>>PL 1 Laminasi</option>
                                <option value="PL 1 Extrusion" <?php if (strpos($m['kepada'], "PL 1 Extrusion") !== FALSE) {
                                echo "selected"; } ?>>PL 1 Extrusion</option>
                                <option value="PL 1 Slitter"<?php if (strpos($m['kepada'], "PL 1 Slitter") !== FALSE) {
                                echo "selected"; } ?>>PL 1 Slitter</option>
                                <option value="PL 1 Bag Making" <?php if (strpos($m['kepada'], "PL 1 Bag Making") !== FALSE) {
                                echo "selected"; } ?>>PL 1 Bag Making</option>
                                <option value="PL 3 Printing" <?php if (strpos($m['kepada'], "PL 3 Printing") !== FALSE) {
                                echo "selected"; } ?>>PL 3 Printing</option>
                                <option value="PL 3 Laminasi" <?php if (strpos($m['kepada'], "PL 3 Laminasi") !== FALSE) {
                                echo "selected"; } ?>>PL 3 Laminasi</option>
                                <option value="PL 3 Extrusion" <?php if (strpos($m['kepada'], "PL 3 Extrusion") !== FALSE) {
                                echo "selected"; } ?>>PL 3 Extrusion</option>
                                <option value="PL 3 Slitter" <?php if (strpos($m['kepada'], "PL 3 Slitter") !== FALSE) {
                                echo "selected"; } ?>>PL 3 Slitter</option>
                                <option value="PRINTING PHARMA" <?php if (strpos($m['kepada'], "PRINTING PHARMA") !== FALSE) {
                                echo "selected"; } ?>>PRINTING PHARMA</option>
                                <option value="EXTRUSION PHARMA" <?php if (strpos($m['kepada'], "EXTRUSION PHARMA") !== FALSE) {
                                echo "selected"; } ?>>EXTRUSION PHARMA</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group form-group--float">
                            <input type="text" class="form-control" title="Tidak boleh kosong." rel="tooltip" name="hal" value="<?php echo $m['hal']; ?>" required>
                            <label>Perihal <a class="text-danger"> *</a></label>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label>Isi Memo</label>
                        <textarea name="content" id="editor1"><?php echo $m['detail']; ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-group--float">
                            <input type="text" class="form-control" title="Keterangan untuk disampaikan kepada approval." rel="tooltip" name="keterangan" value="<?php echo $m['keterangan']; ?>">
                            <label>Keterangan </label>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <h3>
                            <small>Mengetahui:</small>
                        </h3>
                        <a class="text-danger"><small> *Kosongkan jika tidak perlu.</small></a><br>
                        <a class="text-danger"><small> *Kadiv wajib di isi / tidak boleh kosong!</small></a>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>QC <a class="text-success"><small>(pilih)</small></a></label>
                            <?php if($m['app1'] == '1') { ?>
                                <input type="text" class="form-control" name="appqc" value="<?php echo $m['app_qc']; ?>" readonly>
                            <?php } else { ?>
                            <select class="select2" name="appqc" title="Pilih Approval QC." rel="tooltip" data-placeholder="Pilih Approval QC.">
                                <option value="">-- PILIH --</option>
                                <option value="0">KOSONGKAN APPROVER QC</option>
                                <?php foreach ($getQC as $s) {
                                    # code...
                                    echo '<option value="'.$s['nama'].'"';
                                    if($s['nama'] == $m['app_qc'])
                                    {
                                        echo "selected>";
                                    }
                                    else
                                    {
                                        echo ">";
                                    }
                                    echo $s['nama'].'</option>';
                                } }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>R&D <a class="text-success"><small>(pilih)</small></a></label>
                            <?php if($m['app2'] == '1') { ?>
                                <input type="text" class="form-control" name="apprnd" value="<?php echo $m['app_rnd']; ?>" readonly>
                            <?php } else { ?>
                            <select class="select2" name="apprnd" title="Pilih Approval R&D." rel="tooltip" data-placeholder="Pilih Approval R&D.">
                                <option value="">-- PILIH --</option>
                                <option value="0">KOSONGKAN APPROVER R&D</option>
                                <?php foreach ($getRND as $s) {
                                    # code...
                                    echo '<option value="'.$s['nama'].'"';
                                    if($s['nama'] == $m['app_rnd'])
                                    {
                                        echo "selected>";
                                    }
                                    else
                                    {
                                        echo ">";
                                    }
                                    echo $s['nama'].'</option>';
                                } }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Produksi / Kadiv <a class="text-success"><small>(pilih)</small></a><a class="text-danger">*</a></label>
                            <?php if($m['app3'] == '1') { ?>
                                <input type="text" class="form-control" name="appproduksi" value="<?php echo $m['app_produksi']; ?>" readonly>
                            <?php } else { ?>
                            <select class="select2" name="appproduksi" title="Pilih Approval PRODUKSI." rel="tooltip" data-placeholder="Pilih Approval Produksi." required>
                                <option value="">-- PILIH --</option>
                                <?php foreach ($getProduksi as $s) {
                                    # code...
                                    echo '<option value="'.$s['nama'].'"';
                                    if($s['nama'] == $m['app_produksi'])
                                    {
                                        echo "selected>";
                                    }
                                    else
                                    {
                                        echo ">";
                                    }
                                    echo $s['nama'].'</option>';
                                } }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Accounting <a class="text-info"><small>(optional)</small></a></label>
                            <?php if($m['app4'] == '1') { ?>
                                <input type="text" class="form-control" name="appacc" value="<?php echo $m['app_acc']; ?>" readonly>
                            <?php } else { ?>
                            <select class="select2" name="appacc" title="Pilih Approval ACCOUNTING." rel="tooltip" data-placeholder="Pilih Approval Accounting(Optional).">
                                <option value="">-- PILIH --</option>
                                <option value="0">KOSONGKAN APPROVER ACCOUNTING</option>
                                <?php foreach ($getAccounting as $s) {
                                    # code...
                                    echo '<option clas="form-control" value="'.$s['nama'].'"';
                                    if($s['nama'] == $m['app_acc'])
                                    {
                                        echo "selected>";
                                    }
                                    else
                                    {
                                        echo ">";
                                    }
                                    echo $s['nama'].'</option>';
                                } }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>PPIC <a class="text-success"><small>(pilih)</small></a><a class="text-danger">*</a></label></label>
                            <?php if($m['app0'] == '1') { ?>
                                <input type="text" class="form-control" name="app_ppic" value="<?php echo $m['app_ppic']; ?>" readonly>
                            <?php } else { ?>
                            <select class="select2" name="app_ppic" title="Pilih Approval PPIC." rel="tooltip" data-placeholder="Pilih Approval PPIC." required>
                                <option value="">-- PILIH --</option>
                                <?php foreach ($getPPIC as $s) {
                                    # code...
                                    echo '<option clas="form-control" value="'.$s['nama'].'"';
                                    if($s['nama'] == $m['app_ppic'])
                                    {
                                        echo "selected>";
                                    }
                                    else
                                    {
                                        echo ">";
                                    }
                                    echo $s['nama'].'</option>';
                                } }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3"></div><div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <div class="form-group form-group--float">
                            <input type="text" class="form-control" name="oleh" value="<?php echo $m['dibuat']; ?>" readonly>
                            <label>Dibuat Oleh<a class="text-info"><small> (readonly)</small></a></label>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $m['id']; ?>">
                    <input type="hidden" name="status" value="<?php echo $m['status']; ?>">
                    <input type="hidden" name="app0" value="<?php echo $m['app0']; ?>">
                    <input type="hidden" name="app1" value="<?php echo $m['app1']; ?>">
                    <input type="hidden" name="app2" value="<?php echo $m['app2']; ?>">
                    <input type="hidden" name="app3" value="<?php echo $m['app3']; ?>">
                    <input type="hidden" name="app4" value="<?php echo $m['app4']; ?>">
                    <input type="hidden" name="sts_app0" value="<?php echo $m['status_app0']; ?>">
                    <input type="hidden" name="sts_app1" value="<?php echo $m['status_app1']; ?>">
                    <input type="hidden" name="sts_app2" value="<?php echo $m['status_app2']; ?>">
                    <input type="hidden" name="sts_app3" value="<?php echo $m['status_app3']; ?>">
                    <input type="hidden" name="sts_app4" value="<?php echo $m['status_app4']; ?>">
                    <input type="hidden" name="tgl_app0" value="<?php echo $m['tgl_app0']; ?>">
                    <input type="hidden" name="tgl_app1" value="<?php echo $m['tgl_app1']; ?>">
                    <input type="hidden" name="tgl_app2" value="<?php echo $m['tgl_app2']; ?>">
                    <input type="hidden" name="tgl_app3" value="<?php echo $m['tgl_app3']; ?>">
                    <input type="hidden" name="tgl_app4" value="<?php echo $m['tgl_app4']; ?>">
                    <input type="hidden" name="expire" value="<?php echo $m['expire']; ?>">
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url() ?>memo" class="btn btn-md btn-danger btn--icon-text text-whitepull pull-right"><i class="zmdi zmdi-arrow-back"></i> Back</a><a class="pull-right"> &nbsp; </a>
                        <button name="addmemo" id="addmemo" class="btn btn-md btn-success btn--icon-text text-white pull-right monitored-btn"><i class="zmdi zmdi-save"></i> Save</button>
                        <div id="loadingheader">
                            <button name="addmemo" id="addmemo" class="btn btn-md btn-success btn--icon-text text-white pull-right" disabled><i class="zmdi zmdi-save"></i> Please wait..</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
            <br><br><br>
        </div>
    </div>