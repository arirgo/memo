<?php 
	foreach ($getMemo as $m) {
		# code...
        $id         = $m['id'];
		$namaMemo	= $m['nama'];
		$kepada 	= $m['kepada'];
		$hal 		= $m['hal'];
		$tgl 		= $m['tanggal'];
		$detail 	= $m['detail'];
		$keterangan = $m['keterangan'];
        $app0       = $m['app0'];
		$app1 		= $m['app1'];
		$app2 		= $m['app2'];
		$app3 		= $m['app3'];
		$app4 		= $m['app4'];
        $stsapp0    = $m['status_app0'];
		$stsapp1	= $m['status_app1'];
		$stsapp2	= $m['status_app2'];
		$stsapp3 	= $m['status_app3'];
		$stsapp4 	= $m['status_app4'];
		$dibuat 	= $m['dibuat'];
        $expire     = $m['expire'];
        $status     = $m['status'];
        $totapp     = $m['totapp'];
        $app        = $m['status'];
        $app_ppic   = $m['app_ppic'];
        $appqc      = $m['app_qc'];
        $apprnd     = $m['app_rnd'];
        $appprod    = $m['app_produksi'];
        $appacc     = $m['app_acc'];
        $nomemo     = $m['no_memo'];
        $app_log    = $m['app_log'];
        $app        = $app0+$app1+$app2+$app3+$app4;
	}
    if($stsapp0 == '1' OR $stsapp1 == '1' OR $stsapp2 == '1' OR $stsapp3 == '1' OR $stsapp4 == '1'){
        $class  = "class='denied'";
        $text   = "";
    }
    elseif ($app != $totapp){
        $class  = "";
        $text   = "<img src='".base_url()."assets/img/pending.png' width=150px height=50px>";
    }
    elseif ($expire == '1'){
        $class  = "class='expired'"; 
        $text   = "";
    }
    else{
        $class  = "class=''";
        $text   = "";
    }
