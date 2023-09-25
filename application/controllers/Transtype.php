<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transtype extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mst_insurance_type_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
		if ($this->session->userdata('username') == null) redirect(base_url().'index.php/login');
    }

    public function index()
    {
        $this->template->general('transtype/mst_insurance_type_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mst_insurance_type_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mst_insurance_type_model->get_by_id($id);
        if ($row) {
            $data = array(
				'button' => 'Read',
				'action' => 'read',
		'ID' => $row->ID,
		'desc' => $row->desc,
	    );
            $this->template->general('transtype/mst_insurance_type_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transtype'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transtype/create_action'),
	    'ID' => set_value('ID'),
	    'desc' => set_value('desc'),
	);
        $this->template->general('transtype/mst_insurance_type_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'desc' => $this->input->post('desc',TRUE),
	    );

            $this->Mst_insurance_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transtype'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mst_insurance_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transtype/update_action'),
		'ID' => set_value('ID', $row->ID),
		'desc' => set_value('desc', $row->desc),
	    );
            $this->template->general('transtype/mst_insurance_type_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transtype'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'desc' => $this->input->post('desc',TRUE),
	    );

            $this->Mst_insurance_type_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transtype'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mst_insurance_type_model->get_by_id($id);

        if ($row) {
            $this->Mst_insurance_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transtype'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transtype'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('desc', 'desc', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mst_insurance_type.xls";
        $judul = "mst_insurance_type";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Desc");

	foreach ($this->Mst_insurance_type_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->desc);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Transtype.php */
/* Location: ./application/controllers/Transtype.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-13 16:26:16 */
/* http://harviacode.com */