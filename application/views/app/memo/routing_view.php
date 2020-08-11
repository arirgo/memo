
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-block">
            <form method="post" action="<?php echo base_url() ?>memo/routing">
                <?php foreach ($memoData as $m) {
                    # code...
                    $id     = $m['id'];
                }
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="hidden" name="id" value='<?php echo $id; ?>'>
                            <label>Routing Approval <a class="text-success"><small>(pilih)</small></a></label>
                            <select class="select2" name="new_app" title="Pilih Approval Baru." rel="tooltip" data-placeholder="Pilih Approval Baru.">
                                <option value="">-- PILIH --</option>
                                <?php foreach ($getApp as $s) {
                                    # code...
                                    echo '<option value="'.$s['nama'].'">'.$s['nama'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a onclick="javascript:window.close()" class="btn btn-md btn-danger btn--icon-text text-white pull pull-right"><i class="zmdi zmdi-close"></i> Cancel</a><a class="pull-right"> &nbsp; </a>
                        <button name="changeapp" id="changeapp" class="btn btn-md btn-success btn--icon-text text-white pull-right monitored-btn"><i class="zmdi zmdi-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
