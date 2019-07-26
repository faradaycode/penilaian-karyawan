<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function admin()
    {
        $data['content'] = $this->load->view('admin/dashboard', null, true);
        $data['icon'] = IC_DASHBOARD;
        $data['pagename'] = DASHBOARD;
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

    public function datakaryawan()
    {
        $data['content'] = $this->load->view('admin/datakaryawan', null, true);
        $data['icon'] = IC_DTKARYAWAN;
        $data['pagename'] = DATAKARYAWAN;
        $this->load->view('admin/index', $data);
    }

    public function datanilai()
    {
        $data['content'] = $this->load->view('admin/datapenilaian', null, true);
        $data['icon'] = IC_DTNILAI;
        $data['pagename'] = DATANILAI;
        $this->load->view('admin/index', $data);
    }
}
