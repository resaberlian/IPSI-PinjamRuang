<?php
Class Peminjaman extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/rest-api/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    // menampilkan data kontak
    function index(){
        $data['content_view'] = 'v_peminjaman';
        $data['datapinjam'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/peminjaman'));
        $this->load->view('template',$data);
    }

    // insert data kontak
    function create(){
        if(isset($_POST['submit'])){
            $data = array(
                    'id_ruang'      => $this->input->post('id_ruang'),
                    'waktu_pinjam'  => $this->input->post('waktu_pinjam'),
                    'waktu_kembali' => $this->input->post('waktu_kembali'),
                    'ket_pinjam'    => $this->input->post('ket_pinjam'),
                    'id_user'       => $this->input->post('id_user'));
            $insert =  $this->curl->simple_post($this->API.'/peminjaman', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('peminjaman');
        }else{
            $this->load->view('peminjaman/create');
        }
    }

    // edit data kontak
    // function edit(){
    //     if(isset($_POST['submit'])){
    //         $data = array(
    //                 'id_ruang'      => $this->input->post('id_ruang'),
    //                 'waktu_pinjam'  => $this->input->post('waktu_pinjam'),
    //                 'waktu_kembali' => $this->input->post('waktu_kembali'),
    //                 'ket_pinjam'    => $this->input->post('ket_pinjam'),
    //                 'id_user'       => $this->input->post('id_user'));
    //         $update =  $this->curl->simple_put($this->API.'/peminjaman', $data, array(CURLOPT_BUFFERSIZE => 10)); 
    //         if($update)
    //         {
    //             $this->session->set_flashdata('hasil','Update Data Berhasil');
    //         }else
    //         {
    //            $this->session->set_flashdata('hasil','Update Data Gagal');
    //         }
    //         redirect('peminjaman');
    //     }else{
    //         $params = array('id_pinjam'=>  $this->uri->segment(3));
    //         $data['datapinjam'] = json_decode($this->curl->simple_get($this->API.'/peminjaman',$params));
    //         $this->load->view('peminjaman/edit',$data);
    //     }
    // }
    function terima($id_ruang){
        if(empty($id_ruang)){
            redirect('peminjaman');
        }else{
            $update =  $this->curl->simple_put($this->API.'/peminjaman' . '/'. $id_ruang); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Berhasil Terima');
            }else
            {
               $this->session->set_flashdata('hasil','Gagal Terima');
            }
            redirect('peminjaman');
        }
    }
    function delete($id){
        if(empty($id)){
            redirect('peminjaman');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/peminjaman', array('id_pinjam'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('peminjaman');
        }
    }
}
