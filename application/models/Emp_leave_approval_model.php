<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emp_leave_approval_model extends CI_Model
{

    public $table = 'emp_leave';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    // function json()
    // {
    //     $this->datatables->select('id,emp_no,leave_desc,sdate,total_day,status,leave_type,next_approval');
    //     $this->datatables->from('VW_EMP_LEAVE_APPROVAL');
    //     $this->datatables->where('status', 'Need Approval');

    //     //add this line for join
    //     //$this->datatables->join('table2', 'emp_leave.field = table2.field');

    //     $this->datatables->add_column('action', '<button class="btn btn-success btn-icon-anim btn-circle" title="Approve" onClick="doAction(\'approve\',\'$1\');"><i class="icon-check"></i></button>' . "&nbsp;&nbsp;&nbsp;" . '<button class="btn btn-danger btn-icon-anim btn-circle" title="Reject" onClick="doAction(\'reject\',\'$1\');"><i class="glyphicon glyphicon-remove"></i></button>' . '', 'id');

    //     // $this->datatables->add_column('action', anchor(site_url('emp_leave/read/$1'),'<button class="btn btn-success btn-icon-anim btn-circle" title="Approve"><i class="icon-check"></i></button>')."&nbsp;&nbsp;&nbsp;".anchor(site_url('emp_leave/update/$1'),'<button class="btn btn-danger btn-icon-anim btn-circle" title="Reject"><i class="glyphicon glyphicon-remove"></i></button>').'','id');
    //     return $this->datatables->generate();
    // }

    function json()
    {
        $this->db->select('id,emp_no,leave_desc,sdate,total_day,status,leave_type,next_approval');
        $this->db->where('status', 'Need Approval');

        $qry = $this->db->get('VW_EMP_LEAVE_APPROVAL')->result_array();
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
                // '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'Leave\'; var url = \'leave/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
                '<button class="btn btn-success btn-icon-anim btn-circle" title="Approve" onClick="doAction(\'approve\',\'' . $getId . '\');"><i class="icon-check"></i></button>' . "&nbsp;&nbsp;&nbsp;" . '<button class="btn btn-danger btn-icon-anim btn-circle" title="Reject" onClick="doAction(\'reject\',\'' . $getId . '\');"><i class="glyphicon glyphicon-remove"></i></button>';

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

    function get_total()
    {
        $this->db->from('VW_EMP_LEAVE_APPROVAL');
        return $this->db->count_all_results();
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
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
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

/* End of file Emp_leave_approval_model.php */
/* Location: ./application/models/Emp_leave_approval_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-15 13:20:26 */
/* http://harviacode.com */