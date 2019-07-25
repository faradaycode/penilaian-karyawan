<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //load model admin
        // $this->load->model('admin');
    }

    public function printReportPerson()
    {
        //function fpdf nilai perorangan
    }

    public function printAllReport()
    {
        //function fpdf nilai semua karyawan
    }

    public function addDataKyw($arraydata)
    {
        //insert data karyawan
    }

    public function edtDataKyw($arraydata)
    {
        //update data karyawan
    }

    public function delDataKyw($id)
    {
        //delete data karyawan
    }

    public function postNilai($id, $arraydata)
    {
        //insert penilaian karyawan
    }

}
