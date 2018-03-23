<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->load->database('auth', TRUE);
    }

    public function getSlides()
    {
        return $this->db->select('*')
                ->order_by('id', 'ASC')
                ->get('fx_slides');
    }

    public function getDiscordInfo()
    {
    	$invitation = $this->config->item('discord_inv');
    	$discord = file_get_contents('https://discordapp.com/api/v6/invite/'.$invitation.'?with_counts=true');
    	$vars = json_decode($discord, true);
    	return $vars;
    }

    public function updateInstallation()
    {
        $this->db->set('status', '0')
                ->where('id', '20')
                ->update('fx_modules');
    }

    public function realmGetHostname($id)
    {
        return $this->auth->select('address')
                ->where('id', $id)
                ->get('realmlist')
                ->row_array()['address'];
    }
}
