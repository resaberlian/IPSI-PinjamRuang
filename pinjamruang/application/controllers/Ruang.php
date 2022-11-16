<?php
Class Ruang extends CI_Controller{

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
        $data['content_view'] = 'v_ruang';
        $data['dataruang'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/ruang'));
        $this->load->view('template',$data);
    }
    function create(){
        if(isset($_POST['submit'])){
            $config['upload_path'] = './assets/images/ruang/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000000';
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $data = array(
                'nama_ruang'    => $this->input->post('nama_ruang'),
                'gambar'        => $this->upload->data()['file_name'],
                'status_pinjam' =>$this->input->post('status_pinjam'),
                'id_kat'        => $this->input->post('id_kat'),
                'id_detil'      => $this->input->post('id_detil'));

            $insert =  $this->curl->simple_post($this->API.'/ruang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('ruang');
        }else{
            $this->load->view('ruang/create');
        }
    }
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id_ruang'           => $this->input->post('id_ruang'),
                'nama_ruang'         => $this->input->post('nama_ruang'),
                'gambar'             => $this->input->post('gambar'),
                'status_pinjam'      =>$this->input->post('status_pinjam'),
                'id_kat'             => $this->input->post('id_kat'),
                'id_detil'           => $this->input->post('id_detil'));
            $update =  $this->curl->simple_put($this->API.'/ruang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('ruang');
        }else{
            $params = array('id_ruang'=>  $this->uri->segment(3));
            $data['dataruang'] = json_decode($this->curl->simple_get($this->API.'/ruang',$params));
            $this->load->view('ruang/edit',$data);
        }
    }

    function delete($id_ruang){
        if(empty($id_ruang)){
            redirect('ruang');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/ruang'.'/'. $id_ruang); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('ruang');
        }
    }
}
    
