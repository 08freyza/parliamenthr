<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Login_attempt_model');
		$this->load->helper('captcha');
	}

	public function index()
	{
		if (!(null !== $this->session->userdata('username'))) {
			if (!empty($_POST)) {
				// Get the value
				$email = $this->input->post('email');
				$pass  = $this->input->post('pass');

				// Get captcha
				$inputCaptcha = $this->input->post('captcha');
				$sessCaptcha = $this->session->userdata('captchaCode');

				// Check email
				$checkEmail = $this->Login_model->get_email($email);

				// Check email is valid
				if ($checkEmail->email == $email) {
					// Check if the account is locked or not
					if ($checkEmail->locked_account_status == 'N') {
						// Check password validation
						$ret = $this->Login_model->PassCheck($email, $pass);

						// Check if emp_no exist
						if (!empty($ret->emp_no)) {
							// Check if captcha valid
							if ($inputCaptcha === $sessCaptcha) {
								$ipAddress = $this->input->ip_address();

								// Normalize number of attempt
								$this->Login_attempt_model->update_attempt($email, $ipAddress, 3);

								// Send and show to view
								$this->session->set_userdata(array('username' => $email, 'client_id' => $ret->id, 'emp_no' => $ret->emp_no, 'emp_name' => $ret->emp_name));
								redirect(base_url() . 'dashboard');
							} else {
								// Send and show to view
								$this->session->set_flashdata('message', 'captchainvalid');
								redirect(base_url() . 'login');
							}
						} else {
							$ipAddress = $this->input->ip_address();

							// Given 3 times to attempt to login
							$checkAttempt = $this->Login_attempt_model->get_email($email, $ipAddress);

							if (empty($checkAttempt->email)) {
								$limitAttempt = 3;
								$data = [
									'email' => $email,
									'ip_address' => $ipAddress,
									'limit_login_attempt' => $limitAttempt,
								];
								$this->Login_attempt_model->insert($data);
								$checkAttempt = $this->Login_attempt_model->get_email($email, $ipAddress);
							}

							// Check if the attemption is either 0 or not
							if (intval($checkAttempt->limit_login_attempt) == 0) {
								// Update status
								$this->Login_model->update_status($email, 'Y');

								// Send and show to view
								$this->session->set_flashdata('message', 'accountlocked');
								redirect(base_url() . 'login');
							} else {
								// Update data attempt
								$numberAttemptRemaining = intval($checkAttempt->limit_login_attempt) - 1;
								$dataUpdate = [
									'email' => $email,
									'ip_address' => $ipAddress,
									'limit_login_attempt' => $numberAttemptRemaining
								];
								$this->Login_attempt_model->update_inc_dec_attempt($email, $ipAddress, $dataUpdate);

								// Send and show to view
								$this->session->set_flashdata('message', 'passwordinvalid');
								redirect(base_url() . 'login');
							}
						}
					} else {
						// Send and show to view
						$this->session->set_flashdata('message', 'accountlocked');
						redirect(base_url() . 'login');
					}
				} else {
					// Send and show to view
					$this->session->set_flashdata('message', 'emailinvalid');
					redirect(base_url() . 'login');
				}
			} else {
				// Captcha configuration
				$captcha = create_captcha($this->captcha_vals());

				// Unset previous captcha and set new captcha word
				$this->session->unset_userdata('captchaCode');
				$this->session->set_userdata('captchaCode', $captcha['word'] ?? '');

				// Pass captcha image to view
				$data['captchaImg'] = $captcha['image'] ?? '';

				// Send data to view
				$this->load->view('login', $data);
			}
		} else {
			// Show to view
			redirect(base_url() . 'dashboard');
		}
	}

	public function refresh_captcha()
	{
		// Captcha configuration
		$captcha = create_captcha($this->captcha_vals());

		// Unset previous captcha and set new captcha word
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode', $captcha['word']);

		// Display captcha image
		echo $captcha['image'];
	}

	public function captcha_vals()
	{
		$vals = [
			'word'          => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4),
			'img_path'      => './assets/images/captcha/',
			'img_url'       => base_url('assets/images/captcha/'),
			'img_width'     => 180,
			'img_height'    => 50,
			'expiration'    => 7200,
			'word_length'   => 4,
			'font_path'		=> realpath('./assets/fonts/Roboto-Regular.ttf'),
			'font_size'     => 20,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'colors'        => [
				'background' => [255, 255, 255],
				'border'    => [255, 255, 255],
				'text'      => [0, 0, 0],
				'grid'      => [255, 40, 40]
			]
		];
		return $vals;
	}

	public function out()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'login');
	}
}
