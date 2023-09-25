<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Emp_status_model extends CI_Model
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
		// $this->datatables->select('employee.id,emp_no,emp_name,login_id,account_no,official_name,active_status,emp_status.emp_desc as emp_status,gender,marital_status,birthday,place_birthday,joindate,eoc,religion,location,unit,emp_title.title,grade,bank_name,blood_type,hospitalized,medicalcond,shoes,medicaltestnotes,pants,medtest,cloth,weight,headsize,height,vnpf,address,mobile_phone,home_phone,email,department,ministry,division,is_vnpf,is_emp,bankid,keen,keendate,fingerid');
		// $this->datatables->from('employee');
		// //add this line for join
		// $this->datatables->join('emp_title', 'employee.title = emp_title.id', 'left');
		// $this->datatables->join('emp_status', 'employee.emp_status = emp_status.id', 'left');
		// $this->datatables->add_column('action', anchor(site_url('emp_status/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('emp_status/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . '', 'id');
		// return $this->datatables->generate();

		$this->db->select('employee.id,emp_no,emp_name,login_id,account_no,official_name,active_status,emp_status.emp_desc as emp_status,gender,marital_status,birthday,place_birthday,joindate,eoc,religion,location,unit,emp_title.title,grade,bank_name,blood_type,hospitalized,medicalcond,shoes,medicaltestnotes,pants,medtest,cloth,weight,headsize,height,vnpf,address,mobile_phone,home_phone,email,department,ministry,division,is_vnpf,is_emp,bankid,keen,keendate,fingerid');
		$this->db->from($this->table);
		$this->db->join('emp_title', 'employee.title = emp_title.id', 'left');
		$this->db->join('emp_status', 'employee.emp_status = emp_status.id', 'left');

		$qry = $this->db->get()->result_array();
		$total = $this->db->count_all_results();

		$allData = [];
		foreach ($qry as $row => $val) {
			$getId = 0;
			$allData[$row] = array_values($val);

			if (array_key_exists('id', $val)) {
				$getId += $val['id'];
			}

			$action =
				anchor(
					site_url('emp_status/read/' . $getId),
					'<i class="btn btn-sm btn-info fa fa-clone"></i>'
				) . "&nbsp;&nbsp;&nbsp;";

			if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
				$action .=
					anchor(
						site_url('emp_status/update/' . $getId),
						'<i class="btn btn-sm btn-info fa fa-pencil"></i>'
					) . "&nbsp;&nbsp;&nbsp;";
			} else {
				$action .= '';
			}

			if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
				$action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'Employee Status\'; var url = \'emp_status/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
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
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
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
		$this->db->or_like('location', $q);
		$this->db->or_like('unit', $q);
		$this->db->or_like('title', $q);
		$this->db->or_like('grade', $q);
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
		$this->db->or_like('location', $q);
		$this->db->or_like('unit', $q);
		$this->db->or_like('title', $q);
		$this->db->or_like('grade', $q);
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
}

/* End of file Emp_status_model.php */
/* Location: ./application/models/Emp_status_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-14 14:02:52 */
/* http://harviacode.com */