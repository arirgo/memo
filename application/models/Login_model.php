<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login_model extends CI_Model
{
	
	function chek_login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
	function getSession($uname='',$appid='')
	{
            if($uname=='' or $appid==''){
		$username 	= $this->input->post('username');
		$query 		= $this->db->query("SELECT * FROM user WHERE uname = '$username'");
		return $query->result_array();
            }else{
                $query 		= $this->db->query("SELECT * FROM plums.application WHERE uname = '$uname' and appid='$appid'");
		return $query->result_array();
            }
	}
}