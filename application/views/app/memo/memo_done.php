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
            <?php echo $this->session->flashdata('addmemosuccess'); ?>
            <?php echo $this->session->flashdata('editmemosuccess'); ?>
            <?php echo $this->session->flashdata('expired'); ?>
            <?php echo $this->session->flashdata('reactive'); ?>
            <?php echo $this->session->flashdata('routing'); ?>
            <?php echo $this->session->flashdata('reject'); ?>
            <?php echo $this->session->flashdata('canceled'); ?>
            <?php echo $this->session->flashdata('canceled2'); ?>
            <?php echo $this->session->flashdata('deleted'); ?>
            <?php echo $this->session->flashdata('approved'); ?>
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
                            <?php if($level != 'User')
                            {
                                echo "<td align='center'><a>Keterangan</a></td>
                                      <td align='center'><a>PPIC</a></td>
                                      <td align='center'><a>Tanggal</a></td>
                                      <td align='center'><a>QC</a></td>
                                      <td align='center'><a>Tanggal</a></td>
                                      <td align='center'><a>R&D</a></td>
                                      <td align='center'><a>Tanggal</a></td>
                                      <td align='center'><a>Produksi</a></td>
                                      <td align='center'><a>Tanggal</a></td>
                                      <td align='center'><a>ACCOUNTING</a></td>
                                      <td align='center'><a>Tanggal</a></td>";
                            }
                            else
                            {
                                echo "<td align='center'><a>Tanggal</a></td>";
                            }
                            ?>
                            <td align='center'><a>ActionButtons</a></td>
                        </tr>
                    </thead>
                    <tfoot class="thead-default">
                        <tr>
                            <td hidden></td>
                            <td align='center'><a>NO MEMO</a></td>
                            <td><a>Nama Memo</a></td>
                            <td><a>Kepada</a></td>
                            <?php if($level != 'User')
                            {
                                echo "<td align='center'><a>Keterangan</a></td>
                                      <td align='center'><a>PPIC</a></td>
                                      <td align='center'><a>Tanggal</a></td>
                                      <td align='center'><a>QC</a></td>
                                      <td align='center'><a>Tanggal</a></td>
                                      <td align='center'><a>R&D</a></td>
                                      <td align='center'><a>Tanggal</a></td>
                                      <td align='center'><a>Produksi</a></td>
                                      <td align='center'><a>Tanggal</a></td>
                                      <td align='center'><a>ACCOUNTING</a></td>
                                      <td align='center'><a>Tanggal</a></td>";
                            }
                            else
                            {
                                echo "<td align='center'><a>Tanggal</a></td>";
                            }
                            ?>
                            <td align='center'><a> ActionButtons </a></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            $no = 1;
                            // echo $this->uri->segment(2);
                            foreach ($memo as $g) 
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
                                $app_log    = $g['app_log'];
                        ?>
                        <script>
                            $(document).ready(function(){
                            $("#changebtn<?php echo $id; ?>").hide(); 
                                $("#appbtn<?php echo $id; ?>").click(function(){
                                    $("#changebtn<?php echo $id; ?>").show(); 
                                    $("#appbtn<?php echo $id; ?>").hide();
                                    $("#dec<?php echo $id; ?>").hide();
                                    $("#route<?php echo $id; ?>").hide();
                                });
                            });
                        </script>
                        <tr>
                            <td hidden><?php echo $id; ?></td>
                            <td align="center"><a onclick="OpenNew<?php echo $id; ?>()" href="#" class="btn btn-sm btn-outline-success"><?php echo $nomemo ?></a></td>
                            <?php 
                                if($stsapp0 == 1 OR $stsapp1 == 1 OR $stsapp2 == 1 OR $stsapp3 == 1 OR $stsapp4 == 1) {
                                    if($this->session->userdata('c2') == '1') { 
                            ?>
                                <td><a href="<?php echo base_url().'memo/renewal/'.$id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Edit/Renewal Memo?" class='btn btn-danger btn-sm text-white'"><?php echo $namamemo ?></td>
                                <?php } else { ?>
                                <td><a onclick="OpenNew<?php echo $id; ?>()" href="#" class='btn btn-danger btn-sm text-white'"><?php echo $namamemo ?></td>
                            <?php } }  else { ?>
                            <td><a onclick="OpenNew<?php echo $id; ?>()" href="#" class='btn btn btn-sm' style="color: #707070;"><?php echo $namamemo ?></td>
                            <?php } ?>
                            <td><a class='btn btn btn-sm'><?php echo $kepada ?></td>
                            <?php if($level != 'User')
                            {
                                echo "<td align='center'><a onclick='OpenKet".$id."()' href='#' class='btn btn-outline-primary btn-sm'>Lihat</a></td>";
                                if($stsapp0 == '1') 
                                { 
                                    echo "<td align='center'><a onclick='OpenDec".$id."()' href='#' class='btn btn-danger btn-sm text-white'>DECLINED: ".$app_ppic."&nbsp;</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app0."</a></td>"; 
                                }
                                elseif($app0 == '2') 
                                { 
                                    echo "<td align='center'><a class='btn btn-info btn-sm text-white'>PENDING: ".$app_ppic."&nbsp; &nbsp;</a></td>
                                          <td align='center'><a align='center'>-</a></td>"; 
                                }  
                                elseif($app0 == '1') 
                                { 
                                    echo "<td align='center'><a class='btn btn-success btn-sm text-white'>APPROVED: ".$app_ppic."</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app0."</a></td>"; 
                                }
                                else
                                {
                                    echo "<td align='center'><a class='btn btn-sm'>TIDAK ADA APPROVAL</a></td>
                                          <td align='center'>-</td>";
                                }
                                if  ($app0 == '2' AND $stsapp0 == '0' OR
                                     $app0 == '1' AND $stsapp0 == '1')
                                {
                                     echo "<td align='center'><a class='btn btn-warning btn-sm text-white'>STATUS: MENUNGGU</a></td>
                                          <td align='center'><a align='center'>".$tgl_app3."</a></td>"; 
                                }
                                elseif($stsapp1 == '1') 
                                { 
                                    echo "<td align='center'><a onclick='OpenDec".$id."()' href='#' class='btn btn-danger btn-sm text-white'>DECLINED: ".$appqc."&nbsp;</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app1."</a></td>"; 
                                }
                                elseif($app1 == '2') 
                                { 
                                    echo "<td align='center'><a class='btn btn-info btn-sm text-white'>PENDING: ".$appqc."&nbsp; &nbsp;</a></td>
                                          <td align='center'><a align='center'>-</a></td>"; 
                                }  
                                elseif($app1 == '1') 
                                { 
                                    echo "<td align='center'><a class='btn btn-success btn-sm text-white'>APPROVED: ".$appqc."</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app1."</a></td>"; 
                                }
                                else
                                {
                                    echo "<td align='center'><a class='btn btn-sm'>TIDAK ADA APPROVAL</a></td>
                                          <td align='center'>-</td>";
                                }
                                if  ($app0 == '2' AND $stsapp0 == '0' OR
                                     $app0 == '1' AND $stsapp0 == '1')
                                {
                                     echo "<td align='center'><a class='btn btn-warning btn-sm text-white'>STATUS: MENUNGGU</a></td>
                                          <td align='center'><a align='center'>".$tgl_app3."</a></td>"; 
                                }
                                elseif($stsapp2 == '1') 
                                { 
                                    echo "<td align='center'><a onclick='OpenDec".$id."()' href='#' class='btn btn-danger btn-sm text-white'>DECLINED: ".$apprnd."&nbsp;</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app2."</a></td>"; 
                                }
                                elseif($app2 == '2') 
                                { 
                                    echo "<td align='center'><a class='btn btn-info btn-sm text-white'>PENDING: ".$apprnd."&nbsp; &nbsp;</a></td>
                                          <td align='center'><a align='center'>-</a></td>"; 
                                }  
                                elseif($app2 == '1') 
                                { 
                                    echo "<td align='center'><a class='btn btn-success btn-sm text-white'>APPROVED: ".$apprnd."</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app2."</a></td>"; 
                                }
                                else
                                {
                                    echo "<td align='center'><a class='btn btn-sm'>TIDAK ADA APPROVAL</a></td>
                                          <td align='center'>-</td>";
                                }
                                if ($app1 == '2' AND $app2 == '2' OR 
                                    $app1 == '1' AND $app2 == '2' OR
                                    $app1 == '2' AND $app2 == '1' OR
                                    $app1 == '2' AND $app2 == '0' OR 
                                    $app1 == '0' AND $app2 == '2' OR
                                    $app0 == '2' AND $app1 == '0' AND $app2 == '0')
                                {
                                    echo "<td align='center'><a class='btn btn-warning btn-sm text-white'>STATUS: MENUNGGU</a></td>
                                          <td align='center'><a align='center'>".$tgl_app3."</a></td>"; 
                                }
                                elseif($stsapp3 == '1') 
                                { 
                                    echo "<td align='center'><a onclick='OpenDec".$id."()' href='#' class='btn btn-danger btn-sm text-white'>DECLINED: ".$appprod."&nbsp;</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app3."</a></td>"; 
                                }
                                elseif($app3 == '2') 
                                { 
                                    echo "<td align='center'><a class='btn btn-info btn-sm text-white'>PENDING: ".$appprod."&nbsp; &nbsp;</a></td>
                                          <td align='center'><a align='center'>-</a></td>"; 
                                }  
                                elseif($app3 == '1') 
                                { 
                                    echo "<td align='center'><a class='btn btn-success btn-sm text-white'>APPROVED: ".$appprod."</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app3."</a></td>"; 
                                }
                                else
                                {
                                    echo "<td align='center'><a class='btn btn-sm'>TIDAK ADA APPROVAL</a></td>
                                          <td align='center'>-</td>";
                                }
                                if ($app1 == '2' AND $app2 == '2' AND $app4 =='2' OR 
                                    $app1 == '1' AND $app2 == '2' AND $app4 =='2' OR
                                    $app1 == '2' AND $app2 == '1' AND $app4 =='2' OR
                                    $app1 == '2' AND $app2 == '0' AND $app4 =='2' OR 
                                    $app1 == '0' AND $app2 == '2' AND $app4 =='2' OR
                                    $app3 == '2' AND $app4 =='2' OR $app3 == '0' AND $app4 =='2' )
                                {
                                    echo "<td align='center'><a class='btn btn-warning btn-sm text-white'>STATUS: MENUNGGU</a></td>
                                          <td align='center'><a align='center' class=''>".$tgl_app4."</a></td>"; 
                                }
                                elseif($stsapp4 == '1') 
                                { 
                                    echo "<td align='center'><a onclick='OpenDec".$id."()' href='#' class='btn btn-danger btn-sm text-white'>DECLINED: ".$appacc."&nbsp;</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app4."</a></td>"; 
                                }
                                elseif($app4 == '2') 
                                { 
                                    echo "<td align='center'><a class='btn btn-info btn-sm text-white'>PENDING: ".$appacc."&nbsp; &nbsp;</a></td>
                                          <td align='center'><a align='center'>-</a></td>"; 
                                }  
                                elseif($app4 == '1') 
                                { 
                                    echo "<td align='center'><a class='btn btn-success btn-sm text-white text-sm'>APPROVED: ".$appacc."</a></td>
                                          <td align='center'><a align='center' class='btn btn-secondary btn-sm'>".$tgl_app4."</a></td>"; 
                                }
                                else
                                {
                                    echo "<td align='center'><a class='btn btn-sm'>TIDAK ADA APPROVAL</a></td>
                                          <td align='center'>-</td>";
                                }
                            }
                            else
                            {
                                echo "<td align='center'>".$tanggal."</td>";
                            }
                            ?>
                            <th align='center'>
                                <div class="row">
                                    <?php if($app0 == '2' AND $app_ppic == $nama OR 
                                            $app1 == '2' AND $appqc == $nama OR 
                                            $app2 == '2' AND $apprnd == $nama OR
                                            $app3 == '2' AND $appprod == $nama OR 
                                            $app4 == '2' AND $appacc == $nama) { ?>
                                    <div>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/app/'.$id.'/'.$segment; ?>" id="appbtn<?php echo $id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Approve?" class="btn btn-sm btn-info">
                                            <i class="zmdi zmdi-check"></i>
                                        </a>&nbsp;&nbsp;
                                    </div>
                                    <div id="changebtn<?php echo $id; ?>">
                                        <a data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Approve?" class="btn btn-sm btn-info text-white" disabled>
                                            <i class="zmdi zmdi-check"></i>
                                        </a>&nbsp;&nbsp;
                                    </div>
                                    <div id="dec<?php echo $id; ?>">
                                        <a onclick="OpenReject<?php echo $id; ?>()" href="#" id="dec" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Tolak?" class="btn btn-sm btn-danger">
                                            <i class="zmdi zmdi-close-circle"></i>
                                        </a>&nbsp;&nbsp;
                                    </div>
                                    <div id="route<?php echo $id; ?>">
                                        <a onclick="OpenRouting<?php echo $id; ?>()" href="#" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Routing Approver?" class="btn btn-sm bg-purple text-white">
                                        <i class="zmdi zmdi-rotate-right"></i>
                                        </a>&nbsp;&nbsp;
                                    </div>
                                    <?php } elseif ($stsapp0 == '1' AND $app_ppic == $nama OR
                                                    $stsapp1 == '1' AND $appqc == $nama OR 
                                                    $stsapp2 == '1' AND $apprnd == $nama OR 
                                                    $stsapp3 == '1' AND $appprod == $nama) { ?>
                                    <div>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/undo/'.$id.'/'.$segment; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Batalkan?" class="btn btn-sm btn-warning">
                                        <i class="zmdi zmdi-alert-circle-o"></i> 
                                        </a>&nbsp;&nbsp;
                                    </div>
                                    <?php } elseif($app == $totapp) { ?>
                                    
                                    <?php } 
                                    elseif ($app_ppic == $nama AND $app0 == '1' OR $appqc == $nama AND $app1 == '1' OR $apprnd == $nama AND $app2 == '1' OR $appprod == $nama AND $app3 == '1') {
                                        ?>  
                                    <div>
                                        <a data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Memo telah anda approve." class="btn btn-sm btn-success text-white">
                                        <i class="zmdi zmdi-check-circle"></i>
                                        </a>&nbsp;&nbsp;
                                    </div>
                                    <?php if ($app_ppic == $nama AND $app_log == '1' OR $appqc == $nama AND $app_log == '2' OR $apprnd == $nama AND $app_log = '2' OR $appprod == $nama AND $app_log == '3') { ?>
                                    <div>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/cancel/'.$id.'/'.$segment; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Batalkan?" class="btn btn-sm btn-warning">
                                        <i class="zmdi zmdi-alert-circle-o"></i>
                                        </a>&nbsp;&nbsp;
                                    </div>
                                    <?php } } ?>
                                    <div>
                                        <a onclick="OpenNew<?php echo $id; ?>()" href="#" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Lihat Detail" class="btn btn-sm btn-primary">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                        </a>&nbsp;&nbsp;
                                    </div>
                                    <?php 
                                        if ($level == 'Super Admin' AND $app != $totapp OR $level == 'Admin' AND $app != $totapp) {
                                            if($stsapp0 == 1 OR $stsapp1 == 1 OR $stsapp2 == 1 OR $stsapp3 == 1 OR $stsapp4 == 1) { ?>
                                            <div>
                                                <a href="<?php echo base_url().'memo/renewal/'.$id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Edit" class="btn btn-sm btn-success">
                                                <i class="zmdi zmdi-edit"></i>
                                                </a>&nbsp;&nbsp;
                                            </div>
                                    <?php } else{
                                    ?>
                                    <div>
                                        <a href="<?php echo base_url().'memo/edit/'.$id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Edit" class="btn btn-sm btn-success">
                                        <i class="zmdi zmdi-edit"></i>
                                        </a>&nbsp;&nbsp;
                                    </div>
                                <?php } ?>
                                    <div>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?php echo base_url().'memo/delete/'.$id.'/'.$segment; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Hapus?" class="btn btn-sm btn-danger">
                                        <i class="zmdi zmdi-delete"></i>
                                        </a>&nbsp;&nbsp;
                                    </div>
                                    <?php } 
                                    elseif ($level == 'Super Admin' AND $app == $totapp OR $level == 'Admin' AND $app == $totapp) {
                                    if($expire == '0' OR $expire == NULL){ ?>
                                    <div>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/expiring/'.$id.'/'.$segment; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Expire?" class="btn btn-sm bg-blue-grey text-white">
                                        <i class="zmdi zmdi-explicit"></i>
                                        </a>&nbsp;&nbsp; 
                                    </div>
                                    <?php } else{} } ?>
                                    <?php if($this->session->userdata('section') == 'PL 1 LAMINASI' || $this->session->userdata('section') == 'PL 1 EXTRUSION') { ?>
                                    <div>
                                        <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/unfinish/'.$id.'/'.$segment; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Done?" class="btn btn-sm bg-blue-grey text-white">
                                        <i class="zmdi zmdi-check-circle"></i> Reactivate
                                        </a>&nbsp;&nbsp; 
                                    </div>
                                    <?php } ?>
                                </div>
                            </th>
                        </tr>
                        <script>
                            function OpenKet<?php echo $id; ?>() {
                                var newWindow = window.open("<?php echo base_url().'memo/keterangan/'.$id; ?>", "", "width=300,height=300");
                            }
                            function OpenDec<?php echo $id; ?>() {
                                var newWindow = window.open("<?php echo base_url().'memo/reject_detail/'.$id; ?>", "", "width=600,height=300");
                            }
                            function OpenNew<?php echo $id; ?>() {
                                var newWindow = window.open("<?php echo base_url().'memo/view/'.$id; ?>", "", "width=900,height=500");
                            }
                            function OpenReject<?php echo $id; ?>() {
                                var newWindow = window.open("<?php echo base_url().'memo/reject/'.$id; ?>", "", "width=500,height=300");
                            }
                            function OpenRouting<?php echo $id; ?>() {
                                var newWindow = window.open("<?php echo base_url().'memo/change/'.$id; ?>", "", "width=500,height=300");
                            }
                            
                        </script>
                        <?php $no++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>