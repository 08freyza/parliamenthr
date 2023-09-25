<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vnpfreport_model extends CI_Model
{

    public $table = 'vnpf_history';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('vnpf_history.id,vnpf_history.emp_no,employee.emp_name,amount,vnpf_history.vnpf,month,year');
        $this->datatables->from('vnpf_history');
        $this->datatables->join('employee', 'vnpf_history.emp_no = employee.emp_no');
        //add this line for join
        //$this->datatables->join('table2', 'vnpf_history.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('vnpfreport/read/$1'),'<i class="btn btn-sm btn-info fa fa-clone"></i>')."&nbsp;&nbsp;&nbsp;".anchor(site_url('vnpfreport/update/$1'),'<i class="btn btn-sm btn-info fa fa-pencil"></i>')."&nbsp;&nbsp;&nbsp;".
			'<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'vnpf_history\'; var url = \'vnpfreport/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>','id');
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
        $this->db->like('id', $q);
	$this->db->or_like('emp_no', $q);
	$this->db->or_like('amount', $q);
	$this->db->or_like('vnpf', $q);
	$this->db->or_like('month', $q);
	$this->db->or_like('year', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('emp_no', $q);
	$this->db->or_like('amount', $q);
	$this->db->or_like('vnpf', $q);
	$this->db->or_like('month', $q);
	$this->db->or_like('year', $q);
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

/* End of file Vnpfreport_model.php */
/* Location: ./application/models/Vnpfreport_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-07 12:44:59 */
/* http://harviacode.com */