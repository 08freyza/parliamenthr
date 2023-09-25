<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Leave extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Emp_leave_model');
		$this->load->library(array('form_validation', 'datatables'));
	}

	public function index()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$this->template->general('leave/emp_leave_list');
	}

	public function json()
	{
		$emp_no = null;
		if (isAdmin() == FALSE) $emp_no = $this->session->userdata('emp_no');
		header('Content-Type: application/json');
		echo $this->Emp_leave_model->json($emp_no);
	}

	public function read($id)
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$row = $this->Emp_leave_model->get_by_id($id);
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
				'is_advsalary' => $row->is_advsalary,
			);
			$this->template->general('leave/emp_leave_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('leave'));
		}
	}

	public function create()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$data = array(
			'button' => 'Create',
			'action' => site_url('leave/create_action'),
			'id' => set_value('id'),
			'emp_no' => set_value('emp_no', $this->session->userdata('emp_no')),
			'leave_desc' => set_value('leave_desc'),
			'sdate' => set_value('sdate'),
			'edate' => set_value('edate'),
			'total_day' => set_value('total_day'),
			'status' => set_value('status', '1'),
			'approve_date' => set_value('approve_date'),
			'leave_type' => set_value('leave_type'),
			'approve_by' => set_value('approve_by'),
			'entry_user' => set_value('entry_user'),
			'paidadvdate' => set_value('paidadvdate'),
			'curbalance' => set_value('curbalance', getCurrBalance()),
			'hours' => set_value('hours'),
			'is_paidadv' => set_value('is_paidadv'),
			'next_approval' => set_value('next_approval', getNextApproval()),
			'spv_approved_by' => set_value('spv_approved_by'),
			'spv_approved_date' => set_value('spv_approved_date'),
			'director_approved_by' => set_value('director_approved_by'),
			'director_approved_date' => set_value('director_approved_date'),
			'is_advsalary' => set_value('is_advsalary', 'Y'),
		);
		$this->template->general('leave/emp_leave_form', $data);
	}

	public function create_action()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'emp_no' => $this->input->post('emp_no', TRUE),
				'leave_desc' => $this->input->post('leave_desc', TRUE),
				'sdate' => $this->input->post('sdate', TRUE),
				'edate' => $this->input->post('edate', TRUE),
				'total_day' => $this->input->post('total_day', TRUE),
				'status' => $this->input->post('status', TRUE),
				'approve_date' => $this->input->post('approve_date', TRUE),
				'leave_type' => $this->input->post('leave_type', TRUE),
				'approve_by' => $this->input->post('approve_by', TRUE),
				'entry_user' => $this->input->post('entry_user', TRUE),
				'paidadvdate' => $this->input->post('paidadvdate', TRUE),
				'curbalance' => $this->input->post('curbalance', TRUE),
				'hours' => $this->input->post('hours', TRUE),
				'is_paidadv' => $this->input->post('is_paidadv', TRUE),
				'next_approval' => $this->input->post('next_approval', TRUE),
				'spv_approved_by' => $this->input->post('spv_approved_by', TRUE),
				'spv_approved_date' => $this->input->post('spv_approved_date', TRUE),
				'director_approved_by' => $this->input->post('director_approved_by', TRUE),
				'director_approved_date' => $this->input->post('director_approved_date', TRUE),
				'is_advsalary' => $this->input->post('is_advsalary', TRUE),
			);

			$this->Emp_leave_model->insert($data);

			$this->load->helper('vanuatusendemail');
			$this->load->model('Employee_model');

			$myEmpNo = $this->Employee_model->get_by_emp_no($this->input->post('emp_no', TRUE));
			$mySPV = $this->Employee_model->get_by_emp_no($this->input->post('next_approval', TRUE));
			$to = $mySPV->email; //'febri.rury.nugraha@gmail.com';

			$subject = '[Do Not Reply] - Please Approve My Leaves';
			$message = 'Hi <b>' . $mySPV->emp_name . '</b>,<br/><br/>I submit my leave from <b>' . date('F d, Y', strtotime($this->input->post('sdate', TRUE))) . '</b> to <b>' . date('F d, Y', strtotime($this->input->post('edate', TRUE))) . '</b>';
			$message .= '<br/><br/>Please kindly approve my leave.';
			$message .= '<br/><br/>Thanks.';
			$message .= '<br/><br/>Best Regards,';
			$message .= '<br/>' . $myEmpNo->emp_name . '.';

			$retEmail = kirimEmail($subject, $message, $to);

			if ($retEmail == true)
				$this->session->set_flashdata('message', 'Create Record Success and email was sent.');
			else
				$this->session->set_flashdata('message', 'Create Record Success and email was not sent.');

			redirect(site_url('leave'));
		}
	}

	public function update($id)
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$row = $this->Emp_leave_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('leave/update_action'),
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
				'next_approval' => set_value('next_approval', ($row->status == 1 ? getNextApproval() : $row->next_approval)),
				'spv_approved_by' => set_value('spv_approved_by', $row->spv_approved_by),
				'spv_approved_date' => set_value('spv_approved_date', $row->spv_approved_date),
				'director_approved_by' => set_value('director_approved_by', $row->director_approved_by),
				'director_approved_date' => set_value('director_approved_date', $row->director_approved_date),
				'is_advsalary' => set_value('is_advsalary', $row->is_advsalary),
			);
			$this->template->general('leave/emp_leave_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('leave'));
		}
	}

	public function update_action()
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$data = array(
				'emp_no' => $this->input->post('emp_no', TRUE),
				'leave_desc' => $this->input->post('leave_desc', TRUE),
				'sdate' => $this->input->post('sdate', TRUE),
				'edate' => $this->input->post('edate', TRUE),
				'total_day' => $this->input->post('total_day', TRUE),
				'status' => $this->input->post('status', TRUE),
				'approve_date' => $this->input->post('approve_date', TRUE),
				'leave_type' => $this->input->post('leave_type', TRUE),
				'approve_by' => $this->input->post('approve_by', TRUE),
				'entry_user' => $this->input->post('entry_user', TRUE),
				'paidadvdate' => $this->input->post('paidadvdate', TRUE),
				'curbalance' => $this->input->post('curbalance', TRUE),
				'hours' => $this->input->post('hours', TRUE),
				'is_paidadv' => $this->input->post('is_paidadv', TRUE),
				'next_approval' => $this->input->post('next_approval', TRUE),
				'spv_approved_by' => $this->input->post('spv_approved_by', TRUE),
				'spv_approved_date' => $this->input->post('spv_approved_date', TRUE),
				'director_approved_by' => $this->input->post('director_approved_by', TRUE),
				'director_approved_date' => $this->input->post('director_approved_date', TRUE),
				'is_advsalary' => $this->input->post('is_advsalary', TRUE),
			);

			$this->Emp_leave_model->update($this->input->post('id', TRUE), $data);

			$this->load->helper('vanuatusendemail');
			$this->load->model('Employee_model');

			$myEmpNo = $this->Employee_model->get_by_emp_no($this->input->post('emp_no', TRUE));
			$mySPV = $this->Employee_model->get_by_emp_no($this->input->post('next_approval', TRUE));
			$to = $mySPV->email; //'febri.rury.nugraha@gmail.com';

			$subject = '[Do Not Reply] - Please Approve My Leaves';
			$message = 'Hi <b>' . $mySPV->emp_name . '</b>,<br/><br/>I was submit leaves from <b>' . date('F d, Y', strtotime($this->input->post('sdate', TRUE))) . '</b> until <b>' . date('F d, Y', strtotime($this->input->post('edate', TRUE))) . '</b>';
			$message .= '<br/><br/>Please kindly approve my leave.';
			$message .= '<br/><br/>Thanks.';
			$message .= '<br/><br/>Best Regards,';
			$message .= '<br/>' . $myEmpNo->emp_name . '.';

			$retEmail = kirimEmail($subject, $message, $to);

			if ($retEmail == true)
				$this->session->set_flashdata('message', 'Update Record Success And Email Was Sent.');
			else
				$this->session->set_flashdata('message', 'Update Record Success and Email Was Not Sent.');

			redirect(site_url('leave'));
		}
	}

	public function delete($id)
	{
		if (isExistClassMenu() == FALSE) {
			redirect(site_url('dashboard'));
		}

		$row = $this->Emp_leave_model->get_by_id($id);

		if ($row) {
			$this->Emp_leave_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('leave'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('leave'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('emp_no', 'emp no', 'trim|required');
		$this->form_validation->set_rules('leave_desc', 'leave desc', 'trim|required');
		$this->form_validation->set_rules('sdate', 'sdate', 'trim|required');
		$this->form_validation->set_rules('edate', 'edate', 'trim|required');
		$this->form_validation->set_rules('total_day', 'total day', 'trim|required');
		//$this->form_validation->set_rules('status', 'status', 'trim|required');
		//$this->form_validation->set_rules('approve_date', 'approve date', 'trim|required');
		//$this->form_validation->set_rules('leave_type', 'leave type', 'trim|required');
		//$this->form_validation->set_rules('approve_by', 'approve by', 'trim|required');
		//$this->form_validation->set_rules('entry_user', 'entry user', 'trim|required');
		//$this->form_validation->set_rules('paidadvdate', 'paidadvdate', 'trim|required');
		$this->form_validation->set_rules('curbalance', 'curbalance', 'trim|required');
		$this->form_validation->set_rules('hours', 'hours', 'trim|required|numeric');
		//$this->form_validation->set_rules('is_paidadv', 'is paidadv', 'trim|required');
		//$this->form_validation->set_rules('next_approval', 'next approval', 'trim|required');
		//$this->form_validation->set_rules('spv_approved_by', 'spv approved by', 'trim|required');
		//$this->form_validation->set_rules('spv_approved_date', 'spv approved date', 'trim|required');
		//$this->form_validation->set_rules('director_approved_by', 'director approved by', 'trim|required');
		//$this->form_validation->set_rules('director_approved_date', 'director approved date', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function curbalance()
	{
		$emp_no = $this->input->post('emp_no');
		$leave_type = $this->input->post('leave_type');
		$ret = $this->Emp_leave_model->getBalance($emp_no, $leave_type);
		if ($ret->num_rows() > 0)
			echo $ret->row()->balance;
		else
			echo '0';
	}

	public function print()
	{
		$this->load->library('Pdf');
		$this->load->model(array('Employee_model', 'Department_model', 'Ministry_model'));
		$id = $this->uri->segment(3);
		$row = $this->Emp_leave_model->get_by_id($id);
		$rowEmp = $this->Employee_model->get_by_emp_no($row->emp_no);
		$rowDept = $this->Department_model->get_by_id($rowEmp->department);
		$rowMinistry = $this->Ministry_model->get_by_id($rowEmp->ministry);

		// print_r($rowEmp);die;
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(190, 5, 'PSC FORM 4-9', 0, 1, 'R');
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(190, 10, 'APPLICATION FOR LEAVE FORM', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(27, 10, 'Name', 0, 0, 'L');
		$pdf->Cell(100, 10, ':  ' . $rowEmp->emp_name, 0, 0, 'L');
		$pdf->Cell(120, 10, 'VNPF#  :  ' . $rowEmp->vnpf, 0, 1, 'L');
		$pdf->Cell(27, 10, 'Post Title', 0, 0, 'L');
		$pdf->Cell(17.5, 10, ':  ', 0, 1, 'L');
		$pdf->Cell(27, 10, 'Post No', 0, 0, 'L');
		$pdf->Cell(100, 10, ':  ' . $rowEmp->title, 0, 0, 'L');
		$pdf->Cell(160, 10, 'Grade    :  ' . $rowEmp->grade, 0, 1, 'L');
		$pdf->Cell(27, 10, 'Department', 0, 0, 'L');
		$pdf->Cell(100, 10, ':  ' . $rowDept->name, 0, 0, 'L');
		$pdf->Cell(162, 10, 'Ministry  :  ' . $rowMinistry->name, 0, 1, 'L');
		$pdf->Cell(46, 10, 'Entry Date of Service', 0, 0, 'L');
		$pdf->Cell(150, 10, ':  ' . date('F dS, Y', strtotime($row->sdate)), 0, 1, 'L');
		$pdf->Cell(58, 10, 'Type of Leave To Be Taken', 0, 0, 'L');
		$pdf->Cell(150, 10, ':  ' . $row->leave_type, 0, 1, 'L');
		$pdf->Cell(71, 10, 'Destination of Leave To Be Taken', 0, 0, 'L');
		$pdf->Cell(150, 10, ':  ' . $row->leave_desc, 0, 1, 'L');
		$pdf->Cell(40, 10, 'First Date of Leave', 0, 0, 'L');
		$pdf->Cell(60, 10, ':  ' . date('F dS, Y', strtotime($row->sdate)) . '. ', 0, 0, 'L');
		$pdf->Cell(40, 10, 'Last Date of Leave', 0, 0, 'L');
		$pdf->Cell(65, 10, ':  ' . date('F dS, Y', strtotime($row->edate)) . '. ', 0, 1, 'L');
		$pdf->Cell(74, 10, 'Total Number of Leave To Be Taken', 0, 0, 'L');
		$pdf->Cell(40, 10, ':  ' . $row->total_day, 0, 1, 'L');
		$pdf->Cell(66, 10, 'Advance Leave Salary Required', 0, 0, 'L');
		$pdf->Cell(24, 10, ':  ' . ($row->paidadvdate == null ? 'No' : 'Yes') . '.', 0, 0, 'L');
		$pdf->Cell(40, 10, 'Date Required : ' . date('F dS, Y', strtotime($row->paidadvdate)), 0, 1, 'L');
		$pdf->Cell(55, 10, 'Signature of Staff Member', 0, 0, 'L');
		$pdf->Cell(60, 10, ':  ', 0, 0, 'L');
		$pdf->Cell(12, 10, 'Date', 0, 0, 'L');
		$pdf->Cell(24, 10, ':  ' . date('F dS, Y'), 0, 1, 'L');
		$pdf->Cell(80, 10, 'LEAVE APPLIED FOR IS SUPPORTED', 0, 0, 'L');
		$pdf->Cell(25, 10, ':  YES / NO ', 0, 0, 'L');
		$pdf->SetFont('Arial', 'I', 12);
		$pdf->Cell(80, 10, '(please circle the appropriate answer)', 0, 1, 'L');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(50, 10, 'Signature of Supervisor', 0, 0, 'L');
		$pdf->Cell(60, 10, ':  ', 0, 0, 'L');
		$pdf->Cell(12, 10, 'Date', 0, 0, 'L');
		$pdf->Cell(24, 10, ':  ' . date('F dS, Y'), 0, 1, 'L');
		$pdf->Cell(25, 10, 'Comments', 0, 0, 'L');
		$pdf->Cell(24, 10, ':  ', 0, 1, 'L');
		$pdf->Cell(80, 10, 'DIRECTOR GENERAL / DIRECTOR OR SECRETARY, OPSC APPROVAL', 0, 1, 'L');
		$pdf->Cell(40, 10, 'LEAVE APPROVED', 0, 0, 'L');
		$pdf->Cell(25, 10, ':  YES / NO ', 0, 0, 'L');
		$pdf->SetFont('Arial', 'I', 12);
		$pdf->Cell(75, 10, '(please circle the appropriate answer)', 0, 0, 'L');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(12, 10, 'Date : ', 0, 1, 'L');
		$pdf->Cell(25, 10, 'Comments', 0, 0, 'L');
		$pdf->Cell(24, 10, ':  ', 0, 1, 'L');
		$pdf->Cell(12, 5, 'Name', 0, 0, 'L');
		$pdf->Cell(80, 5, ':  ', 0, 0, 'L');
		$pdf->Cell(20, 5, 'Signature', 0, 0, 'L');
		$pdf->Cell(60, 5, ':  ', 0, 1, 'L');
		$pdf->SetFont('Arial', 'I', 10);
		$pdf->Cell(75, 5, '(For annual vacation, standard sick leave, maternity, family, compasionate, International / provincial');
		$pdf->Ln();
		$pdf->Cell(75, 5, 'Sporting, cultural and religious event only. A medical certificate is to be attached where the period of');
		$pdf->Ln();
		$pdf->Cell(75, 5, 'sick leave is more than 2 days and the staff member lives within the boundaries of Port-Villa or');
		$pdf->Ln();
		$pdf->Cell(75, 5, 'Luganville or more than 4 days for all other areas).', 0, 1, 'L');
		$pdf->SetFont('Arial', 'BU', 12);
		$pdf->Ln();
		$pdf->Cell(80, 5, 'PUBLIC SERVICE COMMISION APPROVAL.', 0, 1, 'L');
		$pdf->SetFont('Arial', 'I', 10);
		$pdf->Cell(80, 5, '(for sabbatical, secondment, leave without pay and non-standard sick leave only)', 0, 1, 'L');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Ln();
		$pdf->Cell(63, 5, 'APPROVED / NOT APPROVED', 0, 0, 'L');
		$pdf->SetFont('Arial', 'I', 10);
		$pdf->Cell(38, 5, '(please circle decision)', 0, 0, 'L');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(40, 5, 'PSC Meeting hold on: ', 0, 1, 'L');
		$pdf->Cell(130, 10, 'SECRETARY, OPSC - Name: ', 0, 0, 'L');
		$pdf->Cell(38, 10, 'Signature: ', 0, 1, 'L');
		$pdf->SetFont('Arial', 'BU', 12);
		$pdf->Ln();
		$pdf->Cell(95, 10, 'HRO USE ONLY', 0, 0, 'L');
		$pdf->Cell(130, 10, 'Date input to the system: ' . date('F dS, Y'), 0, 1, 'L');

		// $mahasiswa = $this->db->get('mahasiswa')->result();
		// foreach ($mahasiswa as $row){
		//     $pdf->Cell(20,6,$row->nim,1,0);
		//     $pdf->Cell(85,6,$row->nama_lengkap,1,0);
		//     $pdf->Cell(27,6,$row->no_hp,1,0);
		//     $pdf->Cell(25,6,$row->tanggal_lahir,1,1); 
		// }
		$pdf->Output('D', $id . '.pdf', false);
	}
}

/* End of file Leave.php */
/* Location: ./application/controllers/Leave.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-04 14:21:05 */
/* http://harviacode.com */