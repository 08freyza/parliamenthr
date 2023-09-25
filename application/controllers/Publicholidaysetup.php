<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Publicholidaysetup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Publicholiday_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }
        $this->template->general('publicholidaysetup/public_holiday_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Publicholiday_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }
        $row = $this->Publicholiday_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'public_holiday_id' => $row->id,
                'public_holiday_date' => $row->tanggal,
                'public_holiday_remark' => $row->remark,
            );
            $this->template->general('publicholidaysetup/public_holiday_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('publicholidaysetup'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('publicholidaysetup/create_action'),
            'public_holiday_id' => set_value('public_holiday_id'),
            'public_holiday_date' => set_value('public_holiday_date'),
            'public_holiday_remark' => set_value('public_holiday_remark'),
        );
        $this->template->general('publicholidaysetup/public_holiday_form', $data);
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
                'tanggal' => $this->input->post('public_holiday_date', TRUE),
                'remark' => $this->input->post('public_holiday_remark', TRUE),
            );

            $this->Publicholiday_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('publicholidaysetup'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Publicholiday_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('publicholidaysetup/update_action'),
                'public_holiday_id' => set_value('public_holiday_id', $row->id),
                'public_holiday_date' => set_value('public_holiday_date', $row->tanggal),
                'public_holiday_remark' => set_value('public_holiday_remark', $row->remark),
            );
            $this->template->general('publicholidaysetup/public_holiday_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('publicholidaysetup'));
        }
    }

    public function update_action()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('public_holiday_id', TRUE));
        } else {
            $data = array(
                'tanggal' => $this->input->post('public_holiday_date', TRUE),
                'remark' => $this->input->post('public_holiday_remark', TRUE),
            );

            $this->Publicholiday_model->update($this->input->post('public_holiday_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('publicholidaysetup'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Publicholiday_model->get_by_id($id);

        if ($row) {
            $this->Publicholiday_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('publicholidaysetup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('publicholidaysetup'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('public_holiday_date', 'Public Holiday Date', 'trim|required');
        $this->form_validation->set_rules('public_holiday_remark', 'Remark', 'trim|required');

        $this->form_validation->set_rules('public_holiday_id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Leavesetup.php */
/* Location: ./application/controllers/Leavesetup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-02 15:37:02 */
/* http://harviacode.com */