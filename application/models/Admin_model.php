<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_model extends CI_Model
{
	
	function getAllUser()
	{
		$query = $this->db->query("SELECT * from `user` WHERE NOT level = 'Super Admin'");
		return $query->result_array();
	}
	function addUser()
	{
		$chekvalue1			= $this->input->post('usermanage');
		$chekvalue2			= $this->input->post('memo');
		$chekvalue3			= $this->input->post('approval');
		if($chekvalue1 == '1')
		{ $chek1 = 1;}
		else
		{ $chek1 = 0;}
		if($chekvalue2 == '1')
		{ $chek2 = 1;}
		else
		{ $chek2 = 0;}
		if($chekvalue3 == '1')
		{ $chek3 = 1;}
		else
		{ $chek3 = 0;}
		$data = array(
			'nama' 			=> $this->input->post('nama'),
			'uname' 		=> $this->input->post('username'),
			'pwd' 			=> md5($this->input->post('pwd')),
			'email' 		=> $this->input->post('email'),
			'section' 		=> $this->input->post('section'),
			'level' 		=> $this->input->post('user'),
			'chek1' 		=> $chek1, 
			'chek2' 		=> $chek2,
			'chek3'			=> $chek3,
			'signature' 	=> 'assets/img/signature/default.png'
		);
		$this->db->insert('user',$data);
	}
	function editUser()
	{
		$chekvalue1			= $this->input->post('usermanage');
		$chekvalue2			= $this->input->post('memo');
		$chekvalue3			= $this->input->post('approval');
		$id 				= $this->input->post('id');
		if($chekvalue1 == '1')
		{ $chek1 = 1;}
		else
		{ $chek1 = 0;}
		if($chekvalue2 == '1')
		{ $chek2 = 1;}
		else
		{ $chek2 = 0;}
		if($chekvalue3 == '1')
		{ $chek3 = 1;}
		else
		{ $chek3 = 0;}
		$data = array(
			'nama' 			=> $this->input->post('nama'),
			'uname' 		=> $this->input->post('username'),
			'email' 		=> $this->input->post('email'),
			'section' 		=> $this->input->post('section'),
			'level' 		=> $this->input->post('user'),
			'chek1' 		=> $chek1, 
			'chek2' 		=> $chek2,
			'chek3'			=> $chek3
		);
		$this->db->where('id', $id);
		$this->db->update('user',$data);
	}
	function setting($id)
	{
		$data = array(
			'nama' 			=> $this->input->post('nama'),
			'uname' 		=> $this->input->post('username'),
			'email' 		=> $this->input->post('email'),
		);
		$this->db->where('id', $id);
		$this->db->update('user',$data);
	}
	function changePwd()
	{
		$id 	= $this->input->post('id');
		$data 	= array(
			'pwd' => md5($this->input->post('pwd'))
		);
		$this->db->where('id', $id);
		$this->db->update('user',$data);
	}
	function deleteUser($table,$where)
	{
		$this->db->delete($table,$where);
	}
	function checkUsername($table, $where)
	{
        $query = $this->db->get('user',$where);  
        return $query->result_array();
	}
	function getSection()
	{
		$query = $this->db->get('section');
		return $query->result_array();
	}
	function countAllUser()
	{
		$query 	= $this->db->query("SELECT COUNT(uname) as user FROM `user`");
		return $query->result_array();
	}
    function getUserProfile($uname)
    {
        $data   = array(
            'uname' => $uname
        );
        $query  = $this->db->get_where('user', $data);
        return $query->result_array();
    }
}