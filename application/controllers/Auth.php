<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->model("ModLogin");
	}

	public function index()
	{
		if ($this->session->userdata('logedin')) {
			redirect(base_url('page/admin'));
		}

		$this->load->view('login');
	}

	public function login()
	{
		$username = $this->input->post('userid');
		$password = $this->input->post('password');

		$user = $this->ModLogin->getUser($username, md5($password));

		echo json_encode($user);

		// if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
		// 	$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
		// 	redirect('Auth'); // Redirect ke halaman login
		// } else {

		// 	$session = array(
		// 		'logedin' => true,
		// 		'username' => $user->username
		// 	);

		// 	$this->session->set_userdata($session); // Buat session sesuai $session
		// 	redirect('index.php/Pages/admin'); // Redirect ke halaman welcome
		// }
	}

	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
		redirect('auth'); // Redirect ke halaman login
	}
}
