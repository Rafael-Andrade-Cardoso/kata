<h3><i class="fa fa-angle-right"></i> Cadastrar comunicado</h3>
<?php echo form_open('cadastro/insert_comunicado', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>



    <!-- Área de dados do Comunicado -->
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
                    <label class="col-sm-2 col-sm-2 control-label"> Título</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" class="form-control" name="titulo" value="<?php echo set_value('titulo'); ?>" title="Digite o nome do novo menu que será inserido"/>
                        <div class="error"><?php echo form_error('titulo'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data de publicação</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="dt_publicacao" value="<?php echo set_value('dt_publicacao'); ?>" title="Selecione ou digite a data de nascimento do responsável"/>
                        <div class="error"><?php echo form_error('dt_publicacao'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data de vencimento</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="dt_vencimento" value="<?php echo set_value('dt_vencimento'); ?>" title="Selecione ou digite a data de nascimento do responsável"/>
                        <div class="error"><?php echo form_error('dt_vencimento'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-6">
                        <textarea rows="5" class="form-control" name="descricao" title="Digite a descrição do novo menu"> <?php echo set_value('descricao'); ?></textarea>
                        <div class="error"><?php echo form_error('descricao'); ?></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Grupos</label>
                    <div class="col-sm-5">
                        <?php
                            foreach ($tipos_usuario as $value) {
                        ?>
                            <div class="checkbox">
                                <label>
                                    <input name="id_ta_tipo_usuario[]" type="checkbox" value="<?php echo $value->id_ta_tipo_usuario; ?>"
                                    <?php
                                        if (set_value('id_ta_tipo_usuario')){
                                            echo (in_array($value->id_ta_tipo_usuario, set_value('id_ta_tipo_usuario')))?" checked ":"";
                                        }
                                    ?>
                                    />
                                    <?php echo $value->ds_tipo_usuario; ?>
                                </label>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary" >Cadastrar</button>

            </div>
        </div>
    </div>

<?php echo form_close(); ?>
