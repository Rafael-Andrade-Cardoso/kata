<?php
class Menu_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function insert($data) {
        $resultado = $this->db->insert('menu', $data);
        if ($resultado){
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }


    function update($data=NULL, $id_menu=NULL) {
        if($data != NULL && $id_menu != NULL){
            unset($data['id_menu']);
            unset($data['id_ta_tipo_usuario']);
            $result = $this->db->update('menu', $data, array('id_menu' => $id_menu));
            if ($result){
                return true;
            } else {
                return false;
            }
        }
    }

    /*
    *   @usage
    *   $this->user_model->delete(6)
    */
    public function delete($id_menu){
        $this->db->delete('menu', ['id_menu' => $id_menu]);
        return $this->db->affected_rows();
    }

    public function get_byid($id=''){
        if ($id != NULL){
            $this->db->where('id_menu', $id);
            return $this->db->get('menu');
        } else {
            return false;
        }
    }

    public function get_tipo_usuario_byidmenu($idmenu=''){
        if ($idmenu != NULL){
            $this->db->select('ttu.id_ta_tipo_usuario');
            $this->db->from('ta_tipo_usuario ttu');
            $this->db->join('menu_tipo_usuario mtu', 'mtu.id_ta_tipo_usuario = ttu.id_ta_tipo_usuario');
            $this->db->where('mtu.id_menu', $idmenu);

            return $this->db->get();
        } else {
            return false;
        }
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
        /* SEM PERMISSÃO
            $this->db->select('*');
            $this->db->from('menu');
            $this->db->order_by("ordem", "desc");
            //$this->output->enable_profiler(TRUE);
            return $this->db->get();
            */
        /*  FORMA CORRETA COM PERMISSÃO */
        $this->db->select('m.*', false);
        $this->db->from('menu m');
        $this->db->join("menu_tipo_usuario mtu", "m.id_menu = mtu.id_menu");
        $this->db->join("ta_tipo_usuario ttu","ttu.id_ta_tipo_usuario = mtu.id_ta_tipo_usuario");
        $this->db->where('m.id_menu_pai', null);
        $this->db->where("mtu.id_ta_tipo_usuario", $_SESSION['usuario']->id_ta_tipo_usuario);
        $this->db->where("m.ativo = 1");
        $this->db->order_by("m.ordem", "desc");
        return $this->db->get();
    }

    function lista($qtd = 0, $inicio = 0){
            $this->db->select('*');
            $this->db->from('menu');
            $this->db->order_by("ordem", "asc");
            if ($qtd > 0){
                $this->db->limit($qtd, $inicio);
            }
            //$this->output->enable_profiler(TRUE);
            return $this->db->get();
    }

    function get_all(){
        return $this->db->get('menu');
    }

    /*
    * Retorna os submenus a partir de um id_menu.
    */
    function get_submenu($id_menu) {
        $this->db->from('menu');
        $this->db->order_by("nome", "asc");
        $this->db->where('id_menu_pai', $id_menu);
        $this->db->where("ativo = 1");
        return $this->db->get();
    }



    public function insert_tipo_usuario($dados) {
        $this->db->insert('menu_tipo_usuario', $dados);
    }

}
