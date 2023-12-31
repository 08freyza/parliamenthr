<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Familysetup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Family_relationship_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('familysetup/emp_family_relationship_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Family_relationship_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Family_relationship_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'name' => $row->name,
            );
            $this->template->general('familysetup/emp_family_relationship_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('familysetup'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('familysetup/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
        );
        $this->template->general('familysetup/emp_family_relationship_form', $data);
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
                'name' => $this->input->post('name', TRUE),
            );

            $this->Family_relationship_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('familysetup'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Family_relationship_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('familysetup/update_action'),
                'id' => set_value('id', $row->id),
                'name' => set_value('name', $row->name),
            );
            $this->template->general('familysetup/emp_family_relationship_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('familysetup'));
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
                'name' => $this->input->post('name', TRUE),
            );

            $this->Family_relationship_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('familysetup'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Family_relationship_model->get_by_id($id);

        if ($row) {
            $this->Family_relationship_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('familysetup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('familysetup'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Familysetup.php */
/* Location: ./application/controllers/Familysetup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-02 12:14:38 */
/* http://harviacode.com */