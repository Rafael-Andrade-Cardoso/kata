<h3><i class="fa fa-angle-right"></i> Alterar tipo de usuario</h3>
<?php echo form_open("alteracao/alterar_tipo_usuario/$query->id_ta_tipo_usuario", array('class' => 'form-horizontal style-form', 'id' => 'form_alterar'));?>
<input type="hidden" name="id_ta_tipo_usuario" value="<?php echo set_value('id_ta_tipo_usuario', $query->id_ta_tipo_usuario);?>" />

    <!-- Área de dados do menu -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Dados</h4>
                <?php
                    echo validation_errors('<p class="alert alert-danger">', '</p>');
                    if ($this->session->flashdata('cadastrook')){
                      echo '<p class="alert alert-success">' . $this->session->flashdata('cadastrook').'</p>';
                    }
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="ds_tipo_usuario" class="form-control" name="ds_tipo_usuario" value="<?php echo set_value('ds_tipo_usuario'); ?><?php echo set_value('ds_tipo_usuario', $query->ds_tipo_usuario);?>" title="Digite o nome do novo tipo de usuario" />
                        <div class="error"><?php echo form_error('desc_tipo_usuario'); ?></div>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary" >Alterar</button>

            </div>
        </div>
    </div>

<?php echo form_close(); ?>



