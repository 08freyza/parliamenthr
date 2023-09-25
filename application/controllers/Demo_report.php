<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Demo_report extends CI_Controller
{

	public function index()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		//print_r($this->session);die;
		if (empty($this->session->userdata('username'))) redirect(base_url() . 'login');
		$this->template->general('demo_report');
	}
}
