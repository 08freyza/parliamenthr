<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Att_history extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Att_history_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('att_history/absen_list');
    }

    public function json()
    {
        $emp_no = (isAdmin() != 1 ? $this->session->userdata('emp_no') : null);
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        header('Content-Type: application/json');
        echo $this->Att_history_model->json($emp_no, $start, $length);
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Att_history_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'emp_no' => $row->emp_no,
                'start_time' => $row->start_time,
                'end_time' => $row->end_time,
                'ot' => $row->ot,
                'lunch_out' => $row->lunch_out,
                'lunch_in' => $row->lunch_in,
                'type' => $row->type,
            );
            $this->template->general('att_history/absen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('att_history'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('att_history/create_action'),
            'id' => set_value('id'),
            'emp_no' => set_value('emp_no'),
            'start_time' => set_value('start_time'),
            'end_time' => set_value('end_time'),
            'ot' => set_value('ot'),
            'lunch_out' => set_value('lunch_out'),
            'lunch_in' => set_value('lunch_in'),
            'type' => set_value('type'),
        );
        $this->template->general('att_history/absen_form', $data);
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
                'start_time' => $this->input->post('start_time', TRUE),
                'end_time' => $this->input->post('end_time', TRUE),
                'ot' => $this->input->post('ot', TRUE),
                'lunch_out' => $this->input->post('lunch_out', TRUE),
                'lunch_in' => $this->input->post('lunch_in', TRUE),
                'type' => $this->input->post('type', TRUE),
            );

            $this->Att_history_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('att_history'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Att_history_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('att_history/update_action'),
                'id' => set_value('id', $row->id),
                'emp_no' => set_value('emp_no', $row->emp_no),
                'start_time' => set_value('start_time', $row->start_time),
                'end_time' => set_value('end_time', $row->end_time),
                'ot' => set_value('ot', $row->ot),
                'lunch_out' => set_value('lunch_out', $row->lunch_out),
                'lunch_in' => set_value('lunch_in', $row->lunch_in),
                'type' => set_value('type', $row->type),
            );
            $this->template->general('att_history/absen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('att_history'));
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
                'start_time' => $this->input->post('start_time', TRUE),
                'end_time' => $this->input->post('end_time', TRUE),
                'ot' => $this->input->post('ot', TRUE),
                'lunch_out' => $this->input->post('lunch_out', TRUE),
                'lunch_in' => $this->input->post('lunch_in', TRUE),
                'type' => $this->input->post('type', TRUE),
            );

            $this->Att_history_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('att_history'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Att_history_model->get_by_id($id);

        if ($row) {
            $this->Att_history_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('att_history'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('att_history'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
        $this->form_validation->set_rules('start_time', 'start time', 'trim|required');
        $this->form_validation->set_rules('end_time', 'end time', 'trim|required');
        $this->form_validation->set_rules('ot', 'ot', 'trim|required');
        $this->form_validation->set_rules('lunch_out', 'lunch out', 'trim|required');
        $this->form_validation->set_rules('lunch_in', 'lunch in', 'trim|required');
        $this->form_validation->set_rules('type', 'type', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Att_history.php */
/* Location: ./application/controllers/Att_history.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-18 23:44:00 */
/* http://harviacode.com */