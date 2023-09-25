<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myreimburst extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Myreimburst_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->general('myreimburst/emp_reim_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Myreimburst_model->json();
    }

    public function read($id) 
    {
        $row = $this->Myreimburst_model->get_by_id($id);
        if ($row) {
            $data = array(
				'button' => 'Read',
				'action' => 'read',
		'id' => $row->id,
		'emp_no' => $row->emp_no,
		'reim_type' => $row->reim_type,
		'reim_val' => $row->reim_val,
		'reim_date' => $row->reim_date,
		'reim_paid' => $row->reim_paid,
		'reim_unpaid' => $row->reim_unpaid,
	    );
            $this->template->general('myreimburst/emp_reim_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('myreimburst'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('myreimburst/create_action'),
	    'id' => set_value('id'),
	    'emp_no' => set_value('emp_no'),
	    'reim_type' => set_value('reim_type'),
	    'reim_val' => set_value('reim_val'),
	    'reim_date' => set_value('reim_date'),
	    'reim_paid' => set_value('reim_paid'),
	    'reim_unpaid' => set_value('reim_unpaid'),
	);
        $this->template->general('myreimburst/emp_reim_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'emp_no' => $this->input->post('emp_no',TRUE),
		'reim_type' => $this->input->post('reim_type',TRUE),
		'reim_val' => $this->input->post('reim_val',TRUE),
		'reim_date' => $this->input->post('reim_date',TRUE),
		'reim_paid' => $this->input->post('reim_paid',TRUE),
		'reim_unpaid' => $this->input->post('reim_unpaid',TRUE),
	    );

            $this->Myreimburst_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('myreimburst'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Myreimburst_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('myreimburst/update_action'),
		'id' => set_value('id', $row->id),
		'emp_no' => set_value('emp_no', $row->emp_no),
		'reim_type' => set_value('reim_type', $row->reim_type),
		'reim_val' => set_value('reim_val', $row->reim_val),
		'reim_date' => set_value('reim_date', $row->reim_date),
		'reim_paid' => set_value('reim_paid', $row->reim_paid),
		'reim_unpaid' => set_value('reim_unpaid', $row->reim_unpaid),
	    );
            $this->template->general('myreimburst/emp_reim_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('myreimburst'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'emp_no' => $this->input->post('emp_no',TRUE),
		'reim_type' => $this->input->post('reim_type',TRUE),
		'reim_val' => $this->input->post('reim_val',TRUE),
		'reim_date' => $this->input->post('reim_date',TRUE),
		'reim_paid' => $this->input->post('reim_paid',TRUE),
		'reim_unpaid' => $this->input->post('reim_unpaid',TRUE),
	    );

            $this->Myreimburst_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('myreimburst'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Myreimburst_model->get_by_id($id);

        if ($row) {
            $this->Myreimburst_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('myreimburst'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('myreimburst'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
	$this->form_validation->set_rules('reim_type', 'reim type', 'trim|required');
	$this->form_validation->set_rules('reim_val', 'reim val', 'trim|required');
	$this->form_validation->set_rules('reim_date', 'reim date', 'trim|required');
	$this->form_validation->set_rules('reim_paid', 'reim paid', 'trim|required');
	$this->form_validation->set_rules('reim_unpaid', 'reim unpaid', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Myreimburst.php */
/* Location: ./application/controllers/Myreimburst.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-07 08:25:44 */
/* http://harviacode.com */