<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Disciplinary extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Disciplehistory_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('disciplinary/emp_disciplinary_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Disciplehistory_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Disciplehistory_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'disciple_no' => $row->disciple_no,
                'emp_no' => $row->emp_no,
                'disciple_category' => $row->disciple_category,
                'disciple_date' => $row->disciple_date,
                'sdate' => $row->sdate,
                'edate' => $row->edate,
                'remark' => $row->remark,
            );
            $this->template->general('disciplinary/emp_disciplinary_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('disciplinary'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('disciplinary/create_action'),
            'id' => set_value('id'),
            'disciple_no' => set_value('disciple_no'),
            'emp_no' => set_value('emp_no'),
            'disciple_category' => set_value('disciple_category'),
            'disciple_date' => set_value('disciple_date'),
            'sdate' => set_value('sdate'),
            'edate' => set_value('edate'),
            'remark' => set_value('remark'),
        );
        $this->template->general('disciplinary/emp_disciplinary_form', $data);
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
                'disciple_no' => $this->input->post('disciple_no', TRUE),
                'emp_no' => $this->input->post('emp_no', TRUE),
                'disciple_category' => $this->input->post('disciple_category', TRUE),
                'disciple_date' => $this->input->post('disciple_date', TRUE),
                'sdate' => $this->input->post('sdate', TRUE),
                'edate' => $this->input->post('edate', TRUE),
                'remark' => $this->input->post('remark', TRUE),
            );

            $this->Disciplehistory_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('disciplinary'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Disciplehistory_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('disciplinary/update_action'),
                'id' => set_value('id', $row->id),
                'disciple_no' => set_value('disciple_no', $row->disciple_no),
                'emp_no' => set_value('emp_no', $row->emp_no),
                'disciple_category' => set_value('disciple_category', $row->disciple_category),
                'disciple_date' => set_value('disciple_date', $row->disciple_date),
                'sdate' => set_value('sdate', $row->sdate),
                'edate' => set_value('edate', $row->edate),
                'remark' => set_value('remark', $row->remark),
            );
            $this->template->general('disciplinary/emp_disciplinary_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('disciplinary'));
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
                'disciple_no' => $this->input->post('disciple_no', TRUE),
                'emp_no' => $this->input->post('emp_no', TRUE),
                'disciple_category' => $this->input->post('disciple_category', TRUE),
                'disciple_date' => $this->input->post('disciple_date', TRUE),
                'sdate' => $this->input->post('sdate', TRUE),
                'edate' => $this->input->post('edate', TRUE),
                'remark' => $this->input->post('remark', TRUE),
            );

            $this->Disciplehistory_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('disciplinary'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Disciplehistory_model->get_by_id($id);

        if ($row) {
            $this->Disciplehistory_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('disciplinary'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('disciplinary'));
        }
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('disciple_no', 'disciple no', 'trim|required');
        $this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
        $this->form_validation->set_rules('disciple_category', 'disciple category', 'trim|required');
        $this->form_validation->set_rules('disciple_date', 'disciple date', 'trim|required');
        // $this->form_validation->set_rules('sdate', 'sdate', 'trim|required');
        // $this->form_validation->set_rules('edate', 'edate', 'trim|required');
        $this->form_validation->set_rules('remark', 'remark', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Disciplinary.php */
/* Location: ./application/controllers/Disciplinary.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-07 09:26:54 */
/* http://harviacode.com */