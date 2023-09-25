<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Res_booking_model extends CI_Model
{

    public $table = 'book_main';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        // $this->datatables->select('id,booking_no,requester,request_for,resource_type,resource_name,start_date,end_date,notes');
        // $this->datatables->from('book_main');
        // //add this line for join
        // //$this->datatables->join('table2', 'book_main.field = table2.field');
        // $this->datatables->add_column('action', anchor(site_url('res_booking/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('res_booking/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
        //     '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'book_main\'; var url = \'res_booking/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
        // return $this->datatables->generate();

        $this->db->select('
            book_main.id,
            book_main.booking_no,
            book_main.requester,
            book_main.request_for,
            book_type.type_desc AS resource_type,
            book_type_name.res_type_name AS resource_name,
            book_main.quantity,
            book_main.start_date,
            book_main.end_date,
            book_main.asset_id
        ');
        $this->db->from($this->table);
        $this->db->join('book_type', 'book_main.resource_type = book_type.id');
        $this->db->join('book_type_name', '
            book_main.resource_type = book_type_name.res_type AND 
            book_main.resource_name = book_type_name.res_type_id
        ');

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
                    site_url('res_booking/read/' . $getId),
                    '<i class="btn btn-sm btn-info fa fa-clone"></i>'
                ) . "&nbsp;&nbsp;&nbsp;";

            if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
                $action .=
                    anchor(
                        site_url('res_booking/update/' . $getId),
                        '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
                    ) . "&nbsp;&nbsp;&nbsp;";
            } else {
                $action .= '';
            }

            if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
                $action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'res_booking\'; var url = \'res_booking/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
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
        $this->db->or_like('booking_no', $q);
        $this->db->or_like('requester', $q);
        $this->db->or_like('request_for', $q);
        $this->db->or_like('resource_type', $q);
        $this->db->or_like('resource_name', $q);
        $this->db->or_like('quantity', $q);
        $this->db->or_like('start_date', $q);
        $this->db->or_like('end_date', $q);
        $this->db->or_like('notes', $q);
        $this->db->or_like('asset_id', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('booking_no', $q);
        $this->db->or_like('requester', $q);
        $this->db->or_like('request_for', $q);
        $this->db->or_like('resource_type', $q);
        $this->db->or_like('resource_name', $q);
        $this->db->or_like('quantity', $q);
        $this->db->or_like('start_date', $q);
        $this->db->or_like('end_date', $q);
        $this->db->or_like('notes', $q);
        $this->db->or_like('asset_id', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit and search
    function get_limit_data_book_seq($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->limit($limit, $start);
        return $this->db->get('book_seq_numbering')->result();
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

/* End of file Res_booking_model.php */
/* Location: ./application/models/Res_booking_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-11 19:31:11 */
/* http://harviacode.com */