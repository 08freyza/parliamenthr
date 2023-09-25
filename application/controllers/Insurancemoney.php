<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurancemoney extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Insurancemoney_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->general('insurancemoney/policy_paid_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Insurancemoney_model->json();
    }

    public function read($id) 
    {
        $row = $this->Insurancemoney_model->get_by_id($id);
        if ($row) {
            $data = array(
				'button' => 'Read',
				'action' => 'read',
		'id' => $row->id,
		'policy_id' => $row->policy_id,
		'client_id' => $row->client_id,
		'amount' => $row->amount,
		'teneur' => $row->teneur,
		'paiddate' => $row->paiddate,
	    );
            $this->template->general('insurancemoney/policy_paid_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('insurancemoney'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('insurancemoney/create_action'),
	    'id' => set_value('id'),
	    'policy_id' => set_value('policy_id'),
	    'client_id' => set_value('client_id',$this->session->userdata('client_id')),
	    'amount' => set_value('amount'),
	    'teneur' => set_value('teneur'),
	    'paiddate' => set_value('paiddate',date('Y-m-d h:i:s')),
	);
        $this->template->general('insurancemoney/policy_paid_form', $data);
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'policy_id' => $this->input->post('policy_id',TRUE),
		'client_id' => $this->input->post('client_id',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'teneur' => $this->input->post('teneur',TRUE),
		'paiddate' => $this->input->post('paiddate',TRUE),
	    );

            $this->Insurancemoney_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('insurancemoney'));
        }
    }

    public function update($id) 
    {
        $row = $this->Insurancemoney_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('insurancemoney/update_action'),
		'id' => set_value('id', $row->id),
		'policy_id' => set_value('policy_id', $row->policy_id),
		'client_id' => set_value('client_id', $row->client_id),
		'amount' => set_value('amount', $row->amount),
		'teneur' => set_value('teneur', $row->teneur),
		'paiddate' => set_value('paiddate', $row->paiddate),
	    );
            $this->template->general('insurancemoney/policy_paid_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('insurancemoney'));
        }
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'policy_id' => $this->input->post('policy_id',TRUE),
		'client_id' => $this->input->post('client_id',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'teneur' => $this->input->post('teneur',TRUE),
		'paiddate' => $this->input->post('paiddate',TRUE),
	    );

            $this->Insurancemoney_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('insurancemoney'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Insurancemoney_model->get_by_id($id);

        if ($row) {
            $this->Insurancemoney_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('insurancemoney'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('insurancemoney'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('policy_id', 'policy id', 'trim|required');
	$this->form_validation->set_rules('client_id', 'client id', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	$this->form_validation->set_rules('teneur', 'teneur', 'trim|required');
	$this->form_validation->set_rules('paiddate', 'paiddate', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "policy_paid.xls";
        $judul = "policy_paid";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Policy Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Client Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Teneur");
	xlsWriteLabel($tablehead, $kolomhead++, "Paiddate");

	foreach ($this->Insurancemoney_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->policy_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->client_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->amount);
	    xlsWriteNumber($tablebody, $kolombody++, $data->teneur);
	    xlsWriteLabel($tablebody, $kolombody++, $data->paiddate);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

	public function appliedteneur()
	{
		$id = $this->input->post('id');
		$ret = $this->Insurancemoney_model->checkTenur($id);
		if(!empty($ret->teneur))
		{
			echo (($ret->teneur)+1);
		} else {
			echo 1;
		}
	}
}

/* End of file Insurancemoney.php */
/* Location: ./application/controllers/Insurancemoney.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-15 09:02:41 */
/* http://harviacode.com */