<?php
Class User extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rest-api/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url'); 
    }

    function index(){
        $data['datauser'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/user'));
        $this->load->view('v_user',$data);
    }
    function register(){
        $this->load->view('v_registration');
    }
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'nama'        =>  $this->input->post('nama'),
                'username'      =>  $this->input->post('username'),
                'password'     =>  $this->input->post('password'));
            $insert =  $this->curl->simple_post($this->API.'/user', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('login');
        }else{
            $this->load->view('user/create');
        }
    }
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_user'       =>  $this->input->post('id_user'),
                'nama'          =>  $this->input->post('nama'),
                'id_lvl'        =>  $this->input->post('id_lvl'));
            $update =  $this->curl->simple_put($this->API.'/user', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('user');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['datauser'] = json_decode($this->curl->simple_get($this->API.'/user',$params));
            $this->load->view('user/edit',$data);
        }
    }

    // delete data kontak
    function delete($id){
        if(empty($id)){
            redirect('user');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/user', array('id_user'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('user');
        }
    }
}