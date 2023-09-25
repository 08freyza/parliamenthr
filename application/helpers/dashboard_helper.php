<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('getNumEmpBasedOnAgeAndGender')) {
	function getNumEmpBasedOnAgeAndGender($gender = 'male')
	{
		$ini    = &get_instance();

		$ret = $ini->db->query('select * from getNumEmpBasedOnAgeAndGender where gender = "' . $gender . '"');
		if ($ret->num_rows() > 0) {
			return '[' . $ret->row()->a . ',' . $ret->row()->b . ',' . $ret->row()->c . ',' . $ret->row()->d . ',' . $ret->row()->e . ',' . $ret->row()->f . ',' . $ret->row()->g . ',' . $ret->row()->h . ',' . $ret->row()->i . ']';
		}
	}
}

if (!function_exists('totalNotif')) {
	function totalNotif($emp_no)
	{

		$ini = &get_instance();
		//var_dump($ini->db);
		$sql = "select * from emp_leave where status=2";
		$ret = $ini->db->query($sql);
		//var_dump($ret->num_rows());
		if ($ret->num_rows() > 0) {
			return $ret->num_rows();
		} else {
			return 13;
		}
	}
}

if (!function_exists('totalEmp')) {
	function totalEmp()
	{
		$CI = &get_instance();
		$CI->load->model(array('Employee_model'));

		$hasil = $CI->Employee_model->get_all();
		if (count($hasil) > 0) {
			$hitung = count($hasil);
		}
		return $hitung;
	}
}

if (!function_exists('empGender')) {
	function empGender($gender)
	{
		$CI = &get_instance();
		$CI->load->model(array('Employee_model'));

		$hitung = 0;
		$hasil = $CI->Employee_model->getTotalEmpGender($gender);
		if ($hasil->num_rows() > 0) {
			$hitung = $hasil->num_rows();
		}
		return $hitung;
	}
}

if (!function_exists('getEmpStatus')) {
	function getEmpStatus()
	{
		$ini = &get_instance();
		$ini->load->model(array('Employee_model'));

		$tabel = '';
		$hasil = $ini->Employee_model->getData('emp_status');
		if ($hasil->num_rows() > 0) {
			foreach ($hasil->result() as $row) {
				$array_query = array();
				$array_query[1]["column"] = 'emp_status';
				$array_query[1]["val"] = $row->id;
				$array_query[2]["column"] = 'is_emp';
				$array_query[2]["val"] = 'True';

				$status = $ini->Employee_model->getDataCountArray('employee', $array_query);
				$tabel .= '[\'' . $row->emp_desc . '\',' . $status . '],';
			}
		}
		return $tabel;
	}
}

if (!function_exists('getStatus')) {
	function getStatus($type = null)
	{
		$ini = &get_instance();

		$tabel = '';
		$hasil = $ini->Employee_model->getData('emp_status');
		if ($hasil->num_rows() > 0) {
			foreach ($hasil->result() as $row) {
				//$tabel .= '['.$row->id.',"'.$row->emp_desc.'"],';
				if ($type == '')
					$tabel .= '"' . $row->emp_desc . '",';
				else
					$tabel .= '' . $row->id . ',';
			}
		}
		return rtrim($tabel, ",");
	}
}

if (!function_exists('getEmpCareerStatus')) {
	function getEmpCareerStatus($type)
	{
		$ini = &get_instance();
		$ini->load->model(array('Employee_model'));

		$tabel = '';
		$hasil = $ini->Employee_model->getData('emp_status');
		if ($hasil->num_rows() > 0) {
			foreach ($hasil->result() as $row) {
				if ($row->id != 1) {
					$array_query = array();
					$array_query[1]["column"] = 'status';
					$array_query[1]["val"] = $row->id;
					$array_query[2]["column"] = 'active = \'t\'';
					$array_query[2]["val"] = null;
					if ($type == 1)
						$array_query[3]["column"] = 'extract(day from emp_karir.edate - now()) between 1 and 30';
					else if ($type == 2)
						$array_query[3]["column"] = 'extract(day from now() - emp_karir.edate) between 1 and 30';
					else
						$array_query[3]["column"] = 'extract(day from now() - emp_karir.edate) > 30 ';
					$array_query[3]["val"] = null;
					$status = $ini->Employee_model->getDataCountArray('emp_karir', $array_query);
					$tabel .= $status . ',';
				}
			}
		}
		return $tabel;
	}
}


if (!function_exists('getNumEmpBasedOnWorkHistory')) {
	function getNumEmpBasedOnWorkHistory($gender = 'male')
	{
		$ini    = &get_instance();

		$ret = $ini->db->query('select * from getNumEmpBasedOnWorkHistory where gender = "' . $gender . '"');
		if ($ret->num_rows() > 0) {
			return '[' . $ret->row()->a . ',' . $ret->row()->b . ',' . $ret->row()->c . ',' . $ret->row()->d . ',' . $ret->row()->e . ',' . $ret->row()->f . ',' . $ret->row()->g . ']';
		}
	}
}

if (!function_exists('getNumEmpBasedOnDepartment')) {
	function getNumEmpBasedOnDepartment($gender = 'male')
	{
		$ini    = &get_instance();
		$out	= '[';

		$ret = $ini->db->query('
			select name,male,sum(num1) as num1,female,sum(num2) as num2
			from (
				select name,\'male\' as male,0 as num1, \'female\' as female, num_of_emp as num2
				from getNumEmpBasedOnDepartment where gender = \'female\'

				union all

				select name,\'male\' as male,num_of_emp as num1, \'female\' as female, 0 as num2
				from getNumEmpBasedOnDepartment where gender = \'male\'
			) X 
			group by name,male,female');
		if ($ret->num_rows() > 0) {
			foreach ($ret->result() as $row) {
				$out .= ($gender == 'male' ? $row->num1 : $row->num2) . ',';
			}
			return substr($out, 0, -1) . ']';
		} else {
			return $out . ']';
		}
	}
}

if (!function_exists('getNumEmpOnDepartment')) {
	function getNumEmpOnDepartment()
	{
		$ini    = &get_instance();
		$out	= '';

		$ret = $ini->db->query('select name,sum(num_of_emp) as num_of_emp from getNumEmpBasedOnDepartment group by name');
		if ($ret->num_rows() > 0) {
			foreach ($ret->result() as $row) {
				$out .= '[\'' . str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($row->name ?? '', ENT_QUOTES, 'UTF-8', false)) . '\',' . $row->num_of_emp . '],';
			}
			return substr($out, 0, -1);
		} else {
			return $out . '[]';
		}
	}
}

if (!function_exists('getDepartmentNameOfEmp')) {
	function getDepartmentNameOfEmp()
	{
		$ini    = &get_instance();
		$out	= '[';

		$ret = $ini->db->query('select name from getNumEmpBasedOnDepartment group by name');
		if ($ret->num_rows() > 0) {
			foreach ($ret->result() as $row) {
				$out .= '\'' . str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($row->name ?? '', ENT_QUOTES, 'UTF-8', false)) . '\',';
			}
			return substr($out, 0, -1) . ']';
		} else {
			return $out . ']';
		}
	}
}
