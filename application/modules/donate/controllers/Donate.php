<?php defined('BASEPATH') OR exit('No direct script access allowed');

require './vendor/autoload.php';

use \PayPal\Api\PaymentExecution;

class Donate extends MX_Controller
{
    function __construct()
    {
        //Call the constructor of MX_Controller
        parent::__construct();

        if(!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));

        if(!$this->m_data->isLogged())

        if(!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if ($this->m_modules->getDonation() != '1')
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_Donate'))
            redirect(base_url(),'refresh');

        $this->load->config('donate');
        $this->load->model('donate_model');
    }
    
    public function index()
    {
        $data['fxtitle'] = $this->lang->line('nav_donate');

        $this->load->view('header', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function complete($id)
    {
        $this->donate_model->completeTransaction($id, $_GET['paymentId']);
    }

    public function cancelled()
    {
        redirect(base_url('donate'),'refresh');
    }
}