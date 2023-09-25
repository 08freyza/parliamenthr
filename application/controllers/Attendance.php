<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		if (!empty($_POST))
		{
			$email  = $this->input->post('email');
			$pass   = $this->input->post('pass');
			$type   = $this->input->post('type');
// die($type);
    // 		$id = $this->input->post('id');
    // 		$tgl = $this->input->post('tgl');
    // 		$wkt = $this->input->post('wkt');

            $empno = $this->db->query('SELECT emp_no,login_id FROM employee left join uc_users on uc_users.id = employee.login_id where uc_users.email = \''.$email.'\' and uc_users.password = \''.md5($pass).'\' ')->row();

            if (empty($empno->emp_no)) die('employee not detected !');
            
            if ($type!='cIn')
            {
                $id = $this->db->query('select id from absen where emp_no = \''.$empno->emp_no.'\' order by start_time desc limit 1 ')->row();
                if (empty($id)) die('you are not clock in yet !');
                $id = $id->id;
            }
            switch($type)
            {
                case 'cIn':
                    $this->db->query('insert into absen (emp_no,start_time,end_time,lunch_out,lunch_in) values ("'.$empno->emp_no.'","'.date('Y-m-d').' '.date('h:i:s').'","0000-00-00 00:00:00","0000-00-00 00:00:00","0000-00-00 00:00:00")');
                    break;
                case 'cOut':
                    $this->db->query('update absen set start_time = start_time, end_time = "'.date('Y-m-d').' '.date('h:i:s').'", lunch_in=lunch_in, lunch_out=lunch_out  where id = "'.$id.'" ');
                    break;
                case 'lIn':
                    $this->db->query('update absen set start_time = start_time, end_time = end_time, lunch_in="'.date('Y-m-d').' '.date('h:i:s').'", lunch_out=lunch_out  where id = "'.$id.'" ');
                    break;
                case 'lOut':
                    $this->db->query('update absen set start_time = start_time, end_time = end_time, lunch_in=lunch_in, lunch_out="'.date('Y-m-d').' '.date('h:i:s').'"  where id = "'.$id.'" ');
                    break;
            }

			redirect(base_url().'attendance');
		} else {
			$this->load->view('attendance');
		}
	}

	public function out()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login');
	}
}
