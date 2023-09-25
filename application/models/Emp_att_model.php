<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emp_att_model extends CI_Model
{

    public $table = 'absen';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        // $this->datatables->select('emp_department.name as department,absen.id,employee.emp_name as emp_no,absen.start_time,absen.end_time,absen.ot,absen.lunch_out,absen.lunch_in,absen.type');
        // $this->datatables->from('absen');
        // //add this line for join
        // $this->datatables->join('employee', 'absen.emp_no=employee.emp_no');
        // $this->datatables->join('emp_department', 'employee.department=emp_department.id');
        // // $this->datatables->add_column('action', anchor(site_url('emp_att/read/$1'),'<i class="btn btn-sm btn-info fa fa-clone"></i>')."&nbsp;&nbsp;&nbsp;".anchor(site_url('emp_att/update/$1'),'<i class="btn btn-sm btn-info fa fa-pencil"></i>')."&nbsp;&nbsp;&nbsp;".
        // // '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'absen\'; var url = \'emp_att/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>','id');
        // return $this->datatables->generate();

        $this->db->select('emp_department.name as department,absen.id,employee.emp_name as emp_no,absen.start_time,absen.end_time,absen.ot,absen.lunch_out,absen.lunch_in,absen.type');
        $this->db->from($this->table);
        $this->db->join('employee', 'absen.emp_no=employee.emp_no');
        $this->db->join('emp_department', 'employee.department=emp_department.id');

        $qry = $this->db->get()->result_array();
        $total = $this->get_total();
        $allData = [];

        foreach ($qry as $row => $val) {
            $getId = 0;
            $allData[$row] = array_values($val);

            if (array_key_exists('id', $val)) {
                $getId += $val['id'];
            }

            $action = '';

            if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
                $action .=
                    anchor(
                        site_url('emp_att/update/' . $getId),
                        '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
                    ) . "&nbsp;&nbsp;&nbsp;";
            } else {
                $action .= '';
            }

            if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
                $action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'emp_att\'; var url = \'emp_att/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
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
        $this->db->or_like('emp_no', $q);
        $this->db->or_like('start_time', $q);
        $this->db->or_like('end_time', $q);
        $this->db->or_like('ot', $q);
        $this->db->or_like('lunch_out', $q);
        $this->db->or_like('lunch_in', $q);
        $this->db->or_like('type', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('emp_no', $q);
        $this->db->or_like('start_time', $q);
        $this->db->or_like('end_time', $q);
        $this->db->or_like('ot', $q);
        $this->db->or_like('lunch_out', $q);
        $this->db->or_like('lunch_in', $q);
        $this->db->or_like('type', $q);
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

    function hitungAbsen($emp_no, $month, $year)
    {
        $this->db->where(array('emp_no' => $emp_no, 'month(start_time)' => $month, 'year(start_time)' => $year));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function hitungAbsen2($emp_no, $start, $end)
    {
        $this->db->where(array('emp_no' => $emp_no, 'start_time>=' => $start, 'start_time<=' => $end));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function hitungLateness($date, $timesta, $timeend)
    {
        $this->db->select('absen.emp_no, absen.start_time, emp_department.name, employee.emp_name')
            ->from('absen')
            ->join('employee', 'absen.emp_no=employee.emp_no')
            ->join('emp_department', 'emp_department.id=employee.department')
            ->where('start_time>', $date . ' ' . $timesta . ':00')
            ->where('start_time<', $date . ' ' . $timeend . ':59');
        return $this->db->get()->result();
    }
}

/* End of file Emp_att_model.php */
/* Location: ./application/models/Emp_att_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-15 15:25:48 */
/* http://harviacode.com */