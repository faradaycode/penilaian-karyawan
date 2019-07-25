<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function admin()
    {
        $data['content'] = $this->load->view('admin/dashboard', null, true);
        $this->load->view('admin/index', $data);
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function penilaian()
    {
        //load form penilaian
    }

    public function masterKaryawan()
    {
        //load data karyawan view
    }

    public function masterNilai()
    {
        //load data penilaian masuk
    }
}
