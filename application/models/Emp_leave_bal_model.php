<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emp_leave_bal_model extends CI_Model
{

    public $table = 'emp_leave_bal';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        // $this->datatables->select('emp_leave_bal.id,emp_name as emp_no,leave_setting.leave_name as leave_type,balance');
        // $this->datatables->from('emp_leave_bal');
        // //add this line for join
        // $this->datatables->join('employee', 'emp_leave_bal.emp_no = employee.emp_no', 'left');
        // $this->datatables->join('leave_setting', 'emp_leave_bal.leave_type=leave_setting.leave_setting_id', 'left');
        // $this->datatables->add_column('action', anchor(site_url('leave_balance/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('leave_balance/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
        //     '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'emp_leave_bal\'; var url = \'leave_balance/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
        // return $this->datatables->generate();

        $this->db->select('emp_leave_bal.id,emp_name as emp_no,leave_setting.leave_name as leave_type,balance');
        $this->db->from($this->table);
        $this->db->join('employee', 'emp_leave_bal.emp_no = employee.emp_no', 'left');
        $this->db->join('leave_setting', 'emp_leave_bal.leave_type=leave_setting.leave_setting_id', 'left');

        $qry = $this->db->get()->result_array();
        $total = $this->get_total();
        $allData = [];

        foreach ($qry as $row => $val) {
            $getId = 0;
            $allData[$row] = array_values($val);

            if (array_key_exists('id', $val)) {
                $getId += $val['id'];
            }

            $action =
                anchor(
                    site_url('leave_balance/read/' . $getId),
                    '<i class="btn btn-sm btn-info fa fa-clone"></i>'
                ) . "&nbsp;&nbsp;&nbsp;";

            if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
                $action .=
                    anchor(
                        site_url('leave_balance/update/' . $getId),
                        '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
                    ) . "&nbsp;&nbsp;&nbsp;";
            } else {
                $action .= '';
            }

            if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
                $action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'leave_balance\'; var url = \'leave_balance/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
            } else {
                $action .= '';
            }

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

    // get data by id
    function get_balance_by_emp_no($emp_no)
    {
        $this->db->select('balance');
        $this->db->where('emp_no', $emp_no);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('leave_type', $q);
        $this->db->or_like('balance', $q);
        $this->db->or_like('latestupdate', $q);
        $this->db->or_like('latestid', $q);
        $this->db->or_like('updatedate', $q);
        $this->db->or_like('emp_no', $q);
        $this->db->or_like('updateid', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('leave_type', $q);
        $this->db->or_like('balance', $q);
        $this->db->or_like('latestupdate', $q);
        $this->db->or_like('latestid', $q);
        $this->db->or_like('updatedate', $q);
        $this->db->or_like('emp_no', $q);
        $this->db->or_like('updateid', $q);
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

/* End of file Emp_leave_bal_model.php */
/* Location: ./application/models/Emp_leave_bal_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-15 12:47:08 */
/* http://harviacode.com */