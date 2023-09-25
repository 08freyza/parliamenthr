<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurancemoney_model extends CI_Model
{
    public $table = 'policy_paid';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('policy_paid.id,policy.policy_name as policy_id,mst_client.name as client_id,amount,teneur,paiddate');
        $this->datatables->from('policy_paid');
        //add this line for join
        $this->datatables->join('policy','policy_paid.policy_id=policy.id','left');
        $this->datatables->join('mst_client','mst_client.ID=policy_paid.client_id','left');
        //$this->datatables->join('table2', 'policy_paid.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('insurancemoney/read/$1'),'<i class="btn btn-sm btn-info fa fa-clone"></i>'),'id');
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

    function checkTenur($id)
    {
        $this->db->where('teneur', $id);
        return $this->db->get($this->table)->row();
    }

    function policyApplied($clientid)
    {
        $this->db->select('policy_applied.id, policy.policy_name');
        $this->db->from('policy_applied');
        $this->db->join('policy','policy_applied.policy_id=policy.id','left join');
        $this->db->where(array('policy_applied.client_id'=>$clientid));
        $ret = $this->db->get();
		return $ret->result();
    }

    // get total rows
    function total_rows($q = NULL) 
	{
        $this->db->like('id', $q);
	$this->db->or_like('policy_id', $q);
	$this->db->or_like('client_id', $q);
	$this->db->or_like('amount', $q);
	$this->db->or_like('teneur', $q);
	$this->db->or_like('paiddate', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) 
	{
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('policy_id', $q);
	$this->db->or_like('client_id', $q);
	$this->db->or_like('amount', $q);
	$this->db->or_like('teneur', $q);
	$this->db->or_like('paiddate', $q);
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

/* End of file Insurancemoney_model.php */
/* Location: ./application/models/Insurancemoney_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-15 09:02:41 */
/* http://harviacode.com */