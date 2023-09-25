<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permission_page_matches_model extends CI_Model
{

    public $table = 'uc_permission_page_matches';
    public $id = 'id';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    // function json()
    // {
    //     $this->datatables->select('id,name');
    //     $this->datatables->from('uc_permissions');
    //     //add this line for join
    //     //$this->datatables->join('table2', 'uc_permissions.field = table2.field');
    //     $this->datatables->add_column('action', anchor(site_url('permissions/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('permissions/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
    //         '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'uc_permissions\'; var url = \'permissions/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
    //     return $this->datatables->generate();
    // }

    function json()
    {
        $this->db->select('uc_permission_page_matches.id,uc_permissions.name,uc_pages.caption');
        // $this->db->from();
        $this->db->join('uc_permissions', 'uc_permissions.id=' . $this->table . '.permission_id');
        $this->db->join('uc_pages', 'uc_pages.id=' . $this->table . '.page_id');
        $this->db->order_by($this->table . '.permission_id ASC,' . $this->table . '.page_id ASC');

        $qry = $this->db->get($this->table)->result_array();
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
                anchor(
                    site_url('permission_page_matches/read/' . $getId),
                    '<i class="btn btn-sm btn-info fa fa-clone"></i>'
                ) . "&nbsp;&nbsp;&nbsp;";

            if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
                $action .=
                    anchor(
                        site_url('permission_page_matches/update/' . $getId),
                        '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
                    ) . "&nbsp;&nbsp;&nbsp;";
            } else {
                $action .= '';
            }

            if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
                $action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'Permissions Page Matches\'; var url = \'permission_page_matches/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
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

    function get_total()
    {
        $this->db->from($this->table);
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

    // get all header menu by permission id
    function get_all_header_by_permission_id($permission_id)
    {
        $this->db->select('uc_permission_page_matches.id, uc_permission_page_matches.permission_id, uc_permission_page_matches.page_id, uc_pages.page, uc_pages.caption, uc_pages.parentids, uc_pages.class, uc_pages.icon, uc_pages.queue');
        $this->db->join('uc_pages', 'uc_permission_page_matches.page_id = uc_pages.id');
        $this->db->where('uc_permission_page_matches.permission_id', $permission_id);
        $this->db->where('uc_pages.parentids', '');
        $this->db->order_by('uc_pages.queue', 'ASC');
        $this->db->order_by('uc_pages.id', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get all header menu by permission id
    function get_all_subordinate_by_permission_id($permission_id, $parent_id)
    {
        $this->db->select('uc_permission_page_matches.id, uc_permission_page_matches.permission_id, uc_permission_page_matches.page_id, uc_pages.page, uc_pages.caption, uc_pages.parentids, uc_pages.class, uc_pages.icon, uc_pages.queue');
        $this->db->join('uc_pages', 'uc_permission_page_matches.page_id = uc_pages.id');
        $this->db->where('uc_permission_page_matches.permission_id', $permission_id);
        $this->db->where('uc_pages.parentids', $parent_id);
        $this->db->order_by('uc_pages.queue', 'ASC');
        $this->db->order_by('uc_pages.id', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_permission_id_class($permission_id, $class)
    {
        $this->db->select('uc_permission_page_matches.id, uc_permission_page_matches.permission_id, uc_permission_page_matches.page_id, uc_pages.page, uc_pages.caption, uc_pages.parentids, uc_pages.class, uc_pages.icon, uc_pages.queue');
        $this->db->join('uc_pages', 'uc_permission_page_matches.page_id = uc_pages.id');
        $this->db->where('uc_permission_page_matches.permission_id', $permission_id);
        $this->db->where('uc_pages.class', $class);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_class($permission_id, $class, $parent_id)
    {
        $this->db->select('uc_permission_page_matches.id, uc_permission_page_matches.permission_id, uc_permission_page_matches.page_id, uc_pages.page, uc_pages.caption, uc_pages.parentids, uc_pages.class, uc_pages.icon, uc_pages.queue');
        $this->db->join('uc_pages', 'uc_permission_page_matches.page_id = uc_pages.id');
        $this->db->where('uc_permission_page_matches.permission_id', $permission_id);
        $this->db->where('uc_pages.class', $class);
        $this->db->where('uc_pages.parentids', $parent_id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('name', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('name', $q);
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

/* End of file Permissions_model.php */
/* Location: ./application/models/Permissions_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-15 07:15:06 */
/* http://harviacode.com */