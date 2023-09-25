<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mst_category_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        if ($this->session->userdata('username') == null) redirect(base_url() . 'index.php/login');
    }

    public function index()
    {
        $this->template->general('category/mst_category_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Mst_category_model->json();
    }

    public function read($id)
    {
        $row = $this->Mst_category_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Read',
                'action' => 'read',
                'id' => $row->id,
                'category' => $row->category,
                'status' => $row->status,
                'creation_date' => $row->creation_date,
            );
            $this->template->general('category/mst_category_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('category/create_action'),
            'id' => set_value('id'),
            'category' => set_value('category'),
            'status' => set_value('status'),
            'creation_date' => set_value('creation_date', date('Y-m-d')),
        );
        $this->template->general('category/mst_category_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'category' => $this->input->post('category', TRUE),
                'status' => $this->input->post('status', TRUE),
                'creation_date' => $this->input->post('creation_date', TRUE),
            );

            $this->Mst_category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('category'));
        }
    }

    public function update($id)
    {
        $row = $this->Mst_category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('category/update_action'),
                'id' => set_value('id', $row->id),
                'category' => set_value('category', $row->category),
                'status' => set_value('status', $row->status),
                'creation_date' => set_value('creation_date', $row->creation_date),
            );
            $this->template->general('category/mst_category_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'category' => $this->input->post('category', TRUE),
                'status' => $this->input->post('status', TRUE),
                'creation_date' => $this->input->post('creation_date', TRUE),
            );

            $this->Mst_category_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('category'));
        }
    }

    public function delete($id)
    {
        $row = $this->Mst_category_model->get_by_id($id);

        if ($row) {
            $this->Mst_category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('category', 'category', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('creation_date', 'creation date', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mst_category.xls";
        $judul = "mst_category";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Category");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");
        xlsWriteLabel($tablehead, $kolomhead++, "Creation Date");

        foreach ($this->Mst_category_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->category);
            xlsWriteNumber($tablebody, $kolombody++, $data->status);
            xlsWriteLabel($tablebody, $kolombody++, $data->creation_date);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-14 06:57:31 */
/* http://harviacode.com */