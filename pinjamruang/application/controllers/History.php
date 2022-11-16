<?php
Class History extends CI_Controller{

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
        $data['content_view'] = 'v_history';
        $data['datahistory'] = json_decode($this->curl->simple_get('http://localhost/rest-api/index.php/history'));
        $this->load->view('template',$data);
    }

    }
