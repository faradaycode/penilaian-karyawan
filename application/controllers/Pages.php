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

    public function datakaryawan()
    {
        $data['content'] = $this->load->view('admin/datakaryawan', null, true);
        $data['icon'] = IC_DTKARYAWAN;
        $data['pagename'] = DATAKARYAWAN;
        $this->load->view('admin/index', $data);
    }

    public function penilaian()
    {
        $this->load->model("ModKaryawan");
        $this->load->model("ModPertanyaan");

        $data['icon'] = IC_FMNILAI;
        $data['pagename'] = PENILAIAN;
        $data['dtkyw'] = $this->ModKaryawan->get_all_karyawans();
        $data['dtpty'] = $this->ModPertanyaan->getTanya();

        $this->load->view('admin/formpenilaian', $data);
    }

    public function datanilai()
    {
        $data['content'] = $this->load->view('admin/datapenilaian', null, true);
        $data['icon'] = IC_DTNILAI;
        $data['pagename'] = DATANILAI;
        $this->load->view('admin/index', $data);
    }
}
