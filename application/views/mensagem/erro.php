<h3><i class="fa fa-angle-right"></i> Cadastrar Menu</h3>
<div class="row">
    <div class="col-lg-offset-1 col-lg-10">
        <div class="alert alert-danger">
            <?php if (isset($msg) && !is_null($msg)){
                echo $msg;
            } else {
                echo "Erro ao tentar inserir registro! O que deseja fazer?";
            }
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-4 mb">
        <div class="mensagem">
            <a href="" onclick="javascript:window.history.go(-1)">Tentar novamente</a>
            <a href="<?php echo site_url(''); ?>">Listar registros </a>
            <a href="<?php echo base_url('dashboard'); ?>">Concluído </a>
        </div>
    </div>
</div>