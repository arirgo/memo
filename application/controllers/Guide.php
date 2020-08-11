<?php
// Load the required libraries

defined('BASEPATH') OR exit('No direct script access allowed');

class Guide extends CI_Controller {

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
		$data['username'] 	    = $this->session->userdata('username');
		$data['nama'] 		    = $this->session->userdata('nama');
		$data['level']		    = $this->session->userdata('level');
		$data['c1'] 		    = $this->session->userdata('c1');
		$data['c2'] 		    = $this->session->userdata('c2');
		$data['c3'] 		    = $this->session->userdata('c3');
        $data['getTotalMemo']   = $this->Memo_model->countAllMemo();
        $data['getMemoUnchek']  = $this->Memo_model->countMemoUnchek();
        $data['getMemoApp']     = $this->Memo_model->countMemoApproved();
        $data['getMemoDec']     = $this->Memo_model->countMemoDeclined();
        $data['getTotalUser']   = $this->Admin_model->countAllUser();
        $data['getNotif']       = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
		$this->load->view('app/layout/header');
		$this->load->view('app/layout/layout_main', $data);
		$this->load->view('app/guide', $data);
		$this->load->view('app/layout/footer');
	}
}