<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ModNilai');
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
}
