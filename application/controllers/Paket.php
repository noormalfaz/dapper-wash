<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data["title"] = "Data Paket";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();

        $this->load->model('Menu_Model');
        $data["kode"] = $this->Menu_Model->getKodebarang();
        $data["paket"] = $this->db->get("paket")->result_array();

        $this->form_validation->set_rules("kode", "Kode", "required|trim");
        $this->form_validation->set_rules("nama", "Nama", "required|trim");
        $this->form_validation->set_rules("harga", "Harga", "required|trim|numeric");
        $this->form_validation->set_rules("hari", "Hari", "required|trim|numeric");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laundry/paket', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "kode" => $this->input->post("kode"),
                "nama" => $this->input->post("nama"),
                "harga" => $this->input->post("harga"),
                "hari" => $this->input->post("hari"),
            ];
            $this->db->insert('paket', $data);
            $this->session->set_flashdata("success", 'Paket baru ditambahkan.');
            redirect("paket");
        }
    }

    public function editPaket($id_paket)
    {
        $data["title"] = "Edit Paket";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $data["paket"] = $this->db->get_where('paket', [
            'id_paket' => $id_paket
        ])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laundry/edit_paket', $data);
        $this->load->view('templates/footer');
    }

    public function updatePaket()
    {
        $data = [
            "nama" => $this->input->post("nama"),
            "harga" => $this->input->post("harga"),
            "hari" => $this->input->post("hari")
        ];
        $this->db->where('id_paket', $this->input->post('id_paket'));
        $this->db->update('paket', $data);
        $this->session->set_flashdata("success", 'Paket Diperbaharui.');
        redirect("paket");
    }

    public function deletePaket($id_paket)
    {
        $this->db->delete("paket", ["id_paket" => $id_paket]);
        $this->session->set_flashdata("success", 'Paket Terhapus.');
        redirect("paket");
    }
}
