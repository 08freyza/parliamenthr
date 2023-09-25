<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Policy extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Policy_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
		if ($this->session->userdata('username') == null) redirect(base_url().'index.php/login');
    }

    public function index()
    {
        $this->template->general('policy/policy_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Policy_model->json();
    }

    public function read($id) 
    {
        $row = $this->Policy_model->get_by_id($id);
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
            $this->template->general('policy/policy_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('policy'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('policy/create_action'),
	    'id' => set_value('id'),
	    'id_cat' => set_value('id_cat'),
	    'id_subcat' => set_value('id_subcat'),
	    'policy_name' => set_value('policy_name'),
	    'sum_assured' => set_value('sum_assured'),
	    'premium' => set_value('premium'),
	    'tenure' => set_value('tenure'),
	    'status' => set_value('status'),
	    'created_date' => set_value('created_date',date('Y-m-d')),
	);
        $this->template->general('policy/policy_form', $data);
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

            $this->Policy_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('policy'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Policy_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('policy/update_action'),
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
            $this->template->general('policy/policy_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('policy'));
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

            $this->Policy_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('policy'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Policy_model->get_by_id($id);

        if ($row) {
            $this->Policy_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('policy'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('policy'));
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

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "policy.xls";
        $judul = "policy";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Cat");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Subcat");
	xlsWriteLabel($tablehead, $kolomhead++, "Policy Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Sum Assured");
	xlsWriteLabel($tablehead, $kolomhead++, "Premium");
	xlsWriteLabel($tablehead, $kolomhead++, "Tenure");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");

	foreach ($this->Policy_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_cat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_subcat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->policy_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sum_assured);
	    xlsWriteLabel($tablebody, $kolombody++, $data->premium);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tenure);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Policy.php */
/* Location: ./application/controllers/Policy.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-14 14:44:21 */
/* http://harviacode.com */