<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fingerscan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fingerscan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('fingerscan/mfingerscan_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Fingerscan_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Fingerscan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'sn' => $row->sn,
                'title' => $row->title,
                'ip' => $row->ip,
                'port' => $row->port,
                'deviceid' => $row->deviceid,
                'key' => $row->key,
                'scheduled' => $row->scheduled,
                'type' => $row->type,
                'status' => $row->status,
            );
            $this->template->general('fingerscan/mfingerscan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fingerscan'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('fingerscan/create_action'),
            'id' => set_value('id'),
            'sn' => set_value('sn'),
            'title' => set_value('title'),
            'ip' => set_value('ip'),
            'port' => set_value('port'),
            'deviceid' => set_value('deviceid'),
            'key' => set_value('key'),
            'scheduled' => set_value('scheduled'),
            'type' => set_value('type'),
            'status' => set_value('status'),
        );
        $this->template->general('fingerscan/mfingerscan_form', $data);
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
                'sn' => $this->input->post('sn', TRUE),
                'title' => $this->input->post('title', TRUE),
                'ip' => $this->input->post('ip', TRUE),
                'port' => $this->input->post('port', TRUE),
                'deviceid' => $this->input->post('deviceid', TRUE),
                'key' => $this->input->post('key', TRUE),
                'scheduled' => $this->input->post('scheduled', TRUE),
                'type' => $this->input->post('type', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            $this->Fingerscan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fingerscan'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Fingerscan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fingerscan/update_action'),
                'id' => set_value('id', $row->id),
                'sn' => set_value('sn', $row->sn),
                'title' => set_value('title', $row->title),
                'ip' => set_value('ip', $row->ip),
                'port' => set_value('port', $row->port),
                'deviceid' => set_value('deviceid', $row->deviceid),
                'key' => set_value('key', $row->key),
                'scheduled' => set_value('scheduled', $row->scheduled),
                'type' => set_value('type', $row->type),
                'status' => set_value('status', $row->status),
            );
            $this->template->general('fingerscan/mfingerscan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fingerscan'));
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
                'sn' => $this->input->post('sn', TRUE),
                'title' => $this->input->post('title', TRUE),
                'ip' => $this->input->post('ip', TRUE),
                'port' => $this->input->post('port', TRUE),
                'deviceid' => $this->input->post('deviceid', TRUE),
                'key' => $this->input->post('key', TRUE),
                'scheduled' => $this->input->post('scheduled', TRUE),
                'type' => $this->input->post('type', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            $this->Fingerscan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fingerscan'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Fingerscan_model->get_by_id($id);

        if ($row) {
            $this->Fingerscan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fingerscan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fingerscan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('sn', 'sn', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('ip', 'ip', 'trim|required');
        $this->form_validation->set_rules('port', 'port', 'trim|required');
        $this->form_validation->set_rules('deviceid', 'deviceid', 'trim|required');
        $this->form_validation->set_rules('key', 'key', 'trim|required');
        $this->form_validation->set_rules('scheduled', 'scheduled', 'trim|required');
        $this->form_validation->set_rules('type', 'type', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Fingerscan.php */
/* Location: ./application/controllers/Fingerscan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-18 23:14:40 */
/* http://harviacode.com */