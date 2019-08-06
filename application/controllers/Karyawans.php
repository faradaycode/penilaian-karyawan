<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawans extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ModKaryawan');
    }

    function get_data_user()
    {
        $list = $this->ModKaryawan->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nip_k;
            $row[] = $field->nama_k;
            $row[] = $field->id_j;
            $row[] = "<button class='btn btn-sm btn-primary text-center'>
            <i class='fa fa-pencil'></i>
            </button>
            <button class='btn btn-sm btn-danger text-center'>
            <i class='fa fa-trash'></i>
            </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ModKaryawan->count_all(),
            "recordsFiltered" => $this->ModKaryawan->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function delKyw($id)
    {
        if ($this->ModKaryawan->delKyw($id)) {
            return true;
        } else {
            return false;
        }
    }

    function add()
    {
        $nip = $this->input->post("itnip");
        $nama = $this->input->post("itnama");
        $jbt = $this->input->post("seljbt");
        $masuk = $this->input->post("itwaktu");
        $result = array();

        $res = $this->ModKaryawan->add($nip, $nama, $jbt, $masuk);

        if (isset($nip) && isset($nama) && isset($jbt) && isset($masuk)) {
            if ($res) {
                $result['sukses'] = true;
                $result['code'] = 100;
                $result['pesan'] = "Input berhasil";
                $result['request'] = $_REQUEST;
            } else {
                $result['success'] = false;
                $result['code'] = 300;
                $result['pesan'] = "Input gagal";
                $result['request'] = $_REQUEST;
            }
        } else {
            $result['success'] = false;
            $result['code'] = 500;
            $result['pesan'] = "Parameter tidak lengkap";
            $result['request'] = $_REQUEST;
        }

        echo json_encode($result);
    }
}
