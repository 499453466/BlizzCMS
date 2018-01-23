<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategory()
    {
        return $this->db->select('id, categoryName')
                ->get('fx_forum_category')
                ->result();
    }

    public function insertComment($comment, $topic, $author)
    {
        $date = $this->m_data->getTimestamp();

        $data = array(
            'topic' => $topic,
            'author' => $author,
            'commentary' => $comment,
            'date' => $date,
            );

        $this->db->insert('fx_forum_comments', $data);

        redirect(base_url('forums/topic/'.$topic),'refresh');
    }

    public function getComments($id)
    {
        return $this->db->select('*')
                ->where('topic', $id)
                ->get('fx_forum_comments');
    }

    public function getCountPostAuthor($id)
    {
        return $this->db->select('author')
                ->where('author', $id)
                ->get('fx_forum_topics')
                ->num_rows();
    }

    public function removeComment($id, $link)
    {
        $this->db->where('id', $id)
                ->delete('fx_forum_comments');

        redirect(base_url('forums/topic/').$link,'refresh');
    }

    public function getRowTopicExist($id)
    {
        return $this->db->select('id')
                ->where('id', $id)
                ->get('fx_forum_topics')
                ->num_rows();
    }

    public function insertTopic($idlink, $title, $userid, $description, $lock, $highl)
    {
        $date = $this->m_data->getTimestamp();

        $data = array(
            'forums' => $idlink,
            'title' => $title,
            'author' => $userid,
            'date' => $date,
            'content' => $description,
            'locked' => $lock,
            'pined' => $highl
        );


        $this->db->insert('fx_forum_topics', $data);
        
        $getIDPost = $this->getIDPostPerDate($date);

        redirect(base_url('forums/topic/').$getIDPost,'refresh');
    }

    public function getIDPostPerDate($date)
    {
        return $this->db->select('id')
                ->where('date', $date)
                ->get('fx_forum_topics')
                ->row('id');
    }

    public function updateTopic($idlink, $title, $description, $lock, $highl)
    {
        $date = $this->m_data->getTimestamp();

        $data = array(
            'title' => $title,
            'content' => $description,
            'locked' => $lock,
            'pined' => $highl
        );

        $this->db->where('id', $idlink)
                ->update('fx_forum_topics', $data);

        redirect(base_url('forums/topic/').$idlink,'refresh');
    }

    public function getType($id)
    {
        return $this->db->select('type')
                ->where('id', $id)
                ->get('fx_forum_forums')
                ->row('type');
    }

    public function getTopicTitle($id)
    {
        return $this->db->select('title')
                ->where('id', $id)
                ->get('fx_forum_topics')
                ->row_array()['title'];
    }

    public function getTopicDescription($id)
    {
        return $this->db->select('content')
                ->where('id', $id)
                ->get('fx_forum_topics')
                ->row_array()['content'];
    }

    public function getCategoryForums($category)
    {
        return $this->db->select('id, name, category, description, icon, type')
                ->where('category', $category)
                ->get('fx_forum_forums')
                ->result();
    }

    public function getCategoryName($id)
    {
        return $this->db->select('name')
                ->where('id', $id)
                ->get('fx_forum_forums')
                ->row('name');
    }

    public function getCategoryRows($id)
    {
        return $this->db->select('category')
                ->where('category', $id)
                ->get('fx_forum_forums')
                ->num_rows();
    }

    public function getForumName($id)
    {
        return $this->db->select('name')
                ->where('id', $id)
                ->get('fx_forum_forums')
                ->row_array()['name'];
    }

    public function getSpecifyCategoryPosts($id)
    {
        return $this->db->select('*')
                ->where('forums', $id)
                ->order_by('id', 'DESC')
                ->get('fx_forum_topics');
    }

    public function getSpecifyCategoryPostsPined($id)
    {
        return $this->db->select('*')
                ->where('forums', $id)
                ->where('pined', '1')
                ->order_by('id', 'DESC')
                ->get('fx_forum_topics');
    }

    public function getSpecifyPostName($id)
    {
        return $this->db->select('title')
                ->where('id', $id)
                ->get('fx_forum_topics')
                ->row('title');
    }

    public function getSpecifyPostAuthor($id)
    {
        return $this->db->select('author')
                ->where('id', $id)
                ->get('fx_forum_topics')
                ->row('author');
    }

    public function getSpecifyPostDate($id)
    {
        return $this->db->select('date')
                ->where('id', $id)
                ->get('fx_forum_topics')
                ->row('date');
    }

    public function getSpecifyPostContent($id)
    {
        return $this->db->select('content')
                ->where('id', $id)
                ->get('fx_forum_topics')
                ->row_array()['content'];
    }

    public function getTopicLocked($id)
    {
        return $this->db->select('locked')
                ->where('id', $id)
                ->get('fx_forum_topics')
                ->row('locked');
    }

    public function getTopicForum($id)
    {
        return $this->db->select('forums')
                ->where('id', $id)
                ->get('fx_forum_topics')
                ->row('forums');
    }
}
