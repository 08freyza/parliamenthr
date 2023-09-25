<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		//print_r($this->session);die;
		if (empty($this->session->userdata('username'))) redirect(base_url() . 'login');
		$this->template->general('dashboard');
		//$this->template->general('user');
	}
}
