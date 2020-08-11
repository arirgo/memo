<?php
// Load the required libraries

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }
	function index()
	{
		if($this->session->userdata('status')  == "login"){
			redirect(base_url("dashboard"));
		}
		$this->load->library('session');
		$this->load->view('login');
	}
	function login()
	{
		$uname = $_GET['uname'];
		$appid = $_GET['appid'];
		
		if($uname==''||$appid==''){
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			$where = array(
				'uname' 	=> $username,
				'pwd' 		=> md5($password)
			);
			$chek 		= $this->Login_model->chek_login("user",$where)->num_rows();
			$user_data  = $this->Login_model->getSession();
			foreach ($user_data as $g)
			{
				$nama 		= $g['nama'];
				$section 	= $g['section'];
				$email 		= $g['email'];
				$level 		= $g['level'];
				$flag 		= $g['flag'];
				$c1 		= $g['chek1'];
				$c2 		= $g['chek2'];
				$c3 		= $g['chek3'];
				$c4 		= $g['chek4'];
				$c5 		= $g['chek5'];
			}
			if($chek > 0){
				$data_session = array(
					'username' 	=> $username,
					'nama' 		=> $nama,
					'section' 	=> $section,
					'email' 	=> $email,
					'level'		=> $level,
					'flag' 		=> $flag,
					'c1'		=> $c1,
					'c2' 		=> $c2,
					'c3' 		=> $c3,
					'c4' 		=> $c4,
					'c5' 		=> $c5,
					'status' 	=> 'login'
				);
				$this->session->set_userdata($data_session);
				redirect(base_url("dashboard"));
			}else{
				$this->session->set_flashdata('error', "Username atau password salah.");
				redirect(base_url());
			}
		}else{
			$where = array(
				'uname'    => $uname,
				'appid'     =>$appid
			);
			$chek 		= $this->Login_model->chek_login("plums.application",$where)->num_rows();
			$user_data  = $this->Login_model->getSession($uname,$appid);
			foreach ($user_data as $g)
			{
				$nama 		= $g['nama'];
				$section 	= $g['bagian'];
				$email 		= $g['email'];
				$level 		= $g['level_user'];
				$flag 		= $g['active'];
				$c1 		= $g['bag1'];
				$c2 		= $g['bag2'];
				$c3 		= $g['bag3'];
				$c4 		= $g['bag4'];
				$c5 		= $g['bag5'];
			}
			if($chek > 0){
				$data_session = array(
					'username' 	=> $uname,
					'nama' 		=> $nama,
					'section' 	=> $section,
					'email' 	=> $email,
					'level'		=> $level,
					'flag' 		=> $flag,
					'c1'		=> $c1,
					'c2' 		=> $c2,
					'c3' 		=> $c3,
					'c4' 		=> $c4,
					'c5' 		=> $c5,
					'status' 	=> 'login'
				);
				$this->session->set_userdata($data_session);
				redirect(base_url("dashboard"));
			}else{
				$this->session->set_flashdata('error', "Username atau password salah.");
				redirect(base_url());
			}
			
		}
	}
	function logout()
	{
		$data_session = array(
				'username' 	=> 'GUEST',
				'nama' 		=> 'GUEST',
				'section' 	=> '',
				'email' 	=> '',
				'level'		=> '',
				'flag' 		=> '',
				'c1'		=> '',
				'c2' 		=> '',
				'c3' 		=> '',
				'c4' 		=> '',
				'c5' 		=> '',
				'status' 	=> ''
			);
		$this->session->set_userdata($data_session);
		redirect(base_url("backend"));
	}
}
