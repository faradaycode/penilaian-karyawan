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
        // $data['dtpty'] = $this->ModPertanyaan->getTanya();
        $pertanyaan = $this->ModPertanyaan->getTanya();
        $jsout = array();

        foreach ($pertanyaan as $objp) {
            if (!array_key_exists($objp->id_aspek, $jsout)) {
                $exObj = new stdClass();

                $exObj->id_aspek = $objp->id_aspek;
                $exObj->aspek_ket = $objp->aspek_ket;
                $exObj->isi = array();
                
                $jsout[$objp->id_aspek] = $exObj;
            }

            $insideObj = new stdClass();

            $insideObj->id_pty = $objp->id_pty;
            $insideObj->pertanyaan = $objp->isi_pertanyaan;

            $jsout[$objp->id_aspek]->isi[] = $insideObj;
        }

        $jsout = array_values($jsout);
        $data['dtpty'] = json_encode($jsout);

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
