    <section class="content">
        <div class="content__inner">
            <header class="content__title">
                <h1>Dashboard</h1>

                <div class="actions">

                    <div class="dropdown actions__item">
                        <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo base_url() ?>" class="dropdown-item">Refresh</a>
                        </div>
                    </div>
                </div>
            </header>

            <div class="alert alert-success">
                <b>Selamat Datang di Aplikasi Memo Online.</b>
            </div>

            <?php if($this->session->userdata('level') == 'Super Admin' OR $this->session->userdata('level') == 'PPIC' OR $this->session->userdata('level') == 'QC' OR $this->session->userdata('level') == 'R&D' OR $this->session->userdata('level') == 'PRODUKSI'){ ?>
            <div class="row quick-stats">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Memo Approval</h2>
                            <small class="card-subtitle">Showing list memo approval</small>
                        </div>

                        <div class="listview listview--hover">
                            <?php foreach ($viewnotif as $r) {
                                $id = $r['id'];
                             ?>
                                <a class="listview__item">
                                    <button class="btn btn-sm btn-outline-success" onclick="window.open('<?php echo base_url()?>memo/view/<?php echo  $id ?>', '', 'width=900,height=500')" href="#"><?php echo $r['no_memo']; ?></button>&nbsp; &nbsp; &nbsp;

                                    <div class="listview__content">
                                        <div class="listview__heading"><?php echo $r['nama']; ?></div>
                                        <p><b><?php echo $r['hal']; ?></b></p>
                                        <p>Ket : <?php echo $r['keterangan']; ?></p>
                                    </div>
                                </a>
                            <?php } ?>

                            <a href="<?php echo base_url() ?>memo/notification" class="view-more">View Detail Memo Approval</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Memo Approval</h2>
                            <small class="card-subtitle">Showing 5 recent memo outstanding</small>
                        </div>

                        <div class="listview listview--hover">
                            <?php foreach ($viewnotif as $r) { ?>
                                <a class="listview__item">
                                    <button class="btn btn-sm btn-outline-success"><?php echo $r['no_memo']; ?></button>&nbsp; &nbsp; &nbsp;

                                    <div class="listview__content">
                                        <div class="listview__heading"><?php echo $r['nama']; ?></div>
                                        <p><?php echo $r['hal']; ?></p>
                                    </div>
                                </a>
                            <?php } ?>

                            <a href="<?php echo base_url() ?>memo/notification" class="view-more">View All Memo Approval</a>
                        </div>
                    </div>
                </div> -->
            </div>
        <?php } ?>
        </div>

        <script type="text/javascript">
            function OpenNew<?php echo $r['id']; ?>() {
                var newWindow = window.open("<?php echo base_url().'memo/view/'.$r['id']; ?>", "", "width=900,height=500");
            }
        </script>