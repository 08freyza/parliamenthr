<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Att_report extends CI_Controller
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

        $this->template->general('att_report/att_report_list');
    }


    public function print()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $sMnth = $this->uri->segment(3);
        $sYear = $this->uri->segment(4);
        $sDept = $this->uri->segment(5);
        $sMnst = $this->uri->segment(6);

        //getting month name
        $dateObj   = DateTime::createFromFormat('!m', $sMnth);
        $monthName = $dateObj->format('F'); // March
        $d00 = "10 " . $monthName . " " . $sYear;
        $d01 = date('Y-m-01', strtotime($d00));
        $d02 = date('Y-m-15', strtotime($d00));
        $d03 = date('Y-m-16', strtotime($d00));
        $d04 = date('Y-m-t', strtotime($d00));
        $d05 = substr($d04, 8, 2);
        $d01 = $d01 . ' 00:00:00';
        $d02 = $d02 . ' 23:59:59';
        $d03 = $d03 . ' 00:00:00';
        $d04 = $d04 . ' 23:59:59';
        $sDate = "2022-01-01";
        $eDate = "2022-01-31";
        $part1 = "(1-15)";
        $part2 = "(16-" . $d05 . ")";

        $start = new DateTime($d01);
        $end = new DateTime($d02);
        $days = $start->diff($end, true)->days;
        $sundays = intval($days / 7) + ($start->format('N') + $days % 7 >= 7);
        $workdays1 = 15 - $sundays;
        $start = new DateTime($d03);
        $end = new DateTime($d04);
        $days = $start->diff($end, true)->days;
        $sundays2 = intval($days / 7) + ($start->format('N') + $days % 7 >= 7);
        $workdays2 = intval($d05) - 15 - $sundays2;

        $this->load->model(array('Employee_model', 'Emp_att_model', 'Emp_leave_model'));
        //echo $eDate; die;

        $table = '
        <html>
            <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css"> .table-bordered {border: 1px solid #dddddd;}</style></head>
            <body>
                <table id="mytable" cellpadding="5" cellspacing="1" width="100%" class="table-bordered" border="1">
                    <tr>
                        <td colspan=12>Attendance Recap ' . $monthName . ' ' . $sYear . '</td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Emp. ID</td>
                        <td>Work Days ' . $part1 . '</td>
                        <td>In ' . $part1 . '</td>
                        <td>Absent ' . $part1 . '</td>
                        <td>Leave ' . $part1 . '</td>
                        <td>Work Days ' . $part2 . '</td>
                        <td>In ' . $part2 . '</td>
                        <td>Absent ' . $part2 . '</td>
                        <td>Leave ' . $part2 . '</td>
                    </tr>';
        $emp = $this->Employee_model->get_all();
        $i = 1;
        foreach ($emp as $row) {
            $absen1 = $this->Emp_att_model->hitungAbsen2($row->emp_no, $d01, $d02);
            $nowork1 = intval($workdays1) - intval($absen1);
            $absen2 = $this->Emp_att_model->hitungAbsen2($row->emp_no, $d03, $d04);
            $nowork2 = intval($workdays2) - intval($absen2);
            $table .= '<tr>';
            $table .= ' <td>' . $i . '</td>';
            $table .= ' <td>' . $row->emp_name . '</td>';
            $table .= ' <td>' . $row->emp_no . '</td>';
            $table .= ' <td>' . $workdays1 . '</td>';
            $table .= ' <td>' . $absen1 . '</td>';
            $table .= ' <td>' . strval($nowork1) . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti2($row->emp_no, $d01, $d02) . '</td>';
            $table .= ' <td>' . $workdays2 . '</td>';
            $table .= ' <td>' . $absen2 . '</td>';
            $table .= ' <td>' . strval($nowork2) . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti2($row->emp_no, $d03, $d04) . '</td>';
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

    public function print_lateness()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $sDate = $this->uri->segment(3);
        $d02 = $this->uri->segment(4);
        $d03 = $this->uri->segment(5);
        $sMnst = $this->uri->segment(6);
        $sMnst = $this->uri->segment(7);

        //getting month name
        $dateObj   = DateTime::createFromFormat('Y-m-d', $sDate);
        $d01 = $dateObj->format('Y-m-d');

        $this->load->model(array('Employee_model', 'Emp_att_model', 'Emp_leave_model'));
        //echo $d01; die;

        $table = '
        <html>
            <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css"> .table-bordered {border: 1px solid #dddddd;}</style></head>
            <body>
                <table id="mytable" cellpadding="5" cellspacing="1" width="100%" class="table-bordered" border="1">
                    <tr>
                        <td colspan=12>Attendance Late Report for period ' . $dateObj->format('d M Y') . ' from ' . $d02 . ' to ' . $d03 . '' . '</td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Emp. ID</td>
                        <td>Department</td>
                        <td>Time In</td>
                    </tr>';
        $emp = $this->Emp_att_model->hitungLateness($d01, $d02, $d03);
        //print_r($emp); die;
        $i = 1;
        foreach ($emp as $row) {
            $table .= '<tr>';
            $table .= ' <td>' . $i . '</td>';
            $table .= ' <td>' . $row->emp_name . '</td>';
            $table .= ' <td>' . $row->emp_no . '</td>';
            $table .= ' <td>' . $row->name . '</td>';
            $table .= ' <td>' . $row->start_time . '</td>';
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

    public function print_summary()
    {
        if (isExistClassMenu() == FALSE) {
            redirect(site_url('dashboard'));
        }

        $sMnth = $this->uri->segment(3);
        $sYear = $this->uri->segment(4);
        $sDept = $this->uri->segment(5);
        $sMnst = $this->uri->segment(6);
        //print_r($sMnth); die;
        //getting month name
        $dateObj   = DateTime::createFromFormat('!m', $sMnth);
        $monthName = $dateObj->format('F'); // March
        $d00 = "10 " . $monthName . " " . $sYear;
        $d01 = date('Y-m-01', strtotime($d00));
        $d02 = date('Y-m-15', strtotime($d00));
        $d03 = date('Y-m-16', strtotime($d00));
        $d04 = date('Y-m-t', strtotime($d00));
        $d05 = substr($d04, 8, 2);
        $d01 = $d01 . ' 00:00:00';
        $d02 = $d02 . ' 23:59:59';
        $d03 = $d03 . ' 00:00:00';
        $d04 = $d04 . ' 23:59:59';
        $sDate = "2022-01-01";
        $eDate = "2022-01-31";
        $part1 = "(1-15)";
        $part2 = "(16-" . $d05 . ")";

        $start = new DateTime($d01);
        $end = new DateTime($d04);
        $days = $start->diff($end, true)->days;

        $sundays = intval($days / 7) + ($start->format('N') + $days % 7 >= 7);
        $workdays = intval($d05) - $sundays;
        $saturdays = intval($days / 7) + ($start->format('N') + $days % 7 >= 6);
        $normalhours = ($workdays - $saturdays) * 8 + $saturdays * 4;

        //print_r($saturdays); die;
        $this->load->model(array('Employee_model', 'Emp_att_model', 'Emp_leave_model'));
        //echo $eDate; die;

        $table = '
        <html>
            <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css"> .table-bordered {border: 1px solid #dddddd;}</style></head>
            <body>
                <table id="mytable" cellpadding="5" cellspacing="1" width="100%" class="table-bordered" border="1">
                    <tr>
                        <td colspan=12>Attendance Summary Report for period ' . $monthName . ' ' . $sYear . '</td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Emp. ID</td>
                        <td>Work Days</td>
                        <td>In</td>
                        <td>Absent</td>
                        <td>Leave</td>
                        <td>Work Hours</td>
                        <td>Normal Hours</td>
                        <td>Work Hours Different</td>
                    </tr>';
        $emp = $this->Employee_model->get_all();
        $i = 1;
        foreach ($emp as $row) {
            $absen = $this->Emp_att_model->hitungAbsen2($row->emp_no, $d01, $d04);
            $nowork = intval($workdays) - intval($absen);
            $workhours = $absen * 8;
            $diffhours = $normalhours - $workhours;
            $table .= '<tr>';
            $table .= ' <td>' . $i . '</td>';
            $table .= ' <td>' . $row->emp_name . '</td>';
            $table .= ' <td>' . $row->emp_no . '</td>';
            $table .= ' <td>' . $workdays . '</td>';
            $table .= ' <td>' . $absen . '</td>';
            $table .= ' <td>' . strval($nowork) . '</td>';
            $table .= ' <td>' . $this->Emp_leave_model->hitungCuti2($row->emp_no, $d01, $d04) . '</td>';
            $table .= ' <td>' . $workhours . '</td>';
            $table .= ' <td>' . $normalhours . '</td>';
            $table .= ' <td>' . $diffhours . '</td>';
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
}