?>
    <div class="card">
        <div class="card-header">
            <?php echo $this->session->flashdata('approved'); ?>
        	<h2>
            	<small><b><?php echo $namaMemo; ?></b></small> <?php echo $text; ?>
        	</h2>
        	<table class="" border=0>
        		<tr>
            		<td width=100px><b>Kepada YTH</b></td>
            		<td>: </td>
            		<td width=300px>&nbsp; <b><?php echo $kepada; ?></b></td>
            		<td width=100px><b>Tanggal</b></td>
            		<td>: </td>
            		<td width=100px>&nbsp; <b><?php echo $tgl; ?></b></td>
            	</tr>
            	<tr>
        			<td width=100px><b>Hal</b></td>
        			<td>: </td>
        			<td width=300px>&nbsp; <b><u><?php echo $hal; ?></u></b></td>
        		</tr>
        	</table>
        	<br>
        	<table  <?php echo $class; ?> border=0>
				<tr>
					<td width=1200px>Dengan hormat, harap dibantu untuk menjalankan order sebagai berikut:</td>
				</tr>
				<tr>
					<td height=20px></td>
				</tr>
				<tr>
				    <td width=1200px><?php echo $detail; ?></td>
				</tr>
				<tr>
					<td width=1200px>Demikian, terimakasih atas perhatian dan kerjasamanya.</td>
				</tr>
				<tr>
					<td height=20px></td>
				</tr>
			</table><br>
        	<table class="" border=0>
        		<tr>
                <?php if($app0 > 1 OR $app0 == '1' AND $stsapp0 == '1') { ?>
                    <td align="center" style="color:red" width=200px>Dibuat Oleh,</td>
                    <td width=100px></td>
                    <?php } elseif($app0 == 1) { ?>
            		<td align="center" width=200px>Dibuat oleh,</td>
            		<td width=100px></td>
            		<?php } if($app1 > 1 OR $app1 == '1' AND $stsapp1 == '1') { ?>
            		<td align="center" style="color:red" width=200px>Mengetahui</td>
            		<td width=100px></td>
            		<?php } elseif($app1 == 1) { ?>
            		<td align="center" width=200px>Mengetahui</td>
            		<td width=100px></td>
            		<?php } if($app2 > 1 OR $app2 == '1' AND $stsapp2 == '1') { ?>
            		<td align="center" style="color:red" width=200px>Mengetahui</td>
            		<td width=100px></td>
            		<?php } elseif($app2 == 1) { ?>
            		<td align="center" width=200px>Mengetahui</td>
            		<td width=100px></td>
            		<?php } if($app3 > 1 OR $app3 == '1' AND $stsapp3 == '1') { ?>
            		<td align="center" style="color:red" width=200px>Mengetahui</td>
            		<td width=100px></td>
            		<?php } elseif($app3 == 1) { ?>
            		<td align="center" width=200px>Mengetahui</td>
            		<td width=100px></td>
            		<?php } if($app4 > 1 OR $app4 == '1' AND $stsapp4 == '1') { ?>
            		<td align="center" style="color:red" width=200px>Mengetahui</td>
            		<td width=100px></td>
            		<?php } elseif($app4 == 1) { ?>
            		<td align="center" width=200px>Mengetahui</td>
            		<td width=100px></td>
            		<?php } ?>
            	</tr>
            	<tr>
                    <?php if($app0 > 1 OR $app0 == '1' AND $stsapp0 == '1') { ?>
                    <td align="center" style="color:red" height=75px width=200px></td>
                    <td width=100px></td>
                    <?php } elseif($app0 == 1) { ?>
            		<td align="center" width=200px><img width=200px height=75px src="<?php echo base_url().$signPPIC->signature; ?>"></td>
                    <td width=100px></td>
                    <?php } if($app1 > 1 OR $app1 == '1' AND $stsapp1 == '1') { ?>
                    <td align="center" style="color:red" height=75px width=200px></td>
                    <td width=100px></td>
                    <?php } elseif($app1 == 1) { ?>
                    <td align="center" width=200px><img width=200px height=75px src="<?php echo base_url().$signQC->signature; ?>"></td>
                    <td width=100px></td>
                    <?php } if($app2 > 1 OR $app2 == '1' AND $stsapp2 == '1') { ?>
                    <td align="center" style="color:red" height=75px width=200px></td>
                    <td width=100px></td>
                    <?php } elseif($app2 == 1) { ?>
                    <td align="center" width=200px><img width=200px height=75px src="<?php echo base_url().$signRND->signature; ?>"></td>
                    <td width=100px></td>
                    <?php } if($app3 > 1 OR $app3 == '1' AND $stsapp3 == '1') { ?>
                    <td align="center" style="color:red" height=75px width=200px></td>
                    <td width=100px></td>
                    <?php } elseif($app3 == 1) { ?>
                    <td align="center" width=200px><img width=200px height=75px src="<?php echo base_url().$signPROD->signature; ?>"></td>
                    <td width=100px></td>
                    <?php } if($app4 > 1 OR $app4 == '1' AND $stsapp4 == '1') { ?>
                    <td align="center" style="color:red" height=75px width=200px></td>
                    <td width=100px></td>
                    <?php } elseif($app4 == 1) { ?>
                    <td align="center" width=200px><img width=200px height=75px src="<?php echo base_url().$signACC->signature; ?>"></td>
                    <td width=100px></td>
                    <?php } ?>
            	</tr>
            	<tr>
            		<?php if($app0 > 1 OR $app0 == '1' AND $stsapp0 == '1') { ?>
                    <td align="center" style="color:red" width=200px><b>______________________</b></td>
                    <td width=100px></td>
                    <?php } elseif($app0 == 1) { ?>
                    <td align="center" width=200px><b>______________________</b></td>
                    <td width=100px></td>
            		<?php } if($app1 > 1 OR $app1 == '1' AND $stsapp1 == '1') { ?>
            		<td align="center" style="color:red" width=200px><b>______________________</b></td>
            		<td width=100px></td>
            		<?php } elseif($app1 == 1) { ?>
            		<td align="center" width=200px><b>______________________</b></td>
            		<td width=100px></td>
            		<?php } if($app2 > 1 OR $app2 == '1' AND $stsapp2 == '1') { ?>
            		<td align="center" style="color:red" width=200px><b>______________________</b></td>
            		<td width=100px></td>
            		<?php } elseif($app2 == 1) { ?>
            		<td align="center" width=200px><b>______________________</b></td>
            		<td width=100px></td>
            		<?php } if($app3 > 1 OR $app3 == '1' AND $stsapp3 == '1') { ?>
            		<td align="center" style="color:red" width=200px><b>______________________</b></td>
            		<td width=100px></td>
            		<?php } elseif($app3 == 1) { ?>
            		<td align="center" width=200px><b>______________________</b></td>
            		<td width=100px></td>
            		<?php } if($app4 > 1 OR $app4 == '1' AND $stsapp4 == '1') { ?>
            		<td align="center" style="color:red" width=200px><b>______________________</b></td>
            		<td width=100px></td>
            		<?php } elseif($app4 == 1) { ?>
            		<td align="center" width=200px><b>______________________</b></td>
            		<td width=100px></td>
            		<?php } ?>
            	</tr>
            	<tr>
                    <?php if($app0 > 1 OR $app0 == '1' AND $stsapp0 == '1') { ?>
                    <td align="center" style="color:red" width=200px><b><?php echo $dibuat; ?></b></td>
                    <td width=100px></td>
                    <?php } elseif($app0 == 1) { ?>
            		<td align="center" width=200px><b><?php echo $dibuat; ?></b></td>
            		<td width=100px></td>
            		<?php }if($app1 > 1 OR $app1 == '1' AND $stsapp1 == '1') { ?>
            		<td align="center" style="color:red" width=200px><b>QC</b></td>
            		<td width=100px></td>
            		<?php } elseif($app1 == 1) { ?>
            		<td align="center"  width=200px><b>QC</b></td>
            		<td width=100px></td>
            		<?php } if($app2 > 1 OR $app2 == '1' AND $stsapp2 == '1') { ?>
            		<td align="center" style="color:red" width=200px><b>R&D</b></td>
            		<td width=100px></td>
            		<?php } elseif($app2 == 1) { ?>
            		<td align="center"  width=200px><b>R&D</b></td>
            		<td width=100px></td>
            		<?php } if($app3 > 1 OR $app3 == '1' AND $stsapp3 == '1') { ?>
            		<td align="center" style="color:red" width=200px><b>PRODUKSI</b></td>
            		<td width=100px></td>
            		<?php } elseif($app3 == 1) { ?>
            		<td align="center"  width=200px><b>PRODUKSI</b></td>
            		<td width=100px></td>
            		<?php } if($app4 > 1 OR $app4 == '1' AND $stsapp4 == '1') { ?>
            		<td align="center" style="color:red" width=200px><b>ACCOUNTING</b></td>
            		<td width=100px></td>
            		<?php } elseif($app4 == 1) { ?>
            		<td align="center"  width=200px><b>ACCOUNTING</b></td>
            		<td width=100px></td>
            		<?php } ?>
            	</tr>
            	<tr>
            		<td height=75px></td>
            	</tr>
        	</table>
            <div class="row">
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
                <?php if($app0 == '2' AND $app_ppic == $this->session->userdata('nama') OR 
                        $app1 == '2' AND $appqc == $this->session->userdata('nama') OR 
                        $app2 == '2' AND $apprnd == $this->session->userdata('nama') OR
                        $app3 == '2' AND $appprod == $this->session->userdata('nama') OR 
                        $app4 == '2' AND $appacc == $this->session->userdata('nama') OR
                        $app3 == '2' AND $this->session->userdata('level') == 'Super Admin') { 

                        $level = $this->session->userdata('level');
                        
                        if($stsapp0 != '1' AND $stsapp1 != '1' AND $stsapp2 != '1' AND $stsapp3 != '1' AND $stsapp4 != '1'){
                            $viewAct = '0';
                            if($level == 'PPIC' and $app0 == '2'){
                                $viewAct = '1';
                            }elseif($level == 'QC' and $app0 == '1'){
                                $viewAct = '1';
                            }elseif($level == 'R&D' and $app0 == '1'){
                                $viewAct = '1';
                            }elseif($level == 'PRODUKSI' and $app0 == '1' AND (($app1 == '0' AND $app2 == '0') OR ($app1 == '1' AND $app2 == '0') OR($app1 == '0' AND $app2 == '1') OR ($app1 == '1' AND $app2 == '1'))) {
                                $viewAct = '1';
                            }elseif($level == 'Super Admin') {
                                $viewAct = '1';
                            }

                            if($viewAct == '1'){
                            ?>
                            <div>
                                <a href="<?php echo base_url().'memo/app/'.$id.'/'.$segment; ?>" id="appbtn<?php echo $id; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Approve?" class="btn btn btn-info">
                                    <i class="zmdi zmdi-check"></i> APPROVE
                                </a>&nbsp;&nbsp;
                            </div>
                            <div id="changebtn<?php echo $id; ?>">
                                <a data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Approve?" class="btn btn-info disabled text-white">
                                    <i class="zmdi zmdi-check"></i> PLEASE WAIT..
                                </a>&nbsp;&nbsp;
                            </div>
                            <div id="dec<?php echo $id; ?>">
                                <a onclick="OpenReject<?php echo $id; ?>()" href="#" id="dec" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Tolak?" class="btn btn-danger">
                                    <i class="zmdi zmdi-close-circle"></i> REJECT
                                </a>&nbsp;&nbsp;
                            </div>
                            <div id="route<?php echo $id; ?>">
                                <a onclick="OpenRouting<?php echo $id; ?>()" href="#" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Routing Approver?" class="btn bg-purple text-white">
                                <i class="zmdi zmdi-rotate-right"></i> ROUTING APPROVER
                                </a>&nbsp;&nbsp;
                            </div>
                            <?php 
                        }
                    }
                } elseif ($stsapp0 == '1' AND $app_ppic == $this->session->userdata('nama') OR
                                $stsapp1 == '1' AND $appqc == $this->session->userdata('nama') OR 
                                $stsapp2 == '1' AND $apprnd == $this->session->userdata('nama') OR 
                                $stsapp3 == '1' AND $appprod == $this->session->userdata('nama')) { ?>
                <div>
                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/undo/'.$id.'/'.$segment; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Batalkan?" class="btn btn-warning">
                    <i class="zmdi zmdi-alert-circle-o"></i> CANCEL
                    </a>&nbsp;&nbsp;
                </div>
                <?php } elseif($app == $totapp) { ?>
                
                <?php } 
                elseif ($app_ppic == $this->session->userdata('nama') AND $app0 == '1' OR $appqc == $this->session->userdata('nama') AND $app1 == '1' OR $apprnd == $this->session->userdata('nama') AND $app2 == '1' OR $appprod == $this->session->userdata('nama') AND $app3 == '1') {
                    ?>  
                <div>
                    <a data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Memo telah anda approve." class="btn btn-success text-white">
                    <i class="zmdi zmdi-check-circle"></i> APPROVED
                    </a>&nbsp;&nbsp;
                </div>
                <?php if ($app_ppic == $this->session->userdata('nama') AND $app_log == '1' OR $appqc == $this->session->userdata('nama') AND $app_log == '2' OR $apprnd == $this->session->userdata('nama') AND $app_log = '2' OR $appprod == $this->session->userdata('nama') AND $app_log == '3') { ?>
                <div>
                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/cancel/'.$id.'/'.$segment; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Batalkan?" class="btn btn-warning">
                    <i class="zmdi zmdi-alert-circle-o"></i> CANCEL
                    </a>&nbsp;&nbsp;
                </div>
                <?php } } ?>
                <?php if ($level == 'Super Admin' AND $app != $totapp OR $level == 'Admin' AND $app != $totapp) { ?>
                <div>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?php echo base_url().'memo/delete/'.$id.'/'.$segment; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Hapus?" class="btn btn-danger">
                    <i class="zmdi zmdi-delete"></i> DELETE
                    </a>&nbsp;&nbsp;
                </div>
                <?php } 
                elseif ($level == 'Super Admin' AND $app == $totapp OR $level == 'Admin' AND $app == $totapp OR $level == 'PPIC' AND $app == $totapp) {
                if($expire == '0' OR $expire == NULL){ ?>
                <div>
                    <a onclick="return confirm('Apakah anda yakin?')" href="<?php echo base_url().'memo/expiring/'.$id.'/'.$segment; ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Expire?" class="btn bg-blue-grey text-white">
                    <i class="zmdi zmdi-explicit"></i> EXPIRE
                    </a>&nbsp;&nbsp; 
                </div>
                <?php } else{} } ?>
            </div>
        </div>
        <br>
        <script>
            function OpenDec<?php echo $id; ?>() {
                var newWindow = window.open("<?php echo base_url().'memo/reject_detail/'.$id; ?>", "", "width=600,height=300");
            }
            function OpenReject<?php echo $id; ?>() {
                var newWindow = window.open("<?php echo base_url().'memo/reject/'.$id; ?>", "", "width=500,height=300");
            }
            function OpenRouting<?php echo $id; ?>() {
                var newWindow = window.open("<?php echo base_url().'memo/change/'.$id; ?>", "", "width=500,height=300");
            }
            
        </script>
        <div class="card-block">
        </div>
    </div>

