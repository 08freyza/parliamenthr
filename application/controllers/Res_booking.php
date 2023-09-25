<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Res_booking extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Res_booking_model');
        $this->load->model('Resource_type_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('res_booking/book_main_list');
    }

    public function json()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        header('Content-Type: application/json');
        echo $this->Res_booking_model->json();
    }

    public function res_type_name($res_type = null, $res_type_id = null)
    {
        header('Content-Type: application/json');
        $getData = $this->Resource_type_model->get_all_res_name_by_res_id((int)$res_type, (int)$res_type_id);
        echo json_encode($getData);
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Res_booking_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'booking_no' => $row->booking_no,
                'requester' => $row->requester,
                'request_for' => $row->request_for,
                'resource_type' => $row->resource_type,
                'resource_name' => $row->resource_name,
                'quantity' => $row->quantity,
                'start_date' => $row->start_date,
                'end_date' => $row->end_date,
                'notes' => $row->notes,
                'asset_id' => $row->asset_id,
            );
            $this->template->general('res_booking/book_main_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('res_booking'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Res_booking_model->get_limit_data_book_seq(1);

        $data = array(
            'button' => 'Create',
            'action' => site_url('res_booking/create_action'),
            'id' => set_value('id'),
            'booking_no' => set_value('booking_no', 'BK' . sprintf("%011d", intval($row[0]->id) + 1)),
            'requester' => set_value('requester', $this->session->userdata('username')),
            'request_for' => set_value('request_for'),
            'resource_type' => set_value('resource_type'),
            'resource_name' => set_value('resource_name'),
            'quantity' => set_value('quantity'),
            'start_date' => set_value('start_date'),
            'end_date' => set_value('end_date'),
            'notes' => set_value('notes'),
            'asset_id' => set_value('asset_id'),
        );
        $this->template->general('res_booking/book_main_form', $data);
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
                // 'booking_no' => $this->input->post('booking_no', TRUE),
                'requester' => $this->input->post('requester', TRUE),
                'request_for' => $this->input->post('request_for', TRUE),
                'resource_type' => $this->input->post('resource_type', TRUE),
                'resource_name' => $this->input->post('resource_name', TRUE),
                'quantity' => $this->input->post('quantity', TRUE),
                'start_date' => $this->input->post('start_date', TRUE),
                'end_date' => $this->input->post('end_date', TRUE),
                'notes' => $this->input->post('notes', TRUE),
                'asset_id' => $this->input->post('asset_id', TRUE),
            );

            $this->Res_booking_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('res_booking'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Res_booking_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('res_booking/update_action'),
                'id' => set_value('id', $row->id),
                'booking_no' => set_value('booking_no', $row->booking_no),
                'requester' => set_value('requester', $row->requester),
                'request_for' => set_value('request_for', $row->request_for),
                'resource_type' => set_value('resource_type', $row->resource_type),
                'resource_name' => set_value('resource_name', $row->resource_name),
                'quantity' => set_value('quantity', $row->quantity),
                'start_date' => set_value('start_date', $row->start_date),
                'end_date' => set_value('end_date', $row->end_date),
                'notes' => set_value('notes', $row->notes),
                'asset_id' => set_value('asset_id', $row->asset_id),
            );
            $this->template->general('res_booking/book_main_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('res_booking'));
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
                // 'booking_no' => $this->input->post('booking_no', TRUE),
                'requester' => $this->input->post('requester', TRUE),
                'request_for' => $this->input->post('request_for', TRUE),
                'resource_type' => $this->input->post('resource_type', TRUE),
                'resource_name' => $this->input->post('resource_name', TRUE),
                'quantity' => $this->input->post('quantity', TRUE),
                'start_date' => $this->input->post('start_date', TRUE),
                'end_date' => $this->input->post('end_date', TRUE),
                'notes' => $this->input->post('notes', TRUE),
                'asset_id' => $this->input->post('asset_id', TRUE),
            );

            $this->Res_booking_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('res_booking'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Res_booking_model->get_by_id($id);

        if ($row) {
            $this->Res_booking_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('res_booking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('res_booking'));
        }
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('booking_no', 'booking no', 'trim|required');
        $this->form_validation->set_rules('requester', 'requester', 'trim|required');
        $this->form_validation->set_rules('request_for', 'request for', 'trim|required');
        $this->form_validation->set_rules('resource_type', 'resource type', 'trim|required');
        $this->form_validation->set_rules('resource_name', 'resource name', 'trim|required');
        $this->form_validation->set_rules('quantity', 'quantity', 'trim|required');
        $this->form_validation->set_rules('start_date', 'start date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'end date', 'trim|required');
        $this->form_validation->set_rules('notes', 'notes', 'trim|required');
        $this->form_validation->set_rules('asset_id', 'asset id', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Res_booking.php */
/* Location: ./application/controllers/Res_booking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-11 19:31:11 */
/* http://harviacode.com */