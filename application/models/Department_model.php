<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department_model extends CI_Model
{

    public $table = 'emp_department';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        // $this->datatables->select('emp_department.id,emp_department.name,emp_ministry.name as ministryid,emp_division.name as divisionid,emp_department.report_to');
        // $this->datatables->from('emp_department');
        // //add this line for join
        // $this->datatables->join('emp_ministry', 'emp_department.ministryid=emp_ministry.id', 'left');
        // $this->datatables->join('emp_division', 'emp_department.divisionid=emp_division.id', 'left');
        // $this->datatables->add_column('action', anchor(site_url('deptsetup/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('deptsetup/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
        //     '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'emp_department\'; var url = \'deptsetup/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
        // return $this->datatables->generate();

        $this->db->select('emp_department.id,emp_department.name,emp_ministry.name as ministryid,emp_division.name as divisionid,emp_department.report_to');
        $this->db->from('emp_department');
        $this->db->join('emp_ministry', 'emp_department.ministryid=emp_ministry.id', 'left');
        $this->db->join('emp_division', 'emp_department.divisionid=emp_division.id', 'left');

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
                    site_url('deptsetup/read/' . $getId),
                    '<i class="btn btn-sm btn-info fa fa-clone"></i>'
                ) . "&nbsp;&nbsp;&nbsp;";

            if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
                $action .=
                    anchor(
                        site_url('deptsetup/update/' . $getId),
                        '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
                    ) . "&nbsp;&nbsp;&nbsp;";
            } else {
                $action .= '';
            }

            if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
                $action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'deptsetup\'; var url = \'deptsetup/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
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

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('ministryid', $q);
        $this->db->or_like('divisionid', $q);
        $this->db->or_like('report_to', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('ministryid', $q);
        $this->db->or_like('divisionid', $q);
        $this->db->or_like('report_to', $q);
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

/* End of file Department_model.php */
/* Location: ./application/models/Department_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-02 14:02:02 */
/* http://harviacode.com */