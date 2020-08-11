<?php
class Search extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("backend"));
        }
        $this->load->helper(array('form','url','menu'));
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->model('Memo_model');
    }
    public function index()
    {
        if($_POST)
        {
            $data = array(
                'result'    => $this->Memo_model->getSearchData(),
                'getNotif'  => $this->Memo_model->countNotification(),
                'viewnotif' => $this->Memo_model->getViewNotification(),
            );
            $this->load->view('app/layout/header');
            $this->load->view('app/layout/layout_main', $data);
            $this->load->view('app/search', $data);
            $this->load->view('app/layout/footer');
        }
    }
}
?>