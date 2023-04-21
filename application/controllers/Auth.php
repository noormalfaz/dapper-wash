<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if ($this->session->userdata("email")) {
            redirect("user");
        }
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        if ($this->form_validation->run() == false) {
            $data["judul"] =  "Halaman Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        if ($this->session->userdata("email")) {
            redirect("user");
        }
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user["email"],
                        'role_id' => $user["role_id"],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        $this->session->set_flashdata("success", 'Anda Telah Login.');
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata("success", 'Anda Telah Login.');
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata("error", 'Password Salah!');
                    redirect("auth");
                }
            } else {
                $this->session->set_flashdata("error", 'Email Belum Terdaftar.');
                redirect("auth");
            }
        } else {
            $this->session->set_flashdata("error", 'Email Belum Terdaftar.');
            redirect("auth");
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules("name", "Name", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email|is_unique[user.email]", [
            "is_unique" => "Email ini sudah terdaftar!",
        ]);
        $this->form_validation->set_rules("password1", "Password", "required|trim|min_length[8]|matches[password2]", [
            "matches" => "Password tidak cocok!",
            "min_length" => "Password too short!"
        ]);
        $this->form_validation->set_rules("password2", "Password", "required|trim|min_length[8]|matches[password1]");

        if ($this->form_validation->run() == false) {
            $data["judul"] =  "Daftar Akun";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post("email", true);
            $data = [
                "name" => htmlspecialchars($this->input->post("name", true)),
                "email" => htmlspecialchars($email),
                "image" => "default.jpg",
                "password" => password_hash($this->input->post("password1"), PASSWORD_DEFAULT),
                "role_id" => 2,
                "is_active" => 0,
                "date_created" => time(),
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                "email" => $email,
                "token" => $token,
                "date_created" => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, "verify");

            $this->session->set_flashdata("success", 'Akun Anda telah dibuat.');
            redirect("auth");
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'noormzzz07@gmail.com',
            'smtp_pass' => 'dnlwqkzilmliaxpp',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from("noormzzz07@gmail.com", "Dapper Wash");
        $this->email->to($this->input->post("email"));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik tautan ini untuk memverifikasi akun Anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik tautan ini untuk reset password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('success', '' . $email . ' telah diaktifkan! Silahkan login');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('error', 'Aktivasi akun gagal! Token kedaluwarsa.');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Aktivasi akun gagal! Token salah.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Aktivasi akun gagal! Email salah.');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("email");
        $this->session->unset_userdata("role_id");
        $this->session->set_flashdata("success", 'Anda telah logout');
        redirect("auth");
    }

    public function blocked()
    {
        $data["judul"] =  "Akses di Blok!";
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/auth_footer');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Lupa Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('success', 'Silakan periksa email Anda untuk reset password!');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('error', 'Email tidak terdaftar atau tidak diaktifkan!');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('error', 'Reset password gagal! token salah.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Reset password gagal! email salah.');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Ubah Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('success', 'Password telah diubah! Silakan login.');
            redirect('auth');
        }
    }
}
