<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data["title"] = "Manajemen Menu";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();

        $data["menu"] = $this->db->get("user_menu")->result_array();
        $this->form_validation->set_rules("menu", "Menu", "required|trim");
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata("success", 'Menu baru ditambahkan.');
            redirect("menu");
        }
    }

    public function submenu()
    {
        $data["title"] = "Manajemen Submenu";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $this->load->model("Menu_model", "menu");

        $data["subMenu"] = $this->menu->getSubMenu();
        $data["menu"] = $this->db->get("user_menu")->result_array();

        $this->form_validation->set_rules("url", "Url", "required|trim");
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "title" => $this->input->post("title"),
                "menu_id" => $this->input->post("menu_id"),
                "url" => $this->input->post("url"),
                "icon" => $this->input->post("icon"),
                "is_active" => $this->input->post("is_active")
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata("success", 'Submenu baru ditambahkan.');
            redirect("menu/submenu");
        }
    }

    public function editMenu($id_user_menu)
    {
        $data["title"] = "Edit Menu";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $data["menu"] = $this->db->get_where('user_menu', [
            'id_user_menu' => $id_user_menu
        ])->row_array();

        $this->form_validation->set_rules("menu", "Menu", "required|trim");
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_menu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->where('id_user_menu', $this->input->post('id_user_menu'));
            $this->db->update('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata("success", 'Menu Diperbaharui.');
            redirect("menu");
        }
    }

    public function editSubmenu($id_user_sub_menu)
    {
        $data["title"] = "Edit Submenu";
        $data["user"] = $this->db->get_where('user', [
            'email' => $this->session->userdata("email")
        ])->row_array();
        $data["submenu"] = $this->db->get_where('user_sub_menu', [
            'id_user_sub_menu' => $id_user_sub_menu
        ])->row_array();
        $this->load->model("Menu_model", "menu");
        $data["subMenu"] = $this->menu->getSubMenu();
        $data["menu"] = $this->db->get("user_menu")->result_array();

        $this->form_validation->set_rules("title", "Title", "required|trim");
        $this->form_validation->set_rules("url", "Url", "required|trim");
        $this->form_validation->set_rules("icon", "Icon", "required|trim");
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "title" => $this->input->post("title", true),
                "menu_id" => $this->input->post("menu_id"),
                "url" => $this->input->post("url", true),
                "icon" => $this->input->post("icon", true),
                "is_active" => $this->input->post("is_active"),
            ];
            $this->db->where('id_user_sub_menu', $this->input->post('id_user_sub_menu'));
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata("success", 'Submenu Diperbaharui.');
            redirect("menu/submenu");
        }
    }

    public function deleteMenu($id_user_menu)
    {
        $this->db->delete("user_menu", ["id_user_menu" => $id_user_menu]);
        $this->session->set_flashdata("success", 'Menu Terhapus.');
        redirect("menu");
    }

    public function deleteSubMenu($id_user_sub_menu)
    {
        $this->db->delete("user_sub_menu", ["id_user_sub_menu" => $id_user_sub_menu]);
        $this->session->set_flashdata("success", 'Submenu Terhapus.');
        redirect("menu/submenu");
    }
}
