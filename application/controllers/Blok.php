<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blok extends CI_Controller
{

    public function index()
    {
        $data["judul"] =  "Akses di Blok!";
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/auth_footer');
    }
}
