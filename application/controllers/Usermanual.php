<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermanual extends CI_Controller
{

	public function index()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$this->template->general('usermanual/user_manual_pdf');
	}
}
