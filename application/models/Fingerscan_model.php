<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fingerscan_model extends CI_Model
{

    public $table = 'mfingerscan';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        // $this->datatables->select('id,sn,title,ip,port,deviceid,key,scheduled,type,status');
        // $this->datatables->from('mfingerscan');
        // //add this line for join
        // //$this->datatables->join('table2', 'mfingerscan.field = table2.field');
        // $this->datatables->add_column('action', anchor(site_url('fingerscan/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('fingerscan/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
        //     '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'mfingerscan\'; var url = \'fingerscan/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
        // return $this->datatables->generate();

        $this->db->select('id,sn,title,ip,port,deviceid,key,scheduled,type,status');
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
                    site_url('fingerscan/read/' . $getId),
                    '<i class="btn btn-sm btn-info fa fa-clone"></i>'
                ) . "&nbsp;&nbsp;&nbsp;";

            if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
                $action .=
                    anchor(
                        site_url('fingerscan/update/' . $getId),
                        '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
                    ) . "&nbsp;&nbsp;&nbsp;";
            } else {
                $action .= '';
            }

            if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
                $action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'fingerscan\'; var url = \'fingerscan/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
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
        $this->db->or_like('sn', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('ip', $q);
        $this->db->or_like('port', $q);
        $this->db->or_like('deviceid', $q);
        $this->db->or_like('key', $q);
        $this->db->or_like('scheduled', $q);
        $this->db->or_like('type', $q);
        $this->db->or_like('status', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('sn', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('ip', $q);
        $this->db->or_like('port', $q);
        $this->db->or_like('deviceid', $q);
        $this->db->or_like('key', $q);
        $this->db->or_like('scheduled', $q);
        $this->db->or_like('type', $q);
        $this->db->or_like('status', $q);
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

/* End of file Fingerscan_model.php */
/* Location: ./application/models/Fingerscan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-18 23:14:40 */
/* http://harviacode.com */