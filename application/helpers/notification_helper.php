<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('notification')) {
    function notification($emp_no)
    {
        $CI = &get_instance();
        $CI->load->model(array('Notification_model'));

        $output = $CI->Notification_model->get_by_emp_no_active($emp_no);

        return $output->result_array();
    }
}

if (!function_exists('notification_counts')) {
    function notification_counts($emp_no)
    {
        $CI = &get_instance();
        $CI->load->model(array('Notification_model'));

        $output = $CI->Notification_model->total_rows_active_by_emp_no($emp_no);

        return $output;
    }
}
