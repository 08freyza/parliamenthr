<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leavesetup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Leavetype_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('leavesetup/leave_setting_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Leavetype_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Leavetype_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'leave_setting_id' => $row->leave_setting_id,
                'leave_name' => $row->leave_name,
                'eligibility' => $row->eligibility,
            );
            $this->template->general('leavesetup/leave_setting_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leavesetup'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('leavesetup/create_action'),
            'leave_setting_id' => set_value('leave_setting_id'),
            'leave_name' => set_value('leave_name'),
            'eligibility' => set_value('eligibility'),
        );
        $this->template->general('leavesetup/leave_setting_form', $data);
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
                'leave_name' => $this->input->post('leave_name', TRUE),
                'eligibility' => $this->input->post('eligibility', TRUE),
            );

            $this->Leavetype_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('leavesetup'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Leavetype_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('leavesetup/update_action'),
                'leave_setting_id' => set_value('leave_setting_id', $row->leave_setting_id),
                'leave_name' => set_value('leave_name', $row->leave_name),
                'eligibility' => set_value('eligibility', $row->eligibility),
            );
            $this->template->general('leavesetup/leave_setting_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leavesetup'));
        }
    }

    public function update_action()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('leave_setting_id', TRUE));
        } else {
            $data = array(
                'leave_name' => $this->input->post('leave_name', TRUE),
                'eligibility' => $this->input->post('eligibility', TRUE),
            );

            $this->Leavetype_model->update($this->input->post('leave_setting_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('leavesetup'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Leavetype_model->get_by_id($id);

        if ($row) {
            $this->Leavetype_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('leavesetup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leavesetup'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('leave_name', 'leave name', 'trim|required');
        $this->form_validation->set_rules('eligibility', 'eligibility', 'trim|required');

        $this->form_validation->set_rules('leave_setting_id', 'leave_setting_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Leavesetup.php */
/* Location: ./application/controllers/Leavesetup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-02 15:37:02 */
/* http://harviacode.com */