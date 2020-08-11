<?php
// Load the required libraries

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("backend"));
		}
        $this->load->model('Admin_model');
        $this->load->model('Memo_model');
        $this->load->helper('menu');

    }
	public function index()
	{
		// $data['username'] 	    = $this->session->userdata('username');
		// $data['nama'] 		    = $this->session->userdata('nama');
		// $data['level']		    = $this->session->userdata('level');
		// $data['c1'] 		    = $this->session->userdata('c1');
		// $data['c2'] 		    = $this->session->userdata('c2');
		// $data['c3'] 		    = $this->session->userdata('c3');
		// $level                  = $this->session->userdata('level');
  //       $section                = $this->session->userdata('section');
  //       $data['getTotalMemo']   = $this->Memo_model->countAllMemo();
  //       $data['getMemoUnchek']  = $this->Memo_model->countMemoUnchek();
  //       $data['getMemoApp']     = $this->Memo_model->countMemoApproved();
  //       $data['getMemoDec']     = $this->Memo_model->countMemoDeclined();
  //       $data['getTotalUser']   = $this->Admin_model->countAllUser();
  //       $data['getMemoExp']     = $this->Memo_model->countMemoExpired();
  //       $data['getMemoActive']  = $this->Memo_model->countMemoActive();
  //       $getMemoHari            = $this->Memo_model->getMemoPerhari();
  //       $getMemoBulan           = $this->Memo_model->getMemoPerbulan();
  //       $getMemoTahun           = $this->Memo_model->getMemoPertahun();
  //       foreach ($getMemoHari as $h) {
  //           # code...
  //           $data['memohari']   = $h['hari'];
  //       }
  //       foreach ($getMemoBulan as $h) {
  //           # code...
  //           $data['memobulan']  = $h['bulan'];
  //       }
  //       foreach ($getMemoTahun as $h) {
  //           # code...
  //           $data['memotahun']  = $h['tahun'];
  //       }
        $data['getNotif']       = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        // $data['recent']         = $this->Memo_model->getRecentMemo();
		$this->load->view('app/layout/header');
		$this->load->view('app/layout/layout_main', $data);
		// $this->load->view('app/index', $data);
        $this->load->view('app/index2', $data);
		$this->load->view('app/layout/footer');
	}
    function test()
    {
        $this->load->view('app/test');
    }
}
