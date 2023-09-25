<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mst_sub_category_model extends CI_Model
{

    public $table = 'mst_sub_category';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('mst_sub_category.id as id,mst_category.category as id_cat,sub_desc,active,DATE_FORMAT(mst_sub_category.creation_date,\'%d %M %Y\') as creation_date');
        $this->datatables->from('mst_sub_category');
        //add this line for join
        $this->datatables->join('mst_category', 'mst_sub_category.id_cat = mst_category.id');
        $this->datatables->add_column('action', anchor(site_url('subcat/read/$1'),'<i class="btn btn-sm btn-info fa fa-clone"></i>')."&nbsp;&nbsp;&nbsp;".anchor(site_url('subcat/update/$1'),'<i class="btn btn-sm btn-info fa fa-pencil"></i>')."&nbsp;&nbsp;&nbsp;".
			'<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'Sub Category\'; var url = \'subcat/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>','id');
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
	$this->db->or_like('id_cat', $q);
	$this->db->or_like('sub_desc', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('creation_date', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('id_cat', $q);
	$this->db->or_like('sub_desc', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('creation_date', $q);
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

/* End of file Mst_sub_category_model.php */
/* Location: ./application/models/Mst_sub_category_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-14 08:22:54 */
/* http://harviacode.com */