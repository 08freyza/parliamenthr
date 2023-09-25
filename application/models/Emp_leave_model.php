<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emp_leave_model extends CI_Model
{

    public $table = 'emp_leave';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($emp_no = null)
    {
        if ($emp_no == null) {
            $this->db->select('id,emp_no,leave_desc,sdate,edate,total_day,status,approve_date,leave_type,approve_by,entry_user,paidadvdate,curbalance,hours,is_paidadv,next_approval,spv_approved_by,spv_approved_date,director_approved_by,director_approved_date');

            $qry = $this->db->get('vw_emp_leave')->result_array();
            $total = $this->get_total();
        } else {
            $qry = $this->get_list_by_emp_no_array($emp_no);
            $total = $this->get_total_by_emp_no_array($emp_no);
        }

        $allData = [];
        foreach ($qry as $row => $val) {
            $getId = 0;
            $allData[$row] = array_values($val);
            // $allData[$row] = $val;

            if (array_key_exists('id', $val)) {
                $getId += $val['id'];
            }

            // $action =
            //     anchor(
            //         site_url('leave/read/' . $getId),
            //         '<i class="btn btn-sm btn-info fa fa-clone"></i>'
            //     ) . "&nbsp;&nbsp;&nbsp;" . anchor(
            //         site_url('leave/update/' . $getId),
            //         '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
            //     ) . "&nbsp;&nbsp;&nbsp;" .
            //     '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'Leave\'; var url = \'leave/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';

            $action =
                anchor(
                    site_url('leave/read/' . $getId),
                    '<i class="btn btn-sm btn-info fa fa-clone"></i>'
                ) . "&nbsp;&nbsp;&nbsp;";

            if (getUpdateStatus($this->router->fetch_class()) == 'Y') {
                $action .=
                    anchor(
                        site_url('leave/update/' . $getId),
                        '<i class="btn btn-sm btn-info fa fa-pencil"></i>'
                    ) . "&nbsp;&nbsp;&nbsp;";
            } else {
                $action .= '';
            }

            if (getDeleteStatus($this->router->fetch_class()) == 'Y') {
                $action .= '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'Leave\'; var url = \'leave/delete/' . $getId . '\'; var id = \'' . $getId . '\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>';
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
        $this->db->from('vw_emp_leave');
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

    // get data by id
    function get_list_by_emp_no($empno)
    {
        $this->db->select('emp_leave.id,employee.emp_name,leave_desc,sdate,edate,total_day,status,approve_date,c.leave_name as leave_type,b.emp_name as approve_by,entry_user,paidadvdate,curbalance,hours,is_paidadv,next_approval,spv_approved_by,spv_approved_date,director_approved_by,director_approved_date');
        $this->db->where('emp_leave.emp_no', $empno);
        $this->db->join('employee', 'employee.emp_no = emp_leave.emp_no', 'left');
        $this->db->join('employee as b', 'b.emp_no = emp_leave.approve_by', 'left');
        $this->db->join('leave_setting as c', 'c.leave_setting_id = emp_leave.leave_type', 'left');
        return $this->db->get($this->table)->result();
    }

    // get data by id result array
    function get_list_by_emp_no_array($empno)
    {
        $this->db->select('emp_leave.id,employee.emp_name,leave_desc,sdate,edate,total_day,case when status = 1 then \'Need Approval\' when status = 2 then \'Approved\' when status = -1 then \'Rejected\' end AS status,approve_date,c.leave_name as leave_type,b.emp_name as approve_by,entry_user,paidadvdate,curbalance,hours,is_paidadv,next_approval,spv_approved_by,spv_approved_date,director_approved_by,director_approved_date');
        $this->db->where('emp_leave.emp_no', $empno);
        $this->db->join('employee', 'employee.emp_no = emp_leave.emp_no', 'left');
        $this->db->join('employee as b', 'b.emp_no = emp_leave.approve_by', 'left');
        $this->db->join('leave_setting as c', 'c.leave_setting_id = emp_leave.leave_type', 'left');
        return $this->db->get($this->table)->result_array();
    }

    // get data by id result array
    function get_total_by_emp_no_array($empno)
    {
        $this->db->select('emp_leave.id,employee.emp_name,leave_desc,sdate,edate,total_day,status,approve_date,c.leave_name as leave_type,b.emp_name as approve_by,entry_user,paidadvdate,curbalance,hours,is_paidadv,next_approval,spv_approved_by,spv_approved_date,director_approved_by,director_approved_date');
        $this->db->from($this->table);
        $this->db->where('emp_leave.emp_no', $empno);
        $this->db->join('employee', 'employee.emp_no = emp_leave.emp_no', 'left');
        $this->db->join('employee as b', 'b.emp_no = emp_leave.approve_by', 'left');
        $this->db->join('leave_setting as c', 'c.leave_setting_id = emp_leave.leave_type', 'left');
        return $this->db->count_all_results();
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

    function getBalance($emp_no, $leave_type)
    {
        $ret = $this->db->query('select balance from emp_leave_bal where emp_no = "' . $emp_no . '" and leave_type = "' . $leave_type . '";');
        return $ret;
    }

    function hitungCuti($emp_no, $month, $year, $leave_type)
    {
        $this->db->where(array('emp_no' => $emp_no, 'leave_type' => $leave_type, 'month(sdate)' => $month, 'year(sdate)' => $year));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function hitungCuti2($emp_no, $start, $end)
    {
        $this->db->where(array('emp_no' => $emp_no, 'sdate>=' => $start, 'sdate<=' => $end));
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function hitungCuti3($emp_no, $start, $end)
    {
        $ret = $this->db->query('select sdate, edate from vw_emp_leave where emp_no = "' . $emp_no . '" and leave_type = "' . $leave_type . '";');
        return $ret;
    }
}

/* End of file Emp_leave_model.php */
/* Location: ./application/models/Emp_leave_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-04 14:21:05 */
/* http://harviacode.com */