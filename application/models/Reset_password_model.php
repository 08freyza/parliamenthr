<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reset_password_model extends CI_Model
{

    public $table = 'uc_reset_password';
    public $id = 'id';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($email = null)
    {
        // if ($email == null) {
        //     $this->datatables->select('id,user_name,display_name,password,email,activation_token,last_activation_request,lost_password_request,active,title,sign_up_stamp,last_sign_in_stamp');
        //     $this->datatables->from('uc_users');
        //     //add this line for join
        //     //$this->datatables->join('table2', 'uc_users.field = table2.field');
        //     $this->datatables->add_column('action', anchor(site_url('users/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('users/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
        //         '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'uc_users\'; var url = \'users/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
        //     return $this->datatables->generate();
        // } else {
        //     $qry = $this->get_by_email($email);

        //     if (count($qry) > 0) {
        //         $res = '{"draw":0,"recordsTotal":' . count($qry) . ',"recordsFiltered":' . count($qry) . ',"data":[';
        //         foreach ($qry as $row) {
        //             $res .= '{';
        //             $res .= '"id":"' . $row->id . '",';
        //             $res .= '"user_name":"' . $row->user_name . '",';
        //             $res .= '"display_name":"' . $row->display_name . '",';
        //             $res .= '"password":"' . $row->password . '",';
        //             $res .= '"email":"' . $row->email . '",';
        //             $res .= '"activation_token":"' . $row->activation_token . '",';
        //             $res .= '"last_activation_request":"' . $row->last_activation_request . '",';
        //             $res .= '"lost_password_request":"' . $row->lost_password_request . '",';
        //             $res .= '"active":"' . $row->active . '",';
        //             $res .= '"title":"' . $row->title . '",';
        //             $res .= '"sign_up_stamp":"' . $row->sign_up_stamp . '",';
        //             $res .= '"last_sign_in_stamp":"' . $row->last_sign_in_stamp . '",';
        //             $res .= '"action":"<a href=\"' . base_url() . 'users/read/' . $row->id . '\"><i class=\"btn btn-sm btn-info fa fa-clone\"></i></a>&nbsp;&nbsp;&nbsp;<a href=\"' . base_url() . 'users/update/' . $row->id . '\"><i class=\"btn btn-sm btn-info fa fa-pencil\"></i></a>&nbsp;&nbsp;&nbsp;';
        //             if (isAdmin() == TRUE)
        //                 $res .= '<a class=\"btn btn-sm btn-danger\" href=\"#\" onClick=\"var action = \'delete\'; var page = \'uc_users\'; var url = \'users/delete/' . $row->id . '\'; var id = \'1\';  confirmation(action,page,url,id); \"><i class=\"fa fa-trash\"></i></a>"';
        //             else
        //                 $res .= '"';

        //             $res .= '},';
        //         }
        //         $res = substr($res, 0, strlen($res) - 1);
        //         $res .= ']}';
        //     } else {
        //         $res = '{"draw":0,"recordsTotal":0,"recordsFiltered":0,"data":[]}';
        //     }

        //     json_decode($res);
        //     return $res;
        // }
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

    // get data by email
    function get_by_email($email)
    {
        $this->db->from($this->table);
        $this->db->where('email', $email);
        return $this->db->get()->result();
    }

    // get data by email
    function get_one_by_email_token($email, $token)
    {
        $this->db->from($this->table);
        $this->db->where('email', $email);
        $this->db->where('reset_token', $token);
        $this->db->where('has_used', 'N');
        return $this->db->get()->row();
    }

    // get data by email
    function get_one_by_id_token($id, $token)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $this->db->where('reset_token', $token);
        $this->db->where('has_used', 'N');
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('reset_token', $q);
        $this->db->or_like('token', $q);
        $this->db->or_like('has_used', $q);
        $this->db->or_like('reset_date', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('reset_token', $q);
        $this->db->or_like('token', $q);
        $this->db->or_like('has_used', $q);
        $this->db->or_like('reset_date', $q);
        $this->db->from($this->table);
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

    // only update status
    function update_status($id, $email, $token, $status = 'Y')
    {
        $this->db->set('has_used', $status);
        $this->db->where('id', $id);
        $this->db->where('email', $email);
        $this->db->where('reset_token', $token);
        $this->db->update($this->table);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-12 06:13:58 */
/* http://harviacode.com */