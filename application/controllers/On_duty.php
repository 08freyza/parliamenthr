<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class On_duty extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('On_duty_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('on_duty/emp_duty_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->On_duty_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->On_duty_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'emp_no' => $row->emp_no,
                'leave_desc' => $row->leave_desc,
                'sdate' => $row->sdate,
                'edate' => $row->edate,
                'total_day' => $row->total_day,
            );
            $this->template->general('on_duty/emp_duty_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('on_duty'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('on_duty/create_action'),
            'id' => set_value('id'),
            'emp_no' => set_value('emp_no'),
            'leave_desc' => set_value('leave_desc'),
            'sdate' => set_value('sdate'),
            'edate' => set_value('edate'),
            'total_day' => set_value('total_day'),
        );
        $this->template->general('on_duty/emp_duty_form', $data);
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
                'leave_desc' => $this->input->post('leave_desc', TRUE),
                'sdate' => $this->input->post('sdate', TRUE),
                'edate' => $this->input->post('edate', TRUE),
                'total_day' => $this->input->post('total_day', TRUE),
            );

            $this->On_duty_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('on_duty'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->On_duty_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('on_duty/update_action'),
                'id' => set_value('id', $row->id),
                'emp_no' => set_value('emp_no', $row->emp_no),
                'leave_desc' => set_value('leave_desc', $row->leave_desc),
                'sdate' => set_value('sdate', $row->sdate),
                'edate' => set_value('edate', $row->edate),
                'total_day' => set_value('total_day', $row->total_day),
            );
            $this->template->general('on_duty/emp_duty_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('on_duty'));
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
                'leave_desc' => $this->input->post('leave_desc', TRUE),
                'sdate' => $this->input->post('sdate', TRUE),
                'edate' => $this->input->post('edate', TRUE),
                'total_day' => $this->input->post('total_day', TRUE),
            );

            $this->On_duty_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('on_duty'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->On_duty_model->get_by_id($id);

        if ($row) {
            $this->On_duty_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('on_duty'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('on_duty'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
        $this->form_validation->set_rules('leave_desc', 'leave desc', 'trim|required');
        $this->form_validation->set_rules('sdate', 'sdate', 'trim|required');
        $this->form_validation->set_rules('edate', 'edate', 'trim|required');
        $this->form_validation->set_rules('total_day', 'total day', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file On_duty.php */
/* Location: ./application/controllers/On_duty.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-07 07:35:26 */
/* http://harviacode.com */