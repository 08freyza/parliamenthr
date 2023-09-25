<?php
class Template{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
  function general($content, $data = NULL){
        if (empty($this->_ci->session->userdata('username'))) redirect(base_url().'login');

        $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
        $data['side_bar'] = $this->_ci->load->view('template/side_bar', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
        
        $this->_ci->load->view('template/general', $data);
    }
}