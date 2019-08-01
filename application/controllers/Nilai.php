<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ModNilai');
        $this->load->model('ModPertanyaan');
    }

    function get_data_user()
    {
        $list = $this->ModNilai->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nip_k;
            $row[] = $field->nama_k;
            $row[] = $field->id_j;
            $row[] = $field->n_teknis;
            $row[] = $field->n_nonteknis;
            $row[] = $field->n_pribadi;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ModNilai->count_all(),
            "recordsFiltered" => $this->ModNilai->count_filtered(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
    }

    function postNilai()
    {
        // nilai pertanyaans
        $pt1 = $this->input->post("pty1");
        $pt2 = $this->input->post("pty2");
        $pt3 = $this->input->post("pty3");
        $pt4 = $this->input->post("pty4");
        $pt5 = $this->input->post("pty5");
        $pt6 = $this->input->post("pty6");
        $pt7 = $this->input->post("pty7");
        $pt8 = $this->input->post("pty8");
        $pt9 = $this->input->post("pty9");
        $pt10 = $this->input->post("pty10");
        $id_k = $this->input->post('selkaryawan');

        // $arrHasil = array(
        //     "pty1" => $pt1,
        //     "pty2" => $pt2,
        //     "pty3" => $pt3,
        //     "pty4" => $pt4,
        //     "pty5" => $pt5,
        //     "pty6" => $pt6,
        //     "pty7" => $pt7,
        //     "pty8" => $pt8,
        //     "pty9" => $pt9,
        //     "pty10" => $pt10
        // );

        $arrHasil = array(
            $pt1, 
            $pt2, 
            $pt3, 
            $pt4,
            $pt5,
            $pt6,
            $pt7,
            $pt8,
            $pt9,
            $pt10
        );

        $this->ModNilai->postNilai($arrHasil, $id_k);
        // echo json_encode($arrHasil);
    }
}
