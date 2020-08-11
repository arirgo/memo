               <section class="content">
    <header class="content__title">
        <h1>USER GUIDE</h1>

        <div class="actions">
                <a href="" class="actions__item zmdi zmdi-trending-up"></a>
                <a href="" class="actions__item zmdi zmdi-check-all"></a>

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url() ?>guide" class="dropdown-item">Refresh</a>
                    </div>
                </div>
            </div>
    </header>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">User Guide</h2>
            <small class="card-subtitle">User guide memo online PT. Plasindo Lestari.</small>
        </div>

        <div class="card-block">
            <?php
            if($level == 'User') { ?>
                <embed title='GUIDE' src='<?php echo base_url() ?>assets/doc/Manual_Book_User.pdf' width=100% height='650px' />
            <?php } elseif($level == 'Admin') { ?>
                <embed title="GUIDE" src="<?php echo base_url() ?>assets/doc/Manual_Book_PPIC.pdf" width=100% height="650px" />
            <?php } elseif($level == 'QC' OR $level == 'R&D' OR $level == 'PRODUKSI') {?>
                <embed title="GUIDE" src="<?php echo base_url() ?>assets/doc/Manual_Book_Approval.pdf" width=100% height="650px" />
            <?php } else { ?>
                <embed title='GUIDE' src='<?php echo base_url() ?>assets/doc/Manual_Book_User.pdf' width=100% height='650px' />
            <?php } ?>
        </div>
    </div>