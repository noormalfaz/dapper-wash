<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data["title"] = "Dashboard";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data["title"] = "Role";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();

        $data["role"] = $this->db->get("user_role")->result_array();
        $this->form_validation->set_rules("role", "Role", "required|trim");
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata("success", 'Role baru ditambahkan.');
            redirect("admin/role");
        }
    }

    public function roleAccess($role_id)
    {
        $data["title"] = "Role Akses";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();

        $data["role"] = $this->db->get_where("user_role", [
            "id_user_role" => $role_id
        ])->row_array();

        $this->db->where("id_user_menu !=", 1);
        $data["menu"] = $this->db->get("user_menu")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post("menuId");
        $role_id = $this->input->post("roleId");

        $data = [
            "role_id" => $role_id,
            "menu_id" => $menu_id
        ];

        $result = $this->db->get_where("user_access_menu", $data);

        if ($result->num_rows() < 1) {
            $this->db->insert("user_access_menu", $data);
        } else {
            $this->db->delete("user_access_menu", $data);
        }

        $this->session->set_flashdata("success", 'Akses Diubah!');
    }

    public function editRole($id_user_role)
    {
        $data["title"] = "Edit Role";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $data["role"] = $this->db->get_where('user_role', [
            'id_user_role' => $id_user_role
        ])->row_array();

        $this->form_validation->set_rules("role", "Role", "required|trim");
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->where('id_user_role', $this->input->post('id_user_role'));
            $this->db->update('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata("success", 'Role Diperbaharui.');
            redirect("admin/role");
        }
    }

    public function deleteRole($id)
    {
        $this->db->delete("user_role", ["id_user_role" => $id]);
        $this->session->set_flashdata("success", 'Role Terhapus.');
        redirect("admin/role");
    }
}
