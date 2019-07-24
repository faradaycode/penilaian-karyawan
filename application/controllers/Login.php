<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
		$this->load->view('login');
	}

	public function meLogin()
	{
		//set validation rules
		$this->form_validation->set_rules('userid', 'Userid', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		//set message for failed validation
		$this->form_validation->set_message('required',
			'<small class="text-danger">
			<i class="fa fa-exclamation-circle"></i> {field} tidak boleh kosong
			</small>'
		);

		//checking validation run
		if ($this->form_validation->run() == TRUE) {

			//get data FORM
			$userid = $this->input->post("userid", TRUE);
			$password = $this->input->post('password', TRUE);

			//checking data via model
			$authing = $this->ModLogin->getUser($userid, md5($password));

			//jika ditemukan, maka create session
			if ($authing) {
				foreach ($authing as $rows) {

					$session_data = array(
						'username' => $rows->username,
						'user_pp' => $rows->photo,
						'logedin' => true
					);

					//set session userdata
					$this->session->set_userdata($session_data);
				}

				//go to dashboard
				redirect(base_url("index.php/Pages"));
			} else {
				$data['error'] = 
				'<small class="text-capitalize text-danger">
				<i class="fa fa-exclamation-circle"></i> userid atau password salah!
				</small>';

				$this->load->view('login', $data);
			}
		} else {
			// validation failure run this
			$this->load->view('login');
		}


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

	public function meLogout()
	{
		$this->session->sess_destroy(); // Hapus semua session
		redirect('auth'); // Redirect ke halaman login
	}
}
