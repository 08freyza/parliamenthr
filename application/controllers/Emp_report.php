<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emp_report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $this->template->general('emp_report/emp_report_list');
    }

    public function print()
    {
        $sDate = $this->uri->segment(3);
        $eDate = $this->uri->segment(4);
        $this->load->model(array('Employee_model', 'Emp_att_model', 'Emp_leave_model'));

        $table = '
        <html>
            <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css"> .table-bordered {border: 1px solid #dddddd;}</style></head>
            <body>
                <table id="mytable" cellpadding="5" cellspacing="1" width="100%" class="table-bordered" border="1">
                    <tr>
                        <td colspan=12>Employee Leave Recap between ' . date('F dS, Y', strtotime($sDate)) . ' and ' . date('F dS, Y', strtotime($eDate)) . ' </td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Emp. ID</td>
                        <td>Work Days</td>
                        <td>Maternity Leave</td>
                        <td>Absent</td>
                        <td>Medical Leave</td>
                        <td>Severence Pay</td>
                        <td>Leave without pay</td>
                        <td>Annual Leave</td>
                        <td>Day Off</td>
                        <td>Training</td>
                    </tr>';
        $emp = $this->Employee_model->get_all();
        $i = 1;
        foreach ($emp as $row) {
            $table .= '<tr>';
            $table .= ' <td>' . $i . '</td>';
            $table .= ' <td>' . $row->emp_name . '</td>';
            $table .= ' <td>' . $row->emp_no . '</td>';
            $table .= ' <td>' . $this->Emp_att_model->hitungAbsen($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate))) . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '4') . '</td>';
            $table .= ' <td>' . (26 - $this->Emp_att_model->hitungAbsen($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)))) . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '3') . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '5') . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '6') . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '2') . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '2') . '</td>';
            $table .= ' <td>0</td>';
            $table .= '</tr>';
            $i++;
        }
        $table .= '
                    </tr>
                </table>
            </body>
        </html>';

        echo $table;
    }

    public function printbyempno()
    {
        $sDate = $this->uri->segment(3);
        $eDate = $this->uri->segment(4);
        $empNo = $this->uri->segment(5);
        $this->load->model(array('Employee_model', 'Emp_att_model', 'Emp_leave_model'));

        $table = '
        <html>
            <head><style type="text/css"> .table-bordered {border: 1px solid #dddddd;}</style></head>
            <body>
                <table id="mytable" cellpadding="5" cellspacing="1" width="100%" class="table-bordered" border="1">
                    <tr>
                        <td colspan=12>Employee Leave Recap between ' . date('F dS, Y', strtotime($sDate)) . ' and ' . date('F dS, Y', strtotime($eDate)) . ' </td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Emp. ID</td>
                        <td>Work Days</td>
                        <td>Maternity Leave</td>
                        <td>Absent</td>
                        <td>Medical Leave</td>
                        <td>Severence Pay</td>
                        <td>Leave without pay</td>
                        <td>Annual Leave</td>
                        <td>Day Off</td>
                        <td>Training</td>
                    </tr>';
        $row = $this->Employee_model->get_by_emp_no($empNo);
        //print_r($row);die;
        if ($row != null) {
            $i = 1;
            $table .= '<tr>';
            $table .= ' <td>' . $i . '</td>';
            $table .= ' <td>' . $row->emp_name . '</td>';
            $table .= ' <td>' . $row->emp_no . '</td>';
            $table .= ' <td>' . $this->Emp_att_model->hitungAbsen($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate))) . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '4') . '</td>';
            $table .= ' <td>' . (22 - $this->Emp_att_model->hitungAbsen($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)))) . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '3') . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '5') . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '6') . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '2') . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti($row->emp_no, date('m', strtotime($sDate)), date('Y', strtotime($sDate)), '2') . '</td>';
            $table .= ' <td>0</td>';
            $table .= '</tr>';
        }
        $table .= '
                    </tr>
                </table>
            </body>
        </html>';

        echo $table;
    }
}
