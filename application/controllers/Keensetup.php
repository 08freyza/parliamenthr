<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keensetup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Keen_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('keensetup/emp_keen_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Keen_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Keen_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'name' => $row->name,
                'title' => $row->title,
            );
            $this->template->general('keensetup/emp_keen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('keensetup'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('keensetup/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'title' => set_value('title'),
        );
        $this->template->general('keensetup/emp_keen_form', $data);
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
                'title' => $this->input->post('title', TRUE),
            );

            $this->Keen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('keensetup'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Keen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('keensetup/update_action'),
                'id' => set_value('id', $row->id),
                'name' => set_value('name', $row->name),
                'title' => set_value('title', $row->title),
            );
            $this->template->general('keensetup/emp_keen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('keensetup'));
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
                'title' => $this->input->post('title', TRUE),
            );

            $this->Keen_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('keensetup'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Keen_model->get_by_id($id);

        if ($row) {
            $this->Keen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('keensetup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('keensetup'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Keensetup.php */
/* Location: ./application/controllers/Keensetup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-02 12:25:06 */
/* http://harviacode.com */