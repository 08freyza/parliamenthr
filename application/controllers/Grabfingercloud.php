<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grabfingercloud extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        //$url = 'http://202.80.46.193:8080/iattendance/getrequest?SN=BWXP185061443&INFO=checkinout';
        //$url = 'http://iclock.cnsvanuatu.com/iattendance/getrequest?SN=BWXP185061443&INFO=checkinout';
        $url = 'http://iclock.cns.com.vu:8080/iattendance/getrequest?SN=BWXP204360020&INFO=checkinout';
        $data = file_get_contents($url);
        $result = json_decode($data);
        //print_r($result);die;
        for ($i=0;$i<count($result);$i++)
        {
            if (date('Y-m-d',strtotime($result[$i]->checktime)) != date('Y-m-d'))
            {
                echo date('Y-m-d',strtotime($result[$i]->checktime)).' ... '. date('Y-m-d').' already pass <br/>';
                break;
            }
            else
            {
                    $this->load->model('Employee_model');
                    $ret = $this->Employee_model->getData('employee','fingerid',$result[$i]->userid)->row();
                    $empno = $ret->emp_no;

                    switch($result[$i]->checktype)
                    {
                        case 'I':
                            $ret2 = $this->db->get_where('absen', array('emp_no'=>$empno,'start_time' => $result[$i]->checktime))->row();
                            if (!isset($ret2->emp_no))
                            {
                                $this->db->query('insert into absen (emp_no,start_time,end_time,lunch_out,lunch_in) values ("'.$empno.'","'.$result[$i]->checktime.'","0000-00-00 00:00:00","0000-00-00 00:00:00","0000-00-00 00:00:00")');
                                echo 'data clocked in inserted !<br/>';
                            }
                            break;
                        case 'O':
                            $ret2 = $this->db->get_where('absen', array('emp_no'=>$empno,'year(start_time)' => date('Y',strtotime($result[$i]->checktime)),'month(start_time)' => date('m',strtotime($result[$i]->checktime)),'day(start_time)' => date('d',strtotime($result[$i]->checktime)) ))->row();
                            if (isset($ret2->emp_no))
                            {
                                $this->db->query('update absen set start_time = start_time, end_time = "'.$result[$i]->checktime.'", lunch_in=lunch_in, lunch_out=lunch_out  where id = "'.$ret2->id.'" ');
                                echo 'data clocked out inserted !<br/>';
                            }
                        default:
                            echo 'data not inserted !<br/>';
                            break;
                    }
            }
        }
	}
}
