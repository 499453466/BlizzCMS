<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arena extends MX_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));

        if(!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if (!$this->m_modules->getStatusLadArena())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_ArenaStats'))
            redirect(base_url(),'refresh');

        $this->load->model('arena_model');
    }

    public function index()
    {
        $data['fxtitle'] = $this->lang->line('nav_arena_statistics');
        $data['fx_adds'] = '<div class="uk-container">';
        
        $this->load->view('header', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }
}
