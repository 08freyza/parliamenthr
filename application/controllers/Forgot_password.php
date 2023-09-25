<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Reset_password_model');
        $this->load->library('email');
    }

    public function index()
    {
        if (!(null !== $this->session->userdata('username'))) {
            if (!empty($_POST)) {
                $email = $this->input->post('email');

                $getEmail = $this->Users_model->get_one_by_email($email);
                if ($getEmail->email == $email) {
                    // update status lost password
                    $this->Users_model->update_status_lost_password($email, 'Y');

                    // generate token for lost password request
                    $generateRandomString = $this->generateRandomCode(32);
                    $createToken = password_hash($generateRandomString, PASSWORD_DEFAULT);
                    $cleanToken = str_replace(['$', '.'], '', $createToken ?? '');

                    // re-unite data
                    $data = [
                        'email' => $email,
                        'reset_token' => $cleanToken,
                        'has_used' => 'N',
                    ];

                    // insert data to reset password
                    $this->Reset_password_model->insert($data);

                    // get data
                    $getDataResetPass = $this->Reset_password_model->get_one_by_email_token($email, $cleanToken);

                    // display email name
                    $displayName = 'Admin Test';

                    // sender and receiver
                    $this->email->from('rio.legoh@gmail.com', $displayName);
                    $this->email->to('freyzafk08@gmail.com');
                    // $this->email->cc('another@another-example.com');
                    // $this->email->bcc('them@their-example.com');

                    // message body
                    $messageBody = 'Hi, ' . $getEmail->user_name . '
                                    <br>
                                    <br>To reset your password, please click the link below to proceed:
                                    <br>' . base_url() . 'forgot_password/reset/' . $getDataResetPass->id . '/' . $getDataResetPass->reset_token . '<br>
                                    <br>Best Regards,
                                    <br>' . $displayName;

                    // email body
                    $this->email->subject('Reset Password - ' . $getEmail->user_name);
                    $this->email->message($messageBody);

                    // send to email
                    $this->email->send();

                    $this->session->set_flashdata('message', 'successrequestchangepassword');
                    redirect(base_url() . 'login');
                } else {
                    $this->session->set_flashdata('message', 'failedrequestchangepassword');
                    redirect(base_url() . 'forgot_password');
                }
            } else {
                $this->load->view('forgotpassword');
            }
        } else {
            redirect(base_url() . 'dashboard');
        }
    }

    public function reset($id, $token)
    {
        // get data
        $getDataResetPass = $this->Reset_password_model->get_one_by_id_token($id, $token);

        // send data
        $data = [
            'id' => $getDataResetPass->id,
            'email' => $getDataResetPass->email,
            'token' => $getDataResetPass->reset_token,
        ];

        // send data to view
        $this->load->view('resetpassword', $data);
    }

    public function reset_process()
    {
        $id = $this->input->post('id', TRUE);
        $token = $this->input->post('token', TRUE);
        $email = $this->input->post('email', TRUE);
        $newPass = $this->input->post('newpass', TRUE);
        $newConfirmPass = $this->input->post('newpassconfirm', TRUE);

        if ($newPass == $newConfirmPass) {
            // hash pass
            $pass = md5($newPass);

            // update data for reset password model
            $this->Reset_password_model->update_status($id, $email, $token);

            // update password
            $this->Users_model->update_password($email, $pass);

            // update status lost password
            $this->Users_model->update_status_lost_password($email);

            $this->session->set_flashdata('message', 'successchangepassword');
            redirect(base_url() . 'login');
        } else {
            $this->session->set_flashdata('message', 'failedchangepassword');
            redirect(base_url() . 'forgot_password/reset/' . $id . '/' . $token);
        }
    }

    public function generateRandomCode($length = 6)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
