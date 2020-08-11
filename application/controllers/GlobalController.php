<?php
// Load the required libraries

defined('BASEPATH') OR exit('No direct script access allowed');

public class Global extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Memo_model');

    }
}