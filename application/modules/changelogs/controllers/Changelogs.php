<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changelogs extends MX_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));

        if(!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if (!$this->m_modules->getStatusChangelogs())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_Changelogs'))
            redirect(base_url(),'refresh');

        $this->load->model('changelogs_model');
    }

    public function index()
    {
        $data['fxtitle'] = $this->lang->line('nav_changelogs');
        
        $this->load->view('header', $data);
        $this->load->view('changelogs/index');
        $this->load->view('footer');
    }

    public function id($id)
    {
        if (empty($id) || is_null($id))
            redirect(base_url(),'refresh');

        $data['idlink'] = $id;
        $data['fxtitle'] = $this->lang->line('nav_changelogs');

        $this->load->view('header', $data);
        $this->load->view('changelogs/changelog', $data);
        $this->load->view('footer');
    }
}
