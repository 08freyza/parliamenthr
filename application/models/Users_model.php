<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public $table = 'uc_users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($email = null)
    {
        if ($email == null) {
            // $this->datatables->select('id,user_name,display_name,password,email,activation_token,last_activation_request,lost_password_request,active,title,sign_up_stamp,last_sign_in_stamp');
            // $this->datatables->from('uc_users');
            // //add this line for join
            // //$this->datatables->join('table2', 'uc_users.field = table2.field');
            // $this->datatables->add_column('action', anchor(site_url('users/read/$1'), '<i class="btn btn-sm btn-info fa fa-clone"></i>') . "&nbsp;&nbsp;&nbsp;" . anchor(site_url('users/update/$1'), '<i class="btn btn-sm btn-info fa fa-pencil"></i>') . "&nbsp;&nbsp;&nbsp;" .
            //     '<a class="btn btn-sm btn-danger" href="#" onClick="var action = \'delete\'; var page = \'uc_users\'; var url = \'users/delete/$1\'; var id = \'$1\';  confirmation(action,page,url,id); "><i class="fa fa-trash"></i></a>', 'id');
            // return $this->datatables->generate();

            $this->db->select('id,user_name,display_name,password,email,activation_token,last_activation_request,lost_password_request,active,title,sign_up_stamp,last_sign_in_stamp');

            $qry = $this->db->get($this->table)->result();
        } else {
            $qry = $this->get_by_email($email);
        }
        if (count($qry) > 0) {
            $res = '{"draw":0,"recordsTotal":' . count($qry) . ',"recordsFiltered":' . count($qry) . ',"data":[';
            foreach ($qry as $row) {
                $res .= '{';
                $res .= '"id":"' . $row->id . '",';
                $res .= '"user_name":"' . $row->user_name . '",';
                $res .= '"display_name":"' . $row->display_name . '",';
                $res .= '"password":"' . $row->password . '",';
                $res .= '"email":"' . $row->email . '",';
                $res .= '"activation_token":"' . $row->activation_token . '",';
                $res .= '"last_activation_request":"' . $row->last_activation_request . '",';
                $res .= '"lost_password_request":"' . $row->lost_password_request . '",';
                $res .= '"active":"' . $row->active . '",';
                $res .= '"title":"' . $row->title . '",';
                $res .= '"sign_up_stamp":"' . $row->sign_up_stamp . '",';
                $res .= '"last_sign_in_stamp":"' . $row->last_sign_in_stamp . '",';
                $res .= '"action":"<a href=\"' . base_url() . 'users/read/' . $row->id . '\"><i class=\"btn btn-sm btn-info fa fa-clone\"></i></a>&nbsp;&nbsp;&nbsp;';
                if (getUpdateStatus($this->router->fetch_class()) == 'Y')
                    $res .= '<a href=\"' . base_url() . 'users/update/' . $row->id . '\"><i class=\"btn btn-sm btn-info fa fa-pencil\"></i></a>&nbsp;&nbsp;&nbsp;';
                else
                    $res .= '';
                if (getDeleteStatus($this->router->fetch_class()) == 'Y')
                    $res .= '<a class=\"btn btn-sm btn-danger\" href=\"#\" onClick=\"var action = \'delete\'; var page = \'uc_users\'; var url = \'users/delete/' . $row->id . '\'; var id = \'1\';  confirmation(action,page,url,id); \"><i class=\"fa fa-trash\"></i></a>"';
                else
                    $res .= '"';

                $res .= '},';
            }
            $res = substr($res, 0, strlen($res) - 1);
            $res .= ']}';
        } else {
            $res = '{"draw":0,"recordsTotal":0,"recordsFiltered":0,"data":[]}';
        }

        json_decode($res);
        return $res;
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

    // get data by email
    function get_by_email($email)
    {
        $this->db->select('id,user_name,display_name,password,email,activation_token,last_activation_request,lost_password_request,active,title,sign_up_stamp,last_sign_in_stamp');
        $this->db->from('uc_users');
        $this->db->where('email', $email);
        return $this->db->get()->result();
    }

    // get data by email
    function get_one_by_email($email)
    {
        $this->db->select('user_name,email');
        $this->db->from($this->table);
        $this->db->where('email', $email);
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('user_name', $q);
        $this->db->or_like('display_name', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('activation_token', $q);
        $this->db->or_like('last_activation_request', $q);
        $this->db->or_like('lost_password_request', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('sign_up_stamp', $q);
        $this->db->or_like('last_sign_in_stamp', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('user_name', $q);
        $this->db->or_like('display_name', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('activation_token', $q);
        $this->db->or_like('last_activation_request', $q);
        $this->db->or_like('lost_password_request', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('title', $q);
        $this->db->or_like('sign_up_stamp', $q);
        $this->db->or_like('last_sign_in_stamp', $q);
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

    // update data
    function update_status_lost_password($email, $status = 'N')
    {
        $this->db->set('lost_password_request', $status);
        $this->db->where('email', $email);
        $this->db->update($this->table);
    }

    // only update password
    function update_password($email, $pass)
    {
        $this->db->set('password', $pass);
        $this->db->where('email', $email);
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