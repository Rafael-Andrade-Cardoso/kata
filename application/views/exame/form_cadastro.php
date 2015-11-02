<h3><i class="fa fa-angle-right"></i> Cadastrar exame</h3>
<?php echo form_open('cadastro/insert_exame', array('class' => 'form-horizontal style-form', 'id' => 'form_cadastro'));?>

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
                    //debug($this->session);
                ?>


                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Arte marcial</label>
                    <div class="col-sm-10">
                        <select name="id_arte_marcial" class="form-control">
                            <option value="">Escolha o estilo</option>
                            <?php
                                foreach ($arte_marcial as $value) {
                                    echo "<option value='" . $value->id_arte_marcial . "'";
                                    if (set_value('id_arte_marcial') == $value->id_arte_marcial){
                                          echo " checked ";
                                    }
                                    echo ">" . $value->nm_arte_marcial . "</option>";
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_arte_marcial'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Graduação (objetivo)</label>
                    <div class="col-sm-10">
                        <select name="id_ta_graduacao" class="form-control">
                            <option value="">Escolha a Graduação</option>
                            <?php
                                foreach ($graduacao as $value) {
                                    echo "<option value='" . $value->id_ta_graduacao . "'";
                                    if (set_value('id_ta_graduacao')){
                                      echo " checked ";
                                    }
                                    echo ">" . $value->graduacao . "</option>";
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_ta_graduacao'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Aluno</label>
                    <div class="col-sm-10">
                        <select name="id_aluno" class="form-control">
                          <option value="">Escolha o estilo</option>
                            <?php
                                foreach ($aluno as $value) {
                                    echo "<option value='" . $value->id_matricula . "'";
                                    if (set_value('id_aluno')){
                                      echo " checked ";
                                    }
                                    echo ">" . $value->nome . " " . $value->sobrenome . "</option>";
                                }
                            ?>
                        </select>
                        <div class="error"><?php echo form_error('id_aluno'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data do exame</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="dt_exame" value="<?php echo set_value('dt_exame'); ?>" />
                        <div class="error"><?php echo form_error('dt_exame'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"> Valor</label>
                    <div class="col-sm-3">
                        <input type="text" id="valor" class="form-control" name="valor" value="<?php echo set_value('valor'); ?>" />
                        <div class="error"><?php echo form_error('valor'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Local</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="local" ><?php echo set_value('local'); ?> </textarea>
                        <div class="error"><?php echo form_error('local'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Observações</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="descricao" ><?php echo set_value('descricao'); ?> </textarea>
                        <div class="error"><?php echo form_error('descricao'); ?></div>
                    </div>
                </div>

                <button class="btn btn-lg btn-primary" >Cadastrar</button>
                <?php
                //echo anchor_popup(base_url('cadastro/form_aluno'), 'Cadastro de Alunos', array('width' => '750', 'height' => '600', 'scrollbars' => 'yes', 'menubar' => 'no', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0'));
                ?>
            </div>
        </div>
    </div>

<?php echo form_close(); ?>
