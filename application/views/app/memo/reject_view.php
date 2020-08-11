
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-block">
            <form method="post" action="<?php echo base_url() ?>memo/rejectmemo">
                <?php foreach ($memoData as $m) {
                    # code...
                    $id     = $m['id'];
                }
                ?>
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="col-sm-12">
                        <label>Keterangan <a class="text-danger">*</a></label>
                        <div class="form-group">
                            <textarea class="form-control textarea-autosize" name="detail" placeholder="Tuliskan keterangan penolakan." required></textarea>
                            <i class="form-group__bar"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a onclick="javascript:window.close()" class="btn btn-md btn-danger btn--icon-text text-white pull pull-right"><i class="zmdi zmdi-close"></i> Cancel</a><a class="pull-right"> &nbsp; </a>
                        <button name="reject" id="reject" class="btn btn-md btn-success btn--icon-text text-white pull-right monitored-btn"><i class="zmdi zmdi-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
