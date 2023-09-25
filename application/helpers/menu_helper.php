<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('cboCategory')) {
	function cboCategory($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Mst_category_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Mst_category_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->category . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboSubCategory')) {
	function cboSubCategory($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Mst_sub_category_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Mst_sub_category_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->sub_desc . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboType')) {
	function cboType($id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Mst_insurance_type_model');

		$cbo = '
		<select class="form-control select2" name="type" id="type" ' . $disabled . ' data-live-search="true"  data-style="btn-white">';
		foreach ($CI->Mst_insurance_type_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->ID . '" ' . ($id == $data->ID ? 'selected="selected"' : '') . '>' . $data->desc . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboPolicyApplied')) {
	function cboPolicyApplied($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Insurancemoney_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . ' data-live-search="true"  data-style="btn-white">
			<option>&nbsp;</option>';
		foreach ($CI->Insurancemoney_model->policyApplied($CI->session->userdata('client_id')) as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->policy_name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

/*
if ( ! function_exists('cboMinistry'))
{
    function cboMinistry($cboName=null,$id=null,$disabled=null)
    {
        $CI    =& get_instance();
        $CI->load->model('Ministry_model');

		$cbo = '
		<select class="form-control select2" name="'.$cboName.'" id="'.$cboName.'" '.$disabled.'>
			<option>&nbsp;</option>';
			foreach ($CI->Ministry_model->get_all() as $data) {
				$cbo .= '		<option value="'.$data->id.'" '.($id == $data->id ? 'selected="selected"' : '').'>'.$data->name.'</option>';
			}
		$cbo .= '		</select>';
		return $cbo;
    }
}
*/

if (!function_exists('cboDivision')) {
	function cboDivision($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Division_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>
			<option>&nbsp;</option>';
		foreach ($CI->Division_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboUsers')) {
	function cboUsers($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Users_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>
			<option>&nbsp;</option>';
		foreach ($CI->Users_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->user_name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboGender')) {
	function cboGender($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>
				<option value="male" ' . ($id == 'male' ? 'selected="selected"' : '') . '>Male</option>
				<option value="female" ' . ($id == 'female' ? 'selected="selected"' : '') . '>Female</option>
		</select>';
		return $cbo;
	}
}

if (!function_exists('cboActiveStatus')) {
	function cboActiveStatus($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>
				<option value="Y" ' . ($id == 'Y' ? 'selected="selected"' : '') . '>Active</option>
				<option value="N" ' . ($id == 'N' ? 'selected="selected"' : '') . '>Inactive</option>
		</select>';
		return $cbo;
	}
}

if (!function_exists('cboEmpNo')) {
	function cboEmpNo($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Employee_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>
			<option>&nbsp;</option>';
		foreach ($CI->Employee_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->emp_no . '" ' . ($id == $data->emp_no ? 'selected="selected"' : '') . '>' . $data->emp_name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboEmpNoActive')) {
	function cboEmpNoActive($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Employee_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>
			<option>&nbsp;</option>';
		foreach ($CI->Employee_model->get_all_active() as $data) {
			$cbo .= '		<option value="' . $data->emp_no . '" ' . ($id == $data->emp_no ? 'selected="selected"' : '') . '>' . $data->emp_name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboEmpNoData')) {
	function cboEmpNoData($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Employee_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>
			<option>&nbsp;</option>';
		foreach ($CI->Employee_model->get_all_data() as $data) {
			$cbo .= '		<option value="' . $data->emp_no . '" ' . ($id == $data->emp_no ? 'selected="selected"' : '') . '>' . $data->emp_name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboPermission')) {
	function cboPermission($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Permissions_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>
			<option>&nbsp;</option>';
		foreach ($CI->Permissions_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboLeaveType')) {
	function cboLeaveType($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Leavetype_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Leavetype_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->leave_setting_id . '" ' . ($id == $data->leave_setting_id ? 'selected="selected"' : '') . '>' . $data->leave_name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboMaritalStatus')) {
	function cboMaritalStatus($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Marital_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Marital_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->marital_desc . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboReligion')) {
	function cboReligion($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Religion_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Religion_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->religion_desc . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboTitle')) {
	function cboTitle($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Emp_title_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Emp_title_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->title . ' [' . $data->title_code . ']</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboDepartment')) {
	function cboDepartment($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Department_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Department_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboMinistry')) {
	function cboMinistry($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Ministry_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Ministry_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboResType')) {
	function cboResType($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Resource_type_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Resource_type_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->type_desc . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboResTypeName')) {
	function cboResTypeName($cboName = null, $id = null, $restType = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Resource_type_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		$cbo .= '		<option value="" ' . ($id == '' ? 'selected="selected"' : '') . '>--Resource Name--</option>';
		foreach ($CI->Resource_type_model->get_all_res_name_by_res_id($restType) as $data) {
			$cbo .= '		<option value="' . $data->res_type_id . '" ' . ($id == strval($data->res_type_id) ? 'selected="selected"' : '') . '>' . $data->res_type_name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboResTypeNameAll')) {
	function cboResTypeNameAll($cboName = null, $id = null, $restType = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Resource_type_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		$cbo .= '		<option value="" ' . ($id == '' ? 'selected="selected"' : '') . '>--Resource Name--</option>';
		foreach ($CI->Resource_type_model->get_all_res_name() as $data) {
			$cbo .= '		<option value="' . $data->res_type_id . '" ' . ($id == strval($data->res_type_id) && $restType == strval($data->res_type) ? 'selected="selected"' : '') . '>' . $data->res_type_name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboEmpStatus')) {
	function cboEmpStatus($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Employee_status_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Employee_status_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->emp_desc . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboLoanType')) {
	function cboLoanType($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Loan_type_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Loan_type_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('getEmpNo')) {
	function getEmpNo($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Ministry_model');

		$last = $CI->Employee_model->getLastEmpNo();
		if (!empty($last))

			return 'xxx';
	}
}

if (!function_exists('footerSetup')) {
	function footerSetup()
	{
		$CI    = &get_instance();

		$cbo = date('Y') . ' &copy; Vanuatu HR Parliament. Provided by CNS';
		return $cbo;
	}
}

if (!function_exists('cboMonth')) {
	function cboMonth($cboName = null, $id = null, $disabled = null)
	{
		$month = array('0' => 'January', '1' => 'February', '2' => 'March', '3' => 'April', '4' => 'May', '5' => 'June', '6' => 'July', '7' => 'August', '8' => 'September', '9' => 'October', '10' => 'November', '11' => 'December');
		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($month as $key => $value) {
			$cbo .= '		<option value="' . $key . '" ' . ($id == $key ? 'selected="selected"' : '') . '>' . $value . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboYear')) {
	function cboYear($cboName = null, $id = null, $disabled = null)
	{
		$start = date('Y') - 5;
		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		for ($i = (date('Y') - 5); $i <= (date('Y') + 5); $i++) {
			$cbo .= '		<option value="' . $i . '" ' . ($id == $i ? 'selected="selected"' : '') . '>' . $i . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('getNextApproval')) {
	function getNextApproval()
	{
		if (isAdmin() == FALSE) {
			$_this    = &get_instance();
			$empno   = $_this->session->userdata('emp_no');
			$empdept = $_this->db->query('select department from employee where emp_no = "' . $empno . '"; ')->row()->department;
			$empno_approval = $_this->db->query('select report_to from emp_department where id = "' . $empdept . '"; ')->row()->report_to;
			return $empno_approval;
		}
	}
}

if (!function_exists('getCreateStatus')) {
	function getCreateStatus($getclass)
	{
		$_this    = &get_instance();
		$empno   = $_this->session->userdata('emp_no');
		$getpermissionid = $_this->db->query('select permission_id from uc_user_permission_matches where user_id = "' . $empno . '"; ')->row()->permission_id;
		$getid = $_this->db->query('select id from uc_pages where class = "' . $getclass . '"; ')->row()->id;
		$getcreateactive = $_this->db->query('select create_active from uc_permission_page_matches where permission_id = "' . $getpermissionid . '" and page_id = "' . $getid . '";')->row()->create_active;
		return $getcreateactive;
	}
}

if (!function_exists('getUpdateStatus')) {
	function getUpdateStatus($getclass)
	{
		$_this    = &get_instance();
		$empno   = $_this->session->userdata('emp_no');
		$getpermissionid = $_this->db->query('select permission_id from uc_user_permission_matches where user_id = "' . $empno . '"; ')->row()->permission_id;
		$getid = $_this->db->query('select id from uc_pages where class = "' . $getclass . '"; ')->row()->id;
		$getupdateactive = $_this->db->query('select update_active from uc_permission_page_matches where permission_id = "' . $getpermissionid . '" and page_id = "' . $getid . '";')->row()->update_active;
		return $getupdateactive;
	}
}

if (!function_exists('getDeleteStatus')) {
	function getDeleteStatus($getclass)
	{
		$_this    = &get_instance();
		$empno   = $_this->session->userdata('emp_no');
		$getpermissionid = $_this->db->query('select permission_id from uc_user_permission_matches where user_id = "' . $empno . '"; ')->row()->permission_id;
		$getid = $_this->db->query('select id from uc_pages where class = "' . $getclass . '"; ')->row()->id;
		$getdeleteactive = $_this->db->query('select delete_active from uc_permission_page_matches where permission_id = "' . $getpermissionid . '" and page_id = "' . $getid . '";')->row()->delete_active;
		return $getdeleteactive;
	}
}

if (!function_exists('cboPageId')) {
	function cboPageId($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		// $CI->load->model('Permissions_model');
		$thisQuery = $CI->db->query('select * from uc_pages;');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($thisQuery->result() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->caption . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('cboPermissionId')) {
	function cboPermissionId($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Permissions_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Permissions_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('getCurrBalance')) {
	function getCurrBalance()
	{
		$CI = &get_instance();
		$CI->load->model('Emp_leave_bal_model');

		$empno   = $CI->session->userdata('emp_no');
		$empcurbal = $CI->Emp_leave_bal_model->get_balance_by_emp_no($empno);

		return !$empcurbal ? 0 : $empcurbal->balance;
	}
}

if (!function_exists('isAdmin')) {
	function isAdmin()
	{
		$_this    = &get_instance();
		$empno   = $_this->session->userdata('emp_no');
		$emprole = $_this->db->query('SELECT user_id,name FROM uc_user_permission_matches left join uc_permissions on uc_user_permission_matches.permission_Id = uc_permissions.id where user_id = "' . $empno . '" ')->row();

		if (strtolower($emprole->name) == 'administrator')
			return true;
		else
			return false;
	}
}

if (!function_exists('getLeaveStatus')) {
	function getLeaveStatus($id)
	{
		$CI    = &get_instance();
		$CI->load->model('Emp_leave_model');

		$row = $CI->Emp_leave_model->get_by_id($id);
		if (!empty($row)) {
			return $row->status;
		} else {
			return -1;
		}
	}
}

if (!function_exists('getSidebarMenuHeader')) {
	function getSidebarMenuHeader()
	{
		$CI    = &get_instance();
		$CI->load->model('Roles_model');
		$CI->load->model('Permission_page_matches_model');

		$empno   = $CI->session->userdata('emp_no');
		$getPermissionId = $CI->Roles_model->get_by_user_id($empno);
		if (!empty($getPermissionId)) {
			$getMenuData = $CI->Permission_page_matches_model->get_all_header_by_permission_id($getPermissionId->permission_Id);
			return (!empty($getMenuData)) ? $getMenuData : null;
		} else {
			return null;
		}
	}
}

if (!function_exists('getSidebarMenuSubordinate')) {
	function getSidebarMenuSubordinate($parentId)
	{
		$CI    = &get_instance();
		$CI->load->model('Roles_model');
		$CI->load->model('Permission_page_matches_model');

		$empno   = $CI->session->userdata('emp_no');
		$getPermissionId = $CI->Roles_model->get_by_user_id($empno);
		if (!empty($getPermissionId)) {
			$getMenuData = $CI->Permission_page_matches_model->get_all_subordinate_by_permission_id($getPermissionId->permission_Id, $parentId);
			return (!empty($getMenuData)) ? $getMenuData : null;
		} else {
			return null;
		}
	}
}

if (!function_exists('isExistClassMenu')) {
	function isExistClassMenu()
	{
		$CI    = &get_instance();
		$CI->load->model('Roles_model');
		$CI->load->model('Permission_page_matches_model');

		$empno   = $CI->session->userdata('emp_no');
		$getPermissionId = $CI->Roles_model->get_by_user_id($empno);
		if (!empty($getPermissionId)) {
			$getClassMenuData = $CI->Permission_page_matches_model->get_by_permission_id_class($getPermissionId->permission_Id, $CI->router->fetch_class());
			return (!empty($getClassMenuData)) ? true : false;
		} else {
			return null;
		}
	}
}

if (!function_exists('getClass')) {
	function getClass($page)
	{
		$CI    = &get_instance();
		$CI->load->model('Roles_model');
		$CI->load->model('Permission_page_matches_model');

		$empno   = $CI->session->userdata('emp_no');
		$getPermissionId = $CI->Roles_model->get_by_user_id($empno);
		if (!empty($getPermissionId)) {
			$getClassMenuData = $CI->Permission_page_matches_model->get_class($getPermissionId->permission_Id, $CI->router->fetch_class(), $page);
			return (!empty($getClassMenuData)) ? true : false;
		} else {
			return null;
		}
	}
}

if (!function_exists('cboDiscipleCat')) {
	function cboDiscipleCat($cboName = null, $id = null, $disabled = null)
	{
		$CI    = &get_instance();
		$CI->load->model('Disciplecat_model');

		$cbo = '
		<select class="form-control select2" name="' . $cboName . '" id="' . $cboName . '" ' . $disabled . '>';
		foreach ($CI->Disciplecat_model->get_all() as $data) {
			$cbo .= '		<option value="' . $data->id . '" ' . ($id == $data->id ? 'selected="selected"' : '') . '>' . $data->disciple_name . '</option>';
		}
		$cbo .= '		</select>';
		return $cbo;
	}
}

if (!function_exists('Parse_Data')) {
	function Parse_Data($data, $p1, $p2)
	{
		$data = '' . $data;
		$hasil = '';
		$awal = strpos($data, $p1);
		if ($awal != '') {
			$akhir = strpos(strstr($data, $p1), $p2);
			if ($akhir != '') {
				$hasil = substr($data, $awal + strlen($p1), $akhir - strlen($p1));
			}
		}
		return $hasil;
	}
}
