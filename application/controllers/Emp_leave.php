<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emp_leave extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Emp_leave_approval_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('emp_leave/emp_leave_list');
    }

    public function json()
    {
        // $empid = $this->session->userdata('emp_no');
        header('Content-Type: application/json');
        echo $this->Emp_leave_approval_model->json();
    }

    public function read($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_leave_approval_model->get_by_id($id);
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
            $this->template->general('emp_leave/emp_leave_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('emp_leave'));
        }
    }

    public function create()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $data = array(
            'button' => 'Create',
            'action' => site_url('emp_leave/create_action'),
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
        $this->template->general('emp_leave/emp_leave_form', $data);
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
            );

            $this->Emp_leave_approval_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('emp_leave'));
        }
    }

    public function update($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_leave_approval_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('emp_leave/update_action'),
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
            $this->template->general('emp_leave/emp_leave_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('emp_leave'));
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
            );

            $this->Emp_leave_approval_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('emp_leave'));
        }
    }

    public function delete($id)
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $row = $this->Emp_leave_approval_model->get_by_id($id);

        if ($row) {
            $this->Emp_leave_approval_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('emp_leave'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('emp_leave'));
        }
    }

    public function _rules()
    {
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

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function doAction()
    {
        $act = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $this->load->model(array('Emp_leave_model'));

        if ($act === 'approve') {
            $row = $this->Emp_leave_model->get_by_id($id);
            $leave_type = $row->leave_type;
            $emp_no = $row->emp_no;
            $spv = $row->next_approval;
            $sdate = $row->sdate;
            $edate = $row->edate;
            $total_day = $row->total_day;

            $this->load->helper('vanuatusendemail');
            $this->load->model('Employee_model');

            $myEmpNo = $this->Employee_model->get_by_emp_no($emp_no);
            $mySPV = $this->Employee_model->get_by_emp_no($spv);
            $to = $myEmpNo->email; //'febri.rury.nugraha@gmail.com';

            $subject = '[Do Not Reply] - Your Leaves Was Approved';
            $message = 'Hi <b>' . $myEmpNo->emp_name . '</b>,<br/><br/>Your Leave is approved from <b>' . date('F d, Y', strtotime($sdate)) . '</b> to <b>' . date('F d, Y', strtotime($edate)) . '</b>';
            $message .= '<br/><br/>Please check your leaves status.';
            $message .= '<br/><br/>Thanks.';
            $message .= '<br/><br/>Best Regards,';
            $message .= '<br/>' . $mySPV->emp_name . '.';

            $retEmail = kirimEmail($subject, $message, $to);

            $this->db->query('update emp_leave_bal set balance = (balance - "' . $total_day . '") where emp_no = "' . $emp_no . '" and leave_type = "' . $leave_type . '" ');

            $this->db->query('update emp_leave set status = "2",approve_by = next_approval, next_approval = "" where id = "' . $id . '" ');
        } else {
            $row = $this->Emp_leave_model->get_by_id($id);
            $emp_no = $row->emp_no;
            $spv = $row->next_approval;
            $sdate = $row->sdate;
            $edate = $row->edate;

            $this->load->helper('vanuatusendemail');
            $this->load->model('Employee_model');

            $myEmpNo = $this->Employee_model->get_by_emp_no($emp_no);
            $mySPV = $this->Employee_model->get_by_emp_no($spv);
            $to = $myEmpNo->email;

            $subject = '[Do Not Reply] - Your Leaves Was Rejected';
            $message = 'Hi <b>' . $myEmpNo->emp_name . '</b>,<br/><br/>Your Leave from <b>' . date('F d, Y', strtotime($sdate)) . '</b> to <b>' . date('F d, Y', strtotime($edate)) . '</b> is not approved.';
            $message .= '<br/><br/>Please check your leaves status.';
            $message .= '<br/><br/>Thanks.';
            $message .= '<br/><br/>Best Regards,';
            $message .= '<br/>' . $mySPV->emp_name . '.';

            $retEmail = kirimEmail($subject, $message, $to);

            $this->db->query('update emp_leave set status = "-1", next_approval = "" where id = "' . $id . '" ');
        }
    }
}

/* End of file Emp_leave.php */
/* Location: ./application/controllers/Emp_leave.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-15 13:20:26 */
/* http://harviacode.com */