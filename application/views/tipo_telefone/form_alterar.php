<h3><i class="fa fa-angle-right"></i> Alterar tipo de telefone</h3>
<?php echo form_open("alteracao/alterar_tipo_telefone/$query->id_ta_tipo_telefone", array('class' => 'form-horizontal style-form', 'id' => 'form_alterar'));?>
<input type="hidden" name="id_ta_tipo_telefone" value="<?php echo set_value('id_ta_tipo_telefone', $query->id_ta_tipo_telefone);?>" />

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
                        <input type="text" id="desc_tipo_telefone" class="form-control" name="desc_tipo_telefone" value="<?php echo set_value('desc_tipo_telefone'); ?><?php echo set_value('desc_tipo_telefone', $query->desc_tipo_telefone);?>" title="Digite o nome do novo tipo de telefone" />
                        <div class="error"><?php echo form_error('desc_tipo_telefone'); ?></div>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary" >Alterar</button>

            </div>
        </div>
    </div>

<?php echo form_close(); ?>



