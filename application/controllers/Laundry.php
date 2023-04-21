<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laundry extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data["title"] = "Data Member";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();

        $this->load->model('Menu_Model');
        $data["kode"] = $this->Menu_Model->getKodemember();

        $data["member"] = $this->db->get("member")->result_array();

        $this->form_validation->set_rules("kode", "Kode", "required|trim");
        $this->form_validation->set_rules("nama", "Nama", "required|trim");
        $this->form_validation->set_rules("alamat", "Alamat", "required|trim");
        $this->form_validation->set_rules("nohp", "Nohp", "required|trim");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laundry/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "kode" => $this->input->post("kode"),
                "nama" => $this->input->post("nama"),
                "alamat" => $this->input->post("alamat"),
                "nohp" => $this->input->post("nohp"),
            ];
            $this->db->insert('member', $data);
            $this->session->set_flashdata("success", 'Member baru ditambahkan.');
            redirect("laundry");
        }
    }

    public function laporan()
    {
        $data["title"] = "Detail Laporan";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        if (empty($this->input->post("bulan"))) {
            $tahun = $this->input->post("tahun");
            $data["transaksi"] = $this->db->query("SELECT * FROM `transaksi` WHERE YEAR(`tgl_masuk`) = $tahun")->result_array();
            $data["waktu"] = "Tahun {$tahun}";
        } else {
            $tahun = $this->input->post("tahun");
            $bulan = $this->input->post("bulan");
            $data["transaksi"] = $this->db->query("SELECT * FROM `transaksi` WHERE MONTH(`tgl_masuk`) = $bulan AND YEAR(`tgl_masuk`) = $tahun")->result_array();
            $data["waktu"] = "Bulan ".$bulan.", Tahun ".$tahun;
        }
        $this->load->view('laundry/laporan', $data);
    }

    public function transaksi()
    {
        $data["title"] = "Data Transaksi";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $nama = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();

        $this->load->model('Menu_Model');
        $data["kode"] = $this->Menu_Model->getKodetransaksi();

        $data["transaksi"] = $this->db->get("transaksi")->result_array();
        $data["paket"] = $this->db->get("paket")->result_array();

        $data["member"] = ["Member", "Non Member"];

        $data["bulan"] = [
            [
                "no" => 1,
                "nama" => "Januari"
            ],
            [
                "no" => 2,
                "nama" => "Februari"
            ],
            [
                "no" => 3,
                "nama" => "Maret"
            ],
            [
                "no" => 4,
                "nama" => "April"
            ],
            [
                "no" => 5,
                "nama" => "Mei"
            ],
            [
                "no" => 6,
                "nama" => "Juni"
            ],
            [
                "no" => 7,
                "nama" => "Juli"
            ],
            [
                "no" => 8,
                "nama" => "Agustus"
            ],
            [
                "no" => 9,
                "nama" => "September"
            ],
            [
                "no" => 10,
                "nama" => "Oktober"
            ],
            [
                "no" => 11,
                "nama" => "November"
            ],
            [
                "no" => 12,
                "nama" => "Desember"
            ],
        ];
        $data["tahun"] = [2021, 2022, 2023];
        $data["member"] = $this->db->get("member")->result_array();

        $this->form_validation->set_rules("pelanggan", "Pelanggan", "required|trim");
        $this->form_validation->set_rules("paket", "Paket", "required|trim");
        $this->form_validation->set_rules("berat", "Berat", "required|trim");


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laundry/transaksi', $data);
            $this->load->view('templates/footer');
        } else {
            $paketan = $this->db->get_where('paket', [
                'id_paket' => $this->input->post("paket")
            ])->row_array();
            if ($this->input->post("member") == "Member") {
                $diskon = 0.15;
            } else {
                $diskon = 0;
            }
            $total = $this->input->post("berat") * $paketan["harga"];
            $data = [
                "tgl_masuk" => date("y-m-d"),
                "kode" => $this->input->post("kode", true),
                "nama" => $this->input->post("pelanggan"),
                "paket_id" => $this->input->post("paket"),
                "berat" => $this->input->post("berat"),
                "total" => $total - ($total * $diskon),
                "tgl_ambil" => manipulasiTanggal(date("y-m-d"), $paketan["hari"]),
                "member" => $this->input->post("member"),
                "user_id" => $nama["id_user"],
            ];
            $this->db->insert('transaksi', $data);
            $this->session->set_flashdata("success", 'Transaksi baru ditambahkan.');
            redirect("laundry/transaksi");
        }
    }
    
    public function editMember($id_member)
    {
        $data["title"] = "Edit Member";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $data["member"] = $this->db->get_where('member', [
            'id_member' => $id_member
        ])->row_array();

        $this->form_validation->set_rules("nama", "Nama", "required|trim");
        $this->form_validation->set_rules("alamat", "Alamat", "required|trim");
        $this->form_validation->set_rules("nohp", "Nohp", "required|trim");
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laundry/edit_member', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "nama" => $this->input->post("nama", true),
                "alamat" => $this->input->post("alamat"),
                "nohp" => $this->input->post("nohp", true),
            ];
            $this->db->where('id_member', $this->input->post('id_member'));
            $this->db->update('member', $data);
            $this->session->set_flashdata("success", 'Member Diperbaharui.');
            redirect("laundry");
        }
    }

    public function editTransaksi($id_transaksi)
    {
        $data["title"] = "Edit Transaksi";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $data["transaksi"] = $this->db->get_where('transaksi', [
            'id_transaksi' => $id_transaksi
            ])->row_array();
        $data["paket"] = $this->db->get("paket")->result_array();
        $data["status"] = [0, 1, 2];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laundry/edit_transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function updateTransaksi()
    {
        $paketan = $this->db->get_where('paket', [
            'id_paket' => $this->input->post("paket")
        ])->row_array();

        if ($this->input->post("member") == "Member") {
            $diskon = 0.15;
        } else {
            $diskon = 0;
        }
        $total = $this->input->post("berat") * $paketan["harga"];
        $data = [
            "paket_id" => $this->input->post("paket"),
            "berat" => $this->input->post("berat"),
            "total" => $total - ($total * $diskon),
            "status" => $this->input->post("status"),
        ];
        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('transaksi', $data);
        $this->session->set_flashdata("success", 'Transaksi Diperbaharui.');
        redirect("laundry/transaksi");
    }

    public function deleteMember($id_member)
    {
        $this->db->delete("member", ["id_member" => $id_member]);
        $this->session->set_flashdata("success", 'Member Terhapus.');
        redirect("laundry");
    }

    public function detailTransaksi($id_transaksi)
    {
        $data["title"] = "Detail Transaksi";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $data["transaksi"] = $this->db->get_where('transaksi', [
            'id_transaksi' => $id_transaksi
        ])->row_array();

        $this->load->view('laundry/detail_transaksi', $data);
    }
}
