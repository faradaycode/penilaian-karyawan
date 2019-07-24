<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Cek apakah terdapat session dengan nama authenticated
        if (!$this->session->userdata('logedin')) {
            redirect('auth'); // Redirect ke halaman login
        }
    }
}
