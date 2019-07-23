<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page extends MY_Controller
{
    public function admin()
    {
        $this->load->view('admin');
    }
}
