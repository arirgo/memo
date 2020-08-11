<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Memo_model extends CI_Model
{
	function createMemo()
	{
		$getDate 		= date('my');
		$checkNomemo 	= $this->db->query("SELECT no_memo FROM `memo` WHERE no_memo LIKE '%$getDate%'");
		$getExisting    = $checkNomemo->num_rows();
        if($getExisting > 0){
        	$getLatestMemoNumber	= $this->db->query("SELECT SUBSTRING(no_memo, 6, 9) as no_memo FROM `memo` WHERE no_memo LIKE '%$getDate%' ORDER BY no_memo DESC");
            $latestNumber   		= $getLatestMemoNumber->row();
            $latest         		= $latestNumber->no_memo+1;
            $nomemo 				= date('my').'-'.$latest;
        } else {
            $nomemo 				= date('my').'-100';
        } if($this->input->post('appqc') == '0' OR $this->input->post('appqc') == '') {
			$QC = NULL;
		} else {
			$QC = $this->input->post('appqc');
		} if($this->input->post('apprnd') == '0' OR $this->input->post('apprnd') == '') {
			$RND = NULL;
		} else {
			$RND = $this->input->post('apprnd');
		} if($this->input->post('appacc') == '0' OR $this->input->post('appacc') == '') {
			$ACC = NULL;
		} else {
			$ACC = $this->input->post('appqc');
		} 
		$chekvalue0 = $this->input->post('app_ppic');
		$chekvalue1	= $QC;
		$chekvalue2	= $RND;
		$chekvalue3	= $this->input->post('appproduksi');
		$chekvalue4	= $ACC;
		$k 			= $this->input->post('kepada');
		$count_k	= count($k);
		$kepada		= "";
		for($x = 0; $x < $count_k; $x++)
		{
			$dt_kepada 	= array(
				'no_memo' 	=> $nomemo,
				'kepada' 	=> $k[$x]
			);
			$this->db->insert('dt_kepada',$dt_kepada);
			$kepada .= $k[$x];
			$kepada .= ", ";
		}
		if($chekvalue0 == NULL) { $chek0 = 0;} else { $chek0 = 2; }
		if($chekvalue1 == NULL) { $chek1 = 0;} else { $chek1 = 2; }
		if($chekvalue2 == NULL) { $chek2 = 0;} else { $chek2 = 2; }
		if($chekvalue3 == NULL) { $chek3 = 0;} else { $chek3 = 2; }
		if($chekvalue4 == NULL) { $chek4 = 0;} else { $chek4 = 2; }
		$count 			= array($chekvalue0, $chekvalue1, $chekvalue2, $chekvalue3, $chekvalue4);
		$totapp 		= count(array_filter($count));
		$data = array(
			'nama' 					=> $this->input->post('namamemo'),
			'kepada' 				=> $kepada,
			'hal' 					=> $this->input->post('hal'),
			'tanggal' 				=> date('Y-m-d'),
			'detail' 				=> $this->input->post('content'),
			'keterangan' 			=> $this->input->post('keterangan'),
			'status' 				=> '0',
			'app0'					=> $chek0,
			'app1' 					=> $chek1,
			'app2' 					=> $chek2,
			'app3'					=> $chek3,
			'app4'					=> $chek4,
			'status_app0'			=> '0',
			'status_app1'			=> '0',
			'status_app2'			=> '0',
			'status_app3'			=> '0',
			'status_app4'			=> '0',
			'tgl_app0'				=> '-',
			'tgl_app1'				=> '-',
			'tgl_app2' 				=> '-',
			'tgl_app3' 				=> '-',
			'tgl_app4' 				=> '-',
			'totapp'				=> $totapp,
			'app_ppic'				=> $this->input->post('app_ppic'),
			'app_qc'				=> $this->input->post('appqc'),
			'app_rnd' 				=> $this->input->post('apprnd'),
			'app_produksi' 			=> $this->input->post('appproduksi'),
			'app_acc'	 			=> $this->input->post('appacc'),
			'dibuat'				=> $this->input->post('oleh'),
			'useradd' 				=> $this->session->userdata('nama'),
			'no_memo'				=> $nomemo,
			'expire' 				=> '0',
			'app_log' 				=> '1',
			'finish' 				=> '0'
		);
		$this->db->insert('memo',$data);
	}

	function getAllMemoPending()
	{
		$level 		= $this->session->userdata('level');
		$section 	= $this->session->userdata('section');
		if($section == 'PL 1 LAMINASI' || $section == 'PL 1 EXTRUSION')
		{
			//$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND status = totapp AND kepada LIKE '%$section%' AND expire IN ('0','2') AND finish = '0' ORDER BY `memo`.`id`  DESC");
			$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND (status != totapp OR totapp != app0+app1+app2+app3+app4) AND kepada LIKE '%$section%' AND expire IN ('0','2') AND finish = '0' ORDER BY `memo`.`id`  DESC");
		}
		elseif($level == 'User')
		{
			//$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND status = totapp AND kepada LIKE '%$section%' AND expire IN ('0','2') ORDER BY `memo`.`id`  DESC");
			$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND (status != totapp OR totapp != app0+app1+app2+app3+app4) AND kepada LIKE '%$section%' AND expire IN ('0','2') ORDER BY `memo`.`id`  DESC");
		}
		elseif ($level == 'QC' OR $level == 'R&D')
		{
			//$query = $this->db->query("SELECT * FROM `memo` WHERE status_app0 = '0' AND app0 = '1' OR status = totapp AND expire IN ('0','2') ");
			$query = $this->db->query("SELECT * FROM `memo` WHERE status_app0 = '0' AND app0 = '1' OR (status != totapp OR totapp != app0+app1+app2+app3+app4) AND expire IN ('0','2') ");
		}
		elseif ($level == "PRODUKSI")
		{
			/*$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '1' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '0' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '1' OR
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '0' OR 
				status = totapp AND expire IN ('0','2') 
				ORDER BY `memo`.`id`  DESC");*/

			$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '1' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '0' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '1' OR
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '0' OR 
				(status != totapp OR totapp != app0+app1+app2+app3+app4) AND expire IN ('0','2') 
				ORDER BY `memo`.`id`  DESC");
		}
		elseif ($level == 'ACCOUNTING')
		{
			/*$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '0' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '0' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '0' OR 
				status = totapp AND expire IN ('0','2') 
				ORDER BY `memo`.`id`  DESC");*/

			$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '0' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '0' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '0' OR 
				(status != totapp OR totapp != app0+app1+app2+app3+app4) AND expire IN ('0','2') 
				ORDER BY `memo`.`id`  DESC");
		}
		else
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE (status != totapp OR totapp != app0+app1+app2+app3+app4) AND expire IN ('0','2') ORDER BY `memo`.`id`  DESC");
		}
		return $query->result_array();
	}
	
	function getAllMemo()
	{
		$level 		= $this->session->userdata('level');
		$section 	= $this->session->userdata('section');
		if($section == 'PL 1 LAMINASI' || $section == 'PL 1 EXTRUSION')
		{
			//$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND status = totapp AND kepada LIKE '%$section%' AND expire IN ('0','2') AND finish = '0' ORDER BY `memo`.`id`  DESC");
			$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND (status = totapp OR totapp = app0+app1+app2+app3+app4) AND kepada LIKE '%$section%' AND expire IN ('0','2') AND finish = '0' ORDER BY `memo`.`id`  DESC");
		}
		elseif($level == 'User')
		{
			//$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND status = totapp AND kepada LIKE '%$section%' AND expire IN ('0','2') ORDER BY `memo`.`id`  DESC");
			$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND (status = totapp OR totapp = app0+app1+app2+app3+app4) AND kepada LIKE '%$section%' AND expire IN ('0','2') ORDER BY `memo`.`id`  DESC");
		}
		elseif ($level == 'QC' OR $level == 'R&D')
		{
			//$query = $this->db->query("SELECT * FROM `memo` WHERE status_app0 = '0' AND app0 = '1' OR status = totapp AND expire IN ('0','2') ");
			$query = $this->db->query("SELECT * FROM `memo` WHERE status_app0 = '0' AND app0 = '1' OR (status = totapp OR totapp = app0+app1+app2+app3+app4) AND expire IN ('0','2') ");
		}
		elseif ($level == "PRODUKSI")
		{
			/*$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '1' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '0' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '1' OR
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '0' OR 
				status = totapp AND expire IN ('0','2') 
				ORDER BY `memo`.`id`  DESC");*/

			$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '1' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '0' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '1' OR
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '0' OR 
				(status = totapp OR totapp = app0+app1+app2+app3+app4) AND expire IN ('0','2') 
				ORDER BY `memo`.`id`  DESC");
		}
		elseif ($level == 'ACCOUNTING')
		{
			/*$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '0' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '0' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '0' OR 
				status = totapp AND expire IN ('0','2') 
				ORDER BY `memo`.`id`  DESC");*/

			$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '0' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '0' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '0' OR 
				(status = totapp OR totapp = app0+app1+app2+app3+app4) AND expire IN ('0','2') 
				ORDER BY `memo`.`id`  DESC");
		}
		else
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE expire IN ('0','2') ORDER BY `memo`.`id`  DESC");
		}
		return $query->result_array();
	}

	function getRecentMemo()
	{
		$level = $this->session->userdata('level');
		if($level == 'User')
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND status = totapp AND expire IN ('0','2') ORDER BY `memo`.`id`  DESC LIMIT 5 ");
		}
		elseif ($level == 'QC' OR $level == 'R&D')
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE status_app0 = '0' AND app0 = '1' OR status = totapp ORDER BY `memo`.`id` AND expire IN ('0','2') DESC LIMIT 5 ");
		}
		elseif ($level == "PRODUKSI")
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '1' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '1' AND app2 = '0' OR 
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '1' OR
				status_app1 = '0' AND status_app2 = '0'  AND app1 = '0' AND app2 = '0' OR 
				status = totapp AND expire IN ('0','2')
				ORDER BY `memo`.`id`  DESC LIMIT 5 ");
		}
		elseif ($level == 'ACCOUNTING')
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '1' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '1' AND app2 = '0' AND app3 = '0' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '0' AND app3 = '1' OR 
				status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app0 = '0' AND app1 = '0' AND app2 = '1' AND app3 = '0' OR 
				status = totapp AND expire IN ('0','2')
				ORDER BY `memo`.`id`  DESC LIMIT 5 ");
		}
		else
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE expire IN ('0','2') ORDER BY `memo`.`id`  DESC LIMIT 5 ");
		}
		return $query->result_array();
	}
	function getDataEditMemo($id)
	{
		$where 	= array('id' => $id);
		$query 	= $this->db->get_where('memo',$where);
		return $query->result_array();
	}
	function editMemo()
	{
		if($this->input->post('appqc') == '0' OR $this->input->post('appqc') == '') {
			$QC = NULL;
		} else {
			$QC = $this->input->post('appqc');
		} if($this->input->post('apprnd') == '0' OR $this->input->post('apprnd') == '') {
			$RND = NULL;
		} else {
			$RND = $this->input->post('apprnd');
		} if($this->input->post('appacc') == '0' OR $this->input->post('appacc') == '') {
			$ACC = NULL;
		} else {
			$ACC = $this->input->post('appqc');
		} 
		$chekvalue0	= $this->input->post('app_ppic');
		$chekvalue1	= $QC;
		$chekvalue2	= $RND;
		$chekvalue3	= $this->input->post('appproduksi');
		$chekvalue4 = $ACC;
		$id 		= $this->input->post('id');
		$k 			= $this->input->post('kepada');
		$count_k	= count($k);
		$kepada		= "";
		for($x = 0; $x < $count_k; $x++)
		{
			$kepada .= $k[$x];
			$kepada .= ", ";
		}
		$query 		= $this->db->query("SELECT * FROM `memo` WHERE id = '$id'");
		$chek 		= $query->result_array();
		foreach ($chek as $ck) {
			# code...
			$app0 	= $ck['app0'];
			$app1 	= $ck['app1'];
			$app2 	= $ck['app2'];
			$app3 	= $ck['app3'];
			$app4 	= $ck['app4'];
			$appn0 	= $ck['app_ppic'];
			$appn1 	= $ck['app_qc'];
			$appn2 	= $ck['app_rnd'];
			$appn3 	= $ck['app_produksi'];
			$appn4 	= $ck['app_acc'];
		}
		if($app0 == '1'){
			$chek0 = 1;
			$app_ppic = $appn0;
		} elseif($chekvalue0 == NULL){
			$chek0 = 0;
			$app_ppic = NULL;
		} else{
			$chek0 = 2;
			$app_ppic = $this->input->post('app_ppic');
		} if($app1 == '1') {
			$chek1 = 1;
			$appqc = $appn1;
		} elseif($chekvalue1 == NULL){
			$chek1 = 0;
			$appqc = NULL;
		} else {
			$chek1 = 2;
			$appqc = $this->input->post('appqc');
		} if($app2 == '1') {
			$chek2 = 1;
			$apprnd = $appn2;
		} elseif($chekvalue2 == NULL){
			$chek2 = 0;
			$apprnd = NULL;
		} else{
			$chek2 = 2;
			$apprnd = $this->input->post('apprnd');
		} if($app3 == '1'){
			$chek3 = 1;
			$appprod = $appn3;
		} elseif($chekvalue3 == NULL){
			$chek3 = 0;
			$appprod = NULL;
		} else{
			$chek3 = 2;
			$appprod = $this->input->post('appproduksi');
		} if($app4 == '1'){
			$chek4 = 1;
			$appacc = $appn4;
		} elseif($chekvalue4 == NULL){
			$chek4 = 0;
			$appacc = NULL;
		} else{
			$chek4 = 2;
			$appacc = $this->input->post('appacc');
		}
		$count 				= array($chekvalue0, $chekvalue1, $chekvalue2, $chekvalue3, $chekvalue4);
		$totapp 			= count(array_filter($count));
		$data = array(
			'nama' 			=> $this->input->post('namamemo'),
			'kepada' 		=> $kepada,
			'hal' 			=> $this->input->post('hal'),
			'detail' 		=> $this->input->post('content'),
			'keterangan' 	=> $this->input->post('keterangan'),
			'status' 		=> $this->input->post('status'),
			'app0'			=> $chek0,
			'app1' 			=> $chek1,
			'app2' 			=> $chek2,
			'app3'			=> $chek3,
			'app4'			=> $chek4,
			'status_app0' 	=> $this->input->post('sts_app0'),
			'status_app1'	=> $this->input->post('sts_app1'),
			'status_app2'	=> $this->input->post('sts_app2'),
			'status_app3'	=> $this->input->post('sts_app3'),
			'status_app4'	=> $this->input->post('sts_app4'),
			'tgl_app0' 		=> $this->input->post('tgl_app0'),
			'tgl_app1' 		=> $this->input->post('tgl_app1'),
			'tgl_app2' 		=> $this->input->post('tgl_app2'),
			'tgl_app3' 		=> $this->input->post('tgl_app3'),
			'tgl_app4' 		=> $this->input->post('tgl_app4'),
			'totapp'		=> $totapp,
			'app_ppic'		=> $app_ppic,
			'app_qc'		=> $appqc,
			'app_rnd' 		=> $apprnd,
			'app_produksi' 	=> $appprod,
			'app_acc'	 	=> $appacc,
			'dibuat'		=> $this->input->post('oleh'),
			'no_memo'		=> $this->input->post('nomemo'),
			'expire' 		=> $this->input->post('expire')
		);
		$this->db->where('id',$id);
		$this->db->update('memo',$data);
	}
	function editMemoReject()
	{
		if($this->input->post('appqc') == '0' OR $this->input->post('appqc') == '') {
			$QC = NULL;
		} else {
			$QC = $this->input->post('appqc');
		} if($this->input->post('apprnd') == '0' OR $this->input->post('apprnd') == '') {
			$RND = NULL;
		} else {
			$RND = $this->input->post('apprnd');
		} if($this->input->post('appacc') == '0' OR $this->input->post('appacc') == '') {
			$ACC = NULL;
		} else {
			$ACC = $this->input->post('appqc');
		} 
		$chekvalue0	= $this->input->post('app_ppic');
		$chekvalue1	= $QC;
		$chekvalue2	= $RND;
		$chekvalue3	= $this->input->post('appproduksi');
		$chekvalue4 = $ACC;
		$id 		= $this->input->post('id');
		$k 			= $this->input->post('kepada');
		$count_k	= count($k);
		$kepada		= "";
		for($x = 0; $x < $count_k; $x++)
		{
			$kepada .= $k[$x];
			$kepada .= ", ";
		}
		$query 		= $this->db->query("SELECT * FROM `memo` WHERE id = '$id'");
		$chek 		= $query->result_array();
		foreach ($chek as $ck) {
			# code...
			$app0 	= $ck['app0'];
			$app1 	= $ck['app1'];
			$app2 	= $ck['app2'];
			$app3 	= $ck['app3'];
			$app4 	= $ck['app4'];
			$appn0 	= $ck['app_ppic'];
			$appn1 	= $ck['app_qc'];
			$appn2 	= $ck['app_rnd'];
			$appn3 	= $ck['app_produksi'];
			$appn4 	= $ck['app_acc'];
			$sts0 	= $ck['status_app0'];
			$sts1 	= $ck['status_app1'];
			$sts2 	= $ck['status_app2'];
			$sts3 	= $ck['status_app3'];
			$sts4 	= $cl['status_app4'];
		}
		// PPIC
		if($app0 == '1' AND $sts0 == '1') {
			$chek0 		= 2;
			$stats0 	= 0;
			$app_ppic 	= $appn0;
		} elseif($app0 == '1' AND $sts0 == '0'){
			$chek0 		= 1;
			$stats0 	= $this->input->post('sts_app0');
			$app_ppic 	= $appn0;
		} elseif($chekvalue0 == NULL){
			$chek0 		= 0;
			$stats0 	= $this->input->post('sts_app0');
			$app_ppic 	= NULL;
		} else{
			$chek0 		= 2;
			$stats0 	= $this->input->post('sts_app0');
			$app_ppic 	= $this->input->post('app_ppic');
		}
		// QC 
		if($app1 == '1' AND $sts1 == '1') {
			$chek1 		= 2;
			$stats1 	= 0;
			$appqc 	 	= $appn1;
		} elseif($app1 == '1' AND $sts1 == '0') {
			$chek1 		= 1;
			$stats1 	= $this->input->post('sts_app1');
			$appqc 		= $appn1;
		} elseif($chekvalue1 == NULL){
			$chek1 		= 0;
			$stats1 	= $this->input->post('sts_app1');
			$appqc 		= NULL;
		} else {
			$chek1 		= 2;
			$stats1 	= $this->input->post('sts_app1');
			$appqc 		= $this->input->post('appqc');
		} 
		// R&D
		if($app2 == '1' AND $sts2 == '1') {
			$chek2 		= 2;
			$stats2 	= 0;
			$apprnd 	= $appn2;
		} elseif($app2 == '1' AND $sts2 == '0') {
			$chek2 		= 1;
			$stats2 	= $this->input->post('sts_app2');
			$apprnd 	= $appn2;
		} elseif($chekvalue2 == NULL){
			$chek2 		= 0;
			$stats2 	= $this->input->post('sts_app2');
			$apprnd 	= NULL;
		} else{
			$chek2 = 2;
			$stats2 	= $this->input->post('sts_app2');
			$apprnd = $this->input->post('apprnd');
		} 
		// Produksi
		if($app3 == '1' AND $sts3 == '1') {
			$chek3 		= 2;
			$stats2 	= 0;
			$appprod 	= $appn3;
		} elseif($app3 == '1'){
			$chek3 		= 1;
			$stats3 	= $this->input->post('sts_app3');
			$appprod 	= $appn3;
		} elseif($chekvalue3 == NULL){
			$chek3 		= 0;
			$stats3 	= $this->input->post('sts_app3');
			$appprod 	= NULL;
		} else{
			$chek3 		= 2;
			$stats3 	= $this->input->post('sts_app3');
			$appprod 	= $this->input->post('appproduksi');
		}
		// Accounting
		if($app4 == '1' AND $sts4 == '1'){
			$chek4 		= 2;
			$stats4 	= 0;
			$appacc 	= $appn4;
		} elseif($app4 == '1'){
			$chek4 		= 1;
			$stats4 	= $this->input->post('sts_app4');
			$appacc 	= $appn4;
		} elseif($chekvalue4 == NULL){
			$chek4 		= 0;
			$stats4 	= $this->input->post('sts_app4');
			$appacc 	= NULL;
		} else{
			$chek4 		= 2;
			$stats4 	= $this->input->post('sts_app4');
			$appacc 	= $this->input->post('appacc');
		}
		$count 				= array($chekvalue0, $chekvalue1, $chekvalue2, $chekvalue3, $chekvalue4);
		$totapp 			= count(array_filter($count));
		$data = array(
			'nama' 			=> $this->input->post('namamemo'),
			'kepada' 		=> $kepada,
			'hal' 			=> $this->input->post('hal'),
			'detail' 		=> $this->input->post('content'),
			'keterangan' 	=> $this->input->post('keterangan'),
			'status' 		=> $this->input->post('status'),
			'app0'			=> $chek0,
			'app1' 			=> $chek1,
			'app2' 			=> $chek2,
			'app3'			=> $chek3,
			'app4'			=> $chek4,
			'status_app0' 	=> $stats0,
			'status_app1'	=> $stats1,
			'status_app2'	=> $stats2,
			'status_app3'	=> $stats3,
			'status_app4'	=> $stats4,
			'tgl_app0' 		=> $this->input->post('tgl_app0'),
			'tgl_app1' 		=> $this->input->post('tgl_app1'),
			'tgl_app2' 		=> $this->input->post('tgl_app2'),
			'tgl_app3' 		=> $this->input->post('tgl_app3'),
			'tgl_app4' 		=> $this->input->post('tgl_app4'),
			'totapp'		=> $totapp,
			'app_ppic'		=> $app_ppic,
			'app_qc'		=> $appqc,
			'app_rnd' 		=> $apprnd,
			'app_produksi' 	=> $appprod,
			'app_acc'	 	=> $appacc,
			'dibuat'		=> $this->input->post('oleh'),
			'no_memo'		=> $this->input->post('nomemo'),
			'expire' 		=> $this->input->post('expire')
		);
		$this->db->where('id',$id);
		$this->db->update('memo',$data);
	}
    function deleteMemo($table,$where)
    {
        $this->db->delete($table,$where);
    }
	function approve($id)
	{
		$nama 		= $this->session->userdata('nama');
		$query 		= $this->db->get_where('memo',array('id' => $id));
		foreach ($query->result_array() as $m)
		{
			$app0 	 	= $m['app0'];
			$app1 	 	= $m['app1'];
			$app2 	 	= $m['app2'];
			$app3 	 	= $m['app3'];
			$app4 	 	= $m['app4'];
			$app_ppic	= $m['app_ppic'];
			$appqc 	 	= $m['app_qc'];
			$apprnd  	= $m['app_rnd'];
			$appprod 	= $m['app_produksi'];
			$appacc 	= $m['app_acc'];
			$kepada  	= $m['kepada'];
			$status  	= $m['status'];
		}
		if($app0 == '2' and $nama == $app_ppic)
		{
			$data 		= array(
				'id' 		=> $id,
				'status'	=> '1',
				'app0' 		=> $app0-1,
				'tgl_app0' 	=> date('Y-m-d H:i'),
				'app_log' 	=> '1'
			);
		}
		elseif($app1 == '2' and $nama == $appqc)
		{
			$stat = $app0+1;
			$data 		= array(
				'id' 		=> $id,
				'status'	=> $stat,
				'app1' 		=> $app1-1,
				'tgl_app1' 	=> date('Y-m-d H:i'),
				'app_log' 	=> '2',
			);
		}
		elseif($app2 == '2' and $nama == $apprnd)
		{
			$stat = $app0+$app1+1;
			$data 		= array(
				'id' 		=> $id,
				'status'	=> $stat,
				'app2' 		=> $app2-1,
				'tgl_app2' 	=> date('Y-m-d H:i'),
				'app_log' 	=> '2'
			);
		}
		elseif($app3 == '2' and $nama == $appprod)
		{
			$stat = $app0+$app1+$app2+1;
			$data 		= array(
				'id' 		=> $id,
				'status'	=> $stat,
				'app3' 		=> $app3-1,
				'tgl_app3' 	=> date('Y-m-d H:i'),
				'app_log' 	=> '3'
			);
		}
		elseif($app3 == '2' AND $this->session->userdata('level') == 'Super Admin')
		{
			$stat = $app0+$app1+$app2+1;
			$data 		= array(
				'id' 		=> $id,
				'status'	=> $stat,
				'app3' 		=> $app3-1,
				'tgl_app3' 	=> date('Y-m-d H:i'),
				'app_log' 	=> '3',
				'system_apprv' 	=> '1'
			);
		}
		elseif($app4 == '2' and $nama == $appacc)
		{
			$stat = $app0+$app1+$app2+$app3+1;
			$data 		= array(
				'id' 		=> $id,
				'status'	=> $stat,
				'app4' 		=> $app4-1,
				'tgl_app4' 	=> date('Y-m-d H:i'),
				'app_log' 	=> '4'
			);
		}
		else
		{
			$data 		= array(
				'id' 		=> $id);
		}
		$this->db->where(array('id' => $id));
		$this->db->update('memo',$data);
	}
	
	function reject($id)
	{
		$nama 		= $this->session->userdata('nama');
		$query 		= $this->db->get_where('memo',array('id' => $id));
		foreach ($query->result_array() as $m)
		{
			$app0 		= $m['app0'];
			$app1 	 	= $m['app1'];
			$app2 	 	= $m['app2'];
			$app3 	 	= $m['app3'];
			$app4 	 	= $m['app4'];
			$stsapp0 	= $m['status_app0'];
			$stsapp1 	= $m['status_app1'];
			$stsapp2 	= $m['status_app2'];
			$stsapp3 	= $m['status_app3'];
			$stsapp4 	= $m['status_app4'];
			$app_ppic 	= $m['app_ppic'];
			$appqc 	 	= $m['app_qc'];
			$apprnd  	= $m['app_rnd'];
			$appprod 	= $m['app_produksi'];
			$appacc  	= $m['app_acc'];
			$kepada  	= $m['kepada'];
			$status  	= $m['status'];
		}
		if($app0 == '2' and $nama == $app_ppic)
		{
			$data 		= array(
				'id' 			=> $id,
				'app0' 			=> $app0-1,
				'status_app0'	=> $stsapp0+1,
				'tgl_app0' 		=> date('Y-m-d H:i')
			);
		}
		if($app1 == '2' and $nama == $appqc)
		{
			$data 		= array(
				'id' 			=> $id,
				'app1' 			=> $app1-1,
				'status_app1'	=> $stsapp1+1,
				'tgl_app1' 		=> date('Y-m-d H:i')
			);
		}
		elseif($app2 == '2' and $nama == $apprnd)
		{
			$data 		= array(
				'id' 			=> $id,
				'app2' 			=> $app2-1,
				'status_app2'	=> $stsapp2+1,
				'tgl_app2' 	=> date('Y-m-d H:i')
			);
		}
		elseif($app3 == '2' and $nama == $appprod)
		{
			$data 		= array(
				'id' 			=> $id,
				'app3' 			=> $app3-1,
				'status_app3'	=> $stsapp3+1,
				'tgl_app3' 	=> date('Y-m-d H:i')
			);
		}
		elseif($app4 == '2' and $nama == $appacc)
		{
			$data 		= array(
				'id' 			=> $id,
				'app4' 			=> $app4-1,
				'status_app4'	=> $stsapp4+1,
				'tgl_app4' 	=> date('Y-m-d H:i')
			);
		}

		//print_r($data);
		$this->db->where(array('id' => $id));
		$this->db->update('memo',$data);
	}
	function insertDetailReject($id)
	{
		$query 	= $this->db->query("SELECT no_memo FROM `memo` WHERE id = '$id'");
		$get 	= $query->row();
		$data 	= array(
			'no_memo' 		=> $get->no_memo,
			'detail' 		=> $this->input->post('detail'),
			'date' 			=> date('Y-m-d'),
			'declined_by'	=> $this->session->userdata('nama')
		);
		$this->db->replace('dt_declined',$data);
	}
	function getDetailReject($id)
	{
		$query 	= $this->db->query("SELECT no_memo FROM `memo` WHERE id = '$id'");
		$get 	= $query->row();
		$this->db->select('*');
		$this->db->from('dt_declined');
		$this->db->where('no_memo',$get->no_memo);
		return $this->db->get()->row();
	}
	function cancel($id)
	{
		$nama 		= $this->session->userdata('nama');
		$query 		= $this->db->get_where('memo',array('id' => $id));
		foreach ($query->result_array() as $m)
		{
			$app0 		= $m['app0'];
			$app1 	 	= $m['app1'];
			$app2 	 	= $m['app2'];
			$app3 	 	= $m['app3'];
			$app4 	 	= $m['app4'];
			$stsapp0 	= $m['status_app0'];
			$stsapp1 	= $m['status_app1'];
			$stsapp2 	= $m['status_app2'];
			$stsapp3 	= $m['status_app3'];
			$stsapp4 	= $m['status_app4'];
			$app_ppic 	= $m['app_ppic'];
			$appqc 	 	= $m['app_qc'];
			$apprnd  	= $m['app_rnd'];
			$appprod 	= $m['app_produksi'];
			$appacc 	= $m['app_acc'];
			$kepada  	= $m['kepada'];
			$status  	= $m['status'];
		}
		if($app0 == '1' and $nama == $app_ppic)
		{
			$data 		= array(
				'id' 			=> $id,
				'app0' 			=> $app0+1,
				'status'		=> $status-1,
				'tgl_app0' 		=> '-'
			);
		}
		elseif($app1 == '1' and $nama == $appqc)
		{
			$data 		= array(
				'id' 			=> $id,
				'app1' 			=> $app1+1,
				'status'		=> $status-1,
				'tgl_app1' 		=> '-'
			);
		}
		elseif($app2 == '1' and $nama == $apprnd)
		{
			$data 		= array(
				'id' 			=> $id,
				'app2' 			=> $app2+1,
				'status'		=> $status-1,
				'tgl_app2' 		=> '-'
			);
		}
		elseif($app3 == '1' and $nama == $appprod)
		{
			$data 		= array(
				'id' 			=> $id,
				'app3' 			=> $app3+1,
				'status'		=> $status-1,
				'tgl_app3' 		=> '-'
			);
		}
		elseif($app4 == '1' and $nama == $appacc)
		{
			$data 		= array(
				'id' 			=> $id,
				'app4' 			=> $app4+1,
				'status'		=> $status-1,
				'tgl_app4' 		=> '-'
			);
		}
		$this->db->where(array('id' => $id));
		$this->db->update('memo',$data);
	}
	function undo($id)
	{
		$nama 		= $this->session->userdata('nama');
		$query 		= $this->db->get_where('memo',array('id' => $id));
		foreach ($query->result_array() as $m)
		{
			$app0 		= $m['app0'];
			$app1 	 	= $m['app1'];
			$app2 	 	= $m['app2'];
			$app3 	 	= $m['app3'];
			$app4 	 	= $m['app4'];
			$stsapp0 	= $m['status_app0'];
			$stsapp1 	= $m['status_app1'];
			$stsapp2 	= $m['status_app2'];
			$stsapp3 	= $m['status_app3'];
			$stsapp4 	= $m['status_app4'];
			$app_ppic 	= $m['app_ppic'];
			$appqc 	 	= $m['app_qc'];
			$apprnd  	= $m['app_rnd'];
			$appprod 	= $m['app_produksi'];
			$appacc 	= $m['app_acc'];
			$kepada  	= $m['kepada'];
			$status  	= $m['status'];
		}
		if($stsapp0 == '1' and $nama == $app_ppic)
		{
			$data 		= array(
				'id' 			=> $id,
				'app0' 			=> $app0+1,
				'status_app0'	=> $stsapp0-1,
				'tgl_app0' 		=> '-'
			);
		}
		elseif($stsapp1 == '1' and $nama == $appqc)
		{
			$data 		= array(
				'id' 			=> $id,
				'app1' 			=> $app1+1,
				'status_app1'	=> $stsapp1-1,
				'tgl_app1' 		=> '-'
			);
		}
		elseif($stsapp2 == '1' and $nama == $apprnd)
		{
			$data 		= array(
				'id' 			=> $id,
				'app2' 			=> $app2+1,
				'status_app2'	=> $stsapp2-1,
				'tgl_app2' 		=> '-'
			);
		}
		elseif($stsapp3 == '1' and $nama == $appprod)
		{
			$data 		= array(
				'id' 			=> $id,
				'app3' 			=> $app3+1,
				'status_app3'	=> $stsapp3-1,
				'tgl_app3' 		=> '-'
			);
		}
		elseif($stsapp4 == '1' and $nama == $appacc)
		{
			$data 		= array(
				'id' 			=> $id,
				'app4' 			=> $app4+1,
				'status_app4'	=> $stsapp4-1,
				'tgl_app4' 		=> '-'
			);
		}
		$this->db->where(array('id' => $id));
		$this->db->update('memo',$data);
	}
	function viewMemo($id)
	{
		$where 	= array('id' => $id);
		$query 	= $this->db->get_where('memo',$where);
		return $query->result_array();
	}
	function countAllMemo()
	{
		$query 	= $this->db->query("SELECT COUNT(nama) as memo FROM `memo`");
		return $query->result_array();
	}
	function countMemoUnchek()
	{
		$query 	= $this->db->query("SELECT COUNT(nama) as memo FROM `memo` WHERE totapp <> app0+app1+app2+app3+app4 AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND status_app4 = '0' ");
		return $query->result_array();
	}
	function countMemoApproved()
	{
		$query 	= $this->db->query("SELECT COUNT(nama) as memo FROM `memo` WHERE status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND (status = totapp OR totapp = app0+app1+app2+app3+app4) AND expire IN ('0','2')");
		return $query->result_array();
	}
	function countMemoDeclined()
	{
		$query 	= $this->db->query("SELECT COUNT(nama) as memo FROM `memo` WHERE status <> totapp AND status_app0 = '1' OR status_app1 = '1' OR status_app2 = '1' OR status_app3 = '1' OR status_app4 = '1' AND expire IN ('0','2')");
		return $query->result_array();
	}
	function countMemoExpired()
	{
		$this->db->select('COUNT(id) as memo');
		$this->db->from('memo');
		$this->db->where('expire','1');
		return $this->db->get()->row();
	}
	function countMemoActive()
	{
		$this->db->select('COUNT(id) as memo');
		$this->db->from('memo');
		$this->db->where('expire','0');
		return $this->db->get()->row();
	}
	function countNotification()
	{
		$nama 	= $this->session->userdata('nama');
		$level 	= $this->session->userdata('level');
		if($level == 'QC' OR $level == 'R&D')
		{
			$query 	= $this->db->query("SELECT COUNT(nama) as notif FROM `memo` WHERE 
				totapp <> app0+app1+app2+app3+app4 AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND app0 = '1' AND app1 = '2' AND app_qc = '$nama' OR
				totapp <> app0+app1+app2+app3+app4 AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND app0 = '1' AND app2 = '2' AND app_rnd = '$nama'");
		}
		elseif($level == 'PRODUKSI')
		{
			$query 	= $this->db->query("SELECT COUNT(nama) as notif FROM `memo` WHERE 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND app0 = '1' AND app1 = '1' AND app2 = '1' AND app3 = '2' AND app_produksi = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND app0 = '1' AND app1 = '1' AND app2 = '0' AND app3 = '2' AND app_produksi = '$nama' OR
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND app0 = '1' AND app1 = '0' AND app2 = '1' AND app3 = '2' AND app_produksi = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND app0 = '1' AND app1 = '0' AND app2 = '0' AND app3 = '2' AND app_produksi = '$nama'");
		}
		elseif($level == 'ACCOUNTING')
		{
			$query 	= $this->db->query("SELECT COUNT(nama) as notif FROM `memo` WHERE 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app3 = '0' AND 
					app1 = '1' AND app2 = '1' AND app3 = '1' AND app_acc = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app3 = '0' AND 
					app1 = '1' AND app2 = '1' AND app3 = '0' AND app_acc = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app3 = '0' AND 
					app1 = '1' AND app2 = '0' AND app3 = '0' AND app_acc = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app3 = '0' AND 
					app1 = '0' AND app2 = '1' AND app3 = '1' AND app_acc = '$nama' OR
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app3 = '0' AND 
					app1 = '0' AND app2 = '0' AND app3 = '1' AND app_acc = '$nama' OR
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app3 = '0' AND 
					app1 = '1' AND app2 = '0' AND app3 = '1' AND app_acc = '$nama' OR   
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND status_app3 = '0' AND 
					app1 = '0' AND app2 = '1' AND app3 = '0' AND app_acc = '$nama'");
		}
		else
		{
			$query 	= $this->db->query("SELECT COUNT(nama) as notif FROM `memo` WHERE 
					totapp <> app0+app1+app2+app3+app4 AND app_ppic = '$nama' AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND app0 = '2'
					");
		}
		return $query->result_array();
	}
	function getMemoPerhari()
	{
		$query 	= $this->db->query("SELECT COUNT(tanggal) as hari FROM `memo` WHERE tanggal = CURDATE()");
		return $query->result_array();
	}
	function getMemoPerbulan()
	{
		$query 	= $this->db->query("SELECT COUNT(SUBSTRING(tanggal, 1,7)) as bulan FROM `memo` WHERE SUBSTRING(tanggal, 1,7) = SUBSTRING(CURDATE(), 1,7)");
		return $query->result_array();
	}
	function getMemoPertahun()
	{
		$query 	= $this->db->query("SELECT COUNT(SUBSTRING(tanggal, 1,4)) as tahun FROM `memo` WHERE SUBSTRING(tanggal, 1,4) = SUBSTRING(CURDATE(), 1,4)");
		return $query->result_array();
	}
	function appPPIC()
	{
		$query = $this->db->query("SELECT nama FROM `user` WHERE level = 'PPIC'");
		return $query->result_array();
	}
	function appProduksi()
	{
		$query = $this->db->query("SELECT nama FROM `user` WHERE level = 'PRODUKSI'");
		return $query->result_array();
	}
	function appQC()
	{
		$query = $this->db->query("SELECT nama FROM `user` WHERE level = 'QC'");
		return $query->result_array();
	}
	function appRND()
	{
		$query = $this->db->query("SELECT nama FROM `user` WHERE level = 'R&D'");
		return $query->result_array();
	}
	function appAccounting()
	{
		$query = $this->db->query("SELECT nama FROM `user` WHERE level = 'ACCOUNTING'");
		return $query->result_array();
	}
	function getViewNotification()
	{
		$nama 	= $this->session->userdata('nama');
		$level 	= $this->session->userdata('level');
		if($level == 'QC' OR $level == 'R&D')
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE 
				totapp <> app0+app1+app2+app3+app4 AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND app0 = '1' AND app1 = '2' AND app_qc = '$nama' OR
				totapp <> app0+app1+app2+app3+app4 AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND app0 = '1' AND app2 = '2' AND app_rnd = '$nama'");
		}
		elseif($level == 'PRODUKSI')
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE 
					totapp <> app0+app1+app2+app3+app4 AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND app0 = '1' AND app1 = '1' AND app2 = '1' AND app3 = '2' AND app_produksi = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND app0 = '1' AND app1 = '1' AND app2 = '0' AND app3 = '2' AND app_produksi = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND app0 = '1' AND app1 = '0' AND app2 = '1' AND app3 = '2' AND app_produksi = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND app0 = '1' AND app1 = '0' AND app2 = '0' AND app3 = '2' AND app_produksi = '$nama'
					ORDER BY `memo`.`id` DESC");
		}
		elseif($level == 'ACCOUNTING')
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND 
					app1 = '1' AND app2 = '1' AND app3 = '1' AND app_acc = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND 
					app1 = '1' AND app2 = '1' AND app3 = '0' AND app_acc = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND 
					app1 = '1' AND app2 = '0' AND app3 = '0' AND app_acc = '$nama' OR 
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND 
					app1 = '0' AND app2 = '1' AND app3 = '1' AND app_acc = '$nama' OR
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND 
					app1 = '0' AND app2 = '0' AND app3 = '1' AND app_acc = '$nama' OR
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND 
					app1 = '1' AND app2 = '0' AND app3 = '1' AND app_acc = '$nama' OR   
					totapp <> app0+app1+app2+app3+app4 AND status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND 
					app1 = '0' AND app2 = '1' AND app3 = '0' AND app_acc = '$nama'
					ORDER BY `memo`.`id`  DESC");
		}
		else
		{
			$query 	= $this->db->query("SELECT * FROM `memo` WHERE 
					totapp <> app0+app1+app2+app3+app4 AND app_ppic = '$nama' AND app0 = '2' AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' ORDER BY `memo`.`id` DESC");
		}
		return $query->result_array();
	}
	function getReceiverQC($nomemo)
	{
		$getNama 	= $this->db->query("SELECT app_qc FROM `memo` WHERE no_memo = '$nomemo'");
		foreach ($getNama->result_array() as $g) {
			# code...
			$qc 	= $g['app_qc'];
		}
		$query 		= $this->db->query("SELECT email FROM `user` WHERE nama = '$qc'");
		return $query->result_array();
	}
	function getReceiverRND($nomemo)
	{
		$getNama 	= $this->db->query("SELECT app_rnd FROM `memo` WHERE no_memo = '$nomemo'");
		foreach ($getNama->result_array() as $g) {
			# code...
			$rnd 	= $g['app_rnd'];
		}
		$query 		= $this->db->query("SELECT email FROM `user` WHERE nama = '$rnd'");
		return $query->result_array();
	}
	function getReceiverProduksi($appprod)
	{
		$data 	= array('nama' => $appprod);
		$query 	= $this->db->get_where('user', $data);
		return $query->result_array();
	}
	function getReceiverPPIC($nomemo)
	{
		$getNama 	= $this->db->query("SELECT app_ppic FROM `memo` WHERE no_memo = '$nomemo'");
		foreach ($getNama->result_array() as $g) {
			# code...
			$ppic 	= $g['app_ppic'];
		}
		$query 		= $this->db->query("SELECT email FROM `user` WHERE nama = '$ppic'");
		return $query->result_array();
	}
	function getReceiverAcc($appacc)
	{
		$data 	= array('nama' => $appacc);
		$query 	= $this->db->get_where('user', $data);
		return $query->result_array();
	}
	function getReceiverHead($nomemo)
	{
		$getKepada 	= $this->db->query("SELECT kepada FROM `dt_kepada` where no_memo = '$nomemo'")->result_array();
		$in 		= "";
		foreach ($getKepada as $g) {
			# code...
			$in 	.= "'".$g['kepada']."',";
		}
		$in 		.= "''";
		$this->db->select('email');
		$this->db->from('dt_section');
		$this->db->where("section IN ($in)");
		return $this->db->get()->result_array();
	}
	function chekAppMemo($id)
	{
		$data 	= array('id' => $id);
		$query 	= $this->db->get_where('memo', $data);
		return $query->result_array();
	}
	function getViewExpiredMemo()
	{
		$this->db->select('memo.*, dt_expired.expired_by,dt_expired.date');
		$this->db->from('memo');
		$this->db->join('dt_expired', 'dt_expired.no_memo = memo.no_memo');
		return $this->db->get()->result_array();	
	}
	function executeExpireMemo($id)
	{
		$data 	= array(
			'id' 		=> $id,
			'expire'	=> '1',
		);
		$this->db->where(array('id' => $id));
		$this->db->update('memo',$data);
	}
	function executeDataExpire($id)
	{
		$query 	= $this->db->query("SELECT no_memo FROM `memo` WHERE id = '$id'");
		$getNo 	= $query->row();
		$data 	= array(
			'no_memo' 		=> $getNo->no_memo,
			'date'			=> date('Y-m-d'),
			'expired_by' 	=> $this->session->userdata('nama'),
		);
		$this->db->where('no_memo',$getNo->no_memo);
		$this->db->delete('dt_reactive');
		$this->db->replace('dt_expired',$data);
	}
	function executeReactiveMemo($no_memo)
	{
		$data 	= array(
			'expire'		=> '0',
		);
		$this->db->where(array('no_memo' => $no_memo));
		$this->db->update('memo',$data);
	}
	function executeDataReactivate($no_memo)
	{
		$data 	= array(
			'no_memo' 		=> $no_memo,
			'date' 			=> date('Y-m-d'),
			'reactive_by' 	=> $this->session->userdata('nama')
		);
		$this->db->where('no_memo', $no_memo);
		$this->db->delete('dt_expired');
		$this->db->replace('dt_reactive', $data);
	}
	function getNewApproval()
	{
		$level 	= $this->session->userdata('level');
		$where 	= array(
			'level' => $level,
		);
		$query 	= $this->db->get_where('user',$where);
		return $query->result_array();
	}
	function changeApproval()
	{
		$id 	= $this->input->post('id');
		$level 	= $this->session->userdata('level');
		$newApp = $this->input->post('new_app');
		if($level == 'PPIC'){
			$app 	= 'app_ppic';
		}
		elseif($level == 'QC'){
			$app 	= 'app_qc';
		}
		elseif($level == 'R&D'){
			$app 	= 'app_rnd';
		}
		elseif($level == 'PRODUKSI'){
			$app 	= 'app_produksi';
		}
		elseif($level == 'ACCOUNTING'){
			$app 	= 'app_acc';
		}
		$data 	= array(
			$app 	=> $newApp,
			'id' 	=> $id,
		);
		$this->db->where(array('id' => $id));
		$this->db->update('memo',$data);
	}
	function getSearchData()
	{
		$searchValue 	= $this->input->post('search');
		$orLike			= array(
			'nama' 		=> $searchValue,
			'kepada' 	=> $searchValue,
			'hal'		=> $searchValue,
			'tanggal'	=> $searchValue
		);
		$this->db->select('*');
		$this->db->from('memo');
		$this->db->like('no_memo', $searchValue);
		$this->db->or_like($orLike);
		return $this->db->get()->result_array();
	}
	function getSignaturePPIC($id)
	{
		$getName 	= $this->db->query("SELECT app_ppic FROM `Memo` WHERE id = '$id'");
		$nama 		= $getName->row()->app_ppic;
		$this->db->select('signature');
		$this->db->from('user');
		$this->db->where('nama',$nama);
		$query  	= $this->db->get();
		return $query->row();
	}
	function getSignatureQC($id)
	{
		$getName 	= $this->db->query("SELECT app_qc FROM `Memo` WHERE id = '$id'");
		$nama 		= $getName->row()->app_qc;
		$this->db->select('signature');
		$this->db->from('user');
		$this->db->where('nama',$nama);
		$query  	= $this->db->get();
		return $query->row();
	}
	function getSignatureRND($id)
	{
		$getName 	= $this->db->query("SELECT app_rnd FROM `Memo` WHERE id = '$id'");
		$nama 		= $getName->row()->app_rnd;
		$this->db->select('signature');
		$this->db->from('user');
		$this->db->where('nama',$nama);
		$query  	= $this->db->get();
		return $query->row();
	}
	function getSignaturePROD($id)
	{
		$getName 	= $this->db->query("SELECT app_produksi FROM `Memo` WHERE id = '$id'");
		$nama 		= $getName->row()->app_produksi;
		$this->db->select('signature');
		$this->db->from('user');
		$this->db->where('nama',$nama);
		$query  	= $this->db->get();
		return $query->row();
	}
	function getSignatureACC($id)
	{
		$getName 	= $this->db->query("SELECT app_acc FROM `Memo` WHERE id = '$id'");
		$nama 		= $getName->row()->app_acc;
		$this->db->select('signature');
		$this->db->from('user');
		$this->db->where('nama',$nama);
		$query  	= $this->db->get();
		return $query->row();
	}
	function checkNomemo()
	{
		$getDate 	= date('my');
		$this->db->select('no_memo');
		$this->db->from('memo');
		$this->db->like('no_memo',$getDate);
		return 	$this->db->get()->num_rows();
	}
	function getLatestMemoNumber()
	{
		$getDate 	= date('my');
		$this->db->select('SUBSTRING(no_memo, 6, 9) as no_memo', FALSE);
		$this->db->from('memo');
		$this->db->like('no_memo',$getDate);
		$this->db->order_by('no_memo','DESC');
		return $this->db->get()->row();
	}
	function getDataUserReject($id)
	{
		$checkReject 	= $this->db->query("SELECT * FROM `memo` WHERE id = '$id'");
		$get 	 		= $checkReject->row();
		if($get->status_app0 == '1') {
			$nama 	= $get->app_ppic;
		} elseif($get->status_app1 == '1') {
			$nama 	= $get->app_qc;
		} elseif($get->status_app2 == '1') {
			$nama 	= $get->app_rnd;
		} elseif($get->status_app3 == '1') {
			$nama 	= $get->app_produksi;
		} elseif($get->status_app4 == '1') {
			$nama 	= $get->app_acc;
		}
		$data 	= array(
			'nama' => $nama
		);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($data);
		return $this->db->get()->row();
	}
	// function getAllMemoFinish()
	// {
	// 	$this->db->where("status = totapp AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND status_app4 = '0' AND expire = '0' AND finish = '1'");
	// 	return $this->db->get('memo');
	// }
	function getAllMemoFinish($section)
	{
		$this->db->where("status = totapp AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND status_app4 = '0' AND expire = '0' AND finish = '1' AND kepada like '%$section%'");
		return $this->db->get('memo');
	}

	function getMemoFinish()
	{
		$this->db->where("(app0 + app1 + app2 + app3) = totapp AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND status_app4 = '0' AND expire IN ('0','2')");
		return $this->db->get('memo');
	}

	function getMemoOutstanding()
	{
		$level 		= $this->session->userdata('level');
		$section 	= $this->session->userdata('section');
		if($section == 'PL 1 LAMINASI' || $section == 'PL 1 EXTRUSION')
		{
			$query = $this->db->query("SELECT * FROM `memo` WHERE status_app1 = '0' AND status_app2 = '0' AND  status_app3 = '0' AND  status_app4 = '0' AND (status = totapp OR totapp = app0+app1+app2+app3+app4) AND kepada LIKE '%$section%' AND expire IN ('0','2') AND finish = '0' ORDER BY `memo`.`id`  DESC");
		}else{
			$query = $this->db->query("SELECT * FROM `memo` WHERE (app0 + app1 + app2 + app3) != totapp AND status_app0 = '0' AND status_app1 = '0' AND status_app2 = '0' AND status_app3 = '0' AND status_app4 = '0' AND expire IN ('0','2')");
		}
		
		return $query->result_array();
	}

	function getMemoReject()
	{
		$query = $this->db->query("SELECT * FROM `memo` WHERE 
				status_app0 = '1' OR 
				status_app1 = '1' OR 
				status_app2 = '1' OR 
				status_app3 = '1' OR 
				status_app4 = '1' AND 
				expire IN ('0','2') 
				ORDER BY `memo`.`id`  DESC");
		
		return $query->result_array();
	}
	
	function executeFinisheMemo($id)
	{
		$data 	= array(
			'id' 		=> $id,
			'finish'	=> '1',
		);
		$this->db->where(array('id' => $id));
		$this->db->update('memo',$data);
	}
	function executeUnfinishMemo($id)
	{
		$data 	= array(
			'id' 		=> $id,
			'finish'	=> '0',
		);
		$this->db->where(array('id' => $id));
		$this->db->update('memo',$data);
	}
}
