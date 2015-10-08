<?php
/**
*
* @author     Bruno Ricardo Asato <asatobruno@gmail.com>
* @link       http://www.brunoasato.com.br Página pessoal do Autor
* @version    1.0-dev
* @copyright  2015 Bruno Ricardo Asato
*
*/
if ( ! function_exists('data_from_db')){
  /**
   * Anchor Link
   *
   * Creates an anchor based on the local URL.
   *
   * @param string  the URL
   * @param string  the link title
   * @param mixed any attributes
   * @return  string
   */
  function data_from_db($data) {
        if(strpos($data, '-')){
            return implode('/', array_reverse(explode('-', $data)));
        }
        else{ return $data; }
  }
}

if ( ! function_exists('data_to_db')){
    function data_to_db($data) { return implode('', array_reverse(explode('-', $data))); }
}

if ( ! function_exists('formata_CNPJ')){
    function formata_cnpj($numero) {
        $numero = preg_replace("[' '-./ t]", '', $numero);
        $valor  = str_pad(preg_replace('[^0-9]', '', $numero), 14, '0', STR_PAD_LEFT);
        return preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/', '$1.$2.$3/$4-$5', $valor);
    }
}

if ( ! function_exists('formata_CEP')){
    function formata_cep($numero){
        $numero = preg_replace("[' '-./ t]", '', $numero);
        $valor  = str_pad(preg_replace('[^0-9]', '', $numero), 7, '0', STR_PAD_LEFT);
        return preg_replace('/^(\d{2})(\d{3})(\d{3})$/', '$1.$2-$3', $valor);
    }
}

if ( ! function_exists('formata_tel')){
    function formata_tel($numero) {
        $numero = preg_replace("[' '-./ t]", '', $numero);
        $valor  = str_pad(preg_replace('[^0-9]', '', $numero), 10, '0', STR_PAD_LEFT);
        return preg_replace('/^(\d{2})(\d{4})(\d{4})$/', '($1) $2-$3', $valor);
    }
}

if ( ! function_exists('moeda_br')){
    function moeda_br($campo=NULL, $mask=NULL) {
        if(isset($campo)) {
          $campo_n = 'R$ ' . number_format((int)$campo, 2, ',', '.'); # retorna no formato R$ 100.000,50
          $mask = 'decimal';
          return array($campo_n, $mask);
        } else { return FALSE; }
      }
}

if ( ! function_exists('cria_senha')){
    function cria_senha() {
      $pwd = sha1(uniqid(time(), true));
      $pwd = substr($pwd, 0, 8);
      return $pwd;
    }
}


if ( ! function_exists('debug')){
    function debug($value){
      /*
      * Formas de uso
      * @ Debug($_POST);
      * @ Debug($_GET);
      * @ Debug($_REQUEST);
      */
        echo "<pre>";
        print_r($value);
        echo "<pre>";
        exit(); # You shall not pass!
    }
}

if ( ! function_exists('voltar')){
    # Função VOLTAR em JS
    # Define a quantidade de páginas no histórico se quer voltar
    function voltar($i=1) {
        echo '<script type="text/javascript">history.go(-'.$i.')</script>';
    }
}

if ( ! function_exists('formata_hora')){
    function formata_hora($valor) {
        if(isset($valor)) {
          return array($valor);
        } else { return FALSE; }
      }
}