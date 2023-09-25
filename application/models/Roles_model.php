<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles_model extends CI_Model
{

    public $table = 'uc_user_permission_matches';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        // $this->datatables->select('uc_user_permission_matches.id,employee.emp_name as user_id,uc_permissions.name as permission_id');
        // $this->datatables->from('uc_user_permission_matches');
        // $this->datatables->join('employee', 'uc_user_permission_matches.user_id = employee.emp_no');
        // $this->datatables->join('uc_permissions', 'uc_user_permission_matches.permission_Id = uc_permissions.id');
        // //add this line for join
        // //$this->datatables->join('table2', 'uc_user_permission_matches.field = table2.field');
        // $this->datatables->add_column('action', anchor(site_url('roles/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('roles/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
        //     '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'uc_user_permission_matches\'; var url = \'roles/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
        // return $this->datatables->generate();

        $this->db->select('uc_user_permission_matches.id,employee.emp_name as emp_name,uc_permissions.name as permission_role');
        $this->db->from($this->table);
        $this->db->join('employee', 'uc_user_permission_matches.user_id = employee.emp_no AND employee.active_status = \'Y\'');
        $this->db->join('uc_permissions', 'uc_user_permission_matches.permission_Id = uc_permissions.id');
        // $this->db->where('employee.active_status', 'Y');

        $qry = $this->db->get()->result_array();
        $total = $this->db->count_all_results();

        $allData = [];
        foreach ($qry as $row => $val) {
            $getId = 0;
            $allData[$row] = array_values($val);

            if (array_key_exists('id', $val)) {
                $getId += $val['id'];
            }

            $action =
                anchor(
                    site_url('roles/read/' . $getId),
                    '<i class="btn btn-sm btn-info fa fa-clone"></i>'
                ) . "&nbsp;&nbsp;&nbsp;";

            if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
                $action .=
                    anchor(
                        site_url('roles/update/' . $getId),
                        '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
                    ) . "&nbsp;&nbsp;&nbsp;";
            } else {
                $action .= '';
            }

            if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
                $action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'Roles\'; var url = \'roles/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
            } else {
                $action .= '';
            }
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

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_total()
    {
        $this->db->from('uc_user_permission_matches');
        return $this->db->count_all_results();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by user id
    function get_by_user_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('user_id', $q);
        $this->db->or_like('permission_Id', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('user_id', $q);
        $this->db->or_like('permission_Id', $q);
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

/* End of file Roles_model.php */
/* Location: ./application/models/Roles_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-15 07:09:50 */
/* http://harviacode.com */