<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deptsetup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Department_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('deptsetup/emp_department_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Department_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Department_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'name' => $row->name,
                'ministryid' => $row->ministryid,
                'divisionid' => $row->divisionid,
                'report_to' => $row->report_to,
            );
            $this->template->general('deptsetup/emp_department_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('deptsetup'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('deptsetup/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'ministryid' => set_value('ministryid'),
            'divisionid' => set_value('divisionid'),
            'report_to' => set_value('report_to'),
        );
        $this->template->general('deptsetup/emp_department_form', $data);
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
                'ministryid' => $this->input->post('ministryid', TRUE),
                'divisionid' => $this->input->post('divisionid', TRUE),
                'report_to' => $this->input->post('report_to', TRUE),
            );

            $this->Department_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('deptsetup'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Department_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('deptsetup/update_action'),
                'id' => set_value('id', $row->id),
                'name' => set_value('name', $row->name),
                'ministryid' => set_value('ministryid', $row->ministryid),
                'divisionid' => set_value('divisionid', $row->divisionid),
                'report_to' => set_value('report_to', $row->report_to),
            );
            $this->template->general('deptsetup/emp_department_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('deptsetup'));
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
                'ministryid' => $this->input->post('ministryid', TRUE),
                'divisionid' => $this->input->post('divisionid', TRUE),
                'report_to' => $this->input->post('report_to', TRUE),
            );

            $this->Department_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('deptsetup'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Department_model->get_by_id($id);

        if ($row) {
            $this->Department_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('deptsetup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('deptsetup'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('ministryid', 'ministryid', 'trim|required');
        $this->form_validation->set_rules('divisionid', 'divisionid', 'trim|required');
        $this->form_validation->set_rules('report_to', 'report to', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Deptsetup.php */
/* Location: ./application/controllers/Deptsetup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-02 14:02:02 */
/* http://harviacode.com */