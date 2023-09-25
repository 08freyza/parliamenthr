<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leave_balance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Emp_leave_bal_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('leave_balance/emp_leave_bal_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Emp_leave_bal_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_leave_bal_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'leave_type' => $row->leave_type,
                'balance' => $row->balance,
                'latestupdate' => $row->latestupdate,
                'latestid' => $row->latestid,
                'updatedate' => $row->updatedate,
                'emp_no' => $row->emp_no,
                'updateid' => $row->updateid,
            );
            $this->template->general('leave_balance/emp_leave_bal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leave_balance'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('leave_balance/create_action'),
            'id' => set_value('id'),
            'leave_type' => set_value('leave_type'),
            'balance' => set_value('balance'),
            'latestupdate' => set_value('latestupdate', date('Y-m-d h:i:s')),
            'latestid' => set_value('latestid', 'admin'),
            'updatedate' => set_value('updatedate', date('Y-m-d h:i:s')),
            'emp_no' => set_value('emp_no'),
            'updateid' => set_value('updateid', 'admin'),
        );
        $this->template->general('leave_balance/emp_leave_bal_form', $data);
    }

    public function create_action()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        // print_r($_POST);die;
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'leave_type' => $this->input->post('leave_type', TRUE),
                'balance' => $this->input->post('balance', TRUE),
                'latestupdate' => $this->input->post('latestupdate', TRUE),
                'latestid' => $this->input->post('latestid', TRUE),
                'updatedate' => $this->input->post('updatedate', TRUE),
                'emp_no' => $this->input->post('emp_no', TRUE),
                'updateid' => $this->input->post('updateid', TRUE),
            );

            $this->Emp_leave_bal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('leave_balance'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_leave_bal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('leave_balance/update_action'),
                'id' => set_value('id', $row->id),
                'leave_type' => set_value('leave_type', $row->leave_type),
                'balance' => set_value('balance', $row->balance),
                'latestupdate' => set_value('latestupdate', $row->latestupdate),
                'latestid' => set_value('latestid', $row->latestid),
                'updatedate' => set_value('updatedate', $row->updatedate),
                'emp_no' => set_value('emp_no', $row->emp_no),
                'updateid' => set_value('updateid', $row->updateid),
            );
            $this->template->general('leave_balance/emp_leave_bal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leave_balance'));
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
                'leave_type' => $this->input->post('leave_type', TRUE),
                'balance' => $this->input->post('balance', TRUE),
                'latestupdate' => $this->input->post('latestupdate', TRUE),
                'latestid' => $this->input->post('latestid', TRUE),
                'updatedate' => $this->input->post('updatedate', TRUE),
                'emp_no' => $this->input->post('emp_no', TRUE),
                'updateid' => $this->input->post('updateid', TRUE),
            );

            $this->Emp_leave_bal_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('leave_balance'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_leave_bal_model->get_by_id($id);

        if ($row) {
            $this->Emp_leave_bal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('leave_balance'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leave_balance'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('leave_type', 'leave type', 'trim|required');
        $this->form_validation->set_rules('balance', 'balance', 'trim|required');
        $this->form_validation->set_rules('latestupdate', 'latestupdate', 'trim|required');
        $this->form_validation->set_rules('latestid', 'latestid', 'trim|required');
        $this->form_validation->set_rules('updatedate', 'updatedate', 'trim|required');
        $this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
        $this->form_validation->set_rules('updateid', 'updateid', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Leave_balance.php */
/* Location: ./application/controllers/Leave_balance.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-15 12:47:08 */
/* http://harviacode.com */