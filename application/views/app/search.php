    <section class="content">
    <div class="content__inner">
        <header class="content__title">
            <h1>Result</h1>

            <div class="actions">

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url() ?>" class="dropdown-item">Refresh</a>
                    </div>
                </div>
            </div>
        </header>

        <hr>
        <br>
        <div class="row quick-stats">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Search Result</h2>
                        <small class="card-subtitle">Showing all result</small>
                    </div>

                    <div class="listview listview--hover">
                        <?php foreach ($result as $r) { 
                            $totapp = $r['app0']+$r['app1']+$r['app2']+$r['app3']+$r['app4'];
                            //echo $totapp.' == '.$r['totapp'];
                            if($r['totapp'] != $totapp){
                                if($r['status_app0'] !== '0' OR $r['status_app1'] !== '0' OR $r['status_app2'] !== '0' 
                                    OR $r['status_app3'] !== '0' OR $r['status_app4'] !== '0')
                                {
                                    $noclass  = "class='btn btn-sm btn-outline-danger'";
                                    $link   = "onclick='OpenNew".$r['id']."()' href='#'";
                                    $status = "DECLINED &nbsp;";
                                    $class  = "class='btn btn-danger pull-right'";
                                }
                                else{
                                    $noclass    = "class='btn btn-sm btn-outline-info'";
                                    $link       = "onclick='OpenNew".$r['id']."()' href='#'";
                                    $status     = "&nbsp; PENDING &nbsp;";
                                    $class      = "class='btn btn-info pull-right'";
                                }
                            }
                            elseif ($r['expire'] == '1'){
                                $noclass    = "class='btn btn-sm btn-outline bg-grey text-white'";
                                $link       = "onclick='OpenNew".$r['id']."()' href='#'";
                                $status     = "&nbsp; EXPIRED &nbsp;";
                                $class      = "class='btn bg-grey pull-right text-white'";
                            }
                            else{
                                $noclass    = "class='btn btn-sm btn-outline-success'";
                                $link       = "onclick='OpenNew".$r['id']."()' href='#'";
                                $status     = "APPROVED";
                                $class      = "class='btn btn-success pull-right'";
                            }
                        ?>
                        <a <?php echo $link ?> class="listview__item">
                            <div class="col-sm-1">
                                <button <?php echo $noclass; if($r['totapp'] != $totapp){ echo "disabled"; } ?>><?php echo $r['no_memo']; ?></button>
                            </div>    
                            <div class="col-sm-7">
                                <div class="listview__content">
                                    <div class="listview__heading"><?php echo $r['nama']." [".$r['kepada']."]"; ?></div>
                                    <p><?php echo $r['hal']; ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button <?php echo $class; ?>><?php echo $status; ?></button>
                            </div>    
                        </a>
                        <script>
                            function OpenNew<?php echo $r['id']; ?>() {
                                var newWindow = window.open("<?php echo base_url().'memo/view/'.$r['id']; ?>", "", "width=900,height=500");
                            }
                        </script>
                        <?php } ?>

                        <a href="<?php echo base_url() ?>memo/" class="view-more">Memo List</a>
                    </div>
                </div>
            </div>
        </div>

    </div>