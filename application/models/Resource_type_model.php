<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resource_type_model extends CI_Model
{

    public $table = 'book_type';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        // $this->datatables->select('id,type_desc');
        // $this->datatables->from('book_type');
        // //add this line for join
        // //$this->datatables->join('table2', 'book_type.field = table2.field');
        // $this->datatables->add_column('action', anchor(site_url('resource_type/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('resource_type/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
        //     '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'book_type\'; var url = \'resource_type/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
        // return $this->datatables->generate();

        $this->db->select('id,type_desc');
        $this->db->from($this->table);

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
                    site_url('resource_type/read/' . $getId),
                    '<i class="btn btn-sm btn-info fa fa-clone"></i>'
                ) . "&nbsp;&nbsp;&nbsp;";

            if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
                $action .=
                    anchor(
                        site_url('resource_type/update/' . $getId),
                        '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
                    ) . "&nbsp;&nbsp;&nbsp;";
            } else {
                $action .= '';
            }

            if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
                $action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'resource_type\'; var url = \'resource_type/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
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

    // get all res type name by res id
    function get_all_res_name_by_res_id($resType = null, $resTypeId = null)
    {
        $this->db->where('res_type', $resType);
        if ($resTypeId != null) {
            $this->db->where('res_type_id', $resTypeId);
        }
        $this->db->order_by($this->id, $this->order);
        return $this->db->get('book_type_name')->result();
    }

    // get all res type name
    function get_all_res_name()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get('book_type_name')->result();
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
        $this->db->or_like('type_desc', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('type_desc', $q);
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

/* End of file Resource_type_model.php */
/* Location: ./application/models/Resource_type_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-14 13:25:00 */
/* http://harviacode.com */