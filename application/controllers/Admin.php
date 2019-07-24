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

    public function index()
    {
        //load dashboard view
    }

    public function penilaian()
    {
        //load form penilaian
    }

    public function masterKaryawan()
    {
        //load data karyawan view
    }

    public function masterNilai()
    {
        //load data penilaian masuk
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
