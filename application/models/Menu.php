<?php
class Menu extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
    
    function get_category(){
        $this->db->from('usuario_menu');
        $this->db->where('id_tipo_usuario', 1);
        $menu_list = $this->db->get();
    }
    
    /*
    * Retorna itens de menu de primeiro nível, ou seja, onde id_menu_pai = null.
    */
    function get_menu(){
        $this->db->from('menu');
        $this->db->where('id_menu_pai', null);
        $this->db->order_by("ordem", "desc");
        return $this->db->get();
    }
    
    /*
    * Retorna os submenus a partir de um id_menu.
    */
    function get_submenu($id_menu) {
        $this->db->from('menu');
        $this->db->order_by("ordem", "asc");
        $this->db->where('id_menu_pai', $id_menu);
        return $this->db->get();
    }

}