<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Awardhistory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Awardhistory_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->general('awardhistory/emp_award_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Awardhistory_model->json();
    }

    public function read($id)
    {
        $row = $this->Awardhistory_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'award_no' => $row->award_no,
                'emp_no' => $row->emp_no,
                'award_category' => $row->award_category,
                'award_cert' => $row->award_cert,
                'award_date' => $row->award_date,
                'remark' => $row->remark,
            );
            $this->template->general('awardhistory/emp_award_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('awardhistory'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('awardhistory/create_action'),
            'id' => set_value('id'),
            'award_no' => set_value('award_no'),
            'emp_no' => set_value('emp_no'),
            'award_category' => set_value('award_category'),
            'award_cert' => set_value('award_cert'),
            'award_date' => set_value('award_date'),
            'remark' => set_value('remark'),
        );
        $this->template->general('awardhistory/emp_award_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'award_no' => $this->input->post('award_no', TRUE),
                'emp_no' => $this->input->post('emp_no', TRUE),
                'award_category' => $this->input->post('award_category', TRUE),
                'award_cert' => $this->input->post('award_cert', TRUE),
                'award_date' => $this->input->post('award_date', TRUE),
                'remark' => $this->input->post('remark', TRUE),
            );

            $this->Awardhistory_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('awardhistory'));
        }
    }

    public function update($id)
    {
        $row = $this->Awardhistory_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('awardhistory/update_action'),
                'id' => set_value('id', $row->id),
                'award_no' => set_value('award_no', $row->award_no),
                'emp_no' => set_value('emp_no', $row->emp_no),
                'award_category' => set_value('award_category', $row->award_category),
                'award_cert' => set_value('award_cert', $row->award_cert),
                'award_date' => set_value('award_date', $row->award_date),
                'remark' => set_value('remark', $row->remark),
            );
            $this->template->general('awardhistory/emp_award_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('awardhistory'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'award_no' => $this->input->post('award_no', TRUE),
                'emp_no' => $this->input->post('emp_no', TRUE),
                'award_category' => $this->input->post('award_category', TRUE),
                'award_cert' => $this->input->post('award_cert', TRUE),
                'award_date' => $this->input->post('award_date', TRUE),
                'remark' => $this->input->post('remark', TRUE),
            );

            $this->Awardhistory_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('awardhistory'));
        }
    }

    public function delete($id)
    {
        $row = $this->Awardhistory_model->get_by_id($id);

        if ($row) {
            $this->Awardhistory_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('awardhistory'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('awardhistory'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('award_no', 'award no', 'trim|required');
        $this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
        $this->form_validation->set_rules('award_category', 'award category', 'trim|required');
        $this->form_validation->set_rules('award_cert', 'award cert', 'trim|required');
        $this->form_validation->set_rules('award_date', 'award date', 'trim|required');
        $this->form_validation->set_rules('remark', 'remark', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Awardhistory.php */
/* Location: ./application/controllers/Awardhistory.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-07 09:26:20 */
/* http://harviacode.com */