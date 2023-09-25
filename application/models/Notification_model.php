<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notification_model extends CI_Model
{

    public $table = 'notification_list';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        // $this->datatables->select('employee.id,emp_no,emp_name,login_id,account_no,official_name,active_status,emp_status,gender,marital_status,birthday,place_birthday,joindate,religion,location,unit,emp_title.title,grade,bank_name,blood_type,hospitalized,medicalcond,shoes,medicaltestnotes,pants,medtest,cloth,weight,headsize,height,vnpf,address,mobile_phone,home_phone,email,emp_department.name as department,emp_ministry.name as ministry,division,is_vnpf,is_emp,bankid,keen,keendate,fingerid');
        // $this->datatables->from('employee');
        //add this line for join
        // $this->datatables->join('emp_title', 'employee.title = emp_title.id');
        // $this->datatables->join('emp_department', 'employee.department=emp_department.id');
        // $this->datatables->join('emp_ministry', 'employee.ministry = emp_ministry.id');
        // $this->datatables->add_column('action', anchor(site_url('emp_info/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('emp_info/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
        //     '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'employee\'; var url = \'emp_info/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('id', 'ASC');
        if (isAdmin() == FALSE) {
            $this->db->where('emp_no', $this->session->userdata('emp_no'));
        }
        return $this->db->get($this->table)->result_array();
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
        // $this->db->select('employee.*,uc_users.email');
        // $this->db->join('uc_users', 'left join uc_users on employee.login_id = uc_users.id', 'left');
        $this->db->where('emp_no', $emp_no);
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table);
    }

    // get data by emp_no only active status
    function get_by_emp_no_active($emp_no)
    {
        $this->db->where('emp_no', $emp_no);
        $this->db->where('status', 'A');
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table);
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('emp_no', $q);
        $this->db->or_like('message', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('notification_date', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get total rows
    function total_rows_active_by_emp_no($emp_no)
    {
        $this->db->from($this->table);
        $this->db->where('emp_no', $emp_no);
        $this->db->where('status', 'A');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('emp_no', $q);
        $this->db->or_like('message', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('notification_date', $q);
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
        return $this->db->query('select emp_no from notification_list order by id desc limit 1; ');
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

/* End of file Notification_model.php */
/* Location: ./application/models/Notification_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-11 15:38:02 */
/* http://harviacode.com */