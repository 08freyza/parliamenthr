<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hospitalsetup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hospital_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('hospitalsetup/hospital_list_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Hospital_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Hospital_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'hospital_name' => $row->hospital_name,
                'address' => $row->address,
                'phone' => $row->phone,
            );
            $this->template->general('hospitalsetup/hospital_list_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hospitalsetup'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('hospitalsetup/create_action'),
            'id' => set_value('id'),
            'hospital_name' => set_value('hospital_name'),
            'address' => set_value('address'),
            'phone' => set_value('phone'),
        );
        $this->template->general('hospitalsetup/hospital_list_form', $data);
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
                'hospital_name' => $this->input->post('hospital_name', TRUE),
                'address' => $this->input->post('address', TRUE),
                'phone' => $this->input->post('phone', TRUE),
            );

            $this->Hospital_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hospitalsetup'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Hospital_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hospitalsetup/update_action'),
                'id' => set_value('id', $row->id),
                'hospital_name' => set_value('hospital_name', $row->hospital_name),
                'address' => set_value('address', $row->address),
                'phone' => set_value('phone', $row->phone),
            );
            $this->template->general('hospitalsetup/hospital_list_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hospitalsetup'));
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
                'hospital_name' => $this->input->post('hospital_name', TRUE),
                'address' => $this->input->post('address', TRUE),
                'phone' => $this->input->post('phone', TRUE),
            );

            $this->Hospital_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hospitalsetup'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Hospital_model->get_by_id($id);

        if ($row) {
            $this->Hospital_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hospitalsetup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hospitalsetup'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('hospital_name', 'hospital name', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Hospitalsetup.php */
/* Location: ./application/controllers/Hospitalsetup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-02 12:22:45 */
/* http://harviacode.com */