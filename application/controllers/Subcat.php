<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subcat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mst_sub_category_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
		if ($this->session->userdata('username') == null) redirect(base_url().'index.php/login');
    }

    public function index()
    {
        $this->template->general('subcat/mst_sub_category_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mst_sub_category_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mst_sub_category_model->get_by_id($id);
        if ($row) {
            $data = array(
				'button' => 'Read',
				'action' => 'read',
		'id' => $row->id,
		'id_cat' => $row->id_cat,
		'sub_desc' => $row->sub_desc,
		'active' => $row->active,
		'creation_date' => $row->creation_date,
	    );
            $this->template->general('subcat/mst_sub_category_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subcat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('subcat/create_action'),
	    'id' => set_value('id'),
	    'id_cat' => set_value('id_cat'),
	    'sub_desc' => set_value('sub_desc'),
	    'active' => set_value('active'),
	    'creation_date' => set_value('creation_date',date('Y-m-d')),
	);
        $this->template->general('subcat/mst_sub_category_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_cat' => $this->input->post('id_cat',TRUE),
		'sub_desc' => $this->input->post('sub_desc',TRUE),
		'active' => $this->input->post('active',TRUE),
		'creation_date' => $this->input->post('creation_date',TRUE),
	    );

            $this->Mst_sub_category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('subcat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mst_sub_category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('subcat/update_action'),
		'id' => set_value('id', $row->id),
		'id_cat' => set_value('id_cat', $row->id_cat),
		'sub_desc' => set_value('sub_desc', $row->sub_desc),
		'active' => set_value('active', $row->active),
		'creation_date' => set_value('creation_date', $row->creation_date),
	    );
            $this->template->general('subcat/mst_sub_category_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subcat'));
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
		'sub_desc' => $this->input->post('sub_desc',TRUE),
		'active' => $this->input->post('active',TRUE),
		'creation_date' => $this->input->post('creation_date',TRUE),
	    );

            $this->Mst_sub_category_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('subcat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mst_sub_category_model->get_by_id($id);

        if ($row) {
            $this->Mst_sub_category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('subcat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subcat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_cat', 'id cat', 'trim|required');
	$this->form_validation->set_rules('sub_desc', 'sub desc', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('creation_date', 'creation date', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mst_sub_category.xls";
        $judul = "mst_sub_category";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Sub Desc");
	xlsWriteLabel($tablehead, $kolomhead++, "Active");
	xlsWriteLabel($tablehead, $kolomhead++, "Creation Date");

	foreach ($this->Mst_sub_category_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_cat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sub_desc);
	    xlsWriteNumber($tablebody, $kolombody++, $data->active);
	    xlsWriteLabel($tablebody, $kolombody++, $data->creation_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Subcat.php */
/* Location: ./application/controllers/Subcat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-14 08:22:54 */
/* http://harviacode.com */