<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Employee_model extends CI_Model
{

	public $table = 'employee';
	public $id = 'id';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	// datatables
	function json()
	{
		// $this->datatables->select('employee.id as id,emp_no,emp_name,login_id,account_no,official_name,active_status,emp_status,gender,marital_status,birthday,place_birthday,joindate,religion,location,unit,emp_title.title as title,grade,salary_grade,bank_name,blood_type,hospitalized,medicalcond,shoes,medicaltestnotes,pants,medtest,cloth,weight,headsize,height,vnpf,address,mobile_phone,home_phone,email,emp_department.name as department,emp_ministry.name as ministry,division,is_vnpf,is_emp,bankid,keen,keendate,fingerid');
		// $this->datatables->from('employee');
		// //add this line for join
		// $this->datatables->join('emp_title', 'employee.title = emp_title.id');
		// $this->datatables->join('emp_department', 'employee.department = emp_department.id');
		// $this->datatables->join('emp_ministry', 'employee.ministry = emp_ministry.id');
		// $this->datatables->add_column('action', anchor(site_url('emp_info/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('emp_info/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
		// 	'<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'employee\'; var url = \'emp_info/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
		// return $this->datatables->generate();

		$this->db->select('
            employee.id,
            employee.emp_no,
            employee.emp_name,
            employee.login_id,
            employee.account_no,
            employee.official_name,
            employee.active_status,
            employee.emp_status,
            employee.gender,
            employee.marital_status,
            employee.birthday,
            employee.place_birthday,
            employee.joindate,
            employee.religion,
            employee.qualifications,
            employee.location,
            employee.unit,
            emp_title.title AS title,
            employee.grade,
            employee.salary_grade,
            employee.bank_name,
            employee.blood_type,
            employee.hospitalized,
            employee.medicalcond,
            employee.shoes,
            employee.medicaltestnotes,
            employee.pants,
            employee.medtest,
            employee.cloth,
            employee.weight,
            employee.headsize,
            employee.height,
            employee.vnpf,
            employee.address,
            employee.province,
            employee.island,
            employee.language,
            employee.mobile_phone,
            employee.home_phone,
            employee.email,
			emp_department.name AS department,
            emp_ministry.name AS ministry,
            employee.division,
            employee.is_vnpf,
            employee.is_emp,
            employee.bankid,
            employee.keen,
            employee.keendate,
            employee.fingerid,
        ');
		$this->db->from($this->table);
		$this->db->join('emp_title', 'employee.title = emp_title.id');
		$this->db->join('emp_department', 'employee.department = emp_department.id');
		$this->db->join('emp_ministry', 'employee.ministry = emp_ministry.id');

		$qry = $this->db->get()->result_array();
		$total = $this->get_total();
		$allData = [];

		foreach ($qry as $row => $val) {
			$getId = 0;
			$allData[$row] = array_values($val);
			// $allData[$row] = $val;

			if (array_key_exists('id', $val)) {
				$getId += $val['id'];
			}

			$action =
				anchor(
					site_url('emp_info/read/' . $getId),
					'<i class="btn btn-sm btn-info fa fa-clone"></i>'
				) . "&nbsp;&nbsp;&nbsp;";

			if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
				$action .=
					anchor(
						site_url('emp_info/update/' . $getId),
						'<i class="btn btn-sm btn-info fa fa-pencil"></i>'
					) . "&nbsp;&nbsp;&nbsp;";
			} else {
				$action .= '';
			}

			if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
				$action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'Employee Info\'; var url = \'emp_info/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
			} else {
				$action .= '';
			}

			// $allData[$row]['action'] = $action;
			array_push($allData[$row], $action);
		}

		$output = [
			'draw' => 0,
			'recordsTotal' => $total,
			'recordsFiltered' => $total,
			'data' => $allData,
		];

		return json_encode($output);
	}

	// get all
	function get_all()
	{
		$this->db->order_by('emp_name', 'ASC');
		if (isAdmin() == FALSE) {
			$this->db->where('emp_no', $this->session->userdata('emp_no'));
		}
		return $this->db->get($this->table)->result();
	}

	// get all
	function get_all_active()
	{
		$this->db->order_by('emp_name', 'ASC');
		if (isAdmin() == FALSE) {
			$this->db->where('emp_no', $this->session->userdata('emp_no'));
		}
		$this->db->where('active_status', 'Y');
		return $this->db->get($this->table)->result();
	}

	// get all
	function get_all_data()
	{
		$this->db->order_by('emp_name', 'ASC');
		return $this->db->get($this->table)->result();
	}

	function get_total()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	// get data by emp_no
	function get_by_emp_no($emp_no)
	{
		$this->db->select('employee.*,uc_users.email');
		$this->db->join('uc_users', 'left join uc_users on employee.login_id = uc_users.id', 'left');
		$this->db->where('emp_no', $emp_no);
		return $this->db->get($this->table)->row();
	}

	// get total rows
	function total_rows($q = NULL)
	{
		$this->db->like('id', $q);
		$this->db->or_like('emp_no', $q);
		$this->db->or_like('emp_name', $q);
		$this->db->or_like('login_id', $q);
		$this->db->or_like('account_no', $q);
		$this->db->or_like('official_name', $q);
		$this->db->or_like('active_status', $q);
		$this->db->or_like('emp_status', $q);
		$this->db->or_like('gender', $q);
		$this->db->or_like('marital_status', $q);
		$this->db->or_like('birthday', $q);
		$this->db->or_like('place_birthday', $q);
		$this->db->or_like('joindate', $q);
		$this->db->or_like('religion', $q);
		$this->db->or_like('qualifications', $q);
		$this->db->or_like('location', $q);
		$this->db->or_like('unit', $q);
		$this->db->or_like('title', $q);
		$this->db->or_like('grade', $q);
		$this->db->or_like('salary_grade', $q);
		$this->db->or_like('bank_name', $q);
		$this->db->or_like('blood_type', $q);
		$this->db->or_like('hospitalized', $q);
		$this->db->or_like('medicalcond', $q);
		$this->db->or_like('shoes', $q);
		$this->db->or_like('medicaltestnotes', $q);
		$this->db->or_like('pants', $q);
		$this->db->or_like('medtest', $q);
		$this->db->or_like('cloth', $q);
		$this->db->or_like('weight', $q);
		$this->db->or_like('headsize', $q);
		$this->db->or_like('height', $q);
		$this->db->or_like('vnpf', $q);
		$this->db->or_like('address', $q);
		$this->db->or_like('province', $q);
		$this->db->or_like('island', $q);
		$this->db->or_like('language', $q);
		$this->db->or_like('mobile_phone', $q);
		$this->db->or_like('home_phone', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('department', $q);
		$this->db->or_like('ministry', $q);
		$this->db->or_like('division', $q);
		$this->db->or_like('is_vnpf', $q);
		$this->db->or_like('is_emp', $q);
		$this->db->or_like('bankid', $q);
		$this->db->or_like('keen', $q);
		$this->db->or_like('keendate', $q);
		$this->db->or_like('fingerid', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// get data with limit and search
	function get_limit_data($limit, $start = 0, $q = NULL)
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->like('id', $q);
		$this->db->or_like('emp_no', $q);
		$this->db->or_like('emp_name', $q);
		$this->db->or_like('login_id', $q);
		$this->db->or_like('account_no', $q);
		$this->db->or_like('official_name', $q);
		$this->db->or_like('active_status', $q);
		$this->db->or_like('emp_status', $q);
		$this->db->or_like('gender', $q);
		$this->db->or_like('marital_status', $q);
		$this->db->or_like('birthday', $q);
		$this->db->or_like('place_birthday', $q);
		$this->db->or_like('joindate', $q);
		$this->db->or_like('religion', $q);
		$this->db->or_like('qualifications', $q);
		$this->db->or_like('location', $q);
		$this->db->or_like('unit', $q);
		$this->db->or_like('title', $q);
		$this->db->or_like('grade', $q);
		$this->db->or_like('salary_grade', $q);
		$this->db->or_like('bank_name', $q);
		$this->db->or_like('blood_type', $q);
		$this->db->or_like('hospitalized', $q);
		$this->db->or_like('medicalcond', $q);
		$this->db->or_like('shoes', $q);
		$this->db->or_like('medicaltestnotes', $q);
		$this->db->or_like('pants', $q);
		$this->db->or_like('medtest', $q);
		$this->db->or_like('cloth', $q);
		$this->db->or_like('weight', $q);
		$this->db->or_like('headsize', $q);
		$this->db->or_like('height', $q);
		$this->db->or_like('vnpf', $q);
		$this->db->or_like('address', $q);
		$this->db->or_like('province', $q);
		$this->db->or_like('island', $q);
		$this->db->or_like('language', $q);
		$this->db->or_like('mobile_phone', $q);
		$this->db->or_like('home_phone', $q);
		$this->db->or_like('email', $q);
		$this->db->or_like('department', $q);
		$this->db->or_like('ministry', $q);
		$this->db->or_like('division', $q);
		$this->db->or_like('is_vnpf', $q);
		$this->db->or_like('is_emp', $q);
		$this->db->or_like('bankid', $q);
		$this->db->or_like('keen', $q);
		$this->db->or_like('keendate', $q);
		$this->db->or_like('fingerid', $q);
		$this->db->limit($limit, $start);
		return $this->db->get($this->table)->result();
	}

	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	// update data
	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

	function getLastEmpNo()
	{
		return $this->db->query('select emp_no from employee order by id desc limit 1; ');
	}

	function getTotalEmpGender($param)
	{
		return $this->db->query('select gender from employee where gender = \'' . $param . '\'');
	}

	function getData($table, $fieldID = null, $ID = null, $orderfield = null, $ordertype = null)
	{
		if ($fieldID != null and $ID != null) {
			$this->db->where($fieldID, $ID);
		}
		if ($orderfield != null and $ordertype != null) {
			$this->db->order_by($orderfield, $ordertype);
		}
		$query =  $this->db->get($table);

		return $query;
	}

	function getDataCountArray($table, $Array)
	{
		foreach ($Array as $value) {
			$this->db->where($value['column'], $value['val'], FALSE);
		}
		$this->db->from($table);
		$query = $this->db->count_all_results();

		return $query;
	}
}

/* End of file Employee_model.php */
/* Location: ./application/models/Employee_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-11 15:38:02 */
/* http://harviacode.com */