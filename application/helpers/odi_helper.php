<?php

function is_logged_in() {
    $ci = get_instance();
    if(!$ci->session->userdata("email")){
        redirect("auth");
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu["id_user_menu"];
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id, 
            'menu_id' => $menu_id
        ]);
        
        if($userAccess->num_rows() < 1){
            redirect("auth/blocked");
        }
    }
}

function check_access($role_id, $menu_id) {
    $ci = get_instance();
    $result = $ci->db->get_where("user_access_menu", [
        "role_id" => $role_id,
        "menu_id" => $menu_id
    ]);

    if($result->num_rows() > 0){
        return "checked='chechked'";
    }
}

function manipulasiTanggal($tgl,$jumlah=1,$format='days'){
	$currentDate = $tgl;
	return date('Y-m-d', strtotime($jumlah.' '.$format, strtotime($currentDate)));
}


function DateToIndo($date)
{
    $BulanIndo = [
        "Januari", "Februari", "Maret", "April",
        "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
        "November", "Desember"
    ];

    // memisahkan format tahun menggunakan substring
    $tahun = substr($date, 0, 4);

    // memisahkan format bulan menggunakan substring
    $bulan = substr($date, 5, 2);

    // memisahkan format tanggal menggunakan substring
    $tgl = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;

    return ($result);
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}