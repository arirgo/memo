<section class="content">
    <header class="content__title">
        <h1>MEMO LIST</h1>

        <div class="actions">
                <a href="" class="actions__item zmdi zmdi-trending-up"></a>
                <a href="" class="actions__item zmdi zmdi-check-all"></a>

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url() ?>memo" class="dropdown-item">Refresh</a>
                    </div>
                </div>
            </div>
    </header>

    <div class="card">
        <div class="card-header">
            <?php echo $this->session->flashdata('reactive'); ?>
            <h2 class="card-title">Memo List</h2>
            <small class="card-subtitle">You can manage or view all existing memo based on your privilege here.</small>
        </div>

        <div class="card-block">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped">
                    <thead class="thead-default">
                        <tr>
                            <td hidden></td>
                            <td align='center'><a>NO MEMO</a></td>
                            <td><a>Nama Memo</a></td>
                            <td><a>Kepada</a></td>
                            <td align='center'><a>Expired By</a></td>
                            <td align='center'><a>Tanggal Expired</a></td>
                            <td align='center'><a>Tanggal Dibuat</a></td>
                            <td align='center'><a>Options</a></td>
                        </tr>
                    </thead>
                    <tfoot class="thead-default">
                        <tr>
                            <td hidden></td>
                            <td align='center'><a>NO MEMO</a></td>
                            <td><a>Nama Memo</a></td>
                            <td><a>Kepada</a></td>
                            <td align='center'><a>Expired By</a></td>
                            <td align='center'><a>Tanggal Expired</a></td>
                            <td align='center'><a>Tanggal Dibuat</a></td>
                            <td align='center'><a>Options</a></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach ($viewExp as $g) 
                            { 
                                $id         = $g['id'];
                                $namamemo   = $g['nama'];
                                $kepada     = $g['kepada'];
                                $keterangan = $g['keterangan'];
                                $app0       = $g['app0'];
                                $app1       = $g['app1'];
                                $app2       = $g['app2'];
                                $app3       = $g['app3'];
                                $app4       = $g['app4'];
                                $tgl_app0   = $g['tgl_app0'];
                                $tgl_app1   = $g['tgl_app1'];
                                $tgl_app2   = $g['tgl_app2'];
                                $tgl_app3   = $g['tgl_app3'];
                                $tgl_app4   = $g['tgl_app4'];
                                $stsapp0    = $g['status_app0'];
                                $stsapp1    = $g['status_app1'];
                                $stsapp2    = $g['status_app2'];
                                $stsapp3    = $g['status_app3'];
                                $stsapp4    = $g['status_app4'];
                                $tanggal    = $g['tanggal'];
                                $app        = $g['status'];
                                $app_ppic   = $g['app_ppic'];
                                $appqc      = $g['app_qc'];
                                $apprnd     = $g['app_rnd'];
                                $appprod    = $g['app_produksi'];
                                $appacc     = $g['app_acc'];
                                $totapp     = $g['totapp'];
                                $nomemo     = $g['no_memo'];
                                $expire     = $g['expire'];
                        ?>
                        <tr>
                            <td hidden><?php echo $id; ?></td>
                            <td align="center"><a onclick="OpenNew<?php echo $id; ?>()" href="#" class="btn btn-sm btn-outline-success"><?php echo $nomemo ?></a></td>
                            <script>
                                function OpenNew<?php echo $id; ?>() {
                                    var newWindow = window.open("<?php echo base_url().'memo/view/'.$id; ?>", "", "width=900,height=500");
                                }
                            </script>
                            <td><a class='btn btn btn-sm'><?php echo $namamemo ?></td>
                            <td><a class='btn btn btn-sm'><?php echo $kepada ?></td>
                            <td><a class='btn btn btn-sm'><?php echo $g['expired_by']; ?></td>
                            <td><a class='btn btn btn-sm'><?php echo $g['date']; ?></td>
                            <td><a class='btn btn btn-sm'><?php echo $tanggal ?></td>
                            
                            <th>
                                <div class="row">
                                    <?php if($app0 == '2' AND $app_ppic == $nama OR
                                             $app3 == '2' AND $appprod == $nama OR 
                                             $app4 == '2' AND $appacc == $nama) { ?>
                                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/app/'.$id; ?>" id="app" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Approve?" class="btn btn-sm btn-info">
                                        <i class="zmdi zmdi-check"></i>
                                    </a>&nbsp;
                                    <a id="changebtn" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Approve?" class="btn btn-sm btn-info" disabled>
                                        <i class="zmdi zmdi-check"></i>
                                    </a>
                                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/reject/'.$id; ?>" id="dec" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Tolak?" class="btn btn-sm btn-danger">
                                        <i class="zmdi zmdi-close-circle"></i>
                                    </a>&nbsp;
                                    <?php } elseif ($app1 == '2' AND $appqc == $nama OR 
                                                    $app2 == '2' AND $apprnd == $nama) { ?>
                                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/app/'.$id; ?>" id="app2" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Approve?" class="btn btn-sm btn-info">
                                    <i class="zmdi zmdi-check"></i>
                                    </a>&nbsp;
                                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/reject/'.$id; ?>" id="dec" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Tolak?" class="btn btn-sm btn-danger">
                                    <i class="zmdi zmdi-close-circle"></i>
                                    </a>&nbsp;
                                    <?php } elseif ($stsapp0 == '1' AND $app_ppic == $nama OR
                                                    $stsapp1 == '1' AND $appqc == $nama OR 
                                                    $stsapp2 == '1' AND $apprnd == $nama OR 
                                                    $stsapp3 == '1' AND $appprod == $nama) { ?>
                                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/undo/'.$id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Batalkan?" class="btn btn-sm btn-warning">
                                    <i class="zmdi zmdi-alert-circle-o"></i>
                                    </a>&nbsp;
                                    <?php } elseif($app == $totapp) { ?>
                                    
                                    <?php } elseif ($app0 == '1' AND $app_ppic == $nama OR
                                                    $app1 == '1' AND $appqc == $nama OR 
                                                    $app2 == '1' AND $apprnd == $nama OR 
                                                    $app3 == '1' AND $appprod == $nama) { ?>
                                    <a data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Memo telah anda approve." class="btn btn-sm btn-success text-white">
                                    <i class="zmdi zmdi-check-circle"></i>
                                    </a>&nbsp;
                                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/cancel/'.$id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Batalkan?" class="btn btn-sm btn-warning">
                                    <i class="zmdi zmdi-alert-circle-o"></i>
                                    </a>&nbsp;
                                    <?php } elseif ($stsapp0 == '1' AND $app_ppic == $nama OR
                                                    $stsapp1 == '1' AND $appqc == $nama OR 
                                                    $stsapp2 == '1' AND $apprnd == $nama OR 
                                                    $stsapp3 == '1' AND $appprod == $nama) { ?>
                                    <a data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Memo telah anda approve." class="btn btn-sm btn-success text-white">
                                    <i class="zmdi zmdi-check-circle"></i>
                                    </a>&nbsp;
                                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/cancel/'.$id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Batalkan?" class="btn btn-sm btn-warning">
                                    <i class="zmdi zmdi-alert-circle-o"></i>
                                    </a>&nbsp;
                                    <?php } ?>
                                    <a onClick="MyWindow=window.open('<?php echo base_url().'memo/view/'.$id; ?>','MyWindow',width=1000,height=200); return false;" href="#" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Lihat Detail" class="btn btn-sm btn-primary">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                    </a>&nbsp;
                                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/reactive/'.$nomemo; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Re-active?" class="btn btn-sm bg-teal text-white">
                                    <i class="zmdi zmdi-explicit"></i>
                                    </a>&nbsp;
                                    <?php if ($level == 'Super Admin' AND $app != $totapp OR $level == 'Admin' AND $app != $totapp) { ?>
                                    <a href="<?php echo base_url().'memo/edit/'.$id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Edit" class="btn btn-sm btn-success">
                                    <i class="zmdi zmdi-edit"></i>
                                    </a>&nbsp;
                                    <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?php echo base_url().'memo/delete/'.$id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Hapus?" class="btn btn-sm btn-danger">
                                    <i class="zmdi zmdi-delete"></i>
                                    </a>&nbsp;
                                    <?php } 
                                    elseif ($level == 'Super Admin' AND $app == $totapp OR $level == 'Admin' AND $app == $totapp) {
                                    if($expire == '0' OR $expire == NULL){ ?>
                                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/expire/'.$id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Expire?" class="btn btn-sm bg-blue-grey text-white">
                                    <i class="zmdi zmdi-explicit"></i>
                                    </a>&nbsp;
                                    <?php } else{} } ?>
                                </div>
                            </th>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>