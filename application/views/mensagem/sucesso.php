<h3><i class="fa fa-angle-right"></i> Cadastro</h3>
<div class="row">
    <div class="col-lg-offset-1 col-lg-10">
        <div class="alert alert-success">
            <?php if (isset($msg) && !is_null($msg)){
                echo $msg;
            } else {
                echo "Registro inserido com sucesso! O que deseja fazer agora?";
            }
            ?>
        </div>
    </div>
</div>
<div class="row">
    <!-- <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-4 mb"> -->
    <div class="col-lg-offset-1 col-lg-10">
        <div class="mensagem">
            <a href="" onclick="javascript:window.history.go(-1)">Cadastrar novo </a>
            <?php
                $nova_url = $bodytag = str_replace("relatorio/insert_", "listar/", $this->uri->uri_string());
            ?>
            <a href="<?php echo $nova_url; ?>">Listar registros </a>
            <a href="<?php echo base_url('inicio'); ?>">Concluído </a>
        </div>
    </div>
</div>