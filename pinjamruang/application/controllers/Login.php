<?php
class Login extends CI_Controller
{

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/rest-api/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    function index()
    {
        $this->load->view('v_login');
    }
    function index_post()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'username'              => $this->input->post('username'),
                'password'              => $this->input->post('password')
            );
            $insert =  json_decode($this->curl->simple_post($this->API . '/login', $data, array(CURLOPT_BUFFERSIZE => 10)));

            if ($insert != 'gagal') {
                foreach ($insert as $ins) {
                    $data_session = array(
                        'username'  => $ins->username,
                        'login_status' => TRUE,
                        'level'        => $ins->nama_lvl
                    );
                    $this->session->set_userdata($data_session);
                }
                $this->session->set_flashdata('hasil', 'Login Berhasil');
                redirect('dashboard/index');
            } else {
                $this->session->set_flashdata('hasil', 'Login Gagal');
                redirect('login');
            }
        } else {
            $this->load->view('login');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
