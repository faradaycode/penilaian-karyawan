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
            $row[] = $field->nama_j;
            $row[] = $this->tgl_indo($field->mulai_kerja);
            $row[] = "<button class='edit btn btn-sm btn-primary text-center' id='ed_$field->id_k'>
            <i class='fa fa-pencil'></i>
            </button>
            <button class='delete btn btn-sm btn-danger text-center' id='dl_$field->id_k'>
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
        $editkah = $this->input->post("editkah");
        $result = array();

        if (!empty($editkah)) {
            if (isset($nip) && isset($nama) && isset($jbt) && isset($masuk)) {
                $editing = $this->ModKaryawan->update($editkah, $nip, $nama, $jbt, $masuk);
             
                if ($editing) {
                    $result['sukses'] = true;
                    $result['code'] = 100;
                    $result['pesan'] = "Update berhasil";
                    $result['request'] = $_REQUEST;
                } else {
                    $result['success'] = false;
                    $result['code'] = 300;
                    $result['pesan'] = "Update gagal";
                    $result['request'] = $_REQUEST;
                }
            } else {
                $result['success'] = false;
                $result['code'] = 500;
                $result['pesan'] = "Parameter tidak lengkap";
                $result['request'] = $_REQUEST;
            }
        } else {
            if (isset($nip) && isset($nama) && isset($jbt) && isset($masuk)) {
                $res = $this->ModKaryawan->add($nip, $nama, $jbt, $masuk);
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
        }

        echo json_encode($result);
    }

    function import()
    {
        $result = array();
        $file = $_FILES['filekaryawan']['tmp_name'];
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
                $field = array();
                $handle = fopen($file, "r");
                $i = 0;
                $arrdata = array();

                while (($row = fgetcsv($handle, 2048))) {
                    $i++;

                    if (empty($field)) {
                        $field = $row;
                        continue;
                    }

                    if ($i == 1) {
                        continue;
                    }

                    array_push($arrdata, array(
                        'nip_k' => $row[0],
                        'nama_k' => $row[1],
                        'id_j' => $row[2],
                        'mulai_kerja' => $row[3]
                    ));
                }

                fclose($handle);

                $res = $this->ModKaryawan->addBatch($arrdata);

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

        echo json_encode($result);
    }

    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    function del()
    {
        $id = $this->input->post("idk");

        $res = $this->ModKaryawan->del($id);
        $result = array();

        if (!empty($id)) {
            if ($res) {
                $result['sukses'] = true;
                $result['code'] = 100;
                $result['pesan'] = "Berhasil menghapus data";
                $result['request'] = $_REQUEST;
            } else {
                $result['success'] = false;
                $result['code'] = 300;
                $result['pesan'] = "Gagal menghapus data";
                $result['request'] = $_REQUEST;
            }
        } else {
            $result['success'] = false;
            $result['code'] = 500;
            $result['pesan'] = "General error";
            $result['request'] = $_REQUEST;
        }

        echo json_encode($result);
    }
}
