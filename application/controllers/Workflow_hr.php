<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workflow_hr extends CI_Controller
{

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('workflow_hr');
    }
}
