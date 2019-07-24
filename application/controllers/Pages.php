<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MY_Controller
{
    public function admin()
    {
        $this->load->view('admin');
    }
}
