<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myloan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Myloan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->general('myloan/emp_loan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Myloan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Myloan_model->get_by_id($id);
        if ($row) {
            $data = array(
				'button' => 'Read',
				'action' => 'read',
		'id' => $row->id,
		'emp_no' => $row->emp_no,
		'requestdate' => $row->requestdate,
		'type' => $row->type,
		'amount' => $row->amount,
		'startpayment' => $row->startpayment,
		'remark' => $row->remark,
		'loanprocess' => $row->loanprocess,
		'installmentamount' => $row->installmentamount,
		'loanperiod' => $row->loanperiod,
		'interest' => $row->interest,
		'totalpayment' => $row->totalpayment,
		'balance' => $row->balance,
	    );
            $this->template->general('myloan/emp_loan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('myloan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('myloan/create_action'),
	    'id' => set_value('id'),
	    'emp_no' => set_value('emp_no',$this->session->userdata('emp_no')),
	    'requestdate' => set_value('requestdate'),
	    'type' => set_value('type'),
	    'amount' => set_value('amount'),
	    'startpayment' => set_value('startpayment'),
	    'remark' => set_value('remark'),
	    'loanprocess' => set_value('loanprocess'),
	    'installmentamount' => set_value('installmentamount'),
	    'loanperiod' => set_value('loanperiod'),
	    'interest' => set_value('interest'),
	    'totalpayment' => set_value('totalpayment'),
	    'balance' => set_value('balance'),
	);
        $this->template->general('myloan/emp_loan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
// 		'emp_no' => $this->input->post('emp_no',TRUE),
		'requestdate' => $this->input->post('requestdate',TRUE),
		'type' => $this->input->post('type',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'startpayment' => $this->input->post('startpayment',TRUE),
		'remark' => $this->input->post('remark',TRUE),
// 		'loanprocess' => $this->input->post('loanprocess',TRUE),
		'installmentamount' => $this->input->post('installmentamount',TRUE),
		'loanperiod' => $this->input->post('loanperiod',TRUE),
// 		'interest' => $this->input->post('interest',TRUE),
// 		'totalpayment' => $this->input->post('totalpayment',TRUE),
// 		'balance' => $this->input->post('balance',TRUE),
	    );

            $this->Myloan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('myloan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Myloan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('myloan/update_action'),
		'id' => set_value('id', $row->id),
		'emp_no' => set_value('emp_no', $row->emp_no),
		'requestdate' => set_value('requestdate', $row->requestdate),
		'type' => set_value('type', $row->type),
		'amount' => set_value('amount', $row->amount),
		'startpayment' => set_value('startpayment', $row->startpayment),
		'remark' => set_value('remark', $row->remark),
		'loanprocess' => set_value('loanprocess', $row->loanprocess),
		'installmentamount' => set_value('installmentamount', $row->installmentamount),
		'loanperiod' => set_value('loanperiod', $row->loanperiod),
		'interest' => set_value('interest', $row->interest),
		'totalpayment' => set_value('totalpayment', $row->totalpayment),
		'balance' => set_value('balance', $row->balance),
	    );
            $this->template->general('myloan/emp_loan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('myloan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
// 		'emp_no' => $this->input->post('emp_no',TRUE),
		'requestdate' => $this->input->post('requestdate',TRUE),
		'type' => $this->input->post('type',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'startpayment' => $this->input->post('startpayment',TRUE),
		'remark' => $this->input->post('remark',TRUE),
// 		'loanprocess' => $this->input->post('loanprocess',TRUE),
		'installmentamount' => $this->input->post('installmentamount',TRUE),
		'loanperiod' => $this->input->post('loanperiod',TRUE),
// 		'interest' => $this->input->post('interest',TRUE),
// 		'totalpayment' => $this->input->post('totalpayment',TRUE),
// 		'balance' => $this->input->post('balance',TRUE),
	    );

            $this->Myloan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('myloan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Myloan_model->get_by_id($id);

        if ($row) {
            $this->Myloan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('myloan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('myloan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
	$this->form_validation->set_rules('requestdate', 'requestdate', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	$this->form_validation->set_rules('startpayment', 'startpayment', 'trim|required');
	$this->form_validation->set_rules('remark', 'remark', 'trim|required');
	$this->form_validation->set_rules('loanprocess', 'loanprocess', 'trim|required');
	$this->form_validation->set_rules('installmentamount', 'installmentamount', 'trim|required');
	$this->form_validation->set_rules('loanperiod', 'loanperiod', 'trim|required');
	$this->form_validation->set_rules('interest', 'interest', 'trim|required');
	$this->form_validation->set_rules('totalpayment', 'totalpayment', 'trim|required');
	$this->form_validation->set_rules('balance', 'balance', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Myloan.php */
/* Location: ./application/controllers/Myloan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-09 09:40:18 */
/* http://harviacode.com */