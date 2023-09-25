<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myform extends CI_Controller
{

	public function index()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$ret = $this->db->query('select id,emp_no,start_time,end_time from absen where emp_no = "' . $this->session->userdata('emp_no') . '" and DATE(start_time) = "' . date('Y-m-d') . '" ;');
		if ($ret->num_rows() == 0) {
			$data['param']  = 'start';
			$data['id']     = '';
		} else {
			if ($ret->row()->end_time == '0000-00-00 00:00:00') {
				$data['param'] = 'end';
				$data['id']     = $ret->row()->id;
			} else {
				$data['param'] = 'start';
				$data['id']     = $ret->row()->id;
			}
		}
		$this->template->general('myform', $data);
	}

	public function checkabsennow()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$tgl = $this->input->post('tgl');
		$ret = $this->db->query('select * from absen where emp_no = "' . $this->session->userdata('emp_no') . '" and DATE(start_time) = "' . $tgl . '" ;');
		if ($ret->num_rows() == 0) {
			echo '';
		} else {
			$end_time = $ret->row()->end_time;
			if ($end_time == '0000-00-00 00:00:00')
				echo '';
			else
				echo 'You have been clocked out today !';
		}
	}

	public function submit()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$param = $this->input->post('param');
		$id = $this->input->post('id');
		$tgl = $this->input->post('tgl');
		$wkt = $this->input->post('wkt');

		if ($param == 'start')
			$this->db->query('insert into absen (emp_no,start_time,end_time,lunch_out,lunch_in) values ("' . $this->session->userdata('emp_no') . '","' . $tgl . ' ' . $wkt . '","0000-00-00 00:00:00","0000-00-00 00:00:00","0000-00-00 00:00:00")');
		else
			$this->db->query('update absen set start_time = start_time, end_time = "' . $tgl . ' ' . $wkt . '", lunch_in=lunch_in, lunch_out=lunch_out  where id = "' . $id . '" ');

		echo 'success';
	}
}
