<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vw_emp_leavex extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vw_emp_leave_modelx');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->general('vw_emp_leavex/VW_EMP_LEAVE_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Vw_emp_leave_modelx->json();
    }

    public function read($id) 
    {
        $row = $this->Vw_emp_leave_modelx->get_by_id($id);
        if ($row) {
            $data = array(
				'button' => 'Read',
				'action' => 'read',
		'id' => $row->id,
		'emp_no' => $row->emp_no,
		'leave_desc' => $row->leave_desc,
		'sdate' => $row->sdate,
		'edate' => $row->edate,
		'total_day' => $row->total_day,
		'status' => $row->status,
		'approve_date' => $row->approve_date,
		'leave_type' => $row->leave_type,
		'approve_by' => $row->approve_by,
		'entry_user' => $row->entry_user,
		'paidadvdate' => $row->paidadvdate,
		'curbalance' => $row->curbalance,
		'hours' => $row->hours,
		'is_paidadv' => $row->is_paidadv,
		'next_approval' => $row->next_approval,
		'spv_approved_by' => $row->spv_approved_by,
		'spv_approved_date' => $row->spv_approved_date,
		'director_approved_by' => $row->director_approved_by,
		'director_approved_date' => $row->director_approved_date,
	    );
            $this->template->general('vw_emp_leavex/VW_EMP_LEAVE_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vw_emp_leavex'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('vw_emp_leavex/create_action'),
	    'id' => set_value('id'),
	    'emp_no' => set_value('emp_no'),
	    'leave_desc' => set_value('leave_desc'),
	    'sdate' => set_value('sdate'),
	    'edate' => set_value('edate'),
	    'total_day' => set_value('total_day'),
	    'status' => set_value('status'),
	    'approve_date' => set_value('approve_date'),
	    'leave_type' => set_value('leave_type'),
	    'approve_by' => set_value('approve_by'),
	    'entry_user' => set_value('entry_user'),
	    'paidadvdate' => set_value('paidadvdate'),
	    'curbalance' => set_value('curbalance'),
	    'hours' => set_value('hours'),
	    'is_paidadv' => set_value('is_paidadv'),
	    'next_approval' => set_value('next_approval'),
	    'spv_approved_by' => set_value('spv_approved_by'),
	    'spv_approved_date' => set_value('spv_approved_date'),
	    'director_approved_by' => set_value('director_approved_by'),
	    'director_approved_date' => set_value('director_approved_date'),
	);
        $this->template->general('vw_emp_leavex/VW_EMP_LEAVE_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'emp_no' => $this->input->post('emp_no',TRUE),
		'leave_desc' => $this->input->post('leave_desc',TRUE),
		'sdate' => $this->input->post('sdate',TRUE),
		'edate' => $this->input->post('edate',TRUE),
		'total_day' => $this->input->post('total_day',TRUE),
		'status' => $this->input->post('status',TRUE),
		'approve_date' => $this->input->post('approve_date',TRUE),
		'leave_type' => $this->input->post('leave_type',TRUE),
		'approve_by' => $this->input->post('approve_by',TRUE),
		'entry_user' => $this->input->post('entry_user',TRUE),
		'paidadvdate' => $this->input->post('paidadvdate',TRUE),
		'curbalance' => $this->input->post('curbalance',TRUE),
		'hours' => $this->input->post('hours',TRUE),
		'is_paidadv' => $this->input->post('is_paidadv',TRUE),
		'next_approval' => $this->input->post('next_approval',TRUE),
		'spv_approved_by' => $this->input->post('spv_approved_by',TRUE),
		'spv_approved_date' => $this->input->post('spv_approved_date',TRUE),
		'director_approved_by' => $this->input->post('director_approved_by',TRUE),
		'director_approved_date' => $this->input->post('director_approved_date',TRUE),
	    );

            $this->Vw_emp_leave_modelx->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('vw_emp_leavex'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Vw_emp_leave_modelx->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('vw_emp_leavex/update_action'),
		'id' => set_value('id', $row->id),
		'emp_no' => set_value('emp_no', $row->emp_no),
		'leave_desc' => set_value('leave_desc', $row->leave_desc),
		'sdate' => set_value('sdate', $row->sdate),
		'edate' => set_value('edate', $row->edate),
		'total_day' => set_value('total_day', $row->total_day),
		'status' => set_value('status', $row->status),
		'approve_date' => set_value('approve_date', $row->approve_date),
		'leave_type' => set_value('leave_type', $row->leave_type),
		'approve_by' => set_value('approve_by', $row->approve_by),
		'entry_user' => set_value('entry_user', $row->entry_user),
		'paidadvdate' => set_value('paidadvdate', $row->paidadvdate),
		'curbalance' => set_value('curbalance', $row->curbalance),
		'hours' => set_value('hours', $row->hours),
		'is_paidadv' => set_value('is_paidadv', $row->is_paidadv),
		'next_approval' => set_value('next_approval', $row->next_approval),
		'spv_approved_by' => set_value('spv_approved_by', $row->spv_approved_by),
		'spv_approved_date' => set_value('spv_approved_date', $row->spv_approved_date),
		'director_approved_by' => set_value('director_approved_by', $row->director_approved_by),
		'director_approved_date' => set_value('director_approved_date', $row->director_approved_date),
	    );
            $this->template->general('vw_emp_leavex/VW_EMP_LEAVE_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vw_emp_leavex'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id' => $this->input->post('id',TRUE),
		'emp_no' => $this->input->post('emp_no',TRUE),
		'leave_desc' => $this->input->post('leave_desc',TRUE),
		'sdate' => $this->input->post('sdate',TRUE),
		'edate' => $this->input->post('edate',TRUE),
		'total_day' => $this->input->post('total_day',TRUE),
		'status' => $this->input->post('status',TRUE),
		'approve_date' => $this->input->post('approve_date',TRUE),
		'leave_type' => $this->input->post('leave_type',TRUE),
		'approve_by' => $this->input->post('approve_by',TRUE),
		'entry_user' => $this->input->post('entry_user',TRUE),
		'paidadvdate' => $this->input->post('paidadvdate',TRUE),
		'curbalance' => $this->input->post('curbalance',TRUE),
		'hours' => $this->input->post('hours',TRUE),
		'is_paidadv' => $this->input->post('is_paidadv',TRUE),
		'next_approval' => $this->input->post('next_approval',TRUE),
		'spv_approved_by' => $this->input->post('spv_approved_by',TRUE),
		'spv_approved_date' => $this->input->post('spv_approved_date',TRUE),
		'director_approved_by' => $this->input->post('director_approved_by',TRUE),
		'director_approved_date' => $this->input->post('director_approved_date',TRUE),
	    );

            $this->Vw_emp_leave_modelx->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('vw_emp_leavex'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Vw_emp_leave_modelx->get_by_id($id);

        if ($row) {
            $this->Vw_emp_leave_modelx->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('vw_emp_leavex'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vw_emp_leavex'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id', 'id', 'trim|required');
	$this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
	$this->form_validation->set_rules('leave_desc', 'leave desc', 'trim|required');
	$this->form_validation->set_rules('sdate', 'sdate', 'trim|required');
	$this->form_validation->set_rules('edate', 'edate', 'trim|required');
	$this->form_validation->set_rules('total_day', 'total day', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('approve_date', 'approve date', 'trim|required');
	$this->form_validation->set_rules('leave_type', 'leave type', 'trim|required');
	$this->form_validation->set_rules('approve_by', 'approve by', 'trim|required');
	$this->form_validation->set_rules('entry_user', 'entry user', 'trim|required');
	$this->form_validation->set_rules('paidadvdate', 'paidadvdate', 'trim|required');
	$this->form_validation->set_rules('curbalance', 'curbalance', 'trim|required');
	$this->form_validation->set_rules('hours', 'hours', 'trim|required|numeric');
	$this->form_validation->set_rules('is_paidadv', 'is paidadv', 'trim|required');
	$this->form_validation->set_rules('next_approval', 'next approval', 'trim|required');
	$this->form_validation->set_rules('spv_approved_by', 'spv approved by', 'trim|required');
	$this->form_validation->set_rules('spv_approved_date', 'spv approved date', 'trim|required');
	$this->form_validation->set_rules('director_approved_by', 'director approved by', 'trim|required');
	$this->form_validation->set_rules('director_approved_date', 'director approved date', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "VW_EMP_LEAVE.xls";
        $judul = "VW_EMP_LEAVE";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Emp No");
	xlsWriteLabel($tablehead, $kolomhead++, "Leave Desc");
	xlsWriteLabel($tablehead, $kolomhead++, "Sdate");
	xlsWriteLabel($tablehead, $kolomhead++, "Edate");
	xlsWriteLabel($tablehead, $kolomhead++, "Total Day");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Approve Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Leave Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Approve By");
	xlsWriteLabel($tablehead, $kolomhead++, "Entry User");
	xlsWriteLabel($tablehead, $kolomhead++, "Paidadvdate");
	xlsWriteLabel($tablehead, $kolomhead++, "Curbalance");
	xlsWriteLabel($tablehead, $kolomhead++, "Hours");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Paidadv");
	xlsWriteLabel($tablehead, $kolomhead++, "Next Approval");
	xlsWriteLabel($tablehead, $kolomhead++, "Spv Approved By");
	xlsWriteLabel($tablehead, $kolomhead++, "Spv Approved Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Director Approved By");
	xlsWriteLabel($tablehead, $kolomhead++, "Director Approved Date");

	foreach ($this->Vw_emp_leave_modelx->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->emp_no);
	    xlsWriteLabel($tablebody, $kolombody++, $data->leave_desc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sdate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->edate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total_day);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->approve_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->leave_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->approve_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->entry_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->paidadvdate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->curbalance);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hours);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_paidadv);
	    xlsWriteLabel($tablebody, $kolombody++, $data->next_approval);
	    xlsWriteLabel($tablebody, $kolombody++, $data->spv_approved_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->spv_approved_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->director_approved_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->director_approved_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Vw_emp_leavex.php */
/* Location: ./application/controllers/Vw_emp_leavex.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-03 11:42:54 */
/* http://harviacode.com */