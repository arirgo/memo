<?php
class User extends CI_Controller {
 	function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("backend"));
        }
        $this->load->model('Admin_model');
        $this->load->model('Memo_model');
        $this->load->helper(array('form','url','menu'));
        $this->load->database();
        $this->load->library('form_validation');
    }
    public function index()
    {
        redirect(base_url("user/data"));
    }
    function data()
    {
        if($this->session->userdata('level') != "Super Admin" OR $this->session->userdata('c1') != "1"){
            redirect(base_url("user/profile"));
        }
        $data['karyawan']   = $this->Admin_model->getAllUser();
        $data['username']   = $this->session->userdata('username');
        $data['level']      = $this->session->userdata('level');
        $data['c1']         = $this->session->userdata('c1');
        $data['c2']         = $this->session->userdata('c2');
        $data['c3']         = $this->session->userdata('c3');
        $data['nama']       = $this->session->userdata('nama');
        $data['getNotif']   = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/user/user', $data);
        $this->load->view('app/layout/footer');
    }
    function add()
    {
        $data['username']       = $this->session->userdata('username');
        $data['nama']           = $this->session->userdata('nama');
        $data['level']          = $this->session->userdata('level');
        $data['c1']             = $this->session->userdata('c1');
        $data['c2']             = $this->session->userdata('c2');
        $data['c3']             = $this->session->userdata('c3');
        $data['getSection']     = $this->Admin_model->getSection();
        $data['getNotif']       = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/user/add_user');
        $this->load->view('app/layout/footer');

    }
    function addUser()
    {
        if(isset($_POST['adduser']))
        {
            $this->Admin_model->addUser();
            $this->session->set_flashdata('suksesadd',
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                New user has been added to database!</a>
                            </div>    ');
            redirect(base_url("user"));
        }
    }
    function edit($id)
    {
        $data['username']   = $this->session->userdata('username');
        $data['nama']       = $this->session->userdata('nama');
        $data['level']      = $this->session->userdata('level');
        $data['c1']         = $this->session->userdata('c1');
        $data['c2']         = $this->session->userdata('c2');
        $data['c3']         = $this->session->userdata('c3');
        $data['getNotif']   = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $data['getSection'] = $this->Admin_model->getSection();
        $where              = array('id' => $id);
        $query              = $this->db->query("SELECT * FROM `user` WHERE id = $id");
        $data['user']       = $query->result_array();
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/user/edit_user');
        $this->load->view('app/layout/footer');
    }
    function editUser()
    {
        if(isset($_POST['edituser']))
        {
            $this->Admin_model->editUser();
            $this->session->set_flashdata('suksesedit',
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Data Updated!</a>
                            </div>   ');
            redirect(base_url("user"));
        }
    }
    function setting()
    {
        if(isset($_POST['edituser']))
        {
            $id = $this->input->post('id');
            $this->Admin_model->setting($id);
            $this->session->set_flashdata('setup_success',
                            '<div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                Data Updated!</a>
                            </div>   ');
            redirect(base_url("user/profile"));
        }
    }
    function delete($id)
    {
        $where = array('id' => $id);
        $this->Admin_model->deleteUser('user',$where);
        redirect(base_url('user'));
    }
    function changepwd()
    {
        $id     = $this->input->post('id');
        if(isset($_POST['changepwd']))
        {
            $this->Admin_model->changePwd();
            $this->session->set_flashdata('changepwd', '
                <div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    Password Changed!</a>
                </div>   ');
            redirect(base_url("user/edit/$id"));
        }
    }
    function changepw()
    {
        $id     = $this->input->post('id');
        if(isset($_POST['changepwd']))
        {
            $this->Admin_model->changePwd();
            $this->session->set_flashdata('changepwd', '
                <div class="alert alert-sm alert-success alert-dismissible fade show fade-in">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    Password Changed!</a>
                </div>  ');
            redirect(base_url("user/profile"));
        }
    }
    function chekUsername()
    {
        $where      = array('uname' => $_POST['username']);
        $query      = $this->db->get_where('user',$where);
        $return     = $query->result_array();
        foreach ($return as $key)
        {
            # code...
            $user  = $key['uname'];
        }
        if(empty($user))
        {
            $uname  = 'N1GHT0FF41Y4K3NSE1DUR1FFT0';
        }
        else
        {
            $uname = $user;
        }
        if($_POST["username"] == $uname)
        {
            echo '<a class="text text-danger"> Username already exist</a>';
        }
        else
        {
            echo '<a class="text-success"> Username Available </a>';
        }
    }
    function adduserbtn()
    {
        $where      = array('uname' => $_POST['username']);
        $query      = $this->db->get_where('user',$where);
        $return     = $query->result_array();
        foreach ($return as $key)
        {
            # code...
            $user  = $key['uname'];
        }
        if(empty($user))
        {
            $uname  = 'N1GHT0FF41Y4K3NSE1DUR1FFT0';
        }
        else
        {
            $uname = $user;
        }
        if($_POST["username"] == $uname)
        {
            echo '<button class="btn btn-md btn-success btn--icon-text text-white pull-right" disabled><i class="zmdi zmdi-save"></i> Save</button>';
        }
        else
        {
            echo '<button name="adduser" id="adduser" class="btn btn-md btn-success btn--icon-text text-white pull-right"><i class="zmdi zmdi-save"></i> Save</button>';
        }
    }
    function profile()
    {
        $data['karyawan']   = $this->Admin_model->getAllUser();
        $data['username']   = $this->session->userdata('username');
        $data['level']      = $this->session->userdata('level');
        $data['c1']         = $this->session->userdata('c1');
        $data['c2']         = $this->session->userdata('c2');
        $data['c3']         = $this->session->userdata('c3');
        $data['nama']       = $this->session->userdata('nama');
        $data['getNotif']   = $this->Memo_model->countNotification();
        $data['viewnotif']      = $this->Memo_model->getViewNotification();
        $uname              = $this->session->userdata('username');      
        $data['getProfile'] = $this->Admin_model->getUserProfile($uname);
        $this->load->view('app/layout/header');
        $this->load->view('app/layout/layout_main', $data);
        $this->load->view('app/user/profile',$data);
        $this->load->view('app/layout/footer');

    }
}
