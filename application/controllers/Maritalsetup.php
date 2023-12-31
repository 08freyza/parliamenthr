<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maritalsetup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Marital_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('maritalsetup/emp_marital_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Marital_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Marital_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'marital_desc' => $row->marital_desc,
            );
            $this->template->general('maritalsetup/emp_marital_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maritalsetup'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('maritalsetup/create_action'),
            'id' => set_value('id'),
            'marital_desc' => set_value('marital_desc'),
        );
        $this->template->general('maritalsetup/emp_marital_form', $data);
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
                'marital_desc' => $this->input->post('marital_desc', TRUE),
            );

            $this->Marital_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('maritalsetup'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Marital_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('maritalsetup/update_action'),
                'id' => set_value('id', $row->id),
                'marital_desc' => set_value('marital_desc', $row->marital_desc),
            );
            $this->template->general('maritalsetup/emp_marital_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maritalsetup'));
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
                'marital_desc' => $this->input->post('marital_desc', TRUE),
            );

            $this->Marital_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('maritalsetup'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Marital_model->get_by_id($id);

        if ($row) {
            $this->Marital_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('maritalsetup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('maritalsetup'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('marital_desc', 'marital desc', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Maritalsetup.php */
/* Location: ./application/controllers/Maritalsetup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-02 15:05:37 */
/* http://harviacode.com */