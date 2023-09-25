<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permission_page_matches extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permission_page_matches_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('permission_page_matches/uc_permission_page_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Permission_page_matches_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Permission_page_matches_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'permission_id' => $row->permission_id,
                'page_id' => $row->page_id,
                'create_active' => $row->create_active,
                'update_active' => $row->update_active,
                'delete_active' => $row->delete_active,
            );
            $this->template->general('permission_page_matches/uc_permission_page_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permission_page_matches'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('permission_page_matches/create_action'),
            'id' => set_value('id'),
            'permission_id' => set_value('permission'),
            'page_id' => set_value('page'),
            'create_active' => set_value('create_active', 'N'),
            'update_active' => set_value('update_active', 'N'),
            'delete_active' => set_value('delete_active', 'N'),
        );
        $this->template->general('permission_page_matches/uc_permission_page_form', $data);
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
                'permission_id' => $this->input->post('permission_id', TRUE),
                'page_id' => $this->input->post('page_id', TRUE),
                'create_active' => $this->input->post('create_active', TRUE),
                'update_active' => $this->input->post('update_active', TRUE),
                'delete_active' => $this->input->post('delete_active', TRUE),
            );

            $this->Permission_page_matches_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('permission_page_matches'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Permission_page_matches_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('permission_page_matches/update_action'),
                'id' => set_value('id', $row->id),
                'permission_id' => set_value('permission_id', $row->permission_id),
                'page_id' => set_value('page_id', $row->page_id),
                'create_active' => set_value('create_active', $row->create_active),
                'update_active' => set_value('update_active', $row->update_active),
                'delete_active' => set_value('delete_active', $row->delete_active),
            );
            $this->template->general('permission_page_matches/uc_permission_page_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permission_page_matches'));
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
                'permission_id' => $this->input->post('permission_id', TRUE),
                'page_id' => $this->input->post('page_id', TRUE),
                'create_active' => $this->input->post('create_active', TRUE),
                'update_active' => $this->input->post('update_active', TRUE),
                'delete_active' => $this->input->post('delete_active', TRUE),
            );

            $this->Permission_page_matches_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('permission_page_matches'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Permission_page_matches_model->get_by_id($id);

        if ($row) {
            $this->Permission_page_matches_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('permission_page_matches'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permission_page_matches'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('permission_id', 'permission_id', 'trim|required');
        $this->form_validation->set_rules('page_id', 'page_id', 'trim|required');
        $this->form_validation->set_rules('create_active', 'create_active', 'trim|required');
        $this->form_validation->set_rules('update_active', 'update_active', 'trim|required');
        $this->form_validation->set_rules('delete_active', 'delete_active', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-15 07:15:06 */
/* http://harviacode.com */