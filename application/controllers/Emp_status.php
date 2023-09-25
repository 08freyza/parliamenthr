<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emp_status extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Emp_status_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('emp_status/employee_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Emp_status_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_status_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'emp_no' => $row->emp_no,
                'emp_name' => $row->emp_name,
                'emp_status' => $row->emp_status,
                'joindate' => $row->joindate,                'eoc' => $row->eoc
            );
            $this->template->general('emp_status/employee_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('emp_status'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('emp_status/create_action'),
            'id' => set_value('id'),
            'emp_no' => set_value('emp_no'),
            'emp_name' => set_value('emp_name'),
            'emp_status' => set_value('emp_status'),
            'joindate' => set_value('joindate'),        'eoc' => set_value('eoc')
        );
        $this->template->general('emp_status/employee_form', $data);
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
                'emp_no' => $this->input->post('emp_no', TRUE),
                'emp_name' => $this->input->post('emp_name', TRUE),
                'emp_status' => $this->input->post('emp_status', TRUE),
                'joindate' => $this->input->post('joindate', TRUE),        'eoc' => $this->input->post('eoc', TRUE)
            );

            $this->Emp_status_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('emp_status'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_status_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('emp_status/update_action'),
                'id' => set_value('id', $row->id),
                'emp_no' => set_value('emp_no', $row->emp_no),
                'emp_name' => set_value('emp_name', $row->emp_name),
                'emp_status' => set_value('emp_status', $row->emp_status),
                'joindate' => set_value('joindate', $row->joindate),        'eoc' => set_value('joindate', $row->eoc)
            );
            $this->template->general('emp_status/employee_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('emp_status'));
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
                'emp_no' => $this->input->post('emp_no', TRUE),
                'emp_name' => $this->input->post('emp_name', TRUE),
                'emp_status' => $this->input->post('emp_status', TRUE),
                'joindate' => $this->input->post('joindate', TRUE),        'eoc' => $this->input->post('eoc', TRUE)
            );

            $this->Emp_status_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('emp_status'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_status_model->get_by_id($id);

        if ($row) {
            $this->Emp_status_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('emp_status'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('emp_status'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
        $this->form_validation->set_rules('emp_name', 'emp name', 'trim|required');
        $this->form_validation->set_rules('emp_status', 'emp status', 'trim|required');
        $this->form_validation->set_rules('joindate', 'joindate', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Emp_status.php */
/* Location: ./application/controllers/Emp_status.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-14 14:02:52 */
/* http://harviacode.com */