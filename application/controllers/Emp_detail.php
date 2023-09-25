<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Emp_detail extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Emp_detail_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	/*
    public function index()
    {
        $this->template->general('emp_detail/employee_list');
    } 
*/

	public function index()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		if (!empty($this->session->userdata('empDetailSearch'))) {
			$id = $this->session->userdata('empDetailSearch');
		} else {
			$id = $this->session->userdata('client_id');
		}

		$row = $this->Emp_detail_model->get_by_id($id);
		if ($row) {
			$data = array(
				'button' => 'Read',
				'action' => 'read',
				'id' => $row->id,
				'emp_no' => $row->emp_no,
				'emp_name' => $row->emp_name,
				'login_id' => $row->login_id,
				'account_no' => $row->account_no,
				'official_name' => $row->official_name,
				'active_status' => $row->active_status,
				'emp_status' => $row->emp_status,
				'gender' => $row->gender,
				'marital_status' => $row->marital_status,
				'birthday' => $row->birthday,
				'place_birthday' => $row->place_birthday,
				'joindate' => $row->joindate,
				'eoc' => $row->eoc,
				'religion' => $row->religion,
				'location' => $row->location,
				'unit' => $row->unit,
				'title' => $row->title,
				'grade' => $row->grade,
				'bank_name' => $row->bank_name,
				'blood_type' => $row->blood_type,
				'hospitalized' => $row->hospitalized,
				'medicalcond' => $row->medicalcond,
				'shoes' => $row->shoes,
				'medicaltestnotes' => $row->medicaltestnotes,
				'pants' => $row->pants,
				'medtest' => $row->medtest,
				'cloth' => $row->cloth,
				'weight' => $row->weight,
				'headsize' => $row->headsize,
				'height' => $row->height,
				'vnpf' => $row->vnpf,
				'address' => $row->address,
				'mobile_phone' => $row->mobile_phone,
				'home_phone' => $row->home_phone,
				'email' => $row->email,
				'department' => $row->department,
				'ministry' => $row->ministry,
				'division' => $row->division,
				'is_vnpf' => $row->is_vnpf,
				'is_emp' => $row->is_emp,
				'bankid' => $row->bankid,
				'keen' => $row->keen,
				'keendate' => $row->keendate,
				'fingerid' => $row->fingerid,
			);
			$this->template->general('emp_detail/employee_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('emp_detail'));
		}
	}

	public function search()
	{
		$this->session->set_userdata('empDetailSearch', '');
		$keyword = $this->input->post('key');
		$id = $this->Emp_detail_model->search($keyword);
		if (!empty($id))
			$this->session->set_userdata('empDetailSearch', $id);
		else
			$this->session->set_userdata('empDetailSearch', '');
	}

	public function json()
	{
		header('Content-Type: application/json');
		echo $this->Emp_detail_model->json();
	}

	public function read($id)
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$row = $this->Emp_detail_model->get_by_id($id);
		if ($row) {
			$data = array(
				'button' => 'Read',
				'action' => 'read',
				'id' => $row->id,
				'emp_no' => $row->emp_no,
				'emp_name' => $row->emp_name,
				'login_id' => $row->login_id,
				'account_no' => $row->account_no,
				'official_name' => $row->official_name,
				'active_status' => $row->active_status,
				'emp_status' => $row->emp_status,
				'gender' => $row->gender,
				'marital_status' => $row->marital_status,
				'birthday' => $row->birthday,
				'place_birthday' => $row->place_birthday,
				'joindate' => $row->joindate,
				'eoc' => $row->eoc,
				'religion' => $row->religion,
				'location' => $row->location,
				'unit' => $row->unit,
				'title' => $row->title,
				'grade' => $row->grade,
				'bank_name' => $row->bank_name,
				'blood_type' => $row->blood_type,
				'hospitalized' => $row->hospitalized,
				'medicalcond' => $row->medicalcond,
				'shoes' => $row->shoes,
				'medicaltestnotes' => $row->medicaltestnotes,
				'pants' => $row->pants,
				'medtest' => $row->medtest,
				'cloth' => $row->cloth,
				'weight' => $row->weight,
				'headsize' => $row->headsize,
				'height' => $row->height,
				'vnpf' => $row->vnpf,
				'address' => $row->address,
				'mobile_phone' => $row->mobile_phone,
				'home_phone' => $row->home_phone,
				'email' => $row->email,
				'department' => $row->department,
				'ministry' => $row->ministry,
				'division' => $row->division,
				'is_vnpf' => $row->is_vnpf,
				'is_emp' => $row->is_emp,
				'bankid' => $row->bankid,
				'keen' => $row->keen,
				'keendate' => $row->keendate,
				'fingerid' => $row->fingerid,
			);
			$this->template->general('emp_detail/employee_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('emp_detail'));
		}
	}

	public function create()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$data = array(
			'button' => 'Create',
			'action' => site_url('emp_detail/create_action'),
			'id' => set_value('id'),
			'emp_no' => set_value('emp_no'),
			'emp_name' => set_value('emp_name'),
			'login_id' => set_value('login_id'),
			'account_no' => set_value('account_no'),
			'official_name' => set_value('official_name'),
			'active_status' => set_value('active_status'),
			'emp_status' => set_value('emp_status'),
			'gender' => set_value('gender'),
			'marital_status' => set_value('marital_status'),
			'birthday' => set_value('birthday'),
			'place_birthday' => set_value('place_birthday'),
			'joindate' => set_value('joindate'),
			'eoc' => set_value('eoc'),
			'religion' => set_value('religion'),
			'location' => set_value('location'),
			'unit' => set_value('unit'),
			'title' => set_value('title'),
			'grade' => set_value('grade'),
			'bank_name' => set_value('bank_name'),
			'blood_type' => set_value('blood_type'),
			'hospitalized' => set_value('hospitalized'),
			'medicalcond' => set_value('medicalcond'),
			'shoes' => set_value('shoes'),
			'medicaltestnotes' => set_value('medicaltestnotes'),
			'pants' => set_value('pants'),
			'medtest' => set_value('medtest'),
			'cloth' => set_value('cloth'),
			'weight' => set_value('weight'),
			'headsize' => set_value('headsize'),
			'height' => set_value('height'),
			'vnpf' => set_value('vnpf'),
			'address' => set_value('address'),
			'mobile_phone' => set_value('mobile_phone'),
			'home_phone' => set_value('home_phone'),
			'email' => set_value('email'),
			'department' => set_value('department'),
			'ministry' => set_value('ministry'),
			'division' => set_value('division'),
			'is_vnpf' => set_value('is_vnpf'),
			'is_emp' => set_value('is_emp'),
			'bankid' => set_value('bankid'),
			'keen' => set_value('keen'),
			'keendate' => set_value('keendate'),
			'fingerid' => set_value('fingerid'),
		);
		$this->template->general('emp_detail/employee_form', $data);
	}

	public function create_action()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'emp_no' => $this->input->post('emp_no', TRUE),
				'emp_name' => $this->input->post('emp_name', TRUE),
				'login_id' => $this->input->post('login_id', TRUE),
				'account_no' => $this->input->post('account_no', TRUE),
				'official_name' => $this->input->post('official_name', TRUE),
				'active_status' => $this->input->post('active_status', TRUE),
				'emp_status' => $this->input->post('emp_status', TRUE),
				'gender' => $this->input->post('gender', TRUE),
				'marital_status' => $this->input->post('marital_status', TRUE),
				'birthday' => $this->input->post('birthday', TRUE),
				'place_birthday' => $this->input->post('place_birthday', TRUE),
				'joindate' => $this->input->post('joindate', TRUE),
				'eoc' => $this->input->post('eoc', TRUE),
				'religion' => $this->input->post('religion', TRUE),
				'location' => $this->input->post('location', TRUE),
				'unit' => $this->input->post('unit', TRUE),
				'title' => $this->input->post('title', TRUE),
				'grade' => $this->input->post('grade', TRUE),
				'bank_name' => $this->input->post('bank_name', TRUE),
				'blood_type' => $this->input->post('blood_type', TRUE),
				'hospitalized' => $this->input->post('hospitalized', TRUE),
				'medicalcond' => $this->input->post('medicalcond', TRUE),
				'shoes' => $this->input->post('shoes', TRUE),
				'medicaltestnotes' => $this->input->post('medicaltestnotes', TRUE),
				'pants' => $this->input->post('pants', TRUE),
				'medtest' => $this->input->post('medtest', TRUE),
				'cloth' => $this->input->post('cloth', TRUE),
				'weight' => $this->input->post('weight', TRUE),
				'headsize' => $this->input->post('headsize', TRUE),
				'height' => $this->input->post('height', TRUE),
				'vnpf' => $this->input->post('vnpf', TRUE),
				'address' => $this->input->post('address', TRUE),
				'mobile_phone' => $this->input->post('mobile_phone', TRUE),
				'home_phone' => $this->input->post('home_phone', TRUE),
				'email' => $this->input->post('email', TRUE),
				'department' => $this->input->post('department', TRUE),
				'ministry' => $this->input->post('ministry', TRUE),
				'division' => $this->input->post('division', TRUE),
				'is_vnpf' => $this->input->post('is_vnpf', TRUE),
				'is_emp' => $this->input->post('is_emp', TRUE),
				'bankid' => $this->input->post('bankid', TRUE),
				'keen' => $this->input->post('keen', TRUE),
				'keendate' => $this->input->post('keendate', TRUE),
				'fingerid' => $this->input->post('fingerid', TRUE),
			);

			$this->Emp_detail_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('emp_detail'));
		}
	}

	public function update($id)
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$row = $this->Emp_detail_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('emp_detail/update_action'),
				'id' => set_value('id', $row->id),
				'emp_no' => set_value('emp_no', $row->emp_no),
				'emp_name' => set_value('emp_name', $row->emp_name),
				'login_id' => set_value('login_id', $row->login_id),
				'account_no' => set_value('account_no', $row->account_no),
				'official_name' => set_value('official_name', $row->official_name),
				'active_status' => set_value('active_status', $row->active_status),
				'emp_status' => set_value('emp_status', $row->emp_status),
				'gender' => set_value('gender', $row->gender),
				'marital_status' => set_value('marital_status', $row->marital_status),
				'birthday' => set_value('birthday', $row->birthday),
				'place_birthday' => set_value('place_birthday', $row->place_birthday),
				'joindate' => set_value('joindate', $row->joindate),
				'eoc' => set_value('eoc', $row->eoc),
				'religion' => set_value('religion', $row->religion),
				'location' => set_value('location', $row->location),
				'unit' => set_value('unit', $row->unit),
				'title' => set_value('title', $row->title),
				'grade' => set_value('grade', $row->grade),
				'bank_name' => set_value('bank_name', $row->bank_name),
				'blood_type' => set_value('blood_type', $row->blood_type),
				'hospitalized' => set_value('hospitalized', $row->hospitalized),
				'medicalcond' => set_value('medicalcond', $row->medicalcond),
				'shoes' => set_value('shoes', $row->shoes),
				'medicaltestnotes' => set_value('medicaltestnotes', $row->medicaltestnotes),
				'pants' => set_value('pants', $row->pants),
				'medtest' => set_value('medtest', $row->medtest),
				'cloth' => set_value('cloth', $row->cloth),
				'weight' => set_value('weight', $row->weight),
				'headsize' => set_value('headsize', $row->headsize),
				'height' => set_value('height', $row->height),
				'vnpf' => set_value('vnpf', $row->vnpf),
				'address' => set_value('address', $row->address),
				'mobile_phone' => set_value('mobile_phone', $row->mobile_phone),
				'home_phone' => set_value('home_phone', $row->home_phone),
				'email' => set_value('email', $row->email),
				'department' => set_value('department', $row->department),
				'ministry' => set_value('ministry', $row->ministry),
				'division' => set_value('division', $row->division),
				'is_vnpf' => set_value('is_vnpf', $row->is_vnpf),
				'is_emp' => set_value('is_emp', $row->is_emp),
				'bankid' => set_value('bankid', $row->bankid),
				'keen' => set_value('keen', $row->keen),
				'keendate' => set_value('keendate', $row->keendate),
				'fingerid' => set_value('fingerid', $row->fingerid),
			);
			$this->template->general('emp_detail/employee_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('emp_detail'));
		}
	}

	public function update_action()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$data = array(
				'emp_no' => $this->input->post('emp_no', TRUE),
				'emp_name' => $this->input->post('emp_name', TRUE),
				'login_id' => $this->input->post('login_id', TRUE),
				'account_no' => $this->input->post('account_no', TRUE),
				'official_name' => $this->input->post('official_name', TRUE),
				'active_status' => $this->input->post('active_status', TRUE),
				'emp_status' => $this->input->post('emp_status', TRUE),
				'gender' => $this->input->post('gender', TRUE),
				'marital_status' => $this->input->post('marital_status', TRUE),
				'birthday' => $this->input->post('birthday', TRUE),
				'place_birthday' => $this->input->post('place_birthday', TRUE),
				'joindate' => $this->input->post('joindate', TRUE),
				'eoc' => $this->input->post('eoc', TRUE),
				'religion' => $this->input->post('religion', TRUE),
				'location' => $this->input->post('location', TRUE),
				'unit' => $this->input->post('unit', TRUE),
				'title' => $this->input->post('title', TRUE),
				'grade' => $this->input->post('grade', TRUE),
				'bank_name' => $this->input->post('bank_name', TRUE),
				'blood_type' => $this->input->post('blood_type', TRUE),
				'hospitalized' => $this->input->post('hospitalized', TRUE),
				'medicalcond' => $this->input->post('medicalcond', TRUE),
				'shoes' => $this->input->post('shoes', TRUE),
				'medicaltestnotes' => $this->input->post('medicaltestnotes', TRUE),
				'pants' => $this->input->post('pants', TRUE),
				'medtest' => $this->input->post('medtest', TRUE),
				'cloth' => $this->input->post('cloth', TRUE),
				'weight' => $this->input->post('weight', TRUE),
				'headsize' => $this->input->post('headsize', TRUE),
				'height' => $this->input->post('height', TRUE),
				'vnpf' => $this->input->post('vnpf', TRUE),
				'address' => $this->input->post('address', TRUE),
				'mobile_phone' => $this->input->post('mobile_phone', TRUE),
				'home_phone' => $this->input->post('home_phone', TRUE),
				'email' => $this->input->post('email', TRUE),
				'department' => $this->input->post('department', TRUE),
				'ministry' => $this->input->post('ministry', TRUE),
				'division' => $this->input->post('division', TRUE),
				'is_vnpf' => $this->input->post('is_vnpf', TRUE),
				'is_emp' => $this->input->post('is_emp', TRUE),
				'bankid' => $this->input->post('bankid', TRUE),
				'keen' => $this->input->post('keen', TRUE),
				'keendate' => $this->input->post('keendate', TRUE),
				'fingerid' => $this->input->post('fingerid', TRUE),
			);

			$this->Emp_detail_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('emp_detail'));
		}
	}

	public function delete($id)
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$row = $this->Emp_detail_model->get_by_id($id);

		if ($row) {
			$this->Emp_detail_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('emp_detail'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('emp_detail'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
		$this->form_validation->set_rules('emp_name', 'emp name', 'trim|required');
		$this->form_validation->set_rules('login_id', 'login id', 'trim|required');
		$this->form_validation->set_rules('account_no', 'account no', 'trim|required');
		$this->form_validation->set_rules('official_name', 'official name', 'trim|required');
		$this->form_validation->set_rules('active_status', 'active status', 'trim|required');
		$this->form_validation->set_rules('emp_status', 'emp status', 'trim|required');
		$this->form_validation->set_rules('gender', 'gender', 'trim|required');
		$this->form_validation->set_rules('marital_status', 'marital status', 'trim|required');
		$this->form_validation->set_rules('birthday', 'birthday', 'trim|required');
		$this->form_validation->set_rules('place_birthday', 'place birthday', 'trim|required');
		$this->form_validation->set_rules('joindate', 'joindate', 'trim|required');
		$this->form_validation->set_rules('eoc', 'eoc', 'trim|required');
		$this->form_validation->set_rules('religion', 'religion', 'trim|required');
		$this->form_validation->set_rules('location', 'location', 'trim|required');
		$this->form_validation->set_rules('unit', 'unit', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('grade', 'grade', 'trim|required');
		$this->form_validation->set_rules('bank_name', 'bank name', 'trim|required');
		$this->form_validation->set_rules('blood_type', 'blood type', 'trim|required');
		$this->form_validation->set_rules('hospitalized', 'hospitalized', 'trim|required');
		$this->form_validation->set_rules('medicalcond', 'medicalcond', 'trim|required');
		$this->form_validation->set_rules('shoes', 'shoes', 'trim|required');
		$this->form_validation->set_rules('medicaltestnotes', 'medicaltestnotes', 'trim|required');
		$this->form_validation->set_rules('pants', 'pants', 'trim|required');
		$this->form_validation->set_rules('medtest', 'medtest', 'trim|required');
		$this->form_validation->set_rules('cloth', 'cloth', 'trim|required');
		$this->form_validation->set_rules('weight', 'weight', 'trim|required');
		$this->form_validation->set_rules('headsize', 'headsize', 'trim|required');
		$this->form_validation->set_rules('height', 'height', 'trim|required');
		$this->form_validation->set_rules('vnpf', 'vnpf', 'trim|required');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('mobile_phone', 'mobile phone', 'trim|required');
		$this->form_validation->set_rules('home_phone', 'home phone', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('department', 'department', 'trim|required');
		$this->form_validation->set_rules('ministry', 'ministry', 'trim|required');
		$this->form_validation->set_rules('division', 'division', 'trim|required');
		$this->form_validation->set_rules('is_vnpf', 'is vnpf', 'trim|required');
		$this->form_validation->set_rules('is_emp', 'is emp', 'trim|required');
		$this->form_validation->set_rules('bankid', 'bankid', 'trim|required');
		$this->form_validation->set_rules('keen', 'keen', 'trim|required');
		$this->form_validation->set_rules('keendate', 'keendate', 'trim|required');
		$this->form_validation->set_rules('fingerid', 'fingerid', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Emp_detail.php */
/* Location: ./application/controllers/Emp_detail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-09 06:34:41 */
/* http://harviacode.com */