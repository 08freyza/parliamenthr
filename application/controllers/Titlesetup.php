<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Titlesetup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Emp_title_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('titlesetup/emp_title_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Emp_title_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_title_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'title' => $row->title,
                'title_code' => $row->title_code,
                'report_to' => $row->report_to,
                'colour' => $row->colour,
                'code' => $row->code,
            );
            $this->template->general('titlesetup/emp_title_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('titlesetup'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('titlesetup/create_action'),
            'id' => set_value('id'),
            'title' => set_value('title'),
            'title_code' => set_value('title_code'),
            'report_to' => set_value('report_to'),
            'colour' => set_value('colour', '#000000'),
            'code' => set_value('code', '1'),
        );
        $this->template->general('titlesetup/emp_title_form', $data);
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
                'title' => $this->input->post('title', TRUE),
                'title_code' => $this->input->post('title_code', TRUE),
                'report_to' => $this->input->post('report_to', TRUE),
                'colour' => $this->input->post('colour', TRUE),
                'code' => $this->input->post('code', TRUE),
            );

            $this->Emp_title_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('titlesetup'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_title_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('titlesetup/update_action'),
                'id' => set_value('id', $row->id),
                'title' => set_value('title', $row->title),
                'title_code' => set_value('title_code', $row->title_code),
                'report_to' => set_value('report_to', $row->report_to),
                'colour' => set_value('colour', $row->colour),
                'code' => set_value('code', $row->code),
            );
            $this->template->general('titlesetup/emp_title_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('titlesetup'));
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
                'title' => $this->input->post('title', TRUE),
                'title_code' => $this->input->post('title_code', TRUE),
                'report_to' => $this->input->post('report_to', TRUE),
                'colour' => $this->input->post('colour', TRUE),
                'code' => $this->input->post('code', TRUE),
            );

            $this->Emp_title_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('titlesetup'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_title_model->get_by_id($id);

        if ($row) {
            $this->Emp_title_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('titlesetup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('titlesetup'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('title_code', 'title code', 'trim|required');
        $this->form_validation->set_rules('report_to', 'report to', 'trim|required');
        $this->form_validation->set_rules('colour', 'colour', 'trim|required');
        $this->form_validation->set_rules('code', 'code', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Titlesetup.php */
/* Location: ./application/controllers/Titlesetup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-11 17:04:37 */
/* http://harviacode.com */