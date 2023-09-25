<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Roles_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('roles/uc_user_permission_matches_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Roles_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Roles_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'user_id' => $row->user_id,
                'permission_Id' => $row->permission_Id,
            );
            $this->template->general('roles/uc_user_permission_matches_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('roles'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('roles/create_action'),
            'id' => set_value('id'),
            'user_id' => set_value('user_id'),
            'permission_Id' => set_value('permission_Id'),
        );
        $this->template->general('roles/uc_user_permission_matches_form', $data);
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
                'user_id' => $this->input->post('user_id', TRUE),
                'permission_Id' => $this->input->post('permission_Id', TRUE),
            );

            $this->Roles_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('roles'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Roles_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('roles/update_action'),
                'id' => set_value('id', $row->id),
                'user_id' => set_value('user_id', $row->user_id),
                'permission_Id' => set_value('permission_Id', $row->permission_Id),
            );
            $this->template->general('roles/uc_user_permission_matches_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('roles'));
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
                'user_id' => $this->input->post('user_id', TRUE),
                'permission_Id' => $this->input->post('permission_Id', TRUE),
            );

            $this->Roles_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('roles'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Roles_model->get_by_id($id);

        if ($row) {
            $this->Roles_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('roles'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('roles'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('user_id', 'user id', 'trim|required');
        $this->form_validation->set_rules('permission_Id', 'permission id', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Roles.php */
/* Location: ./application/controllers/Roles.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-15 07:09:50 */
/* http://harviacode.com */