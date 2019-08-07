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

    function import()
    {
        $result = array();

        if (isset($_POST['prefix'])) {

            $file = $_FILES['filekaryawan']['tmp_name'];

            // Medapatkan ekstensi file csv yang akan diimport.
            $ekstensi  = explode('.', $_FILES['filekaryawan']['name']);

            // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
            if (empty($file)) {
                $result['sukses'] = false;
                $result['code'] = 501;
                $result['pesan'] = "File kosong";
                $result['request'] = $_REQUEST;
            } else {
                // Validasi apakah file yang diupload benar-benar file csv.
                if (strtolower(end($ekstensi)) === 'csv' && $_FILES["filekaryawan"]["size"] > 0) {
                    $csv = array();
                    $field = array();
                    $handle = fopen($file, "r");
                    $row = 0;
                    $col = 0;

                    while (($row = fgetcsv($handle, 2048)) !== false) {
                        if (empty($field)) {
                            $field = $row;
                            continue;
                        }

                        foreach ($row as $key => $value) {
                            $csv[$col][$field[$key]] = $value;
                        }

                        $col++;
                        unset($row);
                    }

                    fclose($handle);

                    $res = $this->ModKaryawan->addBatch($csv);

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
                    $result['sukses'] = false;
                    $result['code'] = 500;
                    $result['pesan'] = "Format file tidak didukung";
                    $result['request'] = $_REQUEST;
                }
            }
        }

        echo json_encode($result);
    }
}
