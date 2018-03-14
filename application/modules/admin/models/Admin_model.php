<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct()
    {
        $this->auth = $this->load->database('auth', TRUE);
        parent::__construct();

        if ($this->m_modules->getACP() != '1')
            redirect(base_url(),'refresh');
    }

    public function currentVersion()
    {
        $version = 'v_0_009';
        return $version;
    }

    public function currentBlizzCMS()
    {
        $url="http://blizzcms.projectscms.ml/home/currentversion";
        $result = file_get_contents($url);
        return $result;
    }

    public function insertShop($itemid, $type, $name, $pricedp, $pricevp, $iconname, $groups, $image)
    {
        if ($pricevp == '0' && $pricedp == '0')
        redirect(base_url('admin/manageitems?p'),'refresh');

        if ($pricedp == '0')
            $pricedp = NULL;

        if ($pricevp == '0')
            $pricevp = NULL;

        $data = array(
            'itemid' => $itemid,
            'type' => $type,
            'name' => $name,
            'price_dp' => $pricedp,
            'price_vp' => $pricevp,
            'iconname' => $iconname,
            'groups' => $groups,
            'image' => $image,
        );

        $this->db->insert('fx_shop', $data);
        
        redirect(base_url('admin/manageitems'),'refresh');
    }

    public function getCategoryStore()
    {
        return $this->db->select('*')
                ->get('fx_shop_groups');
    }

    public function insertChangelog($title, $image, $desc)
    {
        $date = $this->m_data->getTimestamp();

        $data = array(
            'title' => $title,
            'image' => $image,
            'description' => $desc,
            'date' => $date,
        );

        $this->db->insert('fx_changelogs', $data);

        redirect(base_url('admin/managechangelogs'),'refresh');
    }

    public function getChangelogSpecifyRows($id)
    {
        return $this->db->select('*')
                ->where('id', $id)
                ->get('fx_changelogs')
                ->num_rows();
    }

    public function getChangelogSpecifyName($id)
    {
        return $this->db->select('title')
                ->where('id', $id)
                ->get('fx_changelogs')
                ->row('title');
    }

    public function getChangelogSpecifyDesc($id)
    {
        return $this->db->select('description')
                ->where('id', $id)
                ->get('fx_changelogs')
                ->row_array()['description'];
    }

    public function updateSpecifyChangelog($id, $title, $description, $image)
    {
        $date = $this->m_data->getTimestamp();

        $update = array(
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'date' => $date
        );

        $this->db->where('id', $id)
                ->update('fx_changelogs', $update);

        redirect(base_url('admin/managechangelogs'),'refresh');
    }

    public function insertPage($title, $desc)
    {
        $date = $this->m_data->getTimestamp();

        $data = array(
            'title' => $title,
            'description' => $desc,
            'date' => $date,
        );

        $this->db->insert('fx_pages', $data);

        $idd = $this->db->select('id')
                ->where('title', $title)
                ->get('fx_pages')
                ->row('id');

        redirect(base_url('admin/managepages?newpage='.$idd),'refresh');
    }

    public function getPagesSpecifyRows($id)
    {
        return $this->db->select('*')
                ->where('id', $id)
                ->get('fx_pages')
                ->num_rows();
    }

    public function getPagesSpecifyName($id)
    {
        return $this->db->select('title')
                ->where('id', $id)
                ->get('fx_pages')
                ->row('title');
    }

    public function getPagesSpecifyDesc($id)
    {
        return $this->db->select('description')
                ->where('id', $id)
                ->get('fx_pages')
                ->row_array()['description'];
    }

    public function updateSpecifyPage($id, $title, $description)
    {
        $date = $this->m_data->getTimestamp();

        $update = array(
            'title' => $title,
            'description' => $description,
            'date' => $date
        );

        $this->db->where('id', $id)
                ->update('fx_pages', $update);

        redirect(base_url('admin/managepages'),'refresh');
    }

    public function delShopItm($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_shop');

        $this->db->where('id_shop', $id)
                ->delete('fx_shop_top');

        redirect(base_url('admin/manageitems'),'refresh');
    }

    public function getShopGroupList()
    {
        return $this->db->select('*')
            ->order_by('id', 'ASC')
            ->get('fx_shop_groups');
    }

    public function deleteGroup($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_shop_groups');

        redirect(base_url('admin/managegroups'),'refresh');
    }

    public function insertGroup($name)
    {
        $data = array(
            'name' => $name,
        );

        $this->db->insert('fx_shop_groups', $data);

        redirect(base_url('admin/managegroups'),'refresh');
    }

    public function getShopAll()
    {
        return $this->db->select('*')
                ->order_by('id', 'ASC')
                ->get('fx_shop');
    }

    public function getChangelogs()
    {
        return $this->db->select('*')
                ->get('fx_changelogs')
                ->result();
    }

    public function getPages()
    {
        return $this->db->select('*')
                ->get('fx_pages')
                ->result();
    }

    public function delPage($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_pages');

        redirect(base_url('admin/managepages'),'refresh');
    }

    public function delChangelog($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_changelogs');

        redirect(base_url('admin/managechangelogs'),'refresh');
    }

    public function insertApiCharType($id, $type)
    {
        $data = array(
            'id' => $id,
            'type' => $type,
            'active' => '1'
        );

        $this->db->insert('fx_api_generator', $data);

        redirect(base_url('admin/manageapi/?generated=').$id,'refresh');
    }

    public function getUltimateApiCharID()
    {
        $qq = $this->db->select('id')
            ->order_by('id', 'DESC')
            ->limit('1')
            ->get('fx_api_generator')
            ->row('1');

        return ($qq+1);
    }

    public function deleteNewAjax($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_news');

        $this->db->where('id_new', $id)
                ->delete('fx_news_top');
    }

    public function getNewsSpecifyName($id)
    {
        return $this->db->select('title')
                ->where('id', $id)
                ->get('fx_news')
                ->row_array()['title'];
    }

    public function getNewsSpecifyDesc($id)
    {
        return $this->db->select('description')
                ->where('id', $id)
                ->get('fx_news')
                ->row_array()['description'];
    }

    public function getNewsSpecifyRows($id)
    {
        return $this->db->select('*')
                ->where('id', $id)
                ->get('fx_news')
                ->num_rows();
    }

    public function getAdminAccountsList()
    {
        return $this->auth->select('id, username, email')
                ->order_by('id', 'ASC')
                ->get('account');
    }

    public function getRemoveADMRank($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_ranks');

        $date 	= $this->m_data->getTimestamp();
        $reason = $this->lang->line('remove_addmAnnoW');

        $data = array(
            'iduser' => $id,
            'annotation' => $reason,
            'date' => $date,
        );

        $this->db->insert('fx_users_annotations', $data);

        redirect(base_url().'admin/manageaccount/'.$id,'refresh');
    }

    public function getADDADMRank($id, $type = '')
    {
        $data1 = array(
            'iduser' => $id,
            'idrank' => '1',
        );

        $this->db->insert('fx_users_permission', $data1);

        $date 	= $this->m_data->getTimestamp();
        $reason = $this->lang->line('receive_addmAnnoW');

        $data2 = array(
            'iduser' => $id,
            'annotation' => $reason,
            'date' => $date,
        );

        $this->db->insert('fx_users_annotations', $data2);

        if ($type == '') {
            redirect(base_url().'admin/manageaccount/'.$id,'refresh');
        }
    }

    public function insertForum($name, $category, $description, $icon, $type)
    {
        $data = array(
            'name' => $name,
            'category' => $category,
            'description' => $description,
            'icon' => $icon,
            'type' => $type,
        );

        $this->db->insert('fx_forum_forums', $data);

        redirect(base_url('admin/manageforums'),'refresh');
    }

    public function deleteForum($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_forum_forums');

        redirect(base_url('admin/manageforums'),'refresh');
    }

    public function getForumCategoryListAjax()
    {
        return $this->db->select('*')
            ->order_by('id', 'ASC')
            ->get('fx_forum_category');
    }

    public function insertCategoryAjax($name)
    {
        $data = array(
            'categoryName' => $name
        );
        $this->db->insert('fx_forum_category', $data);
    }

    public function insertDonationAjax($name, $price, $tax, $points)
    {
        $data = array(
            'name' => $name,
            'price' => $price,
            'tax' => $price,
            'points' => $price
        );
        $this->db->insert('fx_donate', $data);
    }

    public function updateCategoryAjax($id, $name, $column)
    {
        $this->db->set($column, $name)
                ->where('id', $id)
                ->update('fx_forum_category');
    }

    public function deleteCategoryAjax($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_forum_category');
    }

    public function deleteDonationAjax($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_donate');
    }

    public function getForumForumList()
    {
        return $this->db->select('*')
            ->order_by('id', 'ASC')
            ->get('fx_forum_forums');
    }

    public function getAdminCharactersList($multirealm)
    {
        $this->multirealm = $multirealm;
        return $this->multirealm->select('guid, account, name')
            ->order_by('name', 'ASC')
            ->get('characters');
    }

    public function insertBanChar($id, $reason, $multirealm, $idrealm)
    {
        $date 		= $this->m_data->getTimestamp();
        $idsession	= $this->session->userdata('fx_sess_id');

        if (empty($reason))
            $reason = $this->lang->line('was_ban');

        $data2 = array(
            'guid' => $id,
            'bandate,' => $date,
            'unbandate' => $date,
            'bannedby' => $idsession,
            'banreason' => $reason,
            'active' => '1'
        );

        $this->multirealm = $multirealm;
        $this->multirealm->insert('character_banned', $data2);

        $data1 = array(
            'idchar' => $id,
            'annotation' => $this->lang->line('is_banned_reason').' '.$reason,
            'date' => $date,
            'realmid' => $idrealm
        );

        $this->db->insert('fx_chars_annotations', $data1);

        redirect(base_url().'admin/managecharacter/'.$id.'/'.$idrealm,'refresh');
    }

    public function insertCustomizeChar($id, $multirealm, $idrealm)
    {
        if ($this->m_characters->getCharActive($id, $multirealm) == '1')
            redirect(base_url().'admin/managecharacter/'.$id.'/'.$idrealm.'?char','refresh');

        $date 		= $this->m_data->getTimestamp();
        $annotation = $this->lang->line('char_customAction');

        $data = array(
            'idchar' => $id,
            'annotation' => $annotation,
            'date' => $date,
            'realmid' => $idrealm
        );

        $this->db->insert('fx_chars_annotations', $data);

        $this->multirealm = $multirealm;
        $this->multirealm->set('at_login', '8')
                ->where('guid', $id)
                ->update('characters');

        redirect(base_url().'admin/managecharacter/'.$id.'/'.$idrealm,'refresh');
    }

    public function getDonateListAjax()
    {
        return $this->db->select('*')
            ->order_by('id', 'ASC')
            ->get('fx_donate');
    }

    public function updateDonationAjax($id, $name, $column)
    {
        $this->db->set($column, $name)
                ->where('id', $id)
                ->update('fx_news');
    }

     public function updateNewAjax($id, $name, $column)
    {
        $this->db->set($column, $name)
                ->where('id', $id)
                ->update('fx_news');
    }

    public function delSpecifyDonation($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_donate');

        redirect(base_url('admin/donate'),'refresh');
    }

    public function insertDonation($name, $price, $tax, $points)
    {
        $data = array(
            'name' => $name,
            'price' => $price,
            'tax' => $tax,
            'points' => $points,
        );

        $this->db->insert('fx_donate', $data);

        redirect(base_url('admin/donate'),'refresh');
    }

    public function getAdminNewsListAjax()
    {
        return $this->db->select('*')
            ->order_by('id', 'ASC')
            ->get('fx_news');
    }

    public function getUserHistoryDonate($id)
    {
        return $this->db->select('*')
                ->where('user_id', $id)
                ->order_by('id', 'DESC')
                ->get('fx_donate_history');
    }

    public function getDonateStatus($id)
    {
        switch ($id) {
            case 0: return $this->lang->line('status_donate_cancell'); break;
            case 1: return $this->lang->line('status_donate_complete'); break;
        }
    }

    public function insertNews($title, $image, $description, $type)
    {
        $date = $this->m_data->getTimestamp();

        $data = array(
            'title' => $title,
            'image' => $image,
            'description' => $description,
            'date' => $date,
        );

        $this->db->insert('fx_news', $data);

        if ($type == 2)
        {
            $id = $this->getNewIDperDate($date);

            $data = array(
            'id_new' => $id,
            );

            $this->db->insert('fx_news_top', $data);
        }

        redirect(base_url('admin/managenews'),'refresh');
    }

    public function getNewIDperDate($date)
    {
        return $this->db->select('id')            ->where('date', $date)
            ->get('fx_news')
            ->row('id');
    }

    public function getFileNameImage($id)
    {
        return $this->db->select('image')
            ->where('id', $id)
            ->get('fx_news')
            ->row_array()['image'];
    }

    public function insertChangeFactionChar($id, $multirealm, $idrealm)
    {
        if ($this->m_characters->getCharActive($id, $multirealm) == '1')
            redirect(base_url().'admin/managecharacter/'.$id.'/'.$idrealm.'?char','refresh');

        $date 		= $this->m_data->getTimestamp();
        $annotation = $this->lang->line('char_chanfactAction');

        $data = array(
                'idchar' => $id,
                'annotation' => $annotation,
                'date' => $date,
                'realmid' => $idrealm
            );

        $this->db->insert('fx_chars_annotations', $data);

        $this->multirealm = $multirealm;
        $this->multirealm->set('at_login', '64')
                ->where('guid', $id)
                ->update('characters');

        redirect(base_url().'admin/managecharacter/'.$id.'/'.$idrealm,'refresh');
    }

    public function insertChangeRaceChar($id, $multirealm, $idrealm)
    {
        if ($this->m_characters->getCharActive($id, $multirealm) == '1')
            redirect(base_url().'admin/managecharacter/'.$id.'/'.$idrealm.'?char','refresh');

        $date 		= $this->m_data->getTimestamp();
        $annotation = $this->lang->line('char_chanraceAction');

        $data = array(
               'idchar' => $id,
               'annotation' => $annotation,
               'date' => $date,
               'realmid' => $idrealm
            );

        $this->db->insert('fx_chars_annotations', $data);

        $this->multirealm = $multirealm;
        $this->multirealm->set('at_login', '128')
                ->where('guid', $id)
                ->update('characters');

        redirect(base_url().'admin/managecharacter/'.$id.'/'.$idrealm,'refresh');
    }

    public function insertUnbanChar($id, $multirealm, $idrealm)
    {
        $this->multirealm = $multirealm;
        $this->multirealm->where('guid', $id)
                ->delete('character_banned');

        $date 		= $this->m_data->getTimestamp();
        $annotation = $this->lang->line('unbanned');

        $data = array(
                'idchar' => $id,
                'annotation' => $annotation,
                'date' => $date,
                'realmid' => $idrealm
            );

        $this->db->insert('fx_chars_annotations', $data);

        redirect(base_url().'admin/managecharacter/'.$id.'/'.$idrealm,'refresh');
    }

    public function insertCharRename($id, $name, $multirealm, $realm)
    {
        if ($this->m_characters->getCharActive($id, $multirealm) == '1')
            redirect(base_url().'admin/managecharacter/'.$id.'/'.$realm.'?char','refresh');

        if ($this->m_characters->getCharNameAlreadyExist($name, $multirealm)->num_rows())
            redirect(base_url().'admin/managecharacter/'.$id.'/'.$realm.'?name','refresh');

        $date 		= $this->m_data->getTimestamp();
        $annotation = $this->lang->line('char_newname').' -> '.$name.' | '.$this->lang->line('char_oldname').' -> '.$this->m_characters->getCharName($id, $multirealm);

        $data = array(
                'idchar' => $id,
                'annotation' => $annotation,
                'date' => $date,
                'realmid' => $realm
            );

        $this->db->insert('fx_chars_annotations', $data);

        $this->multirealm = $multirealm;
        $this->multirealm->set('name', $name)
                ->where('guid', $id)
                ->update('characters');

        redirect(base_url().'admin/managecharacter/'.$id.'/'.$realm,'refresh');
    }

    public function insertChangeLevelChar($id, $level, $multirealm, $realm)
    {
        if ($this->m_characters->getCharActive($id, $multirealm) == '1')
            redirect(base_url().'admin/managecharacter/'.$id.'/'.$realm.'?char','refresh');

        $date 		= $this->m_data->getTimestamp();
        $annotation = $this->lang->line('char_newlevel').' -> '.$level.' | '.$this->lang->line('char_oldlevel').' -> '.$this->m_characters->getCharLevel($id, $multirealm);

        $data = array(
                'idchar' => $id,
                'annotation' => $annotation,
                'date' => $date,
                'realmid' => $realm
            );

        $this->db->insert('fx_chars_annotations', $data);

        $this->multirealm = $multirealm;
        $this->multirealm->set('level', $level)
                ->where('guid', $id)
                ->update('characters');

        redirect(base_url().'admin/managecharacter/'.$id.'/'.$realm,'refresh');
    }

    public function getAnnotationsSpecifyChar($id, $realm)
    {
        return $this->db->select('*')
            ->where('idchar', $id)
            ->where('realmid', $realm)
            ->order_by('id', 'DESC')
            ->get('fx_chars_annotations');
    }

    public function insertRankAcc($id, $gmlevel)
    {
        $data = array(
                'id' => $id,
                'gmlevel' => $gmlevel,
                'RealmID' => '-1',
            );

        $this->auth->insert('account_access', $data);

        $date 	= $this->m_data->getTimestamp();
        $reason = $this->lang->line('receive_gmAnno');

        $data = array(
                'iduser' => $id,
                'annotation' => $reason,
                'date' => $date,
            );

        $this->db->insert('fx_users_annotations', $data);

        redirect(base_url().'admin/manageaccount/'.$id,'refresh');
    }

    public function getAnnotationsSpecify($id)
    {
        return $this->db->select('*')
            ->where('iduser', $id)
            ->get('fx_users_annotations');
    }

    public function inserUnBanAcc($id)
    {
        $date = $this->m_data->getTimestamp();

        if (empty($reason))
            $reason = $this->lang->line('unbanned');

        $data = array(
                'iduser' => $id,
                'annotation' => $reason,
                'date' => $date,
            );

        $this->db->insert('fx_users_annotations', $data);

        $this->auth->where('id', $id)
                ->delete('account_banned');

        if ($this->m_general->getExpansionAction() == 2)
            $this->auth->where('id', $id)
                    ->delete('battlenet_account_bans');

        redirect(base_url().'admin/manageaccount/'.$id,'refresh');
    }

    public function removeRankAcc($id)
    {
        $this->auth->where('id', $id)
                ->delete('account_access');

        $date 	= $this->m_data->getTimestamp();
        $reason = $this->lang->line('remove_gmAnnotation');

        $data = array(
                'iduser' => $id,
                'annotation' => $reason,
                'date' => $date,
            );

        $this->db->insert('fx_users_annotations', $data);

        redirect(base_url().'admin/manageaccount/'.$id,'refresh');
    }

    public function insertBanAcc($iduser, $reason)
    {
        $date = $this->m_data->getTimestamp();
        $id   = $this->session->userdata('fx_sess_id');

        if (empty($reason))
            $reason = $this->lang->line('was_ban');

        $data1 = array(
                'iduser' => $iduser,
                'annotation' => $reason,
                'date' => $date,
            );

        $this->db->insert('fx_users_annotations', $data1);

        $data2 = array(
                'id' => $iduser,
                'bandate' => $date,
                'unbandate' => $date,
                'bannedby' => $id,
                'banreason' => $reason,
            );

        $this->auth->insert('account_banned', $data2);

        if ($this->m_general->getExpansionAction() == 2)
            $this->auth->insert('battlenet_account_bans', $data2);

        redirect(base_url().'admin/manageaccount/'.$iduser,'refresh');
    }

    public function getBanCount()
    {
        return $this->auth->select('id')
            ->get('account_banned')
            ->num_rows();
    }

    public function getBanSpecify($id)
    {
        return $this->auth->select('*')
            ->where('id', $id)
            ->get('account_banned');
    }

    public function getGmCount($idrealm)
    {
        return $this->auth->select('id')
            ->where('RealmID', $idrealm)
            ->or_where('RealmID', '-1')
            ->get('account_access')
            ->num_rows();
    }

    public function getAccCreated()
    {
        return $this->auth->select('id')
            ->get('account')
            ->num_rows();
    }

    public function getCharOn($multirealm)
    {
        $this->multirealm = $multirealm;
        
        return $this->multirealm->select('*')
            ->where('online', '1')
            ->get('characters')
            ->num_rows();
    }

    //config
    public function settingConfig($data)
    {
        $filename = $data['filename'];

        $Configsearch = array(
            $data['actualURL'],
            $data['actualLang'],
            $data['actualCharSet'],
            $data['actualSess']
        );

        $Configreplace = array(
            $data['configURL'],
            $data['configLang'],
            $data['configCharSet'],
            $data['configSess']
        );

        $fileConfig = file_get_contents($filename);
        $newConfig = str_replace($Configsearch, $Configreplace, $fileConfig);
        $openConfig = fopen($filename,"w");
        fwrite($openConfig, $newConfig);
        fclose($openConfig);

        redirect(base_url('admin/settings'),'refresh');
    }

    public function getConfigBaseUrl($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[25], 22);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getConfigLanguage($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[78], 22);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getConfigCharSet($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[91], 22);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getConfigSessExpiration($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[381], 29);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    //fixcore
    public function settingFixCore($data)
    {
        $filename = $data['filename'];

        $Configsearch = array(
            $data['actualName'],
            $data['actualTimeZone'],
            $data['actualDiscord'],
            $data['actualRealmlist'],
            $data['actualStaffColor'],
            $data['actualTheme'],
            $data['actualnavbr']
        );

        $Configreplace = array(
            $data['fixcoreName'],
            $data['fixcoreTimeZone'],
            $data['fixcoreDiscord'],
            $data['fixcoreRealmlist'],
            $data['fixcoreStaffColor'],
            $data['fixcoreThemeName'],
            $data['devnavbarfx']
        );

        $fileConfig = file_get_contents($filename);
        $newConfig = str_replace($Configsearch, $Configreplace, $fileConfig);
        $openConfig = fopen($filename,"w");
        fwrite($openConfig, $newConfig);
        fclose($openConfig);

        redirect(base_url('admin/settings'),'refresh');
    }

    public function getFixCoreProjectName($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[11], 26);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getFixCoreTimeZone($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[21], 23);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getFixCoreDiscordInv($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[42], 25);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getFixCoreRealmlist($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[52], 24);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getFixCoreStaffColor($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[65], 31);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getFixCoreThemeName($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[96], 25);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getFixCoreNavBar($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[106], 23);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    //database
    public function settingDatabase($data)
    {
        $filename = $data['filename'];

        $Configsearch = array(
            $data['actualdbCmsHost'],
            $data['actualdbCmsUser'],
            $data['actualdbCmsPassword'],
            $data['actualdbCmsdbName'],
            $data['actualdbAuthHost'],
            $data['actualdbAuthUser'],
            $data['actualdbAuthPassword'],
            $data['actualdbAuthName']
        );

        $Configreplace = array(
            $data['dbCmsHost'],
            $data['dbCmsUser'],
            $data['dbCmsPassword'],
            $data['dbCmsName'],
            $data['dbAuthHost'],
            $data['dbAuthUser'],
            $data['dbAuthPassword'],
            $data['dbAuthName']
        );

        $fileConfig = file_get_contents($filename);
        $newConfig = str_replace($Configsearch, $Configreplace, $fileConfig);
        $openConfig = fopen($filename,"w");
        fwrite($openConfig, $newConfig);
        fclose($openConfig);

        redirect(base_url('admin/settings'),'refresh');
    }

    public function getDatabaseCmsHost($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[8], 16);
        $fileHandle = explode(",", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getDatabaseCmsUser($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[9], 16);
        $fileHandle = explode(",", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getDatabaseCmsPassword($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[10], 16);
        $fileHandle = explode(",", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getDatabaseCmsName($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[11], 16);
        $fileHandle = explode(",", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getDatabaseAuthHost($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[30], 16);
        $fileHandle = explode(",", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getDatabaseAuthUser($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[31], 16);
        $fileHandle = explode(",", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getDatabaseAuthPassword($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[32], 16);
        $fileHandle = explode(",", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getDatabaseAuthName($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[33], 16);
        $fileHandle = explode(",", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    //recaptcha
    public function settingRecaptcha($data)
    {
        $filename = $data['filename'];

        $Configsearch = array(
            $data['actualrecaptchaKey'],
            $data['actualrecaptchaPrivateKey'],
            $data['actualrecaptchaLang']
        );

        $Configreplace = array(
            $data['recaptchaKey'],
            $data['recaptchaPrivateKey'],
            $data['recaptchaLang']
        );

        $fileConfig = file_get_contents($filename);
        $newConfig = str_replace($Configsearch, $Configreplace, $fileConfig);
        $openConfig = fopen($filename,"w");
        fwrite($openConfig, $newConfig);
        fclose($openConfig);

        redirect(base_url('admin/settings'),'refresh');
    }

    public function getRecaptchaKey($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[14], 32);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getRecaptchaPrivateKey($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[15], 34);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getRecaptchaLang($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[16], 19);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    //bugtracker
    public function settingBugtracker($data)
    {
        $filename = $data['filename'];

        $Configsearch = array(
            $data['actualbugtrackerText']
        );

        $Configreplace = array(
            $data['bugtrackerText']
        );

        $fileConfig = file_get_contents($filename);
        $newConfig = str_replace($Configsearch, $Configreplace, $fileConfig);
        $openConfig = fopen($filename,"w");
        fwrite($openConfig, $newConfig);
        fclose($openConfig);

        redirect(base_url('admin/settings'),'refresh');
    }

    public function getBugtrackerText($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[11], 23);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    //donate
    public function settingDonate($data)
    {
        $filename = $data['filename'];

        $Configsearch = array(
            $data['actualpaypalCurrency'],
            $data['actualpaypalMode'],
            $data['actualpaypalclientId'],
            $data['actualpaypalPassword']
        );

        $Configreplace = array(
            $data['paypalCurrency'],
            $data['paypalMode'],
            $data['paypalclientId'],
            $data['paypalPassword']
        );

        $fileConfig = file_get_contents($filename);
        $newConfig = str_replace($Configsearch, $Configreplace, $fileConfig);
        $openConfig = fopen($filename,"w");
        fwrite($openConfig, $newConfig);
        fclose($openConfig);

        redirect(base_url('admin/settings'),'refresh');
    }

    public function getPaypalCurrency($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[12], 27);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getPaypalMode($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[25], 21);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getPaypalClientID($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[36], 21);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function getPaypalPassword($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[47], 25);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    //store
    public function settingStore($data)
    {
        $filename = $data['filename'];

        $Configsearch = array(
            $data['actualstoreType']
        );

        $Configreplace = array(
            $data['storeType']
        );

        $fileConfig = file_get_contents($filename);
        $newConfig = str_replace($Configsearch, $Configreplace, $fileConfig);
        $openConfig = fopen($filename,"w");
        fwrite($openConfig, $newConfig);
        fclose($openConfig);

        redirect(base_url('admin/settings'),'refresh');
    }

    public function getStoreType($filename)
    {
        $fileHandle = file($filename);
        $fileHandle = substr($fileHandle[14], 24);
        $fileHandle = explode(";", $fileHandle);
        return str_replace("'", "", $fileHandle[0]);
    }

    public function delSpecifyRealm($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_realms');
                
        redirect(base_url('admin/settings'),'refresh');
    }

    public function insertNewSlides($title, $image)
    {
        $data = array(
            'title' => $title,
            'image' => $image,
        );

        $this->db->insert('fx_slides', $data);

        redirect(base_url('admin/manageslides'),'refresh');
    }

    public function delSpecifySlide($id)
    {
        $this->db->where('id', $id)
                ->delete('fx_slides');

        redirect(base_url('admin/manageslides'),'refresh');
    }

    public function getAdminSlideList()
    {
        return $this->db->select('id, title')
            ->order_by('id', 'ASC')
            ->get('fx_slides');
    }
}
