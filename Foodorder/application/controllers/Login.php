<?php
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Loginmodel_Api');
    }
    public function index()
    {
        $email = $_REQUEST['email'];
        $response=array();$jsonhtml=array();
        if($email!="")
        {
            $result=$this->Loginmodel_Api->user_login($email);		
            if(!empty($result))
            {
                $jsondata['status']='Success';
                $jsondata['message']='Login Successful';
                $jsondata['userid'] = $result->id;
            }
            else
            {
                $jsondata['status']='Error';
                $jsondata['message']='Login failed.Invalid Email.';                
                $jsondata['userid'] = "";
            }
        }
        else
        {
                $jsondata['status']='Error';
                $jsondata['message']='Email Not Given'; 
        }
        $response['response'] = $jsondata;
        echo $jsonhtml=json_encode($jsondata);
    }
}