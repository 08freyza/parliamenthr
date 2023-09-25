<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('users/uc_users_list');
    }

    public function json()
    {
        $email = null;
        if (isAdmin() == FALSE) $email = $this->session->userdata('username');
        header('Content-Type: application/json');
        echo $this->Users_model->json($email);
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'user_name' => $row->user_name,
                'display_name' => $row->display_name,
                'password' => $row->password,
                'email' => $row->email,
                'activation_token' => $row->activation_token,
                'last_activation_request' => $row->last_activation_request,
                'lost_password_request' => $row->lost_password_request,
                'active' => $row->active,
                'title' => $row->title,
                'sign_up_stamp' => $row->sign_up_stamp,
                'last_sign_in_stamp' => $row->last_sign_in_stamp,
            );
            $this->template->general('users/uc_users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
            'id' => set_value('id'),
            'user_name' => set_value('user_name'),
            'display_name' => set_value('display_name'),
            'password' => set_value('password'),
            'email' => set_value('email'),
            'activation_token' => set_value('activation_token', md5('vanuatuhrgovernment')),
            'last_activation_request' => set_value('last_activation_request', 0),
            'lost_password_request' => set_value('lost_password_request', 'N'),
            'active' => set_value('active'),
            'title' => set_value('title', '-'),
            'sign_up_stamp' => set_value('sign_up_stamp', date('Y-m-d h:i:s')),
            'last_sign_in_stamp' => set_value('last_sign_in_stamp', date('Y-m-d h:i:s')),
        );
        $this->template->general('users/uc_users_form', $data);
    }

    public function create_action()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'user_name' => $this->input->post('user_name', TRUE),
                'display_name' => $this->input->post('user_name', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'email' => $this->input->post('email', TRUE),
                'activation_token' => $this->input->post('activation_token', TRUE),
                'last_activation_request' => $this->input->post('last_activation_request', TRUE),
                'lost_password_request' => $this->input->post('lost_password_request', TRUE),
                'active' => $this->input->post('active', TRUE),
                'title' => $this->input->post('title', TRUE),
                'sign_up_stamp' => $this->input->post('sign_up_stamp', TRUE),
                'last_sign_in_stamp' => $this->input->post('last_sign_in_stamp', TRUE),
            );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
                'id' => set_value('id', $row->id),
                'user_name' => set_value('user_name', $row->user_name),
                'display_name' => set_value('display_name', $row->display_name),
                'password' => set_value('password', $row->password),
                'email' => set_value('email', $row->email),
                'activation_token' => set_value('activation_token', $row->activation_token),
                'last_activation_request' => set_value('last_activation_request', $row->last_activation_request),
                'lost_password_request' => set_value('lost_password_request', $row->lost_password_request),
                'active' => set_value('active', $row->active),
                'title' => set_value('title', $row->title),
                'sign_up_stamp' => set_value('sign_up_stamp', $row->sign_up_stamp),
                'last_sign_in_stamp' => set_value('last_sign_in_stamp', date('Y-m-d h:i:s')),
            );
            $this->template->general('users/uc_users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function update_action()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'user_name' => $this->input->post('user_name', TRUE),
                'display_name' => $this->input->post('display_name', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'email' => $this->input->post('email', TRUE),
                'activation_token' => $this->input->post('activation_token', TRUE),
                'last_activation_request' => $this->input->post('last_activation_request', TRUE),
                'lost_password_request' => $this->input->post('lost_password_request', TRUE),
                'active' => $this->input->post('active', TRUE),
                'title' => $this->input->post('title', TRUE),
                'sign_up_stamp' => $this->input->post('sign_up_stamp', TRUE),
                'last_sign_in_stamp' => $this->input->post('last_sign_in_stamp', TRUE),
            );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules()
    {
        // 	$this->form_validation->set_rules('user_name', 'user name', 'trim|required');
        // 	$this->form_validation->set_rules('display_name', 'display name', 'trim|required');
        // 	$this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('activation_token', 'activation token', 'trim|required');
        $this->form_validation->set_rules('last_activation_request', 'last activation request', 'trim|required');
        $this->form_validation->set_rules('lost_password_request', 'lost password request', 'trim|required');
        $this->form_validation->set_rules('active', 'active', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('sign_up_stamp', 'sign up stamp', 'trim|required');
        $this->form_validation->set_rules('last_sign_in_stamp', 'last sign in stamp', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-12 06:13:58 */
/* http://harviacode.com */