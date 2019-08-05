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
        $id_k = $this->input->post("id_k");
        $nilai = $this->input->post("data");
        $ids = $this->ModPertanyaan->getIdAll();
        $idnilai = array();
        $iter = 0;
        $result = array();

        if (!empty($id_k)) {
            if (sizeof($ids) == sizeof($nilai)) {
                foreach ($ids as $id) {
                    $newObj = new stdClass();
                    $newObj->id = $id->id_pty;
                    $newObj->id_aspek = $id->id_aspek;
                    $newObj->nilai = $nilai[$iter];

                    array_push($idnilai, $newObj);
                    $iter++;
                }

                if ($this->ModNilai->postNilai($idnilai, $id_k)) {
                    $result["sukses"] = true;
                    $result["kode"] = 100;
                    $result["pesan"] = "Penilaian berhasil diproses";
                    $result["request"] = $_REQUEST;
                } else {
                    $result["sukses"] = false;
                    $result["kode"] = 303;
                    $result["pesan"] = "Penilaian gagal diproses";
                    $result["request"] = $_REQUEST;
                }
            } else {
                $result["sukses"] = false;
                $result["kode"] = 404;
                $result["pesan"] = "Parameter tidak lengkap";
                $result["request"] = $_REQUEST;
            }
        } else {
            $result["sukses"] = false;
            $result["kode"] = 501;
            $result["pesan"] = "Pilih salah satu nama karyawan";
            $result["request"] = $_REQUEST;
        }

        echo json_encode($result);
    }
}
