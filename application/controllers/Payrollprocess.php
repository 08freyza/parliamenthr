<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payrollprocess extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payrollprocess_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->general('payrollprocess/emp_salary_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Payrollprocess_model->json();
    }

    public function read($id) 
    {
        $row = $this->Payrollprocess_model->get_by_id($id);
        if ($row) {
            $data = array(
				'button' => 'Read',
				'action' => 'read',
		'id' => $row->id,
		'emp_no' => $row->emp_no,
		'basic_salary' => $row->basic_salary,
		'deduc_salary' => $row->deduc_salary,
	    );
            $this->template->general('payrollprocess/emp_salary_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payrollprocess'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('payrollprocess/create_action'),
	    'id' => set_value('id'),
	    'emp_no' => set_value('emp_no'),
	    'basic_salary' => set_value('basic_salary'),
	    'deduc_salary' => set_value('deduc_salary'),
	);
        $this->template->general('payrollprocess/emp_salary_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'emp_no' => $this->input->post('emp_no',TRUE),
		'basic_salary' => $this->input->post('basic_salary',TRUE),
		'deduc_salary' => $this->input->post('deduc_salary',TRUE),
	    );

            $this->Payrollprocess_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('payrollprocess'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Payrollprocess_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('payrollprocess/update_action'),
		'id' => set_value('id', $row->id),
		'emp_no' => set_value('emp_no', $row->emp_no),
		'basic_salary' => set_value('basic_salary', $row->basic_salary),
		'deduc_salary' => set_value('deduc_salary', $row->deduc_salary),
	    );
            $this->template->general('payrollprocess/emp_salary_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payrollprocess'));
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
		'basic_salary' => $this->input->post('basic_salary',TRUE),
		'deduc_salary' => $this->input->post('deduc_salary',TRUE),
	    );

            $this->Payrollprocess_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('payrollprocess'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Payrollprocess_model->get_by_id($id);

        if ($row) {
            $this->Payrollprocess_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('payrollprocess'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payrollprocess'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
	$this->form_validation->set_rules('basic_salary', 'basic salary', 'trim|required');
	$this->form_validation->set_rules('deduc_salary', 'deduc salary', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Payrollprocess.php */
/* Location: ./application/controllers/Payrollprocess.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-07 10:43:29 */
/* http://harviacode.com */