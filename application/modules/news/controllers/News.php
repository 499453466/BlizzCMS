<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MX_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));

        if(!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if ($this->m_modules->getStatusNews() != '1')
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_News'))
            redirect(base_url(),'refresh');

        $this->load->model('news_model');
    }

    public function index()
    {
        $data['fxtitle'] = $this->lang->line('nav_news');
        
        $this->load->view('header', $data);
        $this->load->view('news/news');
        $this->load->view('footer');
    }

    public function post($id)
    {
        $this->load->model('forum/forum_model');

        $data['idlink'] = $id;
        $data['fxtitle'] = $this->lang->line('nav_news');
        
        $this->load->view('header', $data);
        $this->load->view('news/post', $data);
        $this->load->view('footer');
    }

}
