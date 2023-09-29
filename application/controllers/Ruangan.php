<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data["title"] = "Data Ruangan Kelas";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();

        $this->load->model('Menu_Model');
        $data["kode"] = $this->Menu_Model->getKodekelas();
        $data["kelas"] = $this->db->get("kelas")->result_array();

        $this->form_validation->set_rules("kode", "Kode", "required|trim");
        $this->form_validation->set_rules("nama", "Nama", "required|trim");
        $this->form_validation->set_rules("harga", "Harga", "required|trim|numeric");
        $this->form_validation->set_rules("sewa", "Sewa", "required|trim|numeric");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ruangan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "kode" => $this->input->post("kode"),
                "nama" => $this->input->post("nama"),
                "harga" => $this->input->post("harga"),
                "sewa" => $this->input->post("sewa"),
            ];
            $this->db->insert('kelas', $data);
            $this->session->set_flashdata("success", 'Ruangan Kelas baru ditambahkan.');
            redirect("kelas");
        }
    }

    public function komputer()
    {
        $data["title"] = "Data Ruangan Lab Komputer";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();

        $this->load->model('Menu_Model');
        $data["kode"] = $this->Menu_Model->getKodekomputer();
        $data["komputer"] = $this->db->get("komputer")->result_array();

        $this->form_validation->set_rules("kode", "Kode", "required|trim");
        $this->form_validation->set_rules("nama", "Nama", "required|trim");
        $this->form_validation->set_rules("harga", "Harga", "required|trim|numeric");
        $this->form_validation->set_rules("sewa", "Sewa", "required|trim|numeric");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ruangan/komputer', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "kode" => $this->input->post("kode"),
                "nama" => $this->input->post("nama"),
                "harga" => $this->input->post("harga"),
                "sewa" => $this->input->post("sewa"),
            ];
            $this->db->insert('komputer', $data);
            $this->session->set_flashdata("success", 'Ruangan Lab Komputer baru ditambahkan.');
            redirect("komputer");
        }
    }

    public function seni()
    {
        $data["title"] = "Data Ruangan Seni";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();

        $this->load->model('Menu_Model');
        $data["kode"] = $this->Menu_Model->getKodeseni();
        $data["seni"] = $this->db->get("seni")->result_array();

        $this->form_validation->set_rules("kode", "Kode", "required|trim");
        $this->form_validation->set_rules("nama", "Nama", "required|trim");
        $this->form_validation->set_rules("harga", "Harga", "required|trim|numeric");
        $this->form_validation->set_rules("sewa", "Sewa", "required|trim|numeric");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ruangan/seni', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "kode" => $this->input->post("kode"),
                "nama" => $this->input->post("nama"),
                "harga" => $this->input->post("harga"),
                "sewa" => $this->input->post("sewa"),
            ];
            $this->db->insert('seni', $data);
            $this->session->set_flashdata("success", 'Ruangan Seni baru ditambahkan.');
            redirect("seni");
        }
    }
}
