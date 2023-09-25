<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mst_client_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->general('client/mst_client_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mst_client_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mst_client_model->get_by_id($id);
        if ($row) {
            $data = array(
				'button' => 'Read',
				'action' => 'read',
		'ID' => $row->ID,
		'number' => $row->number,
		'type' => $row->type,
		'name' => $row->name,
		'dob' => $row->dob,
		'gender' => $row->gender,
		'mobile' => $row->mobile,
		'email' => $row->email,
		'address' => $row->address,
		'city' => $row->city,
		'nation' => $row->nation,
		'state' => $row->state,
		'photo' => $row->photo,
		'num_of_payment' => $row->num_of_payment,
		'init_amount' => $row->init_amount,
		'transdate' => $row->transdate,
		'password' => $row->password,
	    );
            $this->template->general('client/mst_client_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('client/create_action'),
	    'ID' => set_value('ID'),
	    'number' => set_value('number'),
	    'type' => set_value('type'),
	    'name' => set_value('name'),
	    'dob' => set_value('dob'),
	    'gender' => set_value('gender'),
	    'mobile' => set_value('mobile'),
	    'email' => set_value('email'),
	    'address' => set_value('address'),
	    'city' => set_value('city'),
	    'nation' => set_value('nation'),
	    'state' => set_value('state'),
	    'photo' => set_value('photo'),
	    'num_of_payment' => set_value('num_of_payment'),
	    'init_amount' => set_value('init_amount'),
	    'transdate' => set_value('transdate'),
	    'password' => set_value('password'),
	);
        $this->template->general('client/mst_client_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'number' => $this->input->post('number',TRUE),
		'type' => $this->input->post('type',TRUE),
		'name' => $this->input->post('name',TRUE),
		'dob' => $this->input->post('dob',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'email' => $this->input->post('email',TRUE),
		'address' => $this->input->post('address',TRUE),
		'city' => $this->input->post('city',TRUE),
		'nation' => $this->input->post('nation',TRUE),
		'state' => $this->input->post('state',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'num_of_payment' => $this->input->post('num_of_payment',TRUE),
		'init_amount' => $this->input->post('init_amount',TRUE),
		'transdate' => $this->input->post('transdate',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Mst_client_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('client'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mst_client_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('client/update_action'),
		'ID' => set_value('ID', $row->ID),
		'number' => set_value('number', $row->number),
		'type' => set_value('type', $row->type),
		'name' => set_value('name', $row->name),
		'dob' => set_value('dob', $row->dob),
		'gender' => set_value('gender', $row->gender),
		'mobile' => set_value('mobile', $row->mobile),
		'email' => set_value('email', $row->email),
		'address' => set_value('address', $row->address),
		'city' => set_value('city', $row->city),
		'nation' => set_value('nation', $row->nation),
		'state' => set_value('state', $row->state),
		'photo' => set_value('photo', $row->photo),
		'num_of_payment' => set_value('num_of_payment', $row->num_of_payment),
		'init_amount' => set_value('init_amount', $row->init_amount),
		'transdate' => set_value('transdate', $row->transdate),
		'password' => set_value('password', $row->password),
	    );
            $this->template->general('client/mst_client_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'number' => $this->input->post('number',TRUE),
		'type' => $this->input->post('type',TRUE),
		'name' => $this->input->post('name',TRUE),
		'dob' => $this->input->post('dob',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'email' => $this->input->post('email',TRUE),
		'address' => $this->input->post('address',TRUE),
		'city' => $this->input->post('city',TRUE),
		'nation' => $this->input->post('nation',TRUE),
		'state' => $this->input->post('state',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'num_of_payment' => $this->input->post('num_of_payment',TRUE),
		'init_amount' => $this->input->post('init_amount',TRUE),
		'transdate' => $this->input->post('transdate',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Mst_client_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('client'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mst_client_model->get_by_id($id);

        if ($row) {
            $this->Mst_client_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('client'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('number', 'number', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('dob', 'dob', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('city', 'city', 'trim|required');
	$this->form_validation->set_rules('nation', 'nation', 'trim|required');
	$this->form_validation->set_rules('state', 'state', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('num_of_payment', 'num of payment', 'trim|required');
	$this->form_validation->set_rules('init_amount', 'init amount', 'trim|required');
	$this->form_validation->set_rules('transdate', 'transdate', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mst_client.xls";
        $judul = "mst_client";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Number");
	xlsWriteLabel($tablehead, $kolomhead++, "Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Dob");
	xlsWriteLabel($tablehead, $kolomhead++, "Gender");
	xlsWriteLabel($tablehead, $kolomhead++, "Mobile");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "City");
	xlsWriteLabel($tablehead, $kolomhead++, "Nation");
	xlsWriteLabel($tablehead, $kolomhead++, "State");
	xlsWriteLabel($tablehead, $kolomhead++, "Photo");
	xlsWriteLabel($tablehead, $kolomhead++, "Num Of Payment");
	xlsWriteLabel($tablehead, $kolomhead++, "Init Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Transdate");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");

	foreach ($this->Mst_client_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->number);
	    xlsWriteNumber($tablebody, $kolombody++, $data->type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dob);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mobile);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->city);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nation);
	    xlsWriteLabel($tablebody, $kolombody++, $data->state);
	    xlsWriteLabel($tablebody, $kolombody++, $data->photo);
	    xlsWriteNumber($tablebody, $kolombody++, $data->num_of_payment);
	    xlsWriteLabel($tablebody, $kolombody++, $data->init_amount);
	    xlsWriteLabel($tablebody, $kolombody++, $data->transdate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Client.php */
/* Location: ./application/controllers/Client.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-02 10:33:35 */
/* http://harviacode.com */