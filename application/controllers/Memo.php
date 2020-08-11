<?php
class Memo extends CI_Controller {
 	function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("backend"));
        }
        $this->load->helper(array('form','url','menu'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('user_agent');
        $this->load->model('Admin_model');
        $this->load->model('Memo_model');
    }
    public function index()
    {
        redirect(base_url("memo/item"));
    }
    public function item()
    {
        $data['username']       = $this->session->userdata('username');
        $data['nama']           = $this->session->userdata('nama');
        $data['level']          = $this->session->userdata('level');
        $data['c1']             = $this->session->userdata('c1');
        $data['c2']             = $this->session->userdata('c2');
        $data['c3']             = $this->session->userdata('c3');
        $data['section']        = $this->session->userdata('section');
        $data['memo']           = $this->Memo_model->getAllMemo();
        $data['getNotif']       = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $data['segment']        = $this->uri->segment(2);
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/main', $data);
        $this->load->view('app/layout/footer');
    }

    public function outstanding()
    {
        $data['username']       = $this->session->userdata('username');
        $data['nama']           = $this->session->userdata('nama');
        $data['level']          = $this->session->userdata('level');
        $data['c1']             = $this->session->userdata('c1');
        $data['c2']             = $this->session->userdata('c2');
        $data['c3']             = $this->session->userdata('c3');
        $data['section']        = $this->session->userdata('section');
        $data['memo']           = $this->Memo_model->getMemoOutstanding();
        $data['getNotif']       = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $data['segment']        = $this->uri->segment(2);

        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/memo_outstanding', $data);
        $this->load->view('app/layout/footer');
    }

    public function memo_reject()
    {
        $data['username']       = $this->session->userdata('username');
        $data['nama']           = $this->session->userdata('nama');
        $data['level']          = $this->session->userdata('level');
        $data['c1']             = $this->session->userdata('c1');
        $data['c2']             = $this->session->userdata('c2');
        $data['c3']             = $this->session->userdata('c3');
        $data['section']        = $this->session->userdata('section');
        $data['memo']           = $this->Memo_model->getMemoReject();
        $data['getNotif']       = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $data['segment']        = $this->uri->segment(2);

        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/memo_reject', $data);
        $this->load->view('app/layout/footer');
    }

    function create()
    {
        if($this->session->userdata('c2')  != "1"){
            redirect(base_url("dashboard"));
        }
        $data           = array(
            'username'      => $this->session->userdata('username'),
            'nama'          => $this->session->userdata('nama'),
            'level'         => $this->session->userdata('level'),
            'c1'            => $this->session->userdata('c1'),
            'c2'            => $this->session->userdata('c2'),
            'c3'            => $this->session->userdata('c3'),
            'section'       => $this->session->userdata('section'),
            'getNotif'      => $this->Memo_model->countNotification(),
            'viewnotif'     => $this->Memo_model->getViewNotification(),
            'getSection'    => $this->Admin_model->getSection(),
            'getPPIC'       => $this->Memo_model->appPPIC(),
            'getProduksi'   => $this->Memo_model->appProduksi(),
            'getQC'         => $this->Memo_model->appQC(),
            'getRND'        => $this->Memo_model->appRND(),
            'getAccounting' => $this->Memo_model->appAccounting(),
        );
        $getExisting    = $this->Memo_model->checkNomemo();
        if($getExisting > 0){
            $latestNumber   = $this->Memo_model->getLatestMemoNumber();
            $latest         = $latestNumber->no_memo+1;
            $data['nomemo'] = date('my').'-'.$latest;
        }
        else{
            $data['nomemo'] = date('my').'-100';
        }
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/create_memo', $data);
        $this->load->view('app/layout/footer');
    }
    function creatememo()
    {
        if(isset($_POST['addmemo']))
        {
            $this->Memo_model->createMemo();
            $nomemo             = $this->input->post('nomemo');
            $namamemo           = $this->input->post('namamemo');
            $dibuat             = $this->input->post('oleh');
            $perihal            = $this->input->post('hal');
            $detail             = $this->input->post('content');
            $Keterangan         = $this->input->post('keterangan');
            $getReceiver        = $this->Memo_model->getReceiverPPIC($nomemo);
            foreach ($getReceiver as $g) {
                # code...
                $emailPPIC      = $g['email'];
            }
            $from_mail = 'system@plasindo.loc';
            $to = $emailPPIC;
            $subject = "Pemberitahuan Memo Baru [NO-REPLY]";
            $message = 'Dengan hormat,<br>
                        Berikut pemberitahuan memo baru untuk disetujui dengan rincian :<br>
                        <table>
                            <tr>
                                <td>Nomor Memo</td>
                                <td>:</td>
                                <td>'.$nomemo.'</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td>'.$perihal.'</td>
                            </tr>
                            <tr>
                                <td valign="top">Rincian</td>
                                <td>:</td>
                                <td>'.$detail.'</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>'.$keterangan.'</td>
                            </tr>
                            <tr>
                                <td>Dibuat Oleh</td>
                                <td>:</td>
                                <td>'.$dibuat.'</td>
                            </tr>
                        </table><br><br>
                        Silahkan klik link berikut :  <a href ="http://192.168.20.3/memo/memo/notification">http://192.168.20.3/memo/memo/notification</a>
                        <br><br> Terima kasih,<br> <b>MEMO ONLINE | PLASINDO LESTARI</b>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
            $headers .= 'From: MEMO_ONLINE <'.$from_mail.'>' . "\r\n";
            $sendtomail = mail($to, $subject, $message, $headers);
            $this->session->set_flashdata('addmemosuccess', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                New memo has been added!</a>
                            </div>    ');
            redirect(base_url("memo"));
        }
    }
    function edit($id)
    {
        if($this->session->userdata('c2')  != "1"){
            redirect(base_url("dashboard"));
        }
        $data['username']       = $this->session->userdata('username');
        $data['nama']           = $this->session->userdata('nama');
        $data['level']          = $this->session->userdata('level');
        $data['c1']             = $this->session->userdata('c1');
        $data['c2']             = $this->session->userdata('c2');
        $data['c3']             = $this->session->userdata('c3');
        $data['section']        = $this->session->userdata('section');
        $data['getNotif']       = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $data['getSection']     = $this->Admin_model->getSection();
        $data['getPPIC']        = $this->Memo_model->appPPIC();
        $data['getProduksi']    = $this->Memo_model->appProduksi();
        $data['getAccounting']  = $this->Memo_model->appAccounting();
        $data['getQC']          = $this->Memo_model->appQC();
        $data['getRND']         = $this->Memo_model->appRND();
        $data['getMemobyID']    = $this->Memo_model->getDataEditMemo($id);
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/edit_memo', $data);
        $this->load->view('app/layout/footer');
    }
    function renewal($id)
    {
        if($this->session->userdata('c2')  != "1"){
            redirect(base_url("dashboard"));
        }
        $data['username']       = $this->session->userdata('username');
        $data['nama']           = $this->session->userdata('nama');
        $data['level']          = $this->session->userdata('level');
        $data['c1']             = $this->session->userdata('c1');
        $data['c2']             = $this->session->userdata('c2');
        $data['c3']             = $this->session->userdata('c3');
        $data['section']        = $this->session->userdata('section');
        $data['getNotif']       = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $data['getSection']     = $this->Admin_model->getSection();
        $data['getPPIC']        = $this->Memo_model->appPPIC();
        $data['getProduksi']    = $this->Memo_model->appProduksi();
        $data['getAccounting']  = $this->Memo_model->appAccounting();
        $data['getQC']          = $this->Memo_model->appQC();
        $data['getRND']         = $this->Memo_model->appRND();
        $data['getMemobyID']    = $this->Memo_model->getDataEditMemo($id);
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/edit_memo_reject', $data);
        $this->load->view('app/layout/footer');
    }
    function editmemo()
    {
        if(isset($_POST['addmemo']))
        {
            $this->Memo_model->editMemo();
            $this->session->set_flashdata('editmemosuccess', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Memo has been updated!</a>
                            </div>    ');
            redirect(base_url("memo"));
        }
    }
    function editmemoreject()
    {
        if(isset($_POST['addmemo']))
        {
            $id         = $this->input->post('id');
            $chekData   = $this->Memo_model->chekAppMemo($id);
            foreach ($chekData as $g) {
                # code...
                $nomemo     = $g['no_memo'];
                $perihal    = $g['hal'];
                $kepada     = $g['kepada'];
                $dibuat     = $g['dibuat'];
                $detail     = $g['detail'];
                $keterangan = $g['keterangan'];
                $app1       = $g['app1'];
                $app2       = $g['app2'];
                $app4       = $g['app4'];
                $stsapp1    = $g['status_app1'];
                $stsapp2    = $g['status_app2'];
                $stsapp4    = $g['status_app4'];
                $status     = $g['status'];
                $totapp     = $g['totapp'];
                $appprod    = $g['app_produksi'];
                $appacc     = $g['app_acc'];
            }
            $userReject     = $this->Memo_model->getDataUserReject($id);
            $from_mail = 'system@plasindo.loc';
            $to = $userReject->email;
            $subject = "Pemberitahuan Memo Baru [Telah Diperbaharui] [NO-REPLY]";
            $message = 'Dengan hormat,<br>
                        Berikut pemberitahuan memo baru untuk disetujui dengan rincian :<br>
                        <table>
                            <tr>
                                <td>Nomor Memo</td>
                                <td>:</td>
                                <td>'.$nomemo.'</td>
                            </tr>
                            <tr>
                                <td>Kepada</td>
                                <td>:</td>
                                <td>'.$kepada.'</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td>'.$perihal.'</td>
                            </tr>
                            <tr>
                                <td valign="top">Rincian</td>
                                <td>:</td>
                                <td>'.$detail.'</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>'.$keterangan.'</td>
                            </tr>
                            <tr>
                                <td>Dibuat Oleh</td>
                                <td>:</td>
                                <td>'.$dibuat.'</td>
                            </tr>
                        </table><br><br>
                        Silahkan klik link berikut :  <a href ="http://192.168.20.3/memo/memo/notification">http://192.168.20.3/memo/memo/notification</a>
                        <br><br> Terima kasih,<br> <b>MEMO ONLINE | PLASINDO LESTARI</b>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
            $headers .= 'From: MEMO_ONLINE <'.$from_mail.'>' . "\r\n";
            $sendtomail = mail($to, $subject, $message, $headers);
            $this->Memo_model->editMemoReject();
            $this->session->set_flashdata('editmemosuccess', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Memo has been updated!</a>
                            </div>    ');
            redirect(base_url("memo"));
        }
    }
    function app($id,$segment)
    {
        $level      = $this->session->userdata('level');
        $uname      = $this->session->userdata('nama');
        $this->Memo_model->approve($id);

        if($segment=='view')
        {
            echo    "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close();
                    </script>";
        }

        $chekData   = $this->Memo_model->chekAppMemo($id);
        foreach ($chekData as $g) {
            # code...
            $nomemo     = $g['no_memo'];
            $perihal    = $g['hal'];
            $kepada     = $g['kepada'];
            $dibuat     = $g['dibuat'];
            $detail     = $g['detail'];
            $keterangan = $g['keterangan'];
            $app1       = $g['app1'];
            $app2       = $g['app2'];
            $app4       = $g['app4'];
            $stsapp1    = $g['status_app1'];
            $stsapp2    = $g['status_app2'];
            $stsapp4    = $g['status_app4'];
            $status     = $g['status'];
            $totapp     = $g['totapp'];
            $appprod    = $g['app_produksi'];
            $appacc     = $g['app_acc'];
        }
        $getReceiverQC      = $this->Memo_model->getReceiverQC($nomemo);
        $getReceiverRND     = $this->Memo_model->getReceiverRND($nomemo);
        $getReceiverHEAD    = $this->Memo_model->getReceiverHead($nomemo);
        $emailHead          = "";
        foreach ($getReceiverHEAD as $g) {
            # code...
            $emailHead      .= $g['email'].",";
        }
        if($emailHead == '') {
            $emailHead = 'productionhead@plasindo.loc';
            //$emailHead = 'productionhead@plasindo.loc';
        } else {
            $emailHead = $emailHead;
        }
        foreach ($getReceiverQC as $g) {
            # code...
            $emailQC    = $g['email'];
        }
        foreach ($getReceiverRND as $g) {
            # code...
            $emailRND   = $g['email'];
        }
        if($level == 'PPIC')
        {
            if($app1 == '0' AND $app2 == '0')
            {
                $getReceiver    = $this->Memo_model->getReceiverProduksi($appprod);
                foreach ($getReceiver as $r) {
                    # code...
                    $emailPROD  = $r['email'];
                }
                $from_mail = 'system@plasindo.loc';
                $to = $emailPROD;
                $subject = "Pemberitahuan Memo Baru [NO-REPLY]";
                $message = 'Dengan hormat,<br>
                            Berikut pemberitahuan memo baru untuk disetujui dengan rincian :<br>
                            <table>
                                <tr>
                                    <td>Nomor Memo</td>
                                    <td>:</td>
                                    <td>'.$nomemo.'</td>
                                </tr>
                                <tr>
                                    <td>Kepada</td>
                                    <td>:</td>
                                    <td>'.$kepada.'</td>
                                </tr>
                                <tr>
                                    <td>Perihal</td>
                                    <td>:</td>
                                    <td>'.$perihal.'</td>
                                </tr>
                                <tr>
                                    <td valign="top">Rincian</td>
                                    <td>:</td>
                                    <td>'.$detail.'</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>'.$keterangan.'</td>
                                </tr>
                                <tr>
                                    <td>Dibuat Oleh</td>
                                    <td>:</td>
                                    <td>'.$dibuat.'</td>
                                </tr>
                            </table><br><br>
                            Silahkan klik link berikut :  <a href ="http://192.168.20.3/memo/memo/notification">http://192.168.20.3/memo/memo/notification</a>
                            <br><br> Terima kasih,<br> <b>MEMO ONLINE | PLASINDO LESTARI</b>';
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
                $headers .= 'From: MEMO_ONLINE <'.$from_mail.'>' . "\r\n";
                $sendtomail = mail($to, $subject, $message, $headers);
            }
            else {
                $from_mail = 'system@plasindo.loc';
                $to = $emailQC.','.$emailRND;
                $subject = "Pemberitahuan Memo Baru [NO-REPLY]";
                $message = 'Dengan hormat,<br>
                            Berikut pemberitahuan memo baru untuk disetujui dengan rincian :<br>
                            <table>
                                <tr>
                                    <td>Nomor Memo</td>
                                    <td>:</td>
                                    <td>'.$nomemo.'</td>
                                </tr>
                                <tr>
                                    <td>Kepada</td>
                                    <td>:</td>
                                    <td>'.$kepada.'</td>
                                </tr>
                                <tr>
                                    <td>Perihal</td>
                                    <td>:</td>
                                    <td>'.$perihal.'</td>
                                </tr>
                                <tr>
                                    <td valign="top">Rincian</td>
                                    <td>:</td>
                                    <td>'.$detail.'</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>'.$keterangan.'</td>
                                </tr>
                                <tr>
                                    <td>Dibuat Oleh</td>
                                    <td>:</td>
                                    <td>'.$dibuat.'</td>
                                </tr>
                            </table><br><br>
                            Silahkan klik link berikut :  <a href ="http://192.168.20.3/memo/memo/notification">http://192.168.20.3/memo/memo/notification</a>
                            <br><br> Terima kasih,<br> <b>MEMO ONLINE | PLASINDO LESTARI</b>';
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
                $headers .= 'From: MEMO_ONLINE <'.$from_mail.'>' . "\r\n";
                $sendtomail = mail($to, $subject, $message, $headers);
            }
        }
        elseif($level == 'QC' OR $level == 'R&D')
        {
            if($stsapp1 == '0' AND $stsapp2 == '0')
            {
                if( $app1 == '1' AND $app2 == '1' OR 
                    $app1 == '0' AND $app2 == '1' OR 
                    $app1 == '1' AND $app2 == '0')
                {
                    $getReceiver    = $this->Memo_model->getReceiverProduksi($appprod);
                    foreach ($getReceiver as $r) {
                        # code...
                        $emailPROD  = $r['email'];
                    }
                    $from_mail = 'system@plasindo.loc';
                    $to = $emailPROD;
                    $subject = "Pemberitahuan Memo Baru [NO-REPLY]";
                    $message = 'Dengan hormat,<br>
                                Berikut pemberitahuan memo baru untuk disetujui dengan rincian :<br>
                                <table>
                                    <tr>
                                        <td>Nomor Memo</td>
                                        <td>:</td>
                                        <td>'.$nomemo.'</td>
                                    </tr>
                                    <tr>
                                        <td>Kepada</td>
                                        <td>:</td>
                                        <td>'.$kepada.'</td>
                                    </tr>
                                    <tr>
                                        <td>Perihal</td>
                                        <td>:</td>
                                        <td>'.$perihal.'</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Rincian</td>
                                        <td>:</td>
                                        <td>'.$detail.'</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>'.$keterangan.'</td>
                                    </tr>
                                    <tr>
                                        <td>Dibuat Oleh</td>
                                        <td>:</td>
                                        <td>'.$dibuat.'</td>
                                    </tr>
                                </table><br><br>
                                Silahkan klik link berikut :  <a href ="http://192.168.20.3/memo/memo/notification">http://192.168.20.3/memo/memo/notification</a>
                                <br><br> Terima kasih,<br> <b>MEMO ONLINE | PLASINDO LESTARI</b>';
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
                    $headers .= 'From: MEMO_ONLINE <'.$from_mail.'>' . "\r\n";
                    $sendtomail = mail($to, $subject, $message, $headers);
                }
            }
        }
        elseif ($level == 'PRODUKSI' AND $app4 == '0')
        {
            $from_mail = 'system@plasindo.loc';
            $to = $emailHead;
            //$to = 'irfan.kf@plasindo.loc';
            $subject = "Pemberitahuan Memo Baru [NO-REPLY]";
            $message = 'Dengan hormat,<br>
                        Berikut pemberitahuan memo baru untuk dijalankan dengan rincian :<br>
                        <table>
                            <tr>
                                <td>Nomor Memo</td>
                                <td>:</td>
                                <td>'.$nomemo.'</td>
                            </tr>
                            <tr>
                                <td>Kepada</td>
                                <td>:</td>
                                <td>'.$kepada.'</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td>'.$perihal.'</td>
                            </tr>
                            <tr>
                                <td valign="top">Rincian</td>
                                <td>:</td>
                                <td>'.$detail.'</td>
                            </tr>
                            <tr>
                                <td>Dibuat Oleh</td>
                                <td>:</td>
                                <td>'.$dibuat.'</td>
                            </tr>
                        </table><br><br>
                        Silahkan klik link berikut :  <a href ="http://192.168.20.3/memo/memo/">http://192.168.20.3/memo/memo/</a>
                        <br><br> Terima kasih,<br> <b>MEMO ONLINE | PLASINDO LESTARI</b>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
            $headers .= 'From: MEMO_ONLINE <'.$from_mail.'>' . "\r\n";
            $sendtomail = mail($to, $subject, $message, $headers); 
        }
        elseif ($level == 'PRODUKSI' AND $app4 =='2')
        {
            $getReceiver    = $this->Memo_model->getReceiverAcc($appacc);
            foreach ($getReceiver as $r) {
                # code...
                $emailacc  = $r['email'];
            }
            $from_mail = 'system@plasindo.loc';
            $to = $emailacc;
            $subject = "Pemberitahuan Memo Baru [NO-REPLY]";
            $message = 'Dengan hormat,<br>
                        Berikut pemberitahuan memo baru untuk disetujui dengan rincian :<br>
                        <table>
                            <tr>
                                <td>Nomor Memo</td>
                                <td>:</td>
                                <td>'.$nomemo.'</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td>'.$perihal.'</td>
                            </tr>
                            <tr>
                                <td>Dibuat Oleh</td>
                                <td>:</td>
                                <td>'.$dibuat.'</td>
                            </tr>
                            <tr>
                                <td valign="top">Rincian</td>
                                <td>:</td>
                                <td>'.$detail.'</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>'.$keterangan.'</td>
                            </tr>
                        </table><br><br>
                        Silahkan klik link berikut :  <a href ="http://192.168.20.3/memo/memo/notification">http://192.168.20.3/memo/memo/notification</a>
                        <br><br> Terima kasih,<br> <b>MEMO ONLINE | PLASINDO LESTARI</b>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
            $headers .= 'From: MEMO_ONLINE <'.$from_mail.'>' . "\r\n";
            $sendtomail = mail($to, $subject, $message, $headers);
        }
        elseif ($level == 'ACCOUNTING')
        {
            $from_mail = 'system@plasindo.loc';
            $to = $emailHead;
            //$to = 'irfan.kf@plasindo.loc';
            $subject = "Pemberitahuan Memo Baru [NO-REPLY]";
            $message = 'Dengan hormat,<br>
                        Berikut pemberitahuan memo baru untuk dijalankan dengan rincian :<br>
                        <table>
                            <tr>
                                <td>Nomor Memo</td>
                                <td>:</td>
                                <td>'.$nomemo.'</td>
                            </tr>
                            <tr>
                                <td>Kepada</td>
                                <td>:</td>
                                <td>'.$kepada.'</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td>'.$perihal.'</td>
                            </tr>
                            <tr>
                                <td valign="top">Rincian</td>
                                <td>:</td>
                                <td>'.$detail.'</td>
                            </tr>
                            <tr>
                                <td>Dibuat Oleh</td>
                                <td>:</td>
                                <td>'.$dibuat.'</td>
                            </tr>
                        </table><br><br>
                        Silahkan klik link berikut :  <a href ="http://192.168.20.3/memo/memo/">http://192.168.20.3/memo/memo/</a>
                        <br><br> Terima kasih,<br> <b>MEMO ONLINE | PLASINDO LESTARI</b>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
            $headers .= 'From: MEMO_ONLINE <'.$from_mail.'>' . "\r\n";
            $sendtomail = mail($to, $subject, $message, $headers); 
        }
        $this->session->set_flashdata('approved', 
                        '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            Memo has been approved!</a>
                        </div>    ');
        if($segment=='view')
        {
            echo    "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close();
                    </script>";
        }
        else{
            // redirect(base_url('memo/item'));
            redirect(base_url('memo/notification'));
        }
        
    }
    function reject($id)
    {
        $data['memoData']  = $this->Memo_model->getDataEditMemo($id);
        $this->load->view('app/layout/header');
        $this->load->view('app/memo/reject_view',$data);
        $this->load->view('app/layout/footer');
    }
    function rejectmemo()
    {
        if(isset($_POST['reject']))
        {
            $id     = $this->input->post('id');
            $this->Memo_model->reject($id);
            $this->Memo_model->insertDetailReject($id);
            echo    "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close();
                    </script>";
            $this->session->set_flashdata('reject', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Memo has been rejected!</a>
                            </div>
            ');
        }
        "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close();
                    </script>"; 
    }
    function reject_detail($id)
    {
        $data['get'] = $this->Memo_model->getDetailReject($id);
        $this->load->view('app/layout/header');
        $this->load->view('app/memo/reject_detail', $data);
        $this->load->view('app/layout/footer');
    }
    function cancel($id,$segment)
    {
        $where = array('id' => $id);
        $this->Memo_model->cancel($id);
        $this->session->set_flashdata('canceled', 
                        '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            Data has been canceled!</a>
                        </div>    ');
        if($segment=='view')
        {
            echo    "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close();
                    </script>";
        }
        else{
            redirect(base_url('memo/item'));
        }
    }
    function undo($id,$segment)
    {
        $where = array('id' => $id);
        $this->Memo_model->undo($id);
        $this->session->set_flashdata('canceled2', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Data has been canceled!</a>
                            </div>    ');
        if($segment=='view')
        {
            echo    "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close();
                    </script>";
        }
        else{
            redirect(base_url('memo/item'));
        }
    }
    function delete($id,$segment)
    {
        $where = array('id' => $id);
        $this->Memo_model->deleteMemo('memo',$where);
        $this->session->set_flashdata('deleted', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Memo has been deleted!</a>
                            </div>    ');
        if($segment=='view')
        {
            echo "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close();
                    </script>";
        }
        else{
            redirect(base_url('memo/item'));
        }
    }
    function view($id)
    {
        $data['username']   = $this->session->userdata('username');
        $data['nama']       = $this->session->userdata('nama');
        $data['section']    = $this->session->userdata('section');
        $data['level']      = $this->session->userdata('level');
        $data['c1']         = $this->session->userdata('c1');
        $data['c2']         = $this->session->userdata('c2');
        $data['c3']         = $this->session->userdata('c3');
        $data['getMemo']    = $this->Memo_model->viewMemo($id);
        $data['signPPIC']   = $this->Memo_model->getSignaturePPIC($id);
        $data['signQC']     = $this->Memo_model->getSignatureQC($id);
        $data['signRND']    = $this->Memo_model->getSignatureRND($id);
        $data['signPROD']   = $this->Memo_model->getSignaturePROD($id);
        $data['signACC']    = $this->Memo_model->getSignatureACC($id);
        $data['segment']    = $this->uri->segment(2);
        echo '<script>
            if (performance.navigation.type == 1) {
                window.opener.location.reload(true);
            }
            </script>';
        $this->load->view('app/layout/header');
        $this->load->view('app/memo/view_memo', $data);
        $this->load->view('app/layout/footer');
    }
    function notification()
    {
        $data['username']       = $this->session->userdata('username');
        $data['nama']           = $this->session->userdata('nama');
        $data['level']          = $this->session->userdata('level');
        $data['c1']             = $this->session->userdata('c1');
        $data['c2']             = $this->session->userdata('c2');
        $data['c3']             = $this->session->userdata('c3');
        $data['section']        = $this->session->userdata('section');
        $data['getNotif']       = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $data['segment']        = $this->uri->segment(2);
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/notification_view', $data);
        $this->load->view('app/layout/footer'); 
    }
    function keterangan($id)
    {
        $data['keterangan'] = $this->Memo_model->viewMemo($id);
        $this->load->view('app/layout/header');
        $this->load->view('app/memo/keterangan', $data);
        $this->load->view('app/layout/footer');
    }
    function expired()
    {
        $data = array(
            'level'     => $this->session->userdata('level'),
            'getNotif'  => $this->Memo_model->countNotification(),
            'viewnotif' => $this->Memo_model->getViewNotification(),
            'viewExp'   => $this->Memo_model->getViewExpiredMemo(),
        );
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/memo_expired', $data);
        $this->load->view('app/layout/footer');
    }
    function expiring($id,$segment)
    {
        $this->Memo_model->executeExpireMemo($id);
        $this->Memo_model->executeDataExpire($id);
        $this->session->set_flashdata('expired', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Memo has been expired!</a>
                            </div>    ');
        if($segment=='view')
        {
            echo "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close());
                    </script>";
        }
        else{
            redirect(base_url('memo/item'));
        }    
    }
    function reactive($no_memo)
    {
        $this->Memo_model->executeReactiveMemo($no_memo);
        $this->Memo_model->executeDataReactivate($no_memo);
        $this->session->set_flashdata('reactive', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Re-activated memo success!</a>
                            </div>    ');
        redirect(base_url('memo/expired'));
    }
    function change($id)
    {
        $data   = array(
            'memoData'  => $this->Memo_model->getDataEditMemo($id),
            'getApp'    => $this->Memo_model->getNewApproval()
        );
        $this->load->view('app/layout/header');
        $this->load->view('app/memo/routing_view',$data);
        $this->load->view('app/layout/footer');
    }
    function routing()
    {
        if(isset($_POST['changeapp']))
        {
            $this->Memo_model->changeApproval();
            echo    "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close();
                    </script>";
            $this->session->set_flashdata('routing', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Approver has been changed!</a>
                            </div>
            ');
        }
    }
    // function done()
    // {
    //     $data = array(
    //         'level'     => $this->session->userdata('level'),
    //         'getNotif'  => $this->Memo_model->countNotification(),
    //         'viewnotif' => $this->Memo_model->getViewNotification(),
    //         'memo'      => $this->Memo_model->getAllMemoFinish()->result_array(),
    //         'segment'   => $this->uri->segment(2)
    //     );
    //     $this->load->view('app/layout/header');
    //     $this->load->view('app/layout/layout_main', $data);
    //     $this->load->view('app/memo/memo_done', $data);
    //     $this->load->view('app/layout/footer');
    // }
    function done()
    {
        $section = $this->session->userdata('section');
        $data = array(
            'level'     => $this->session->userdata('level'),
            'getNotif'  => $this->Memo_model->countNotification(),
            'viewnotif' => $this->Memo_model->getViewNotification(),
            'memo'      => $this->Memo_model->getAllMemoFinish($section)->result_array(),
            'segment'   => $this->uri->segment(2)
        );
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/memo_done', $data);
        $this->load->view('app/layout/footer');
    }

    function doneprod()
    {
        $data = array(
            'level'     => $this->session->userdata('level'),
            'getNotif'  => $this->Memo_model->countNotification(),
            'viewnotif' => $this->Memo_model->getViewNotification(),
            'memo'      => $this->Memo_model->getMemoFinish()->result_array(),
            'segment'   => $this->uri->segment(2)
        );
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/memo/memo_doneprod', $data);
        $this->load->view('app/layout/footer');
    }

    function finishing($id,$segment)
    {
        $this->Memo_model->executeFinisheMemo($id);
        $this->session->set_flashdata('finish', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Memo has been moved!</a>
                            </div>    ');
        if($segment=='view')
        {
            echo "<script type='text/javascript'>
                        window.opener.location.reload(true);
                        window.close());
                    </script>";
        }
        else{
            redirect(base_url('memo/item'));
        }    
    }
    function unfinish($id,$segment)
    {
        $this->Memo_model->executeUnfinishMemo($id);
        $this->session->set_flashdata('reactive', 
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Memo has been moved!</a>
                            </div>    ');
        redirect(base_url('memo/done'));
    }
}

/* ----------------- END MEMO CONTROLLER ---------------- */
/* ----------- DEVELOPER: IRVAN KHARISMA FIHAN ---------- */
/* ------------ IT Soft. PT. Plasindo Lestari ----------- */ 