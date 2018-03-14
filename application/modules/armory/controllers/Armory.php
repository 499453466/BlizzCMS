<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armory extends MX_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));

        if(!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if ($this->m_modules->getArmory() != '1')
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_Armory'))
            redirect(base_url(),'refresh');

        $this->load->config('armory');
        $this->load->model('armory_model');
    }

    public function player($idplayer, $idrealm)
    {
        if(is_null($idplayer) || $idplayer == '' ||
            is_null($idrealm) || $idrealm == '')
        redirect(base_url('armory'),'refresh');

        if(!$this->m_data->getRealm($idrealm)->num_rows())
            redirect(base_url('armory'),'refresh');

        $data = array(
            'fxtitle' => $this->lang->line('nav_armory'),
            'idplayer' => $idplayer,
            'idrealm' => $idrealm,
            'fx_adds' => '<script src="'.base_url('core/js/tippy.all.min.js').'"></script>
                            <div class="uk-container">'
        );

        $this->load->view('header', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function item($id)
    {
        if(is_null($id) || $id == '')
            redirect(base_url(),'refresh');

        if($id == '0' || !$this->m_head->getItemWork($id))
            redirect(base_url('armory/items?notfound='.$id),'refresh');

        $data = array(
            'fxtitle' => $this->lang->line('nav_armory'),
            'idlink' => $id
        );

        $this->load->view('header', $data);
        $this->load->view('item');
        $this->load->view('footer'); 
    }

}
