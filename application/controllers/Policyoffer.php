<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Policyoffer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Policyoffer_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
		if ($this->session->userdata('username') == null) redirect(base_url().'index.php/login');
    }

    public function index()
    {
        $this->template->general('policyoffer/policy_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Policyoffer_model->json();
    }

    public function read($id) 
    {
        $row = $this->Policyoffer_model->get_by_id($id);
        if ($row) {
            $data = array(
				'button' => 'Read',
				'action' => 'read',
		'id' => $row->id,
		'id_cat' => $row->id_cat,
		'id_subcat' => $row->id_subcat,
		'policy_name' => $row->policy_name,
		'sum_assured' => $row->sum_assured,
		'premium' => $row->premium,
		'tenure' => $row->tenure,
		'status' => $row->status,
		'created_date' => $row->created_date,
	    );
            $this->template->general('policyoffer/policy_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('policyoffer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('policyoffer/create_action'),
	    'id' => set_value('id'),
	    'id_cat' => set_value('id_cat'),
	    'id_subcat' => set_value('id_subcat'),
	    'policy_name' => set_value('policy_name'),
	    'sum_assured' => set_value('sum_assured'),
	    'premium' => set_value('premium'),
	    'tenure' => set_value('tenure'),
	    'status' => set_value('status'),
	    'created_date' => set_value('created_date'),
	);
        $this->template->general('policyoffer/policy_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_cat' => $this->input->post('id_cat',TRUE),
		'id_subcat' => $this->input->post('id_subcat',TRUE),
		'policy_name' => $this->input->post('policy_name',TRUE),
		'sum_assured' => $this->input->post('sum_assured',TRUE),
		'premium' => $this->input->post('premium',TRUE),
		'tenure' => $this->input->post('tenure',TRUE),
		'status' => $this->input->post('status',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
	    );

            $this->Policyoffer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('policyoffer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Policyoffer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('policyoffer/update_action'),
		'id' => set_value('id', $row->id),
		'id_cat' => set_value('id_cat', $row->id_cat),
		'id_subcat' => set_value('id_subcat', $row->id_subcat),
		'policy_name' => set_value('policy_name', $row->policy_name),
		'sum_assured' => set_value('sum_assured', $row->sum_assured),
		'premium' => set_value('premium', $row->premium),
		'tenure' => set_value('tenure', $row->tenure),
		'status' => set_value('status', $row->status),
		'created_date' => set_value('created_date', $row->created_date),
	    );
            $this->template->general('policyoffer/policy_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('policyoffer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_cat' => $this->input->post('id_cat',TRUE),
		'id_subcat' => $this->input->post('id_subcat',TRUE),
		'policy_name' => $this->input->post('policy_name',TRUE),
		'sum_assured' => $this->input->post('sum_assured',TRUE),
		'premium' => $this->input->post('premium',TRUE),
		'tenure' => $this->input->post('tenure',TRUE),
		'status' => $this->input->post('status',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
	    );

            $this->Policyoffer_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('policyoffer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Policyoffer_model->get_by_id($id);

        if ($row) {
            $this->Policyoffer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('policyoffer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('policyoffer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_cat', 'id cat', 'trim|required');
	$this->form_validation->set_rules('id_subcat', 'id subcat', 'trim|required');
	$this->form_validation->set_rules('policy_name', 'policy name', 'trim|required');
	$this->form_validation->set_rules('sum_assured', 'sum assured', 'trim|required');
	$this->form_validation->set_rules('premium', 'premium', 'trim|required');
	$this->form_validation->set_rules('tenure', 'tenure', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

	public function apply()
	{
		$id = $this->uri->segment(3);
		$ret = $this->Policyoffer_model->get_detail_by_id($id);
		$data['id'] = $id;
		$data['category'] = $ret->id_cat;
		$data['sub_category'] = $ret->id_subcat;
		$data['policy_name'] = $ret->policy_name;
		$data['sum_assured'] = $ret->sum_assured;
		$data['premium'] = $ret->premium;
		$data['tenure'] = $ret->tenure;
		$this->template->general('policyoffer/apply',$data);
	}

	public function applyconfirmed()
	{
		$id = $this->uri->segment(3);
		$ret = $this->Policyoffer_model->confirmed_by_id($id,$this->session->userdata('client_id'));
		redirect(base_url().'index.php/policyoffer');
		$this->template->general('policyoffer/apply');
	}
}

/* End of file Policyoffer.php */
/* Location: ./application/controllers/Policyoffer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-14 15:07:19 */
/* http://harviacode.com */