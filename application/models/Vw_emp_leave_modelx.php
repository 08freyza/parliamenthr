<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vw_emp_leave_modelx extends CI_Model
{

    public $table = 'VW_EMP_LEAVE';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,emp_no,leave_desc,sdate,edate,total_day,status,approve_date,leave_type,approve_by,entry_user,paidadvdate,curbalance,hours,is_paidadv,next_approval,spv_approved_by,spv_approved_date,director_approved_by,director_approved_date');
        $this->datatables->from('VW_EMP_LEAVE');
        //add this line for join
        //$this->datatables->join('table2', 'VW_EMP_LEAVE.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('vw_emp_leavex/read/$1'),'<i class="btn btn-sm btn-info fa fa-clone"></i>')."&nbsp;&nbsp;&nbsp;".anchor(site_url('vw_emp_leavex/update/$1'),'<i class="btn btn-sm btn-info fa fa-pencil"></i>')."&nbsp;&nbsp;&nbsp;".
			'<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'VW_EMP_LEAVE\'; var url = \'vw_emp_leavex/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>','');
        return $this->datatables->generate();
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
    function total_rows($q = NULL) {
        $this->db->like('', $q);
	$this->db->or_like('id', $q);
	$this->db->or_like('emp_no', $q);
	$this->db->or_like('leave_desc', $q);
	$this->db->or_like('sdate', $q);
	$this->db->or_like('edate', $q);
	$this->db->or_like('total_day', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('approve_date', $q);
	$this->db->or_like('leave_type', $q);
	$this->db->or_like('approve_by', $q);
	$this->db->or_like('entry_user', $q);
	$this->db->or_like('paidadvdate', $q);
	$this->db->or_like('curbalance', $q);
	$this->db->or_like('hours', $q);
	$this->db->or_like('is_paidadv', $q);
	$this->db->or_like('next_approval', $q);
	$this->db->or_like('spv_approved_by', $q);
	$this->db->or_like('spv_approved_date', $q);
	$this->db->or_like('director_approved_by', $q);
	$this->db->or_like('director_approved_date', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
	$this->db->or_like('id', $q);
	$this->db->or_like('emp_no', $q);
	$this->db->or_like('leave_desc', $q);
	$this->db->or_like('sdate', $q);
	$this->db->or_like('edate', $q);
	$this->db->or_like('total_day', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('approve_date', $q);
	$this->db->or_like('leave_type', $q);
	$this->db->or_like('approve_by', $q);
	$this->db->or_like('entry_user', $q);
	$this->db->or_like('paidadvdate', $q);
	$this->db->or_like('curbalance', $q);
	$this->db->or_like('hours', $q);
	$this->db->or_like('is_paidadv', $q);
	$this->db->or_like('next_approval', $q);
	$this->db->or_like('spv_approved_by', $q);
	$this->db->or_like('spv_approved_date', $q);
	$this->db->or_like('director_approved_by', $q);
	$this->db->or_like('director_approved_date', $q);
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

/* End of file Vw_emp_leave_modelx.php */
/* Location: ./application/models/Vw_emp_leave_modelx.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-03 11:42:54 */
/* http://harviacode.com */